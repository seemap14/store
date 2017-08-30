<?php
		include("functions.php");
		$c_name=$_POST["c_name"];
		$id1=$_POST["id"];
		updateTag($c_name,$id1);
		header("Location:managetag.php");
?>