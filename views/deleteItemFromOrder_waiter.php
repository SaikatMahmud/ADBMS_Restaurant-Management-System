<?php
require('header.php');
require_once('../models/orderModel.php');
$c_id = $_GET['cusID'];
$o_id = $_GET['orderID'];
$i_no = $_GET['i_no'];

$del=deleteItemFromOrder($o_id, $i_no);
if ($del){

    $query = array(
        'cusID' => $c_id,
        'orderID' => $o_id,
        'msg' => 'Item removed from order'
    );
    $query = http_build_query($query);
    header("location: add_items_to_order.php?$query");
}
