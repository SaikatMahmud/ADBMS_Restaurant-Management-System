<?php
require('header.php');
require('../models/restaurantModel.php');
$msg = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'resAdded') {
        $msg = "Restaurant added successfully !";
    } else if ($_GET['msg'] == 'editSucc') {
        $msg = "Item edit successfull !";
    } else {
        $msg = "Item deleted !";
    }
}

if (isset($_POST['add'])) {
    $reg = $_POST['reg'];
    $res_name = $_POST['res_name'];
    $branch = $_POST['branch'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $mid = $_POST['mid'] ? $_POST['mid'] : "";
    
    if ((strlen($reg) && strlen($res_name) && strlen($branch) && strlen($contact) && strlen($email)) != null) { //add items
        addRestaurant($reg,$res_name,$branch,$contact,$email, $mid);
    }
    else
    $msg="Input required fields !";
}
?>


<html>

<head>
    <title>Item List</title>
</head>

<body>
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <form method="POST" action="#">
        <table>
            <h4>Add restaurants:</h4>
            <tr>
                <td>Registration no-</td>
                <td>
                    <input type="text" name="reg" value="">
                </td>
            </tr>
            <tr>
                <td>Name-</td>
                <td>
                    <input type="text" name="res_name" value="">
                </td>
            </tr>
            <tr>
                <td>Branch-</td>
                <td>
                    <input type="text" name="branch" value="">
                </td>
            </tr>
            <tr>
                <td>Contact-</td>
                <td>
                    <input type="text" name="contact" value="">
                </td>
            </tr>
            <tr>
                <td>Email-</td>
                <td>
                    <input type="text" name="email" value="">
                </td>
            </tr>
            <tr>
                <td>Manager ID-</td>
                <td>
                    <input type="text" name="mid" value="">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add" value="Add">
                </td>
            </tr>
        </table>

    </form>
    <center> <?= $msg ?> </center>

    <h3 align='center'> All Restaurats</h3>
    <!-- <a href="adminHome.php"> Back</a> -->
    <table border="1" align="center">
        <tr>
            <th>Reg No</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Manager</th>
            <th>Action</th>

        </tr>
        <tr>
            <?php
            // $deleteError = "";
            $products = getAllRes();
            // if (isset($_GET['msg'])) {
            // 	$deleteError = "Delete operation failed !";
            // }
            // 
            ?>
        <tr>
            <?php
            if ($products != null) {
                while ($row = oci_fetch_assoc($products)) {
                    // print_r($row);
                    foreach ($row as $i => $val) {

                        //echo $row['id'];
            ?>
                        <td><?= $val ?></td>
                    <?php } ?>
                    <!-- <td>
                        <button><a href="deleteItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Delete </a></button>
                        |
                        <button><a href="editItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Edit </a></button>
                    </td> -->
        </tr>
<?php }
            } else
                echo "No Items found"; ?>
<!-- <?= $deleteError ?> -->

</tr>
    </table>
</body>

</html>