<?php
include("functions.php");

$delete_id=$_GET["delete_id"];

delCategory($delete_id);

header("Location:managecategory.php");
?>