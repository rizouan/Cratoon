<?php 
require_once("library/function.php"); 
if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
    if($type == '2'){
        $id=$_SESSION['proid'];
        $casql="SELECT * FROM cart where deviceid='$deviceid' && porder='1'";
        $casql = $db->query($casql);
        $cart = $casql->fetch_assoc();
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
        <h3 class="w3ls-title w3ls-title1">Payment</h3>
        <div class="login-body">
            <div class="ins" style="text-align: left;">
                <?php 
                        $casql="SELECT * FROM cart where deviceid='$deviceid'  && porder='1'";
                        $casql = $db->query($casql);
                        $totalprice=0;
                        while($cart2 = $casql->fetch_assoc()){
                            $totalprice+=$cart2['price'];
                        }
                     ?>
                <ul>
                    <li>Go to bKash Menu by dialing *247#</li>
                    <li>Choose 'Payment' by pressing 3</li>
                    <li>Enter Bkash Merchent Number : 01611778661;</li>
                    <li>Enter Amount :
                        <?php echo $totalprice; ?>
                    </li>
                    <li>Enter Reference :
                        <?php echo $cart['refkey']; ?>
                    </li>
                    
                    <li>Now enter your PIN Number</li>
                    <li>After successfully transaction, sms you will received,</li>
                    <li>Send Us your Number and TrxlD for confirm your payment</li>
                    <br>
                </ul>
            </div>
            <?php 

     ?>
            <form action="<?php echo VALIDATE_URL ?>" method="post">
                <input type="hidden" name="refkey" value="<?php echo $cart['refkey']; ?>">
                <input type="hidden" name="totalprice" value="<?php echo $totalprice; ?>">
                <input type="number" class="user" name="bkash" placeholder="Enter Bkash Number" required="" value="">
                <input type="text" class="user" name="trxid" placeholder="Enter TrxlD" required="" value="">
                <input type="submit" name="payment" value="Confirm Payment">
            </form>
            <?php }  ?>
        </div>
    </div>
</div>
<?php 
require_once("template/footer.php"); 
}
else { header("Location: ".BASE_URL); } 


?>