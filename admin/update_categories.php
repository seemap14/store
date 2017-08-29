<?php
		include("../config.php");
		include("../functions.php");
		$c_name=$_POST["c_name"];
		$p_cat=$_POST["p_cat"];
		if($p_cat=="select")
		{
			$p_cat=$_POST["pname"];
		}
		$id1=$_POST["id"];
		
		$stmt1= $conn->prepare("SELECT id from category WHERE name=?");
		$stmt1->bind_param("s",$p_cat);
		$stmt1->bind_result($pid_1);
		$stmt1->execute();
		while($stmt1->fetch())
		{
			$pid=$pid_1;
		}
		updateCategory($c_name,$pid,$p_cat,$id1);
		header("Location:managecategory.php");
?>