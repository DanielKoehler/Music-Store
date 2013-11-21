<!-- <div id="row-1" class="row-1 full-column-12">
	<div class="container">
		<h1>Store Home</h1>
	</div>
</div> -->
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
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-jazz.jpg" id="first-image">
</div>
<div class="scroller-content inverted">
	<div class="container">
		<h1 class="large centre">That would make this page completly orginal then... Great!</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
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
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-bike.jpg" id="second-image">
</div>
<div class="scroller-content">
	<div class="container">
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
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-ipad.jpg"  id="third-image">
</div>
<div class="scroller-content inverted">
	<div class="container">
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
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-fence.jpg"  id="forth-image">
</div>
<div class="scroller-content">
	<div class="container">
		<h1 class="large centre">Aha, I have tricked you! You now have no option but to buy something.</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
	</div>
	<div class="down-arrow-wrap smooth-navigation-next">
		<span class="down-arrow">
			<span class="arrow-down"></span>
		</span>
	</div>
</div>
<div class="scroller-content inverted">
	<div class="container" id="login-panel">
		<h1 class="large centre">Now might I temp you to login or register? <br>(Yes I did just invert the colour. "How?" I hear you say, well that would be some nicely classed OOCSS)</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
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
        parallax = new Parallax(['first-image','second-image','third-image','forth-image'], 200);
        parallax.start()

        //MOVE TO OWN UI JS LIB
</script>