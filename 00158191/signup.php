<?php 
require_once("library/function.php");
require_once("template/header.php");
?>
<div class="login-page">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Create your account</h3>
        <div class="login-body">
            <?php 
				if(isset($_POST['name']) 
			&& isset($_POST['email'])
	&& isset($_POST['no'])
	&& isset($_POST['pass'])
) {
						$name=MS($_POST['name']);
						$email=strtolower($_POST['email']);
						$no=$_POST['no'];
						$pass=$_POST['pass'];
			$tagQuery=$db->query("SELECT id FROM customer WHERE email='$email'");
			if($tagQuery->num_rows<1){
			 $sql="INSERT INTO customer (name,email,contact,pass) 
			 		VALUES ('$name','$email','$no','$pass')";
			if ($db->query($sql)) {	
				echo '<blockquote>Accout Create Succesful <br><a href="'.BASE_URL.'"login.php">Login Now</a> </blockquote><br>';
			}
}
			//var_dump($sql);
		} ?>
            <form action="" method="post">
                <input type="text" class="user" name="name" placeholder="Enter your Name" required="">
                <input type="text" class="user" name="email" placeholder="Enter your email" required="">
                <input type="text" class="user" name="no" placeholder="Enter your Number (11 DIGIT)" required="">
                <input type="password" name="pass" id="contact" class="lock" placeholder="Password" required="">
                <input type="submit" value="Sign Up ">
            </form>
        </div>
        <h6>Already have an account? <a href="<?php echo BASE_URL ?>login.php">Login Now »</a> </h6>
    </div>
</div>
<?php
require_once("template/footer.php");
 ?>