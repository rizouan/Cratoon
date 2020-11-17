<?php 
require_once("library/function.php"); 
if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
            if($type == '2'){
            	$id=$_SESSION['proid'];
require_once("template/header.php");
?>
<style type="text/css">
.ins>ul>li {
    margin-bottom: 8px;
    list-style: none;
}
</style>
<div class="login-page">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Thanks For Payment <br> Wait For response <br>
			For any kind of information <a href="index.php"> Contact Us </h3>
    </div>
</div>
<?php 
require_once("template/footer.php"); 
}
else { header("Location: ".BASE_URL); } } else{ header("Location: ".BASE_URL); }
?>