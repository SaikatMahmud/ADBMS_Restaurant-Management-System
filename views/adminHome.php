<?php
require('header.php');
$worker_id = $_GET['workerid'];
$username = $_GET['userName'];
?>

<html>

<head>
    <title>Admin Home Page</title>
</head>

<body>
    <h2 align="center">You logged in as <u><?= $username ?></u> -admin</h2>
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <br />
    <!-- <form method="POST" action="#"> -->
        <fieldset>
            <legend><h3>CRUD Items</h3></legend>
            <button><a href="allitems_admin.php">Add / View / Edit / Delete Items </a> </button><br>

            </table>
        </fieldset>
    <!-- </form> -->

    <fieldset>
            <legend><h3>CRUD Restaurants</h3></legend>
            <button><a href="restaurants_admin.php">Add / View / Edit / Delete Items </a> </button><br>

            </table>
        </fieldset>

</body>

</html>