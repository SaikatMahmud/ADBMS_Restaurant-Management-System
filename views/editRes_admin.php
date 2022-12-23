<?php
require('header.php');

// $printUpdate="";
// $printUpdate=$_GET['msg'];

require('../models/restaurantModel.php');
$id = $_GET['id'];
$product = getResByID($id);
$product = oci_fetch_assoc($product);
//print_r($product);
$prev_reg = $product['REG_NUM'];

if (isset($_REQUEST['edit'])) {
    $reg= $_REQUEST['reg'];
    $res_name =$_REQUEST['res_name'];
    $branch =$_REQUEST['branch'];
    $contact= $_REQUEST['contact'];
    $email =$_REQUEST['email'];
    $mid =$_REQUEST['mid'] ? $_REQUEST['mid'] : '';

    if ($reg && $res_name && $branch && $contact && $email && $mid && $prev_reg) {
        $update = editRes($reg,$res_name,$branch,$contact,$email,$mid, $prev_reg);
        // if ($update) {
        //     header("location: productListAdmin.php");
        //     // $printUpdate="Update successfull...";
        //     // header("location: edit.php?id=$id&msg=$printUpdate");

        // } else {
        //     $printUpdate = "Operation Failed";
        // }
    }
}
?>

<html>

<head>
    <title>Edit Items</title>
</head>

<body>

    <!-- <a href="home.php"> Back</a> | -->
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>

    <form method="POST" action="#">
        <fieldset>
            <legend>Edit this item</legend>

            <table>
                <tr>
                    <td>Registration no-</td>
                    <td>
                        <input type="text" name="reg" value="<?= $product['REG_NUM'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Name-</td>
                    <td>
                        <input type="text" name="res_name" value="<?= $product['NAME'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Branch-</td>
                    <td>
                        <input type="text" name="branch" value="<?= $product['BRANCH'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Contact-</td>
                    <td>
                        <input type="text" name="contact" value="<?= $product['CONTACT_NUM'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Email-</td>
                    <td>
                        <input type="text" name="email" value="<?= $product['EMAIL'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Manager ID-</td>
                    <td>
                        <input type="text" name="mid" value="<?= $product['MANAGER_ID'] ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="edit" value="Save">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>