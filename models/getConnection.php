<?php
function getConnection()
{
    $con = oci_connect('adbms_project', 'tiger', 'localhost/XE');
    return $con;
}
?>