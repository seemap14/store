
<?php
session_start();
include("../functions.php");
$page=basename(__FILE__);
$page=isset($_GET["page"])?$_GET["page"]:"";
$reg=false;
$log=true;
if(isset($_POST["register"]))
{
  $email=isset($_POST["email"])?$_POST["email"]:"";
  $pass=isset($_POST["pass"])?$_POST["pass"]:"";
  $reg=register($email,$pass);
}
if(isset($_POST["login"]))
{
  $email=isset($_POST["email"])?$_POST["email"]:"";
  $pass=isset($_POST["pass"])?$_POST["pass"]:"";
  $page=isset($_POST["page"])?$_POST["page"]:"";
  if($log=login($email,$pass))
  {
    $_SESSION["user"]=$email;
    if($page=="checkout.php")
    {
      header("Location:checkout.php");
    }
    else
    {
      header("Location:product1.php");
    }
  } 
}
?>
<?php include("header.php");?>
  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <span style="color:red"><?php if($log==false) echo "Invalid user or password";?></span>
                 <form action="account.php" class="aa-login-form" method="post">
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" placeholder="Username or email" name="email" required="">
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="pass" required="">
                    <input type="hidden"  name="page" value="<?php echo $page?>">
                    <button type="submit" class="aa-browse-btn" name="login">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <span style="color:red"><?php if($reg==true) echo "Successful Registration";?></span>
                 <form action="account.php" class="aa-login-form" method="post">
                    <label for="">Username or Email address<span>*</span></label>
                    <input type="text" placeholder="Username or email" name="email" required="">
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="pass" required="">
                    <button type="submit" name="register" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

  <!-- footer -->  
  <?php include("footer.php");?>
  <!-- / footer -->
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login</h4>
          <form class="aa-login-form" action="account.php" method="post">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email" name="email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password" name="pass">
            <button class="aa-browse-btn" type="submit" name="login">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.php">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>


    
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 
  

  </body>
</html>