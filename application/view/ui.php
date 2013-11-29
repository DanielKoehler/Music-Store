<div class="scroller-content full-window-height">
		<div class="container vertical-perent-js-centring">
				<h1 class="extra-large centre">I would like to be the first to admit that flat user interface deisgn, with perspective, is a strange idea.</h1>
				<div class="switch-container">
						<label for="ie-emulation-checkbox">IE Emulation</label>
						<div class="switch unselectable" title="Remove Html" id="remove-css">
								<div class="switch-on">
										<input type="checkbox" name="ie-emulation-checkbox">
										<span class="switch-right">ON</span>
										<!-- <label>&nbsp;</label> -->
										<span class="switch-left">OFF</span>
								</div>
						</div>
				</div>
		</div>
		<div class="down-arrow-wrap smooth-navigation-next">
				<span class="down-arrow">
						<span class="arrow-down"></span>
				</span>
		</div>
</div>
<div class="scroller-back-layer-container">
		<img src="/assets/images/scroller/image1.jpg" id="first-image">->
</div>
<div class="scroller-content inverted">
		<div class="container padded">
				<h1 class="large centre">That would make this page completly orginal then... Great!</h1>
				<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
				<br>
				<div class="switch-container">
						<label for="css-panda">Helpful CSS Panda</label>
						<div class="switch unselectable" title="Remove Html" id="remove-css">
								<div class="switch-off">
										<input type="checkbox" name="css-panda">
										<span class="switch-right">OFF</span>
										<!-- <label>&nbsp;</label> -->
										<span class="switch-left">ON</span>
								</div>
						</div>
				</div>
		</div>
		<div class="down-arrow-wrap smooth-navigation-next">
				<span class="down-arrow">
						<span class="arrow-down"></span>
				</span>
		</div>
</div>
<div class="scroller-back-layer-container">
		<img src="/assets/images/scroller/image2.jpg" id="second-image">
</div>
<div class="scroller-content">
		<div class="container padded">
				<h1 class="large centre">Hang on a minute! Didn't some company recently overhall thier mobile operating system and do something very similar...</h1>
				<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
		</div>
		<div class="down-arrow-wrap smooth-navigation-next">
				<span class="down-arrow">
						<span class="arrow-down"></span>
				</span>
		</div>
</div>
<div class="scroller-back-layer-container">
		<img src="/assets/images/scroller/image3.jpg"  id="third-image">
</div>
<div class="scroller-content inverted">
		<div class="container padded">
				<h1 class="large centre">Nah, I would have rembered...</h1>
				<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
		</div>
		<div class="down-arrow-wrap smooth-navigation-next">
				<span class="down-arrow">
						<span class="arrow-down"></span>
				</span>
		</div>
</div>
<div class="scroller-back-layer-container">
		<img src="/assets/images/scroller/image4.jpg"  id="forth-image">
</div>
<div class="scroller-content">
		<div class="container padded">
				<h1 class="large centre">Aha, I have tricked you! You now have no option but to buy something.</h1>
				<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
		</div>
		<div class="down-arrow-wrap smooth-navigation-next">
				<span class="down-arrow">
						<span class="arrow-down"></span>
				</span>
		</div>
</div>
<div class="scroller-content inverted full-window-height">
		<div class="container padded" id="login-panel">
				<div class="navigation">
						<div class="navigation-container">
								<ul class="navigation-bar left">
										<li class="active">
												<a href="/index">Home<span class="navigation-unread">1</span>
												</a>
										</li>
										<li>
												<a href="/enquiries">Messages<span class="navigation-unread">1</span></a>
												<ul>
														<li><a href="/product/manage">Manage Products</a></li>
														<li><a href="/product/add">Add Product</a></li>
														<li><a href="/product/add">Enquiries<span class="navigation-unread">1</span></a></li>
												</ul> <!-- /Sub menu -->
										</li>
										<li>
												<a href="/about">About Us</a>
										</li>
								</ul>
								<ul class="navigation-bar right">
										<li>
												<a href="/user/profile">Daniel Koehler<span class="navigation-unread">1</span></a>
												<ul>
														<li><a href="/user/notifications">Notifications<span class="navigation-unread">1</span></a></li>
														<li><a href="/user/logout">Logout</a></li>
												</ul> <!-- /Sub menu -->
										</li>
								</ul>
						</div>
				</div>
				<br>
				<h1 class="large centre">Now might I temp you to login or register? <br>(Yes I did just invert the colour. "How?" I hear you ask, well that would be some nicely classed OOCSS)</h1>
				<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
				<form action="/user/login" method="post" class="ajax-action-handled-form styled padded-vertical">
						<div class="input-group">
								<label for="userlogin[username]"></label>
								<input type="text" required="required" name="userlogin[username]" class="input has-label text" placeholder="Username">
						</div>        
						<div class="input-group">
								<label for="userlogin[password]"></label>
								<input type="password" required="required" name="userlogin[password]" class="input has-label text" placeholder="Password">
						</div>        
						<div class="input-group">
								<button type="submit" class="input normal">Login</button>
						</div>
						<div class="input-group file">
							<label for="product[image]"><i class="fa fa-cloud-upload"></i> Example File Input</label>
							<input type="file" required="required" name="product[image]" class="input has-label file" placeholder="Product Image">
						</div>
						<a href="#register">Need an account?</a>
				</form>
		</div>
		<div class="up-arrow-wrap smooth-navigation-top">
				<span class="up-arrow">
						<span class="arrow-up"></span>
				</span>
		</div>
</div>
<script type="text/javascript">
	// TEMP SOLUTION. REMOVE AT EARLIEST CONVENIENCE!
	
	document.getElementById('remove-css').addEventListener('dkswitched',function(){
			var title = document.title
			document.head.innerHTML = ""
			document.title = title
			document.body.innerHTML = "<p>Welcome to Internet Explorer</p><p>Sorry, something went wrong...</p>"
	});
	
	// Start my Paralex 'class', god the no frameworks rule, I so wish I could have used 
	parallax = new Parallax(['first-image','second-image','third-image','forth-image'],450,0.5, 450);
	parallax.start()

	//MOVE TO OWN UI JS LIB
</script> 