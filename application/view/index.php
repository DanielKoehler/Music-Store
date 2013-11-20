<!-- <div id="row-1" class="row-1 full-column-12">
	<div class="container">
		<h1>Store Home</h1>
	</div>
</div> -->
<div class="scroller-content" id="full-height">
	<div class="container vertical-perent-js-centring">
		<h1 class="extra-large centre">I am absolutly not trying to sell you something...</h1>
		<div class="switch">
			<div class="switch-off">
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
		<h1 class="large centre">Okay, I am selling something, let us examine my previous statement...</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
	</div>
</div>
<div class="scroller-back-layer-container">
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-bike.jpg" id="second-image">
</div>
<div class="scroller-content">
	<div class="container">
		<h1 class="large centre">So I am selling something? but is it to you that I am selling the thing that I am selling?</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
	</div>
</div>
<div class="scroller-back-layer-container">
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-ipad.jpg"  id="third-image">
</div>
<div class="scroller-content">
	<div class="container">
		<h1 class="large centre">I guess I would like it to be you, but it really rather depends..</h1>
		<p class="centre">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices magna magna, at tempor risus placerat sed. Quisque eros odio, interdum et tellus a, consequat sodales ligula.</p>
	</div>
</div>
<div class="scroller-back-layer-container">
	<img src="https://d2c87l0yth4zbw.cloudfront.net/i/home/intro-fence.jpg"  id="forth-image">
</div>
<div class="scroller-content">
	<div class="container">
		<h1 class="large centre">Aha, I see you want to know more about this amazing store</h1>
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