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


?>
