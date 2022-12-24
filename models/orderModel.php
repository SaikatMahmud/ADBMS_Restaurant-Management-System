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
    $sql = "begin GET_TEMP_ORDER_ITEMS(:v1, :v2); end;";
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