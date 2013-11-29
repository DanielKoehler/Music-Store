<header class="navigation">
	<div class="header container logo">
		<a href="/"><img src="/assets/images/logo.png" alt="RiverCrosingAdventure! - Web Store Logo">RiverCrosingAdventure! - Web Store</a>
	</div>
	<div class="container navigation-container" id="navigation-container">
	<?php 
		$this->place($this->page->navigation->render('left'));
		$this->place($this->page->navigation->render('right'));
	?>
	</div>
</header>