<?php		
	include("../config.php");
	include("../functions.php");
	if(isset($_POST["c_name"]))
	{
		$p_name=$_POST["c_name"];
	}
	else
	{
		$p_name="";
	}
	if(isset($_POST["p_cat"]))
	{
		$p_cat=$_POST["p_cat"];
	}
	else
	{
		$p_cat="";
	}
	
	$stmt = $conn->prepare("SELECT id,pname FROM category where name=?");
	$stmt->bind_param("s",$p_cat);
	$stmt->bind_result($table_pid,$table_pname);
	$stmt->execute();
	while($stmt->fetch())
	{
		$pid_1=$table_pid;
		$pname_1 =$table_pname;
	}
	
	if($p_cat=="select")
	{
		$pid=0;
		$pname=$p_name;
	}
	else
	{
		$pid=$pid_1;
		$pname=$pname_1;
	}
	insertCategory($p_name,$pid,$pname);
	header("Location:newcategory.php");
	?>