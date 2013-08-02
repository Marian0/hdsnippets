@extends('_layout.frontend')

@section('main')

    <h1>{{ $subtitle }}</h1>

    @include('snippet._table_snippets')

@stop