<?php		
	include("functions.php");
	if(isset($_POST["c_name"]))
	{
		$p_name=$_POST["c_name"];
	}
	else
	{
		$p_name="";
	}	
	insertTag($p_name);
	header("Location:newtag.php");
	?>