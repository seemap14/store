	<?php include("header.php"); ?>	
	<?php
	  $products_cat=array();
	  include("config.php");
      $page=basename($_SERVER['PHP_SELF']);
      //$pageLink="";
		   //$max=5;
		  //$min = ($page_id-1) * $max;
		 
		  $products_list=array();
		  include("config.php");

		
      $cat="Apparels";
      $stmt = $conn->prepare("SELECT id,name,price,image,category FROM products_git WHERE category=?");
      $stmt->bind_param("s",$cat);
      $stmt->bind_result($table_id,$table_name, $table_price,$table_image,$table_cat);
      $stmt->execute();
      while($stmt->fetch())
				{
					$products_cat[]=array("id"=>$table_id,"name"=>$table_name,"price"=>$table_price,"image"=>$table_image,"cat"=>$table_cat);
				}
    
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
					
					<h3>Manage Categories</h3>
					
				</div> <!-- End .content-box-header -->
					
			<div class="content-box-content" >

					<div class="tab-content default-tab"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Product Name</th>
								   <th>Product Price</th>
								   <th>Product Image</th>
								   <th>Product Category</th>
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
										

											<a href="" title="First Page">&laquo; First</a>
											

											<a href="" title="Previous Page">&laquo; Previous</a>
												

											

											
										  
											
											

											<a href='' title="Next Page">Next &raquo;</a>

										   
											<a href="" title="Last Page">Last &raquo;</a>
										    


										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>

							<?php foreach($products_cat as $value):?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $value['name'] ?></td>
									<td><?php echo "$".$value['price']?></a></td>
									<td><img src="../uploads/images/<?php echo $value['image']?>" height="80px" width="100px"></td>
									<td><?php echo $value['cat']?></td>
									<td>
										<!-- Icons -->
										 <a href="update.php?update_id=<?php echo $value['id']?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>

										 <a href="delete.php?delete_id=<?php echo $value['id']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 

										 <a href="#" title="EditMeta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
							
					</table>
						
					
				</div> <!-- End .content-box-header -->
					
				
			
				
			</div>

			</div> <!-- End .content-box -->
			
			
	<?php include("footer.php"); ?>