<?php
		include("../config.php");
		include("../functions.php");
	
		$products=array();

		if(isset($_POST["p_name"]))
			{
				$p_name=$_POST["p_name"];
			}
			else
			{
				$p_name=$_POST["p_name"];
			}
		if(isset($_POST["p_price"]))
			{
				$p_price=$_POST["p_price"];
			}
			else
			{
				$p_price="";
			}
		if(isset($_POST["p_cat"]))
			{
				$p_cat=$_POST["p_cat"];
			}
			else
			{
				$p_cat="";
			}

		$p_id= $_POST["id"];
		$page_id= $_POST["page_id"];
		
		
		
		if(isset($_FILES['p_image']))
			{
	           if(move_uploaded_file($_FILES['p_image']['tmp_name'], $sitepath."/uploads/images/".$_FILES['p_image']['name']))
	           {
	                $filename = $_FILES['p_image']['name'];
	           }
	        }
	        else
	        {
	        	$filename="";
	        }

	        updateProduct($p_name,$p_price,$filename,$p_cat,$p_id);
		
		header("Location:manage.php?page_id=$page_id");
?>