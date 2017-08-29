<?php
$delete_id=$_GET["delete_id"];
include("config.php");
//$i=$_GET["page_id"];
$stmt = $conn->prepare("DELETE FROM category WHERE id=?");

$stmt->bind_param("i",$delete_id);

$stmt->execute();

$stmt1 = $conn->prepare("DELETE FROM category WHERE pid=?");

$stmt1->bind_param("i",$delete_id);

$stmt1->execute();

header("Location:managecategory.php");
?>