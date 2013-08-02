@extends('_layout.frontend')

@section('main')

    <h1>Browsing Languages</h1>

    <ul>
    <?php foreach ($languages as $language): ?>
    	<li><a href="{{ URL::route('snippet.show_by_language', array('slug' => $language->short_name) ) }}">{{$language->name}}</a></li>
	<?php endforeach; ?>
	</ul>
@stops