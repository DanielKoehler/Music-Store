<div id="main-page">	
	<div class="scroller-content full-window-height">
			<div class="container padded">
					<h1 class="extra-large centre">Welcome to DK Music</h1>
			</div>
			<div class="down-arrow-wrap smooth-navigation-next">
					<span class="down-arrow">
							<span class="arrow-down"></span>
					</span>
			</div>
	</div>
	<div class="scroller-back-layer-container">
			<img src="./assets/images/scroller/4542297929_c25ee7495e_o.jpg" id="first-image"> <!-- Creative Commons-licensed (http://creativecommons.org/licenses/by-sa/2.0/), Source: http://www.flickr.com/photos/doug88888/4542297929/ Rights: @Doug88888 -->
	</div>
	<div class="scroller-content inverted">
			<div class="container padded">
					<h1 class="large centre">That would make this page completly orginal then... Great!</h1>
					<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
					<br>
					<div class="switch-container">
							<label for="css-panda">Helpful CSS Panda</label>
							<div class="switch unselectable" title="Remove Html">
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
			<img src="./assets/images/scroller/857436_704149772929171_2112921418_o.jpg" id="second-image">
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
			<img src="./assets/images/scroller/3270245319_9cbb998c4e_b.jpg"  id="third-image">
	</div>
	<div class="scroller-content">
			<div class="container padded">
					<h1 class="large centre">Aha, I have tricked you! You now have no option but to buy something.</h1>
					<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
					<br>
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
		parallax = new Parallax(['first-image','second-image','third-image'],20,0.5, 450);
		parallax.start()

		//MOVE TO OWN UI JS LIB
	</script> 
</div>