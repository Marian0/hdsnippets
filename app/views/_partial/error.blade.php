@extends('_layout.frontend')

@section('main')

    <h1>The page you requested can not be found.</h1>
    <h3>{{ $exception->getMessage() }}</h3>

@stops