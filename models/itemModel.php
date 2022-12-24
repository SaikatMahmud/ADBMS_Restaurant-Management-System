<?php

require_once('getConnection.php');


function getAllItems()
{
    $con = getConnection();
    $sql = "select * from items order by item_no";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return $result;
    } else {
        return oci_error();
    }
}

// function addItem($no,$des,$price)
// {
//     $con= getConnection();

//      $sql = "declare ttt varchar2(50); begin additem('{$no}','{$des}','{$price}',ttt); end;";
//     //$sql = "begin additem('{$no}','{$des}','{$price}'); end;";
//     $result = oci_parse($con, $sql);
//     // oci_execute($result);
//     //return $result;
//     if (oci_execute($result)) {
//         print_r ($result);
//         // if ($rw=oci_fetch_assoc($result)){
//         // return $rw;
//         // }
//        // header("location: allItems_admin.php?msg=itemAdded");
//     } else {
//         return oci_error();
//     }
// }

function addItem($no, $des, $price)
{
    $con = getConnection();
    $sql = "begin add_item(:v1, :v2, :v3, :v4); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $no);
    oci_bind_by_name($result, ':v2', $des);
    oci_bind_by_name($result, ':v3', $price);
    oci_bind_by_name($result, ':v4', $got, 100);

    if (oci_execute($result)) {
        return $got;
    } else {
        return oci_error();
    }
}

function deleteItem($id)
{
    $con = getConnection();
    $sql = "begin delete_item(:v1, :v2); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $id);
    oci_bind_by_name($result, ':v2', $got, 100);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return true;
    } else {
        return oci_error();
    }
}

function editItem($current_no, $des, $price, $prev_no)
{
    $con = getConnection();
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
    $con = getConnection();
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

function searchItem($keyword)
{
    $con = getConnection();
    $sql = "select * from items where item_no like '%{$keyword}%' or lower(description) like lower('%{$keyword}%')";
    //$sql = "select * from restaurants where branch like '%{$keyword}%' ";
    //  $sql = "select * from restaurants";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return $result;
    } else {
        return oci_error();
    }
}
