<?php

require_once('getConnection.php');

function addOrder($c_id, $e_id)
{
    $con = getConnection();
    // $sql = "insert into restaurants values('{$reg}','{$name}','{$branch}','{$contact}','{$email}','{$managerID}')";
    $sql = "begin get_order_id(:v1, :v2, :v3); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $c_id);
    oci_bind_by_name($result, ':v2', $e_id);
    oci_bind_by_name($result, ':v3', $got, 100);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return $got;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function getCart($oid){
    $con = getConnection();
    $curs = oci_new_cursor($con);
    $sql = "begin GET_ORDER_ITEMS(:v1, :v2); end;"; //cart
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $oid);
    oci_bind_by_name($result, ':v2', $curs, -1, OCI_B_CURSOR);
    if (oci_execute($result)) {
        oci_execute($curs);
        return $curs;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
// $curs = oci_new_cursor($con);
// $stid = oci_parse($con, "begin GET_TEMP_ORDER_ITEMS(:v1, :v2); end;");
// oci_bind_by_name($stid, ":v1", $oid);
// oci_bind_by_name($stid, ":v2", $curs, -1, OCI_B_CURSOR);
// oci_execute($stid);
// oci_execute($curs);
// return $curs;
}

function add_items_to_order($o_id, $i_no, $qn){
    $con = getConnection();
    $sql = "begin ADD_ITEMS_TO_ORDER(:v1, :v2, :v3, :v4); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $o_id);
    oci_bind_by_name($result, ':v2', $i_no);
    oci_bind_by_name($result, ':v3', $qn);
    oci_bind_by_name($result, ':v4', $got, 100);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return $got;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function deleteItemFromOrder($o_id, $i_no){
    $con = getConnection();
    $sql = "delete from ordered_item where order_id='{$o_id}' and item_no='{$i_no}' ";
    $result = oci_parse($con, $sql);
    if (oci_execute($result)) {
        return true;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function placeOrder($o_id, $amount){
    $con = getConnection();
    $sql = "begin PLACE_ORDER(:v1, :v2); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $o_id);
    oci_bind_by_name($result, ':v2', $amount);
    if (oci_execute($result)) {
        return true;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function unservedOrder(){
    $con = getConnection();
    $curs = oci_new_cursor($con);
    $sql = "begin GET_UNSERVED_ORDER(:v1); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $curs, -1, OCI_B_CURSOR);
    if (oci_execute($result)) {
        oci_execute($curs);
        return $curs;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function orderToDeliver(){
    $con = getConnection();
    $sql = "select * from ORDER_TO_DELIVER";
    $result = oci_parse($con, $sql);
    if (oci_execute($result)) {
        return $result;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function pendingOrder(){
    $con = getConnection();
    $curs = oci_new_cursor($con);
    $sql = "begin GET_PENDING_ORDER(:v1); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $curs, -1, OCI_B_CURSOR);
    if (oci_execute($result)) {
        oci_execute($curs);
        return $curs;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}


function cancelOrder($o_id){
    $con = getConnection();
    $sql = "begin CANCEL_ORDER(:v1); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $o_id);
    if (oci_execute($result)) {
        return true;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function deliverOrder($o_id){
    $con = getConnection();
    $sql = "begin DELIVER_ORDER(:v1); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $o_id);
    if (oci_execute($result)) {
        return true;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}