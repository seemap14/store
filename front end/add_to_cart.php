<?php
session_start();
include("../functions.php");
$id=$_GET["id"];
$product=getProductById($id);
$cart=array();
if(isset($_SESSION["cart"]))
{
	$cart=$_SESSION["cart"];
}
$cart[]=$product;
$_SESSION["cart"]=$cart;
print_r($_SESSION["cart"]);
?>