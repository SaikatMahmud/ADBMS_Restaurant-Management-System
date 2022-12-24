<?php

require_once('getConnection.php');


function addCustomer($name, $mob)
{
    $con = getConnection();
    // $sql = "insert into restaurants values('{$reg}','{$name}','{$branch}','{$contact}','{$email}','{$managerID}')";
    $sql = "begin get_customer_id(:v1, :v2, :v3); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $name);
    oci_bind_by_name($result, ':v2', $mob);
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