<body>
  <header id="header" id="home">
    <div class="container">
    	<div class="row align-items-center justify-content-between d-flex">
	      <div id="logo">
	        <a href="/php_project/?controller=dashboard&action=view"><img src="img/logo.png" alt="" title="" /></a>
	      </div>
	      <nav id="nav-menu-container">
	        <ul class="nav-menu">
	          <li class="menu-active"><a href="/php_project/?controller=dashboard&action=view">Home</a></li>
	          <li><a href="/php_project/?controller=car&action=view">Cars</a></li>
	          <li><a href="/php_project/?controller=service&action=">Service</a></li>
	          <li><a href="/php_project/?controller=rent&action=view">Rent</a></li>	
	          <li><a href="/php_project/?controller=contact&action=">Contact</a></li>				          
	        </ul>
	      </nav><!-- #nav-menu-container -->
	      <form action="/php_project/?controller=login&action=logout">
	      	<input class="btn btn-danger" type="submit" name="logout" value="Logout">
	      </form>
    	</div>
    </div>
  </header><!-- #header -->