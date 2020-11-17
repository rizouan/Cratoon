<?php 
require_once("library/function.php"); 
if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
            if($type == '2'){
            	$id=$_SESSION['proid'];
require_once("template/header.php");
?>
<div class="container">
    <h3 class="w3ls-title w3ls-title1">My Order</h3>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
							$casql="SELECT * FROM cart where deviceid='$deviceid'  && porder='2'";
            $casql = $db->query($casql);
            $fprice=0;
            while($cart = $casql->fetch_assoc()){
            	$fprice+=$cart['price'];
			$cartpid=$cart['productid'];
            $tsql="SELECT * FROM product where id='$cartpid'";
            $tsql = $db->query($tsql);
            $tsql2 = $tsql->fetch_assoc();
            $yxsql="SELECT name FROM category where id={$tsql2['categoryid']}";
            $yxsql = $db->query($yxsql);
            $yxsql2 = $yxsql->fetch_assoc();
            $rxsql="SELECT name FROM subcategory where id={$tsql2['subcategoryid']}";
            $rxsql = $db->query($rxsql);
            $rxsql2 = $rxsql->fetch_assoc();
            $wxsql="SELECT name FROM sscategory where id={$tsql2['sscategoryid']}";
            $wxsql = $db->query($wxsql);
            $wxsql2 = $wxsql->fetch_assoc();
$pslink=BASE_URL.'details'.'/'.$cartpid.'/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']).'/'.url_slug($tsql2['title']);
            	?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <?php 
                                        $ptsql="SELECT picid,ext FROM productpic where productid='$cartpid' && picid=1 ";
                                        $ptsql = $db->query($ptsql);
                                        while($ptsql2 = $ptsql->fetch_assoc()){
                                    ?>
                            <div class="col-sm-2 col-xs-2"><img src="<?php echo BASE_URL ;?>product/product<?php echo $cartpid; ?>-<?php echo $ptsql2['picid']; ?>_thumb.<?php echo $ptsql2['ext']; ?>" alt="..." class="img-responsive"/></div>
                                <?php } ?>
                                <div class="col-sm-10">
                                    <h4 class="nomargin"><a href="<?php echo $pslink ?>"><?php echo $tsql2['title'] ?></a></h4>
                                    <p> Color :
                                        <?php 
											$crxsql="SELECT id,name FROM color where id={$cart['colorid']}";
                $crxsql = $db->query($crxsql);
                $crxsql2 = $crxsql->fetch_assoc();
                echo ucfirst($crxsql2['name']);
                ?>
                                    </p>
                                    
                                </div>
                            </div>
                    </td>
                    <td data-th="Price">
                        <?php echo $tsql2['price'] ?>/-</td>
                    <td data-th="Quantity">
                        Quantity :
                        <?php echo $cart['quantity'] ?>
                    </td>
                    <td data-th="Subtotal" class="text-center">
                        <?php echo $cart['price'] ?>/-</td>
                        <!--<td class="actions" data-th="">
                                <?php
                                if($cart['status']==1){
                                    echo "Pending";
                                }
                                else{
                                    echo "Success";
                                }
                                ?>  
                            </td>-->
          
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total <?php echo $fprice; ?>/-</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <h3 class="w3ls-title w3ls-title1">My Payment</h3>
    <div class="col-md-12">
        <div class="box" id="order-summary">
            <div class="box-header">
                <h3>Last Payment</h3>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Bkash Number</th>
                        <th>Price</th>
                        <th>TRXID</th>
                        <th>Refernce</th>
                            <th>Payment approval</th>
                    </tr>
                    <?php 
                            $ptsql="SELECT * FROM payment where userid=$id";
                                        $ptsql = $db->query($ptsql);
                                        while($ptsql2 = $ptsql->fetch_assoc()){ ?>
                    <tr>
                        <td>
                            <?php echo $ptsql2['bkash']; ?>
                        </td>
                        <td>
                            <?php echo $ptsql2['price']; ?>
                        </td>
                        <td>
                            <?php echo $ptsql2['trxid']; ?>
                        </td>
                        <td>
                            <?php echo $ptsql2['refkey']; ?>
                        </td>
                        <td>
                            <?php
								if($ptsql2['verify']==2){
									echo "Pending";
								}
								else{
									echo "Success";
								}
								?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php 
require_once("template/footer.php"); 
}
else { $_SESSION["message"] = "Login First For Checkout"; header("Location: ".BASE_URL.'login.php'); } } else{ $_SESSION["message"] = "Login First For Checkout"; header("Location: ".BASE_URL.'login.php'); }
?>