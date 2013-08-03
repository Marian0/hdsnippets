@extends('_layout.frontend')

@section('main')

    <h1>Welcome to HDSnippets</h1>
    <h3>Store and share your prefer code!</h3>

    <p>Welcome to HDSnippets, this project was made for learning Laravel 4 php framework. If you have any feedback, feel free to contact me.</p>
	
	<h2>Latest Snippets</h2>
    @include('snippet._table_snippets')

@stop