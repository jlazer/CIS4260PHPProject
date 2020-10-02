<?php 
//Add a lineitem to the cart
function addItem($key, $quantity) {
	global $products; //make $products available here
	if ($quantity < 1) return;

	//if item already exists in cart, update quantity
	if (isset($_SESSION['cart'][$key])) {
		$quantity += $_SESSION['cart'][$key]['qty'];
		updateItem($key, $quantity);
		return;
	}
	//add item

	$cost = $products[$key]['cost'];
	$total = $cost * $quantity;
	$item = array(
		'name' => $products[$key]['name'],
		'cost' => $cost,
		'qty' => $quantity,
		'total' => $total
	);
	//add $item to $_SESSION['cart']
	$_SESSION['cart'][$key] =$item;
}

//update an item in the cart
function updateItem($key, $quantity) {
	global $products;
	$quantity = (int) $quantity;
	if (isset($_SESSION['cart'][$key])) {
		if ($quantity <= 0) {
			unset($_SESSION['cart'][$key]);
		} else {
			$_SESSION['cart'][$key]['qty'] = $quantity;
			$total = $_SESSION['cart'][$key]['cost'] * $_SESSION['cart'][$key]['qty'];
			$_SESSION['cart'][$key]['total'] = $total;
		}
	}
}
//get cart subtotal
function get_subtotal () {
	$subtotal = 0;
	foreach ($_SESSION['cart'] as $item) {
		$subtotal += $item['total'];
	}
	$subtotal = number_format($subtotal, 2);
	return $subttotal;
}
?>

