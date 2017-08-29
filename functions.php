<?php include("config.php");?>
<?php
function getCategory()
{
	global $conn;
	$category=array();
	$c=0;
	$stmt = $conn->prepare("SELECT name FROM category where pid=?");
	$stmt->bind_param("i",$c);
	$stmt->bind_result($table_name);
	$stmt->execute();
	while($stmt->fetch())
	{
		$category[]=array("name"=>$table_name);
	}
	return $category;
}

function getAllCategory()
{
	global $conn;
	$category_list=array();
	$stmt = $conn->prepare("SELECT id,name,pname,pid FROM category");
	$stmt->bind_result($table_id, $table_name, $table_pname,$table_pid);
	$stmt->execute();
	while($stmt->fetch())
	{
		$category_list[]=array("id"=>$table_id,"name"=>$table_name,"pname"=>$table_pname,"pid"=>$table_pid);
	}
	return $category_list;
}

function getProducts($min,$max)
{
	global $conn;
	$products_list=array();
	$stmt = $conn->prepare("SELECT id,name,new_price,img,category FROM New_Product LIMIT ?,?");
	$stmt->bind_param("ii",$min,$max);
	$stmt->bind_result($table_id,$table_name, $table_price,$table_image,$table_cat);
	$stmt->execute();
	while($stmt->fetch())
	{
		$products_list[]=array("id"=>$table_id,"name"=>$table_name,"price"=>$table_price,"image"=>$table_image,"cat"=>$table_cat);
	}
	return $products_list;
}

function getNumberOfPages()
{
		global $conn;
		$rec=0;
	 	$stmt1=$conn->prepare("SELECT count(id) FROM New_Product");
		  $stmt1->bind_result($table_rec);
		  $stmt1->execute();
		   while($stmt1->fetch())
			{
				$rec=$table_rec;
			}
		return $rec;
}

function updateProduct($p_name,$p_price,$filename,$p_cat,$p_id)
{
	    global $conn;
	    $stmt = $conn->prepare("UPDATE New_Product SET name=?,new_price=?,img=?,category=? WHERE id=?");
		$stmt->bind_param("sissi",$table_name, $table_price ,$table_image, $table_cat,$table_id);
		$table_name = $p_name;
		$table_price =$p_price;
		$table_image = $filename;
		$table_cat=$p_cat;
		$table_id=$p_id;
		$stmt->execute();

		return;
}

function deleteProduct($delete_id)
{
	global $conn;
	$stmt = $conn->prepare("DELETE FROM New_Product WHERE id=?");
	$stmt->bind_param("i",$delete_id);
	$stmt->execute();
	return;
}

function insertCategory($p_name,$pid,$pname)
{
	global $conn;
	$stmt = $conn->prepare("INSERT INTO category (name,pid,pname) VALUES (?, ?, ?)");
	$stmt->bind_param("sis",$cname_1,$id_1,$pname_1);
	$cname_1=$p_name;
	$id_1=$pid;
	$pname_1=$pname;
	$stmt->execute();
	return ;
}

function delCategory($delete_id)
{
	global $conn;
	$stmt = $conn->prepare("DELETE FROM category WHERE id=?");
	$stmt->bind_param("i",$delete_id);
	$stmt->execute();
	$stmt1 = $conn->prepare("DELETE FROM category WHERE pid=?");
	$stmt1->bind_param("i",$delete_id);
	$stmt1->execute();
}

function updateCategory($c_name,$pid,$p_cat,$id1)
{
	global $conn;
	$stmt = $conn->prepare("UPDATE category SET name=?,pid=?,pname=? WHERE id=?");
	$stmt->bind_param("sisi",$table_name, $table_pid ,$table_pname,$table_id);
	$table_name = $c_name;
	$table_pid = $pid;
	$table_pname=$p_cat;
	$table_id=$id1;
	return;
}
?>