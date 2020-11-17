<?php require_once("../library/function.php"); 
require_once("../template/header.php");
?>
<div class="login-page">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Admin Page</h3>
        <div class="login-body">
       <?php
if (isset($_SESSION['admin_alert'])){
  $msg = $_SESSION['admin_alert'];
  if ($msg != NULL) {
 echo $msg;
  unset($_SESSION['admin_alert']); }  } ?>

            <form action="<?php echo VALIDATE_URL ?>" method="post">
                <input type="text" class="user" name="uname" placeholder="Username" required="">
                <input type="password" name="psw" class="lock" placeholder="Password" required="">
                <input type="submit" value="Login" name="admin-login">
            </form>
        </div>
    </div>
</div>
<?php
require_once("../template/footer.php");
 ?>