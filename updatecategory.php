<?php  include("config.php");
       include("functions.php");
 ?>	
	 <?php
     $page=basename($_SERVER['PHP_SELF']);
     if(isset($_GET['update_id']))
     {
     	$update_id=$_GET['update_id'];
     }
      
      $category=array();
	  $category=getCategory();
		if(isset($_GET['update_id'])):
      $stmt1 = $conn->prepare("SELECT id,name,pname,pid FROM category WHERE id=?");
      $stmt1->bind_param("i",$update_id);
	  $stmt1->bind_result($table_id,$table_name, $table_pname,$table_pid);
	  $stmt1->execute();
		while($stmt1->fetch())
		{
			$id1=$table_id;
			$name1=$table_name;
			$pname=$table_pname;
			$pid=$table_pid;
		}
		endif;
      ?>
	<?php include("header.php");
	      include("sidebar.php"); 
	?>

		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>

			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			<div class="clear"></div> <!-- End .clear -->


			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Update Category</h3>
					
				</div> <!-- End .content-box-header -->	
					
			<div class="content-box-content" >

				<div class="tab-content default-tab" id="tab2">
					
					
					<form action="update_categories.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Category Name</label>
										<input class="text-input small-input" name="c_name" type="text" id="small-input" value="<?php if(isset($_GET['update_id']))echo $name1 ?>" />  <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								<input type="hidden" name="pid" value="<?php if(isset($_GET['update_id'])) echo $pid?>">
								<input type="hidden" name="pname" value="<?php if(isset($_GET['update_id'])) echo $pname?>">
								<input type="hidden" name="id" value="<?php if(isset($_GET['update_id']))echo $id1?>">
								
								<p>
									<label>Parent Categories</label>              
									<select name="p_cat" class="small-input" ">
									<option value="select">Select</option>
										<?php foreach ($category as $value): ?>

										<option value="<?php if(isset($_GET['update_id'])) echo $value['name']?>"><?php if(isset($_GET['update_id'])) echo $value['name']?></option>
										<?php endforeach;?>
										
									</select> 
								</p>
								
								<p>
									<label>Any comments</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
					
					</div> <!-- End #tab2 -->  
					</div> <!-- End .content-box-content -->
			
			</div> <!-- End .content-box -->      
	<?php include("footer.php"); ?>