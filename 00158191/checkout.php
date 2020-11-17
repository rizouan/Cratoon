<?php 
require_once("library/function.php"); 
if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
            if($type == '2'){
                $id=$_SESSION['proid'];
require_once("template/header.php");
?>
<div class="login-page">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Shipping Address</h3>
        <div class="login-body">            
            <script type="text/javascript">
            $(document).ready(function() {
                $("#disid").change(function() {
                    var disid = $(this).val();
                    var list = "";
                    <?php
            $diss = $db->query("select id,name from district ORDER BY name");
                while($alldis = $diss->fetch_assoc()){
                    echo "if (disid == ".$alldis['id'].") {";
                    echo " list += \"<option value=''>Choose Area </option>\";";
                    $areass = $db->query("select id,name,district_id from area ORDER BY name");
                        while($allAreav = $areass->fetch_assoc()){
                             if ($allAreav['district_id']  == $alldis['id']) {
                                 echo " list += \"<option value='" . $allAreav['id'] . "'>".$allAreav['name']."</option>\";";
                             }
                              }
                    echo "}";
            }
        ?>
                    $("#areaid").html(list);
                });
            });
    </script>
            <?php
        $chk = "SELECT * FROM customer where id='$id'";
        $chk= $db->query($chk);
        $pro= $chk->fetch_assoc();
     ?>
            <form action="<?php echo VALIDATE_URL ?>" method="post">
                <input type="text" class="user" name="name" placeholder="Enter your Name" required="" value="<?php echo $pro['name'] ?>">
                <input type="text" class="user" name="no" placeholder="Enter your Number" required="" value="<?php echo $pro['contact'] ?>">
                <input type="text" class="user" name="no2" placeholder="Optional Number">
                <div class="controls">
                    <select name="disid" id="disid" class="btn btn-default dropdown-toggle btn-block" required="required">
                        <option value="" selected="selected">Select District *</option>
                        <?php 
                        $diss = $db->query("select id,name from district");
                            while($alldis = $diss->fetch_assoc()){?>
                        <option value="<?php echo $alldis['id'] ; ?>">
                            <?php echo $alldis['name'] ; ?>
                        </option>
                        <?php }?>
                    </select>
                </div>
                <br>
                <div class="controls">
                    <select name="areaid" id="areaid" class="btn btn-default dropdown-toggle btn-block" required="required">
                        <option value="" selected="selected">Choose District first *</option>
                    </select>
                </div>
                <br>
                <textarea name="address" style="width: 100%" name="address" placeholder="Type Address" required="required"></textarea>
                <input type="submit" name="checkout" value="Payment Page">
            </form>
        </div>
    </div>
</div>
<?php 
require_once("template/footer.php"); 
}
else { $_SESSION["message"] = "Login First For Checkout"; header("Location: ".BASE_URL.'login.php?r=checkout.php'); } } else{ $_SESSION["message"] = "Login First For Checkout";

 header("Location: ".BASE_URL.'login.php?r=checkout.php'); 

}
?>