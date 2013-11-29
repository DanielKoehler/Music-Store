<div class="scroller-content full-window-height">
	<div class="container padded vertical-perent-js-centring">
		<h1 class="extra-large centre">Brackets Now Supports PHP!</h1>
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
	<!-- <img src="/assets/images/scroller/image1.jpg" id="first-image"> -->
	<div class="container" id="first-image">
		<h1>Parallax Backing...</h1>
		<p>This seems to work...</p>
	</div>
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
</div>
<script type="text/javascript">
		// setCookie('cookieName', {"product1":"1567", 'product2':"dfg"})
		console.log(fetchCookie('cookieName'));
		// TEMP SOLUTION. REMOVE AT EARLIEST CONVENIENCE!
		
		document.getElementById('remove-css').addEventListener('dkswitched',function(){
			var title = document.title
			document.head.innerHTML = ""
			document.title = title
			document.body.innerHTML = "<p>Windows Internet Explorer has encountered an unexpected error and has to close</p>"
		});
		
		// Start my Paralex 'class', god the no frameworks rule, I so wish I could have used 
		parallax = new Parallax(['first-image'],-400,0.2, 100);
		parallax.start()

		//MOVE TO OWN UI JS LIB
</script>