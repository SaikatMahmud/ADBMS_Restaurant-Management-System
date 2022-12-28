<?php
require('header.php');
require_once('../models/orderModel.php');

$o_id = $_GET['orderID'];

$cancel=cancelOrder($o_id);
if ($cancel){
    header("location: pendingOrderList.php?msg=orderCancel");
}

