<!DOCTYPE html>
<html>
<head>
	<title>PHP Group Project</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<header>
		<h1>PHP Group Project</h1>
	</header>
	<main>
		<h1>Your Cart</h1>
		<?php if (empty($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
		<p>There are no items in your cart.</p>
		<?php else: ?>
			<form action="." method="post">
				<input type="hidden" name="action" value="update">
				<table>
					<tr id="cartHeader">
						<th class="left">Item</th>
						<th class="right">Item Cost</th>
						<th class="right">Quantity</th>
						<th class="right">Item Total</th>
					</tr>
					<?php foreach ( $_SESSION['cart'] as $key => $item ) :
						$cost = number_format($item['cost'], 2);
						$total = number_format($item['total'], 2);
						?>
						<tr>
							<td>
								<?php echo $item['name']; ?>
							</td>
							<td class="right">
								$<?php echo $cost; ?>
							</td>
							<td class="right">
								<input type="text" class="cartQty" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['qty']; ?>">
							</td>
							<td class="right">
								$<?php echo $total; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					<tr id="cartFooter">
						<td colspan="3"><b>Subtotal</b></td>
						<td>$<?php echo getSubtotal(); ?></td>
					</tr>
					<tr>
						<td colspan="4" class="right">
							<input type="submit" value="Update Cart">
						</td>
					</tr>
				</table>
				<p>Click "Update Cart" to update quantities in your cart. Enter a quantity of 0 to remove an item.</p>
			</form>
		<?php endif; ?>
		<p><a href=".?action=showAddItem">Add Item</a></p>
		<p><a href=".?action=emptyCart">Empty Cart</a></p>
	</main>
</body>
</html>

