<?php
include("../functions.php");

$delete_id=$_GET["delete_id"];
$i=$_GET["page_id"];

deleteProduct($delete_id);

header("Location:manage.php?page_id=$i");
?>