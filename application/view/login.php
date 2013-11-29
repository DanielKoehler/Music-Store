<div class="scroller-content full-window-height">
	<div class="container" id="login-panel">
		<h1 class="large centre">Login to River Crossing Adventure!</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
		<form action="/user/login.php" method="post" class="ajax-action-handled-form styled padded-vertical">
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
			<a href="/user/add.html">Need an account?</a>
		</form>
	</div>
	<script type="text/javascript">
		// console.log(fetchCookie('cookieName'));
	</script>
</div>