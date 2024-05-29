<?php
include "connection.php";

$pageno = 0;
$page = $_POST["p"];

if(0 !=$page){
    $pageno = $page;
}else{
    $pageno = 1;
}
?>