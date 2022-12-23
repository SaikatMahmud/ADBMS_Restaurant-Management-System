<?php

function getConnection()
{
    $con= oci_connect('adbms_project', 'tiger', 'localhost/XE');
    return $con;
}

function addRestaurant($reg,$name,$branch,$contact,$email,$managerID)
{
    $con= getConnection();
    $sql = "insert into restaurants values('{$reg}','{$name}','{$branch}','{$contact}','{$email}','{$managerID}')";
    $result = oci_parse($con, $sql);
   // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function getAllRes()
{
    $con= getConnection();
    $sql = "select * from restaurants";
    $result = oci_parse($con, $sql);
   // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
      return $result;
    } else {
        return oci_error();
    }
}

function deleteRes($id)
{
    $con= getConnection();
    $sql = "delete from restaurants where reg_num= {$id}";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
       return true;
    } else {
        return oci_error();
    }
}

function editRes($reg,$res_name,$branch,$contact,$email,$mid, $prev_reg)
{
    $con= getConnection();
    $sql = "update Restaurants set reg_num='{$reg}',name='{$res_name}', branch='{$branch}',
            contact_num='{$contact}', email='{$email }', manager_id='{$mid}' where reg_num='{$prev_reg}'";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        header("location: restaurants_admin.php?msg=editSucc");
    } else {
        return oci_error();
    }
}


function getResByID($id)
{
    $con= getConnection();
    $sql = "select * from restaurants where reg_num={$id}";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
       return $result;
    } else {
        return oci_error();
    }
}

function searchRes($keyword)
{
    $con= getConnection();
    // $sql = "select * from restaurants where reg_num like '%{$keyword}%' or name like '%{$keyword}%' or branch like '%{$keyword}%'
    // or contact_num like '%{$keyword}%' or email like '%{$keyword}%' ";
     $sql = "select * from restaurants where branch like '%{$keyword}%' ";
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


?>
