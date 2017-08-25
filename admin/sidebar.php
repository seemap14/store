<body>
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
<div id="sidebar">
		<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">John Doe</a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
				<br />
				<a href="#" title="View the Site">View the Site</a> | <a href="#" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="http://www.google.com/" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>


				<?php 
				if($page=="index.php" || $page=="sports.php" || $page=="apparels.php" ):
				?>
				<li> 
					<a href="" class="nav-top-item "> <!-- Add the class "current" to current menu item -->
					Products
					</a>
					<ul>
						<li><a  href="add.php">Add Product</a></li>
						<li><a  href="manage.php?page_id=1">Manage Products</a></li> <!-- Add class "current" to sub menu items also -->
						
					</ul>
				</li>
				<?php
				endif;
				?>


				<?php 
				if($page=="add.php"):
				?>
				<li> 
					<a href="" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
					Products
					</a>
					<ul>
						<li><a  href="add.php" class="current">Add Product</a></li>
						<li><a  href="manage.php?page_id=1">Manage Products</a></li> <!-- Add class "current" to sub menu items also -->
						
					</ul>
				</li>
				<?php
				endif;
				?>
				

				<?php 
				if($page=="manage.php"):
				?>
				<li> 
					<a href="" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
					Products
					</a>
					<ul>
						<li><a  href="add.php">Add Product</a></li>
						<li><a  href="manage.php?page_id=1" class="current">Manage Products</a></li> <!-- Add class "current" to sub menu items also -->
						
					</ul>
				</li>
				<?php
				endif;
				?>


				<?php 
				//if($page=="tags.php"):
				?>
				<li>
					<a href="#" class="nav-top-item">
						Tags
					</a>
					<ul>
						<li><a href="#">Create a new Page</a></li>
						<li><a href="#">Manage Pages</a></li>
					</ul>
				</li>
				<?php
				//endif;
				?>

				<?php 
				if($page=="index.php"  || $page=="add.php"  || $page=="manage.php" || $page=="apparels.php" ):
				?>
				<li>
					<a href="#" class="nav-top-item">
						Categories
					</a>
					<ul>
						<li><a href="sports.php" class="">Sports</a></li>
						<li><a href="apparels.php">Apparels</a></li>
						<li><a href="#">Accessories</a></li>
						<li><a href="#">Electronics</a></li>
					</ul>
				</li>
				<?php
				endif;
				?>

				<?php 
				if($page=="sports.php"):
				?>
				<li>
					<a href="#" class="nav-top-item current">
						Categories
					</a>
					<ul>
						<li><a href="sports.php" class="current">Sports</a></li>
						<li><a href="apparels.php">Apparels</a></li>
						<li><a href="#">Accessories</a></li>
						<li><a href="#">Electronics</a></li>
					</ul>
				</li>
				<?php
				endif;
				?>


				<?php 
				if($page=="apparels.php"):
				?>
				<li>
					<a href="#" class="nav-top-item current">
						Categories
					</a>
					<ul>
						<li><a href="sports.php">Sports</a></li>
						<li><a href="apparels.php"  class="current">Apparels</a></li>
						<li><a href="#">Accessories</a></li>
						<li><a href="#">Electronics</a></li>
					</ul>
				</li>
				<?php
				endif;
				?>


				<li>
					<a href="#" class="nav-top-item">
						Events Calendar
					</a>
					<ul>
						<li><a href="#">Calendar Overview</a></li>
						<li><a href="#">Add a new Event</a></li>
						<li><a href="#">Calendar Settings</a></li>
					</ul>
				</li>
			
				<li>
					<a href="#" class="nav-top-item">
						Settings
					</a>
					<ul>
						<li><a href="#">General</a></li>
						<li><a href="#">Design</a></li>
						<li><a href="#">Your Profile</a></li>
						<li><a href="#">Users and Permissions</a></li>
					</ul>
				</li>      
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->