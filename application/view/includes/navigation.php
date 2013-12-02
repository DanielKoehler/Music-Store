<header class="navigation styled-nav container">
	<div class="header container logo">
		<a href="/">DK Music</a>
		<!-- <a href="/"><img src="/assets/images/logo.png" alt="RiverCrosingAdventure! - Web Store Logo">DK Music</a> -->
	</div>
	<div class="container navigation-container" id="navigation-container">
	<?php 
		$this->place($this->page->navigation->render('left'));
		$this->place($this->page->navigation->render('right'));
	?>
	</div>
</header>