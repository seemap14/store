	<?php 
				include("../functions.php");
				$category=array();
				$category=getCategory();
	?>
	 <?php
      $page=basename($_SERVER['PHP_SELF']);
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
					
					<h3>Product Categories</h3>
					
				</div> <!-- End .content-box-header -->	
					
			<div class="content-box-content" >

				<div class="tab-content default-tab" id="tab2">
					
						<form action="add_categories.php" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Category Name</label>
										<input class="text-input small-input" name="c_name" type="text" id="small-input" />  <!-- Classes for input-notification: success, error, information, attention -->
										<br />
								</p>
								
								
								
								<p>
									<label>Parent Category</label>              
									<select name="p_cat" class="small-input">
										<option value="select">Select Parent Category</option>
									<?php foreach ($category as  $value):?>
										<option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
									<?php endforeach;?>
									
									</select> 
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