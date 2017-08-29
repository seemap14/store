<?php
        //session_start();

		include("config.php");
		
		$products=array();

		if(isset($_POST["p_name"]))
		{
		$p_name=$_POST["p_name"];
	    }
	    else{
	    	header("Location:add.php?not=0");
	    }
	    
		$p_price=$_POST["p_price"];
		$p_price1=0;
		if(isset($_POST['q1'])){
			$q1=implode(',',$_POST['q1']);
		}
		else{
			$q1="#";
		}
		$p_cat=$_POST["p_cat"];
		$p_comm=$_POST["textfield"];
		$path= dirname(__FILE__);
		$filename="";
		if($p_name=="" || $p_price=="" || $p_cat==""||$p_name==NULL || $p_price==NULL || $p_cat==NULL)
		{
			header("Location:add.php?not=0");
		}
		if(isset($_FILES['p_image']))
			{
	           if(move_uploaded_file($_FILES['p_image']['tmp_name'], "../front end/dailyShop/img/products/".$_FILES['p_image']['name']))
	           {
	                $filename = $_FILES['p_image']['name'];
	           }
	        }
		$stmt = $conn->prepare("INSERT INTO New_Product (name,new_price,old_price,img,category,tag) VALUES (?, ?, ?, ?, ? ,?)");

		$stmt->bind_param("siisss",$table_name, $table_price ,$table_price1,$table_image, $table_cat,$table_tag);

		$table_name = $p_name;
		$table_price =$p_price;
		$table_price1 = $p_price1;
		$table_image = $filename;
		$table_cat=$p_cat;
		$table_tag=$q1;

		$stmt->execute();
		
			header("Location:add.php?not=1");
?>