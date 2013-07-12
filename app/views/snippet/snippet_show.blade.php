@extends('_layout.frontend')


@section('main')
<div class="snippetBody">
	@include('_partial.notifications')
	<h2>{{ $snippet->title }}</h2>
	<div class="well">
	
	<h5>{{ $snippet->author_name() }} @ {{ $snippet->created_at }}</h5>

	<div class="theDescription">
	{{ $snippet->description }}
	</div>

	<h4>The snippet | Language <span class="label label-important">{{ $snippet->language_name() }}</span></h4>
	
	<pre class="syntaxCode" data-language='{{ $snippet->language_short_name() }}'>{{{ trim($snippet->snippet) }}}</pre>
	
	<h4>Ranking</h4>
	<ul>
		<li>Votes: {{ $snippet->votes }}</li>
		<li>Visits: {{ $snippet->visits }}</li>
	</ul>
	<h4>Comments</h4>
		<ul>
			<li><b>10/09/2013 : 20:58 @ Marian0 </b> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

						<li><b>10/09/2013 : 20:58 @ Marian0 </b> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>


						<li><b>10/09/2013 : 20:58 @ Marian0 </b> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>


						<li><b>10/09/2013 : 20:58 @ Marian0 </b> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>



						<li><b>10/09/2013 : 20:58 @ Marian0 </b> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>


						<li><b>10/09/2013 : 20:58 @ Marian0 </b> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

		</ul>
	</div>
</div>


@include('_js.syntax')

@stop