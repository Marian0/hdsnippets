<?php
namespace App\Services;

use File, Log;
 
class Image {
 
    protected $library = 'imagick';
    protected $imagine;
    public $overwrite = false;
    public $quality = 85;
 
    public function __construct($library = null)
    {
        if ( ! $this->imagine)
        {
            $this->library = $library ? $library : null;
 
            if ( ! $this->library and class_exists('Imagick')) $this->library = 'imagick';
            else                                               $this->library = 'gd';
 
            if     ($this->library == 'imagick') $this->imagine = new \Imagine\Imagick\Imagine();
            elseif ($this->library == 'gmagick') $this->imagine = new \Imagine\Gmagick\Imagine();
            elseif ($this->library == 'gd')      $this->imagine = new \Imagine\Gd\Imagine();
            else                                 $this->imagine = new \Imagine\Gd\Imagine();
        }
    }
 
    public function resize($url, $width = 100, $height = null, $crop = false, $quality = null)
    {
        if ($url)
        {
            $info = pathinfo($url);
 
            if ( ! $height) $height = $width;
 
            $quality = ($quality) ? $quality : $this->quality;
 
            $fileName       = $info['basename'];
            $sourceDirPath  = public_path() . $info['dirname'];
            $sourceFilePath = $sourceDirPath . '/' . $fileName;
            $targetDirName  = $width . 'x' . $height . ($crop ? '_crop' : '');
            $targetDirPath  = $sourceDirPath . '/' . $targetDirName . '/';
            $targetFilePath = $targetDirPath . $fileName;
            $targetUrl      = asset($info['dirname'] . '/' . $targetDirName . '/' . $fileName);
 
            try
            {
                if ( ! File::isDirectory($targetDirPath) and $targetDirPath) @File::makeDirectory($targetDirPath);
 
                $size = new \Imagine\Image\Box($width, $height);
 
                $mode = $crop ? \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND : \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
 
                if ($this->overwrite or ! File::exists($targetFilePath) or (File::lastModified($targetFilePath) < File::lastModified($sourceFilePath)))
                {
                    $this->imagine->open($sourceFilePath)
                                  ->thumbnail($size, $mode)
                                  ->save($targetFilePath, array('quality' => $quality));
                }
            }
            catch (\Exception $e)
            {
                Log::error('[IMAGE SERVICE] Failed to resize image &quot;' . $url . '&quot; [' . $e->getMessage() . ']');
            }
 
            return $targetUrl;
        }
    }
 
    public function thumb($url, $width, $height = null)
    {
        return $this->resize($url, $width, $height, true);
    }
 
    public function upload($file, $dir = null)
    {
        if ($file)
        {
            // Generate random dir
            if ( ! $dir) $dir = str_random(8);
 
            // Get file info and try to move
            $destination = public_path() .  '/uploads/' . $dir;
            $filename    = $file->getClientOriginalName();
            $path        = '/uploads/' . $dir . '/' . $filename;
            $uploaded    = $file->move($destination, $filename);
 
            if ($uploaded) return $path;
        }
    }
 
}