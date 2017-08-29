<?php
		include("config.php");
		

		if(isset($_POST["p_name"]))
		{
		$p_name=$_POST["p_name"];
	    }
	    else{
	    	header("Location:add.php?not=0");
	    }

	    if(isset($_POST["p_price"]))
		{
		$p_price=$_POST["p_price"];
	    }
	    else
	    {
	    	header("Location:add.php?not=0");
	    }

		$p_price1=0;

		if(isset($_POST['q1'])){
			$q1=implode(',',$_POST['q1']);
		}
		else{
			$q1="#";
		}
		if(isset($_POST["p_cat"]))
		{
		$p_cat=$_POST["p_cat"];
	    }
	    else
	    {
	    	header("Location:add.php?not=0");
	    }
		
		$filename="";
		
		if(isset($_FILES['p_image']))
			{
	           if(move_uploaded_file($_FILES['p_image']['tmp_name'], $sitepath."/uploads/images/".$_FILES['p_image']['name']))
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
		$table_cat = $p_cat;
		$table_tag = $q1;
		$stmt->execute();
		
			header("Location:add.php?not=1");
?>