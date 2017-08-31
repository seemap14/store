<?php 
session_start();
include("config.php");
?>

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
	$stmt = $conn->prepare("SELECT * FROM New_Product LIMIT ?,?");
	$stmt->bind_param("ii",$min,$max);
	$stmt->bind_result($table_id,$table_name, $table_nprice,$table_oprice,$table_image,$table_cat,$table_tag);
	$stmt->execute();
	while($stmt->fetch())
	{
		$products_list[]=array("id"=>$table_id,"name"=>$table_name,"nprice"=>$table_nprice,"oprice"=>$table_oprice,"image"=>$table_image,"cat"=>$table_cat,"atg"=>$table_tag);
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

function insertTag($p_name)
{
	global $conn;
	$stmt = $conn->prepare("INSERT INTO tags (name) VALUES (?)");
	$stmt->bind_param("s",$cname_1);
	$cname_1=$p_name;
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

function delTag($delete_id)
{
	global $conn;
	$stmt = $conn->prepare("DELETE FROM tags WHERE id=?");
	$stmt->bind_param("i",$delete_id);
	$stmt->execute();
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
	$stmt->execute();
	return;
}

function updateTag($c_name,$id1)
{
	global $conn;
	$stmt = $conn->prepare("UPDATE tags SET name=? WHERE id=?");
	$stmt->bind_param("si",$table_name,$table_id);
	$table_name = $c_name;
	$table_id=$id1;
	$stmt->execute();
	return;
}

function selectByCategory($c)
{
	global $conn;
	$stmt1 = $conn->prepare("SELECT name,new_price,old_price,img FROM New_Product where category=?");
    $stmt1->bind_param("s",$c);
    $stmt1->bind_result($name,$nprice,$oprice,$img);
    $stmt1->execute();
    while($stmt1->fetch())
    {
      $product[]=array("name"=>$name,"nprice"=>$nprice,"oprice"=>$oprice,"img"=>$img);
    } 
    return $product;
}

function getAllTags()
{
	global $conn;
	$tag_list=array();
	$stmt = $conn->prepare("SELECT * FROM tags");
	$stmt->bind_result($table_id, $table_name);
	$stmt->execute();
	while($stmt->fetch())
	{
		$tag_list[]=array("id"=>$table_id,"name"=>$table_name);
	}
	return $tag_list;
}
function getAllProducts($upper,$lower,$data=array(),$min,$max)
{
		global $conn;
		$sql="SELECT * FROM New_Product ";
        $sql.="WHERE new_price >=".$lower." AND new_price <=".$upper;

          if(!empty($data)):
            $sql.=" AND category IN(";
            foreach ($data as $key => $value1):
            foreach ($value1 as $key1 => $value):
                $cat[]="'".$value."'";
            endforeach;
            endforeach;
                $cat1=implode(',',$cat);
                $sql.=$cat1.") ";
          endif;
          $sql.=" limit ".$min.",".$max;
          $result=$conn->query($sql);
          if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()) 
                {
                     $products[]=array("id"=>$row["id"],"name"=>$row["name"],"nprice"=>$row["new_price"],"oprice"=>$row["old_price"],"img"=>$row["img"]);
                }
            }
		
        return $products;
}
function getRecordsForFilters($upper,$lower,$data=array())
{
	 global $conn;
	 $sql1="SELECT count(id) as total from New_Product " ;
	 $sql1.="WHERE new_price >=".$lower." AND new_price <=".$upper; 

	 if(!empty($data)):
	 $sql1.=" AND category IN(";
	 foreach ($data as $key => $value1):
     foreach ($value1 as $key1 => $value):
        $cat[]="'".$value."'";
     endforeach;
     endforeach;
     $cat1=implode(',',$cat);
	 $sql1.=$cat1.") ";
	 endif;
	 $stmt1=$conn->query($sql1);
     if ($stmt1->num_rows > 0)
     {
        while($row=$stmt1->fetch_assoc())
        {
          $rec=$row["total"];
        }
     }
     return $rec;
}
function getProductById($id)
{
	global $conn;
	$products_list=array();
	$stmt = $conn->prepare("SELECT * FROM New_Product WHERE id=?");
	$stmt->bind_param("i",$id);
	$stmt->bind_result($table_id,$table_name, $table_nprice,$table_oprice,$table_image,$table_cat,$table_tag);
	$stmt->execute();
	while($stmt->fetch())
	{
		$products_list[]=array("id"=>$table_id,"name"=>$table_name,"nprice"=>$table_nprice,"oprice"=>$table_oprice,"image"=>$table_image,"cat"=>$table_cat,"atg"=>$table_tag);
	}
	return $products_list;
}

function productExists($id)
	{
			if(isset($_SESSION['cart']))
			{
				$cart=$_SESSION['cart'];
				foreach ($cart as $key =>$value) 
				{
					if($value['id']==$id)
					{
						return true;
						break;
					}
				}
			}
	}
?>
