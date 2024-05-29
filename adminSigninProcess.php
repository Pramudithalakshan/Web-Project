<?php

session_start();
include "connection.php";

$adminemail = $_POST["e"];
$adminpassword = $_POST["p"];

//echo($adminemail);

if (empty($adminemail)) {
    echo ("Please Enter Your Password");
} else if (empty($adminpassword)) {
    echo ("Please Enter Your Password");
} else {
    
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $adminemail . "' OR `password`='" . $adminpassword . "'");
    $num = $rs->num_rows;
    
    if ($num == 1) {
            
        $d = $rs->fetch_assoc();

        if ($d["user_type_id"] == 2) {
            echo ("Success");

            $_SESSION["a"] = $d;
        } else {
            echo ("You Don't Have an Admin Account");
        }
    } else {
        echo ("Invalid Username OR Password");
    }
}
?>