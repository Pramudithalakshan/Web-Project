<?php
include "connection.php";

$sproductt = $_POST["sp"];
$sqty =$_POST["sq"];
$updatep =$_POST["up"];

if(empty($qty)){
    echo("please Enter Qty");
}
?>