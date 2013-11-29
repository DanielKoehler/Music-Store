<div class="scroller-content full-window-height">
	<div class="container padded" id="login-panel">
		<h1 class="large centre">Create an account with River Crossing Adventure!</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
		<!-- // id first_name last_name username password email_address created login_attempts email_verified account_active -->
		<form action="/user/add.html" method="post" class="ajax-action-handled-form styled padded-vertical">
			<div class="input-group">
				<label for="userregistration[first_name]"></label>
				<input type="text" required="required" name="userregistration[first_name]" class="input has-label text" placeholder="First Name">
			</div>	
			<div class="input-group">
				<label for="userregistration[last_name]"></label>
				<input type="text" required="required" name="userregistration[last_name]" class="input has-label text" placeholder="Last Name">
			</div>	
			<div class="input-group">
				<label for="userregistration[username]"></label>
				<input type="text" required="required" name="userregistration[username]" class="input has-label text" placeholder="Username">
			</div>		
			<div class="input-group">
				<label for="userregistration[email_address]"></label>
				<input type="text" required="required" name="userregistration[email_address]" class="input has-label text" placeholder="Email Address">
			</div>	
			<div class="input-group">
				<label for="userregistration[password]"></label>
				<input type="password" required="required" name="userregistration[password]" class="input has-label text" placeholder="Password">
			</div>	
			<div class="input-group">
				<button type="submit" class="input normal">Login</button>
			</div>
			<a href="/user/login.html">Have an account?</a>
		</form>
	</div>
	<script type="text/javascript">
		console.log(fetchCookie('cookieName'));



	</script>
</div>