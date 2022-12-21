<?php
require('header.php');
$worker_id = $_GET['workerid'];
$username = $_GET['userName'];


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usernamelength = strlen($username);
    $passwordlength = strlen($password);

    if ($usernamelength != null  and $passwordlength != null) {
        $query = array(
            'username' => $username,
            'password' => $password,
        );
        $query = http_build_query($query);
        header("location: ../controllers/loginCheck.php?$query");
    }
}

?>

<html>

<head>
    <title>Waiter Home Page</title>
</head>

<body>
    <h2 align="center">You logged in as <u><?= $username ?></u> -waiter</h2>
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <br />
    <button><a href="showAllitems_waiter.php">Show All Items </a> </button><br></br>
    <form method="POST" action="#">
        <fieldset>
            <legend>Take Order</legend>

            <table>
              <h3>Insert customer info first:</h3>
                    <tr>
                        <td>Customer name</td>
                        <td>
                            <input type="text" name="cus_name" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer mobile</td>
                        <td>
                            <input type="text" name="cus_mob" value="">
                        </td>
                    </tr>

               
                <!-- <tr>
                    <td>Branch</td>
                    <td>
                        <input type="text" name="branch" value="">
                    </td>

                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" name="contact" value="">
                    </td>

                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="">
                    </td>

                </tr>
                <tr>
                    <td>Manager ID</td>
                    <td>
                        <input type="text" name="managerID" value="">
                    </td>

                </tr> -->
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Next">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>








</body>

</html>