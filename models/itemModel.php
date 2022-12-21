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


?>
