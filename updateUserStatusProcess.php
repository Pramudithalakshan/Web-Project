<?php
include "connection.php";

$uec = $_POST["ue"];

if (empty($uec)) {
    echo ("Please Enter Your user email");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $uec . "' AND `user_type_id` = '1'");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status_status_id"] == 1) {
            Database::iud("UPDATE `user` SET `status_status_id` = '2' WHERE `email` = '" . $uec . "'");
            echo ("Deactive");
        }

        if ($d["status_status_id"] == 2) {
            Database::iud("UPDATE `user` SET `status_status_id` = '1' WHERE `email` = '" . $uec . "'");
            echo ("Active");
        }
    } else {
        echo ("Invalid Email");
    }
}
?>