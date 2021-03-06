	<?php include("functions.php"); ?>	
	 <?php
	 $n=-1;
	 if(isset($_GET["not"]))
	 {
	 	$n=$_GET["not"];
	 }
      $page=basename($_SERVER['PHP_SELF']);
      $category=getCategory();
      $tag=getAllTags();
        ?>
    <?php include("header.php"); ?>	   
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
					
					<h3>Add Product</h3>
					
				</div> <!-- End .content-box-header -->	
					
			<div class="content-box-content" >

				<div class="tab-content default-tab" id="tab2">
					
						<form action="add_products.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							
									<?php if(isset($_GET["not"])):
										if($n==1):?>
									
									<p>
									<span class="input-notification success png_bg" required>Successful message</span>
									</p>
									<?php 
									endif; 
									endif;
									?>
								
								<p>
									<label>Product Name</label>
										<input class="text-input small-input" name="p_name" type="text" id="small-input" required="" />  <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Product Price</label>
								<input class="text-input small-input datepicker" name="p_price" type="text" id="medium-input" required="" /> 
								</p>

								<p>
									<label>Product Image</label>
								<input class="text-input small-input datepicker" name="p_image" type="file" id="medium-input" required="" />
								</p>
								
								<p>
									<label>Product Tag</label>
									<?php foreach ($tag as  $value):?>
								<input name="q1[]" type="checkbox" value="<?php echo $value['name']?>"><?php echo $value['name']?><br>
							<?php endforeach;?>
								</p>

								<p>
									<label>Categories</label>              
									<select name="p_cat" class="small-input" required="">
										<option value="select">Select Category</option>
										<?php foreach ($category as  $value):?>
										<option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
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