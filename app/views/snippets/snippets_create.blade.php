@extends('_layouts.frontend')


@section('main')

	<div id="login" class="login">
		<h1>New Snippet</h1>
		<p class="lead">Do it tidy for all the community :)</p>

		@include('_partials.notifications')
		{{ Form::open(array('route' => 'snippets.store')) }}

			@if ($errors->has('login'))
				<div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
			@endif

			<div class="control-group">
				{{ Form::label('title', 'Title') }}
				<div class="controls">
					{{ Form::text('title') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('description', 'Short Description') }}
				<div class="controls">
					{{ Form::textarea('description') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('snippet', 'The Snippet') }}
				<div class="controls">
					{{ Form::textarea('snippet') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('code_language', 'Language') }}
				<div class="controls">
					{{ Form::select('size', array('1' => 'PHP', '2' => 'C++')) }}
				</div>
			</div>

			<div class="form-actions">
				{{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
			</div>

		{{ Form::close() }}
	</div>

@stop