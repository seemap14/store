<?php
include("functions.php");

$delete_id=$_GET["delete_id"];

delTag($delete_id);

header("Location:managetag.php");
?>