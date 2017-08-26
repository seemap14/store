<?php
        //session_start();

		include("config.php");
		
		//$products=array();
		$c_name=$_POST["c_name"];
		$p_cat=$_POST["p_cat"];
		$id1=$_POST["id"];
		
		$stmt1= $conn->prepare("SELECT id from category WHERE name=?");
		$stmt1->bind_param("s",$p_cat);
		$stmt1->bind_result($pid_1);
		$stmt1->execute();
		while($stmt1->fetch())
		{
			$pid=$pid_1;
		}
		$stmt = $conn->prepare("UPDATE category SET name=?,pid=?,pname=? WHERE id=?");

		$stmt->bind_param("sisi",$table_name, $table_pid ,$table_pname,$table_id);

		$table_name = $c_name;
		$table_pid = $pid;
		$table_pname=$p_cat;
		$table_id=$id1;
		

		$stmt->execute();

		header("Location:managecategory.php");
?>