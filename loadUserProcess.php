<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `user` WHERE `user_type_id` = '1' ");

$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();


?>


    <tr>


    <td class="table-primary"><?php echo $d["fname"] ?></td>
        <td class="table-primary"><?php echo $d["lname"] ?></td>
        <td class="table-primary"><?php echo $d["mobile"] ?></td>
        <td class="table-primary"><?php echo $d["email"] ?></td>

        <td class="table-primary"><?php echo $d["gender_gender_id"] ?></td>

        <td class="table-info" onclick="changestatus();" ><?php if ($d["status_status_id"] == 1) {
                                    echo ("Active");
                                } else {
                                    echo ("Deactive");
                                }
                                ?></td>
    </tr>

<?php

}

?>