@extends('_layout.frontend')


@section('main')
<div class="snippetBody">
	@include('_partial.notifications')
	<h2>{{ $user->first_name }}, {{ $user->last_name }}  | Profile</h2>
	<div class="well">
		<ul>
			<li>Register date: {{ $user->created_at }}</li>
			<li>Last Login: {{ $user->last_login }}</li>
			<li>Snippets Count: {{ count($snippets) }}</li>
		</ul>
	<h5>Last 10 Snippets</h5>
	@include('snippet._table_snippets')
	</div>

</div>


@include('_js.syntax')

@stop