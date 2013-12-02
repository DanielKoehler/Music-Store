<div id="main-page">
	<div class="scroller-content full-window-height">
		<div class="container padded" id="registraion-panel">
			<h1 class="large">Products</h1>
			<div class="product-list-container">
				<div class="navigation plain" id="product-sort">
					<ul class="navigation-bar right">
						<li>
							<!-- <a class="button-styled">Sorting</a> -->
							<?php echo sprintf('<a>Sorting: <i>%s</i></a>', $this->page->data['ordering']); ?>
							<ul>
								<li>Newest First</li>
								<li>Price: High to Low</li>
								<li>Price: Low to High</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="product-filter-container">
				</div>
				<div class="products-container">
				<?php
				foreach ($this->page->data['products'] as $product) {
					echo '<div class="list-product-container">';
						echo '<div class="list-product-image">';
							echo '<img alt="' . $product['name'] . '" src="./assets/uploads/' . $product['image'] . '">';
						echo '</div>';
						echo '<div class="list-product-description">';
							echo '<p><a href="./index.php?c=store&amp;m=product&amp;id=' . $product['id'] . '">' . $product['name'] . '</a></p><br>';
							echo '<p>Price: £' . number_format($product['price'],2) . '</p>';
							echo '<p>This item qualifies for free delivery.</p><br>';
							echo '<button>Add to Basket</p>';
						echo '</div>';
					echo '</div>';
				}
				?>
				</div>
		</div>
		<script type="text/javascript">
			// console.log('Works, heres a cookie:');
		</script>
	</div>
</div>