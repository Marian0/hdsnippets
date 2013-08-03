@extends('_layout.frontend')


@section('main')

	<div id="login" class="login">
		<h1>New Snippet</h1>
		<p class="lead">Do it tidy for all the community :)</p>

		@include('_partial.notifications')
		{{ Form::open(array('route' => 'snippet.store', 'files' => true)) }}

			@if ($errors->has('login'))
				<div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
			@endif

			<div class="control-group">
				{{ Form::label('title', 'Title') }}
				<div class="controls form_title">
					{{ Form::text('title') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('description', 'Short Description') }}
				<div class="controls form_description">
					{{ Form::textarea('description') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('language_id', 'Language') }}
				<div class="controls">
					{{ Form::select('language_id', Language::getLanguagesForPulldown() ) }}
				</div>
			</div>

			<div class="control-group form_snippet">
				{{ Form::label('snippet', 'The Snippet') }}
				<div class="controls full_width">
					{{ Form::textarea('snippet') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('image', 'Image') }}
				<div class="controls">
					{{ Form::file('image') }}
				</div>
			</div>



			<div class="control-group">
				{{ Form::label('private', 'Private?') }}
				<div class="controls">
					{{ Form::checkbox('private', true, false)}}
				</div>
			</div>
			<p>Note: Private snippets will not show in lists.</p>
			<div class="form-actions">
				{{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
			</div>

		{{ Form::close() }}
	</div>

@stop