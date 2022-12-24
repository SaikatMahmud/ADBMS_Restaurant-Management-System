<?php

require_once('getConnection.php');


// function doLogin($username, $password)
// {
//     $con= getConnection();
//     $sql = "select * from user_login where username='{$username}' and password='{$password}'";
//     $result = oci_parse($con, $sql);
//     oci_execute($result);

//     if (oci_fetch_array($result)) {
//         //print "user to Oracle!";
//         return $result;
//     } else {
//         return false;
//     }
// }
function doLogin($username, $password)
{
    $con= getConnection();
    $sql = "select * from user_login where username='{$username}' and password='{$password}'";
    $result = oci_parse($con, $sql);
    oci_execute($result);
    //return $result;
    if ($result=oci_fetch_assoc($result)) {
      return $result;
    } else {
        return false;
    }
}

// $conn = oci_connect('adbms_project', 'tiger', '127.0.0.1:8081');
// if (!$conn) 
// {
//    $m = oci_error();
//    echo $m['message'], "\n";
//    exit;
// }
// else 
// {
//    print "Connected to Oracle!";
// }

// oci_close($conn);

?>
