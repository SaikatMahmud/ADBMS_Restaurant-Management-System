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
    $sql = "declare hehe varchar2(50); begin additem('{$no}','{$des}','{$price}', hehe); end;";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return $result;
       // header("location: allItems_admin.php?msg=itemAdded");
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

function editItem($current_no,$des,$price, $prev_no)
{
    $con= getConnection();
    $sql = "update Items set item_no={$current_no}, description='{$des}', price='{$price}' where item_no={$prev_no}";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        header("location: allItems_admin.php?msg=editSucc");
    } else {
        return oci_error();
    }
}

function getItemByID($id)
{
    $con= getConnection();
    $sql = "select * from items where item_no={$id}";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
       return $result;
    } else {
        return oci_error();
    }
}

?>
