<?php if (count($snippets) > 0) : ?>
	<div>
		@include('_partials.notifications')
		<table class="table table-bordered table-striped table-hover">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Title</th>
	        <th>Description</th>
	        <th>Author</th>
	        <th>View</th>
	      </tr>
	    </thead>
	    <tbody>
	      @foreach ($snippets as $snippet)
	      <tr>
	        <td>{{ $snippet->id }}</td>
	        <td>{{ $snippet->title }}</td>
	        <td>{{ $snippet->description }}</td>
	        <td>{{ $snippet->author_name() }}</td>
	        <td><a href="{{ URL::route('snippets.view', array('id' => $snippet->id) ) }}">View</a></td>
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
<?php endif; ?>