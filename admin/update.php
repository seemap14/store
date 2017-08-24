	<?php include("header.php"); ?>	
	 <?php
     $page=basename($_SERVER['PHP_SELF']);
      $update_id=$_GET['update_id'];
      include("config.php");
      $products_update=array();

      $stmt = $conn->prepare("SELECT id,name,price,image,category FROM products_git WHERE id=?");
      $stmt->bind_param("i",$update_id);

		$stmt->bind_result($table_id,$table_name, $table_price,$table_image,$table_cat);
		$stmt->execute();
		while($stmt->fetch())
		{
			$id=$table_id;
			$name=$table_name;
			$price=$table_price;
			$image=$table_image;
			$cat=$table_cat;
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
					
					<h3>Update Product</h3>
					
				</div> <!-- End .content-box-header -->	
					
			<div class="content-box-content" >

				<div class="tab-content default-tab" id="tab2">
					
					
					<form action="form_update_products.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Product Name</label>
										<input class="text-input small-input" name="p_name" type="text" id="small-input" value="<?php echo $name ?>" />  <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								<input type="hidden" name="id" value="<?php echo $id?>">
								<p>
									<label>Product Price</label>
								<input class="text-input small-input datepicker" name="p_price" type="text" id="medium-input" value="<?php echo $price ?>"/> 
								</p>

								<p>
									<label>Product Image</label>
								<input class="text-input small-input datepicker" name="p_image" type="file" id="medium-input" value="<?php echo $image ?>"/>
								</p>
								
								<p>
									<label>Categories</label>              
									<select name="p_cat" class="small-input" ">
										<option value="<?php echo $cat ?>"><?php echo $cat ?></option>
										<option value="Electronics">Electronics</option>
										<option value="Apparels">Apparels</option>
										<option value="Sports">Sports</option>
										<option value="Accessories">Accessories</option>
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
			
		
