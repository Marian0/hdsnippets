@extends('_layout.frontend')

@section('main')

	<div id="login" class="login">
		<h1>Loggin</h1>
		<p class="lead">Welcome to HD Snippets Community</p>
		{{ Form::open() }}

			@if ($errors->has('login'))
				<div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
			@endif

			<div class="control-group">
				{{ Form::label('email', 'Email') }}
				<div class="controls">
					{{ Form::text('email') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('password', 'Password') }}
				<div class="controls">
					{{ Form::password('password') }}
				</div>
			</div>

			<div class="form-actions">
				{{ Form::submit('Login', array('class' => 'btn btn-inverse btn-login')) }}
			</div>

		{{ Form::close() }}
	</div>

@stop