<?php
session_start();
include("../functions.php");

if(isset($_GET["id"])):
	$id=$_GET["id"];
    $page_id=isset($_GET["page_id"])?$_GET["page_id"]:0;
    $page_name=isset($_GET["page_name"])?$_GET["page_name"]:"";
	$product=getProductById($id);
	//print_r($product);
	//die();
	$cart=array();
	if(isset($_SESSION["cart"]))
	{
		$cart=$_SESSION["cart"];
	}
	if(productExists($id))
	{
		$updated=updateQty($id);
		$cart=$updated; 
	}
	else
	{
		$cart[]=$product;
		$_SESSION["total_qty"]+=1;
	}
	$_SESSION["cart"]=$cart;
	if($page_name=="index.php")
    {
    	header("Location:index.php");
    }
    if($page_name=="product1.php")
    {
    	header("Location:product1.php?page_id=".$page_id);
    }
	
endif;

if(isset($_GET["del_id"]))
{
	$del_id=$_GET["del_id"];
	$page_id=$_GET["page_id"];
	//echo $page_id;
	//die();
	$deleted=delete_from_cart($del_id);
    $_SESSION["cart"]=$deleted;
    if($page_id=="index.php")
    {
    	header("Location:index.php");
    }
    if($page_id=="my_cart.php")
    {
    	header("Location:my_cart.php");
    }
    if($page_id=="account.php")
    {
    	header("Location:account.php");
    }
    if($page_id=="product1.php")
    {
    	header("Location:product1.php");
    }
}

if(isset($_POST["update"]))
{
	$new_qty=array();
	$up_id=array();
	$new_qty=isset($_POST["new_qty"])?$_POST["new_qty"]:array();
	$up_id=isset($_POST["id"])?$_POST["id"]:array();
	$i=0;
    foreach ($new_qty as $value1):
	$new=update_new_qty($up_id[$i],$value1);
	$i++;
  	$_SESSION["cart"]=$new;
  	endforeach;
  	header("Location:my_cart.php");


}
?>