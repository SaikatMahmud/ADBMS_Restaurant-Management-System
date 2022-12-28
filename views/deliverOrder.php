<?php
require('header.php');
require_once('../models/orderModel.php');

$o_id = $_GET['orderID'];

$cancel=deliverOrder($o_id);
if ($cancel){
    header("location: delmanHome.php?msg=delSucc");
}

