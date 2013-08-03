<?php if (count($snippets) > 0) : ?>
	<div>
		@include('_partial.notifications')
		<table class="table table-bordered table-striped table-hover">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Image</th>
	        <th style="width: 30px">Lang.</th>
	        <th>Title</th>
	        <th>Description</th>
	        <th>Author</th>
	      </tr>
	    </thead>
	    <tbody>
	      @foreach ($snippets as $snippet)
	      <tr>
	        <td>{{ $snippet->id }}</td>
	        <?php if ($snippet->image) : ?>
	        	<td><a href="{{ URL::route('snippet.show_slug', array('slug' => $snippet->slug) ) }}">
	        			<img src="<?php echo Image::resize($snippet->image, 150, 100); ?>" alt="">
					</a>
	        	</td>
	        <?php else : ?>
	        	<td>-</td>
	    	<?php endif; ?>
	        <td><a href="{{ URL::route('snippet.show_by_language', array('slug' => $snippet->language->short_name) ) }}">
	        		<span class="label label-important">{{ $snippet->language_name() }}</span>
	        	</a>
	        </td>
	        <td><a href="{{ URL::route('snippet.show_slug', array('slug' => $snippet->slug) ) }}">{{ $snippet->title }}</a></td>
	        <td>{{ $snippet->description }}</td>
	        <td><a href="{{ URL::route('user.profile', array('user_id' => $snippet->author->id) ) }}">{{ $snippet->author_name() }}</a></td>
	      </tr>
		  @endforeach
	    </tbody>
	  </table>
	  <div class="pagination">
        <ul>
          <li><a href="#">←</a></li>
          <li class="active"><a href="#">10</a></li>
          <li class="disabled"><a href="#">...</a></li>
          <li><a href="#">20</a></li>
          <li><a href="#">→</a></li>
        </ul>
      </div>
	</div>
<?php else: ?>
	<div class="alert-info alert">
		Ops, we could't find Snippets here...
	</div>
<?php endif; ?>