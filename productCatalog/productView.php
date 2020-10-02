<?php include '../view/header.php'; ?>
<main>
	<aside>
		<h1>Categories</h1>
		<nav>
			<ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php 
                              echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
	</aside>
	<section>
		<h1><?php echo $name; ?></h1>
		<div id="leftColumn">
			<p>
				<img src="<?php echo $imageFilename; ?>"
					alt="<?php echo $imageAlt; ?>" />
			</p>
		</div>
		<div id="rightColumn">
			<p><b>List Price:</b> $<?php echo $listPrice; ?></p>
			<p><b>Discount:</b> <?php echo $discountPercent; ?></p>
			<p><b>Your Price:</b> $<?php echo $unitPriceF; ?>
                 (You save $<?php echo $discountAmountF; ?>)</p>
            <form action="<?php echo '../cart' ?>" method="post">
            	<input type="hidden" name="action" value="add">
            	<input type="hidden" name="productId" value="<?php echo $productId; ?>">
            	<b>Quantity:</b>
                <input id="quantity" type="text" name="quantity" 
                       value="1" size="2">
                <br><br>
                <input type="submit" value="Add to Cart">
            </form>
		</div>
	</section>
</main>
<?php include '../view/footer.php'; ?>
