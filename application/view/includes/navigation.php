<div class="navbar navbar-fixed-top navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">

		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php
					foreach ($this->page->navigation->links as $link) {
						echo '<li class="' . (!empty($link['class']) ? $link['class'] : Null ). '"><a href="' . (!empty($link['href']) ? $link['href'] : Null ). '">' . (!empty($link['name']) ? $link['name'] : Null ). '</a></li>';
					}
				?>
			</ul>
		</div>
	</div>
</div>