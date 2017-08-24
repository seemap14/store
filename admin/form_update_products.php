<?php
        //session_start();

		include("config.php");
		
		$products=array();
		$p_name=$_POST["p_name"];
		$p_price=$_POST["p_price"];
		$p_cat=$_POST["p_cat"];
		$p_id= $_POST["id"];
		$p_comm=$_POST["textfield"];
		$path= dirname(__FILE__);
		$filename="";

		if(isset($_FILES['p_image']))
			{
	           if(move_uploaded_file($_FILES['p_image']['tmp_name'], "../uploads/images/".$_FILES['p_image']['name']))
	           {
	                $filename = $_FILES['p_image']['name'];
	           }
	        }
		$stmt = $conn->prepare("UPDATE products_git SET name=?,price=?,image=?,category=?,comment=? WHERE id=?");

		$stmt->bind_param("sisssi",$table_name, $table_price ,$table_image, $table_cat,$table_comm,$table_id);

		$table_name = $p_name;
		$table_price =$p_price;
		$table_image = $filename;
		$table_cat=$p_cat;
		$table_comm=$p_comm;
		$table_id=$p_id;

		$stmt->execute();

		header("Location:manage.php");
?>