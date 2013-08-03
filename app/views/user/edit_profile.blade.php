@extends('_layout.frontend')

@section('main')

	<div id="login" class="login">
		<h1>Profile</h1>
		{{ Form::open(array('route' => 'user.edit_profile')) }}

			@include('_partial.notifications')
			<div class="control-group">
				{{ Form::label('first_name', 'First Name') }}
				<div class="controls">
					{{ Form::text('first_name', $user->first_name) }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('last_name', 'Last Name') }}
				<div class="controls">
					{{ Form::text('last_name', $user->last_name) }}
				</div>
			</div>


			<div class="control-group">
				{{ Form::label('email', 'Email') }}
				<div class="controls">
					{{ Form::text('email', $user->email, array('readonly' => 'readonly' ) ) }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('password', 'New Password') }}
				<div class="controls">
					{{ Form::password('password') }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('password_confirmation', 'Confirm New Password') }}
				<div class="controls">
					{{ Form::password('password_confirmation') }}
				</div>
			</div>
			
			<hr>
			
			<div class="control-group">
					{{ Form::label('current_password', 'Current Password') }}
					<div class="controls">
						{{ Form::password('current_password') }}
					</div>
				</div>

			<div class="form-actions">

				{{ Form::submit('Update', array('class' => 'btn btn-inverse btn-login')) }}
			</div>

		{{ Form::close() }}
	</div>

@stop