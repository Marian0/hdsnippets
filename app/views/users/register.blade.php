@extends('_layouts.frontend')

@section('main')

	<div id="login" class="login">
		<h1>Register an Account</h1>
		<p class="lead">Register an account to share your snippets. It's free and takes 3 seconds.</p>
		{{ Form::open(array('route' => 'user.store')) }}

			@include('_partials.notifications')
			<div class="control-group">
				{{ Form::label('first_name', 'First Name') }}
				<div class="controls">
					{{ Form::text('first_name') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('last_name', 'Last Name') }}
				<div class="controls">
					{{ Form::text('last_name') }}
				</div>
			</div>


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

			<div class="control-group">
				{{ Form::label('password_confirmation', 'Confirm Password') }}
				<div class="controls">
					{{ Form::password('password_confirmation') }}
				</div>
			</div>

			<div class="form-actions">
				{{ Form::submit('Register', array('class' => 'btn btn-inverse btn-login')) }}
			</div>

		{{ Form::close() }}
	</div>

@stop