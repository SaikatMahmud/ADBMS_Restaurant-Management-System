<?php

function getConnection()
{
    $con= oci_connect('adbms_project', 'tiger', 'localhost/XE');
    return $con;
}

function getAllItems()
{
    $con= getConnection();
    $sql = "select * from items";
    $result = oci_parse($con, $sql);
   // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
      return $result;
    } else {
        return oci_error();
    }
}

function addItem($no,$des,$price)
{
    $con= getConnection();
    $sql = "insert into items values('{$no}','{$des}','{$price}')";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        header("location: allItems_admin.php?msg=itemAdded");
    } else {
        return oci_error();
    }
}

function deleteItem($id)
{
    $con= getConnection();
    $sql = "delete from items where item_no= {$id}";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
       return true;
    } else {
        return oci_error();
    }
}

?>
