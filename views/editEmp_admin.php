<?php
require('header.php');

// $printUpdate="";
// $printUpdate=$_GET['msg'];

require('../models/employeeModel.php');
$id = $_GET['id'];
$employee = getEmpByID($id);
$employee = oci_fetch_assoc($employee);
//print_r($product);
// $prev_reg = $employee['REG_NUM'];

if (isset($_POST['edit'])) {
    $eid = $_POST['eid'];
    $emp_name = $_POST['emp_name'];
    $address = $_POST['address'];
    $hire = $_POST['hire'];
    $job = $_POST['job'];
    $sal = $_POST['sal'] ? $_POST['sal'] : "";
    // $mob = $_POST['mob'];
    $mid = $_POST['mid'];

    if ((strlen($eid) && strlen($emp_name) && strlen($address) && strlen($hire) && strlen($mid)) != null) { //add emp
        echo $msg = editEmp($eid, $emp_name, $address, $hire, $job, $sal, $mid);
    } else
        echo $msg = "Input required fields !";
}
?>
<html>

<head>
    <title>Item List</title>
</head>

<body>
    <h3 align="left"><a href="adminHome.php">Goto Admin Home</a></h3>

    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <form method="POST" action="#">
        <table>
            <h4>Edit employee:</h4>
            <tr>
                <td>Employee ID-</td>
                <td>
                    <input type="text" name="eid" value="<?= $employee['EMPLOYEE_ID'] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Name-</td>
                <td>
                    <input type="text" name="emp_name" value="<?= $employee['NAME'] ?>">
                </td>
            </tr>
            <tr>
                <td>Address-</td>
                <td>
                    <input type="text" name="address" value="<?= $employee['ADDRESS'] ?>">
                </td>
            </tr>
            <tr>
                <td>Hiring Date-</td>
                <td>
                    <!-- <input type="date" name="hire" value="<?= date('Y-d-m',DateTime::createFromFormat('Y-m-d',$employee['HIRE_DATE'])) ?>"> -->
                    <input type="date" name="hire" value="">
                </td>
            </tr>
            <tr>
                <td>Job-</td>
                <td>
                    <input type="text" name="job" value="<?= $employee['JOB'] ?>">
                </td>
            </tr>
            <tr>
                <td>Salary-</td>
                <td>
                    <input type="text" name="sal" value="<?= $employee['SALARY'] ?>">
                </td>
            </tr>

            <tr>
                <td>Manager ID-</td>
                <td>
                    <input type="text" name="mid" value="<?= $employee['MANAGER_ID'] ?>">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="edit" value="Save">
                </td>
            </tr>
        </table>

    </form>
</body>

</html>