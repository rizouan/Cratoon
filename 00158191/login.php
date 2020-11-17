<?php 
require_once("library/function.php");
require_once("template/header.php");
?>
<div class="login-page">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Login to your account</h3>
        <div class="login-body">




     <?php
if (isset($_SESSION['user_alert'])){
  $msg = $_SESSION['user_alert'];
  if ($msg != NULL) {
 echo $msg;
  unset($_SESSION['user_alert']); }  } ?>

            <form action="<?php echo VALIDATE_URL ?>" method="post">
                <input type="text" class="user" name="email" placeholder="Enter your email" required="">
                <input type="password" name="pass" class="lock" placeholder="Password" required="">
                <input type="hidden" name="redirect_page" value="<?php echo $_GET['r']; ?>">
                <input type="submit" value="Login" name="user_login">
            </form>
        </div>
        <h6> Not a Member? <a href="signup.php">Sign Up Now »</a> </h6>
    </div>
</div>
<?php
require_once("template/footer.php");
 ?>