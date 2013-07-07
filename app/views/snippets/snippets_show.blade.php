@extends('_layouts.frontend')


@section('main')
<div>
	<h2>{{ $snippet->title }}</h2>

	<hr>
	
	<h5>{{ $author->first_name }} {{ $author->last_name }} @{{ $snippet->created_at }}</h5>
	{{ $snippet->description }}
	
	<h4>The snippet</h4>
	{{ $snippet->snippet }}
</div>

@stop