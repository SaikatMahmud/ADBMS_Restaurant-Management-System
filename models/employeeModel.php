<?php

require_once('getConnection.php');


function addEmployee($eid, $name, $add, $hire, $job, $sal, $mob, $managerID)
{
    $con = getConnection();
    // $sql = "insert into restaurants values('{$reg}','{$name}','{$branch}','{$contact}','{$email}','{$managerID}')";
    $sql = "begin EMP_MODEL.add_emp(:v1, :v2, :v3, :v4, :v5, :v6, :v7, :v8, :v9); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $eid);
    oci_bind_by_name($result, ':v2', $name);
    oci_bind_by_name($result, ':v3', $add);
    oci_bind_by_name($result, ':v4', $hire);
    oci_bind_by_name($result, ':v5', $job);
    oci_bind_by_name($result, ':v6', $sal);
    oci_bind_by_name($result, ':v7', $mob);
    oci_bind_by_name($result, ':v8', $managerID);
    oci_bind_by_name($result, ':v9', $got, 100);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return $got;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}
function getInfoEmp()
{
    $con = getConnection();
    $curs = oci_new_cursor($con);
    $sql = "begin GET_EMP_ALL_INFO(:v1); end;"; //cart
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $curs, -1, OCI_B_CURSOR);
    if (oci_execute($result)) {
        oci_execute($curs);
        return $curs;
        // header("location: restaurants_admin.php?msg=resAdded");
    } else {
        return oci_error();
    }
}

function getEmpByID($id)
{
    $con = getConnection();
    $sql = "select * from employees where employee_id={$id}";
    $result = oci_parse($con, $sql);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        return $result;
    } else {
        return oci_error();
    }
}


function editEmp($eid, $name, $add, $hire, $job, $sal, $managerID)
{
    $con = getConnection();
    // $sql = "insert into restaurants values('{$reg}','{$name}','{$branch}','{$contact}','{$email}','{$managerID}')";
    $sql = "begin EMP_MODEL.edit_emp(:v1, :v2, :v3, :v4, :v5, :v6, :v7); end;";
    $result = oci_parse($con, $sql);
    oci_bind_by_name($result, ':v1', $eid);
    oci_bind_by_name($result, ':v2', $name);
    oci_bind_by_name($result, ':v3', $add);
    oci_bind_by_name($result, ':v4', $hire);
    oci_bind_by_name($result, ':v5', $job);
    oci_bind_by_name($result, ':v6', $sal);
    oci_bind_by_name($result, ':v7', $managerID);
    // oci_execute($result);
    //return $result;
    if (oci_execute($result)) {
        header("location: employees_admin.php?msg=editSucc");
    } else {
        return oci_error();
    }
}
