<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>L4 Site</title>

	@include('_partials.assets')
</head>
 <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
	@include('_partials.navigation')
  	 <div class="container">
  	 		<div class="main">
				@yield('main')
  	 		</div>

	@include('_partials.footer')
     </div><!-- /container -->

</body>
</html>