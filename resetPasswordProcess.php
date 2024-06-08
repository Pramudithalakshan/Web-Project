<?php
 

include "connection.php";

 
$vcode = $_POST["vcode"];
$np1 = $_POST["np1"];
$np2 = $_POST["np2"];

if ($np1 == $np2) {
    $rs = Database::search("SELECT * FROM `user` WHERE  `v_code`='".$vcode ."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();

        Database::iud("UPDATE `user` SET `password`='".$np1."', `v_code`=NULL WHERE `email`='".$d["email"]."'");
        echo("Success");
    } else {
        echo("User Not Found!");
    }
} else {
    echo("Password Not Matched");
}
?>
