  	 <!-- Navbar begin -->
	 <div class="navbar navbar-fixed-top">
	   <div class="navbar-inner">
	     <div class="container">
	       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	       </a>
	       <a class="brand" href="{{ URL::route('homepage') }}">HD Snippets</a>
	       <div class="nav-collapse collapse" id="main-menu">
	        <ul class="nav" id="main-menu-left">
	         <li class="dropdown">
	            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Snippets <b class="caret"></b></a>
	            <ul class="dropdown-menu" id="swatch-menu">
					<li><a href="{{ URL::route('snippets.popular') }}">Popular</a></li>
					<li><a href="{{ URL::route('snippets.latest') }}">Latest</a></li>
	            </ul>
	         </li>
             <li class="dropdown">
	            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tags <b class="caret"></b></a>
	            <ul class="dropdown-menu" id="swatch-menu">
					<li><a href="{{ URL::route('tags.popular') }}">Popular</a></li>
					<li><a href="{{ URL::route('tags.latest') }}">Latest</a></li>
	            </ul>
	          </li>
	          <li><a id="swatch-link" href="{{ URL::route('languages.browse') }}">Browse Languages</a></li>

	        </ul>
	        <ul class="nav pull-right" id="main-menu-right">
	          @if (Sentry::check())
  		          <li><a rel="tooltip" href="{{ URL::route('snippets.create') }}" title=""> <i class="icon-plus"></i> Create Snippet</a></li>
		           <li class="dropdown">
		            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{ Sentry::getUser()->email }} <b class="caret"></b></a>
		            <ul class="dropdown-menu" id="swatch-menu">
		              <li><a href="../default/">My Snippets</a></li>
		              <li><a href="../default/">Profile</a></li>
		              <li class="divider"></li>
		              <li><a href="{{ URL::route('user.logout') }}">Logout</a></li>
		            </ul>
		          </li>
	          @else
		          <li><a href="{{ URL::route('user.register') }}" title="">Register <i class="icon-share-alt"></i></a></li>
		          <li><a href="{{ URL::route('user.login') }}" title="">Login <i class="icon-share-alt"></i></a></li>
		       @endif
	        </ul>
	       </div>
	     </div>
	   </div>
	 </div>
  	 <!-- Navbar end -->