<?php
require('header.php');
require_once('../models/orderModel.php');

$o_id = $_GET['orderID'];
$am = $_GET['amount'];

$placed=placeOrder($o_id, $am);
if ($placed){
    header("location: waiterHome.php?msg=orderPlaced");
}

