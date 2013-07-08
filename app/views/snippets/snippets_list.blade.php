@extends('_layouts.frontend')


@section('main')
<div>
	@include('_partials.notifications')
	<h1>Latest Snippets</h1>
	

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
        <td>Autor...</td>
        <td><a href="">View</a></td>
      </tr>
	  @endforeach
    </tbody>
  </table>
	
</div>

@stop