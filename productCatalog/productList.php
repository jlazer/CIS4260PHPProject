<?php incude '../view/header.php' ?>
<main>
	<aside>
		<h1>Categories</h1>
		<nav>
			<ul>
				<!-- display links for each category -->
				<?php foreach($categories as $category) : ?>
					<li>
						<a href="?categoryId=<?php echo $category['categoryId']; ?>">
							<?php echo $category['categoryName']; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</aside>
	<section>
		<h1><?php echo $categoryName; ?></h1>
		<nav>
			<ul>
				<!-- display links for products in selected category -->
				<?php foreach ($products as $product) : ?>
					<li>
						<a href="?action=viewProduct&amp;productId=<?php echo $product['productId']; ?>">
							<?php echo $product['productName']; ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</section>
	</main>
	<?php include '../view/footer.php'; ?>
	