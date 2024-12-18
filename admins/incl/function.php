<?php
function filter($data) {
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function select($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stm = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stm, $datatypes, ...$values);
        if (mysqli_stmt_execute($stm)) {
            $res = mysqli_stmt_get_result($stm);
            mysqli_stmt_close($stm);
            return $res;
        } else {
            die("Query cannot be executed");
        }
    } else {
        die("Query cannot be prepared");
    }
}