<html>

<head>
    <title>Item List</title>
</head>

<body align='center'>
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <h3> All items list</h3>
    <br />
    <!-- <a href="adminHome.php"> Back</a> -->
    <table border="1" align="center">
        <tr>
            <th>Item No</th>
            <th>Description</th>
            <th>Price</th>

        </tr>
        <tr>
            <?php
			require('header.php');
			require('../models/itemModel.php');
			// $deleteError = "";
			$products = getAllItems();
			// if (isset($_GET['msg'])) {
			// 	$deleteError = "Delete operation failed !";
			// }
			// ?>
        <tr>
            <?php
			if ($products != null) {
				while ($row = oci_fetch_assoc($products)) {
					//print_r($row);
					foreach ($row as $i => $val) {

						//echo $row['id'];
			?>
            <td><?= $val ?></td>
            <?php } ?>
            <!-- <td>
						<a href="deleteProduct.php?id=<?= $row['productID'] ?>>"> DELETE </a>
						|
						<a href="editProductAdmin.php?id=<?= $row['productID'] ?>"> Edit Ratings </a>
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