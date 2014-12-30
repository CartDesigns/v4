<?php
/*
+--------------------------------------------------------------------------
|   CubeCart 4
|   ========================================
|	CubeCart is a registered trade mark of CubeCart Limited
|   Copyright CubeCart Limited 2014. All rights reserved.
|	UK Private Limited Company No. 5323904
|   ========================================
|   Web: http://www.cubecart.com
|   Email: sales@cubecart.com
|	License: GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
+--------------------------------------------------------------------------
|	process.inc.php
|   ========================================
|	Process 2CO Gateway
+--------------------------------------------------------------------------
*/

if(!defined('CC_INI_SET')){ die("Access Denied"); }

$customer = $db->select("SELECT `customer_id` FROM ".$glob['dbprefix']."CubeCart_customer WHERE `email` = ".$db->MySQLSafe($_POST['email']));

if($customer) {

	$cart_order_id = $_POST['cart_order_id'];// Used in remote.php $cart_order_id is important for failed orders

	$transData['customer_id'] = $customer[0]['customer_id'];
	$transData['gateway'] = '2Checkout';
	$transData['trans_id'] = $_POST['order_number'];
	$transData['order_id'] = $cart_order_id;
	$transData['amount'] = $_POST['total'];
	$transData['status'] = $_POST['credit_card_processed'];

	if($_POST['credit_card_processed']=='Y') {
		$paymentResult = 2;
		$order->orderStatus(3,$cart_order_id);
		$transData['notes'] = 'Card charged successfully.';
	} elseif($_POST['credit_card_processed']=='K') {
		$paymentResult = 3;
		$order->orderStatus(2,$cart_order_id);
		$transData['notes'] = 'Card waiting for approval.';
	}

	$order->storeTrans($transData);
} else {
	die("<strong>Fatal Error:</strong> Customer not found from email address.");
}
?>