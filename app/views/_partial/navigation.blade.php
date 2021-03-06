  	 <!-- Navbar begin -->
	 <div class="navbar navbar-fixed-top">
	   <div class="navbar-inner">
	     <div class="container">
	       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	       </a>
	       <a class="brand" href="{{ URL::route('homepage') }}">HDS</a>
	       <div class="nav-collapse collapse" id="main-menu">
	        <ul class="nav" id="main-menu-left">
	         <li class="dropdown">
	            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Snippets <b class="caret"></b></a>
	            <ul class="dropdown-menu" id="swatch-menu">
				 	<li><a href="{{ URL::route('snippet.create') }}">New Snippet</a></li>
					<li class="divider"></li>
					<li><a href="{{ URL::route('snippet.popular') }}">Popular</a></li>
					<li><a href="{{ URL::route('snippet.latest') }}">Latest</a></li>
	            </ul>
	         </li>
             <li class="dropdown">
	            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tags <b class="caret"></b></a>
	            <ul class="dropdown-menu" id="swatch-menu">
					<li><a href="{{ URL::route('tag.popular') }}">Popular</a></li>
					<li><a href="{{ URL::route('tag.latest') }}">Latest</a></li>
	            </ul>
	          </li>
	          <li><a id="swatch-link" href="{{ URL::route('language.show_browse') }}">Languages</a></li>

	        </ul>

    		<form class="navbar-search pull-left">
    			<input type="text" class="search-query" placeholder="Search">
    		</form>

	        <ul class="nav pull-right" id="main-menu-right">
	          @if (Sentry::check())
  		          <li><a rel="tooltip" href="{{ URL::route('snippet.create') }}" title=""> <i class="icon-plus"></i> Create Snippet</a></li>
		           <li class="dropdown">
		            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{ Sentry::getUser()->email }} <b class="caret"></b></a>
		            <ul class="dropdown-menu" id="swatch-menu">
		              <li><a href="{{ URL::route('snippet.show_by_user', array('user_id' => Sentry::getUser()->id) )  }}">My Snippets</a></li>
		              <li><a href="{{ URL::route('user.edit_profile') }}">Profile</a></li>
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