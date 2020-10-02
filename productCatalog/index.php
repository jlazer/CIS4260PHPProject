<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'listProducts';
	}
}

if  ($action == 'listProducts') {
	$category_id == filter_input(INPUT, 'categoryId', FILTER_VALIDATE_INT);
	if ($categoryId == NULL || $categoryId == FALSE) {
		$categoryId = 1;
	}
	$categories = getCategories();
	$categoryName = getCategoryName($categoryId);
	include('productList.php');
} else if ($action =='viewProduct') {
	$productId = filter_input(INPUT_GET, 'productId', FILTER_VALIDATE_INT);
	if ($productId == NULL || $productId == FALSE) {
		$error = 'missing or incorrect product id.';
		include('../errors/error.php');
	} else {
		$categories = getCategories();
		$product = getProduct($productId);

		//Get product data
		$code = $product['productCode'];
		$name = $product['productName'];
		$listPrice = $product['listPrice'];

		//Calculate discounts
		$discountPercent = 30; //30% off for all web orders
		$discountAmount = round($listPrice * ($discountPercent/100.0), 2);
		unitPrice = $listPrice - $discountAmount;

		//Formate the calculations
		$discountAmountF = number_format($discountAmount, 2);
		$unitPriceF = number_format($unitPrice, 2);

		//Get image URL and alternate text
		$imageFilename = '../images/' . $code . '.png';
		$imageAlt = 'Image: ' . $code . '.png';

		include('productView.php');

	}
}
?>

