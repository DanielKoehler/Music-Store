<!-- <div id="row-1" class="row-1 full-column-12">
	<div class="container">
		<h1>Store Home</h1>
	</div>
</div> -->
<div class="scroller-content" id="full-height">
	<div class="container vertical-perent-js-centring">
		<h1 class="extra-large centre">I would like to be the first to admit that flat, with perspective is a stange idea.</h1>
		<div class="switch unselectable" title="HTML State">
			<div class="switch-on">
				<input type="checkbox">
				<span class="switch-left">ON</span>
				<label>&nbsp;</label>
				<span class="switch-right">OFF</span>
			</div>
		</div>
	</div>
</div>
<div class="scroller-back-layer-container">
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-jazz.jpg" id="first-image">
</div>
<div class="scroller-content">
	<div class="container">
		<h1 class="large centre">That would make this page completly orginal then... Great!</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
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
</div>
<div class="scroller-back-layer-container">
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-ipad.jpg"  id="third-image">
</div>
<div class="scroller-content">
	<div class="container">
		<h1 class="large centre">Nah, I would have rembered...</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
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
</div>

<script type="text/javascript">
		// TEMP SOLUTION. REMOVE AT EARLIEST CONVENIENCE!
		document.getElementById('full-height').style.height = (window.innerHeight - 100) + "px";

		// Start my Paralex 'class', god the no frameworks rule, I so wish I could have used 
        parallax = new Parallax(['first-image','second-image','third-image','forth-image'], 200);
        parallax.start()

        //MOVE TO OWN UI JS LIB
</script>