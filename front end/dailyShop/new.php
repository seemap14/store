<?php include("config.php");
        $man=array();
        $c="man";
        $stmt = $conn->prepare("SELECT name,new_price,old_price,img FROM New_Product where category=?");
        $stmt->bind_param("s",$c);
        $stmt->bind_result($table_name,$table_nprice,$table_oprice,$table_img);
        $stmt->execute();
        while($stmt->fetch())
        {
          $man[]=array("name"=>$table_name,"nprice"=>$table_nprice,"oprice"=>$table_oprice,"img"=>$table_name);
        }

        print_r($man);
?>