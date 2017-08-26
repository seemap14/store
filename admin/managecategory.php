	<?php include("header.php"); ?>	

	<?php
	      /*$pageLink="";
		  $page_id=$_GET["page_id"];
		   $max=5;
		  $min = ($page_id-1) * $max;*/
		 
		  $category_list=array();
		  include("config.php");

		  $page=basename($_SERVER['PHP_SELF']);
		  /*$stmt1=$conn->prepare("SELECT count(id) FROM products_git");
		  $stmt1->bind_result($table_rec);
		  $stmt1->execute();
		  while($stmt1->fetch())
			{
				$rec=$table_rec;
			}
			
			$records=ceil($rec/5);

			if($page_id<1 || $page_id>$records)
			{
				header("Location:manage.php?page_id=1");
			}*/
				$c=0;
				$stmt = $conn->prepare("SELECT id,name,pname,pid FROM category ");
				//$stmt->bind_param("i",$c);
				$stmt->bind_result($table_id, $table_name, $table_pname,$table_pid);
				$stmt->execute();
				while($stmt->fetch())
				{
					$category_list[]=array("id"=>$table_id,"name"=>$table_name,"pname"=>$table_pname,"pid"=>$table_pid);
				}

			


			
     ?>
	<?php include("sidebar.php"); ?>

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
					
					<h3>Manage Product</h3>
					
				</div> <!-- End .content-box-header -->
					
			<div class="content-box-content" >

					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Category Name</th>
								   <th>Parent Name</th>
								   <th>Action</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
										

											

										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>

							<?php foreach($category_list as $value):?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $value['name'] ?></td>
									<td><?php echo $value['pname']?></a></td>
									<td>
										<!-- Icons -->
										 <a href="updatecategory.php?update_id=<?php echo $value['id']?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>

										 <a href="deletecategory.php?delete_id=<?php echo $value['id']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 

										 <a href="" title="EditMeta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
							
					</table>
						
					</div> <!-- End #tab1 -->

				</div> <!-- End .content-box-content -->
			
			</div> <!-- End .content-box -->
			
			
	<?php include("footer.php"); ?>