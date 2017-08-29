<?php		
	include("config.php");
	$p_name=$_POST["c_name"];
	$p_cat=$_POST["p_cat"];
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
	$stmt = $conn->prepare("INSERT INTO category (name,pid,pname) VALUES (?, ?, ?)");

	$stmt->bind_param("sis",$cname_1,$id_1,$pname_1);

	$cname_1=$p_name;
	$id_1=$pid;
	$pname_1=$pname;

	$stmt->execute();
	header("Location:newcategory.php");
	?>