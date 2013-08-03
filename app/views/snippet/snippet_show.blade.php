@extends('_layout.frontend')


@section('main')
<div class="snippetBody">
	@include('_partial.notifications')
	<h2>{{ $snippet->title }}</h2>
	<div class="well">
	
	<h5><a href="{{ URL::route('user.profile', array('user_id' => $snippet->author->id) ) }}">{{ $snippet->author_name() }}</a> @ {{ $snippet->created_at }}</h5>

	<div class="theDescription">
	{{ $snippet->description }}
	</div>

	<h4>The snippet | Language <span class="label label-important">{{ $snippet->language_name() }}</span></h4>
	
	<pre class="syntaxCode" data-language='{{ $snippet->language_short_name() }}'>{{{ trim($snippet->snippet) }}}</pre>
	<?php if ($snippet->image) : ?>
	<h4>Image</h4>
		<a href="{{ asset($snippet->image) }}"><img src="<?php echo Image::resize($snippet->image, 200, 150); ?>" alt="{{ $snippet->title }}"/></a>
	<?php endif; ?>
	<h4>Ranking</h4>
	<ul>
		<li>Votes: {{ $snippet->votes }} (Cooming soon)</li>
		<li>Visits: {{ $snippet->visits }}</li>
	</ul>
	<h4>Comments (Cooming soon)</h4>
		<ul>
			<li></li>
			<li></li>
		</ul>

	</div>
</div>


@include('_js.syntax')

@stop