<?php 
require_once("library/function.php"); 
if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
            if($type == 2){
			require_once("template/header.php");
 ?>
<style type="text/css">
.table>tbody>tr>td,
.table>tfoot>tr>td {
    vertical-align: middle;
}

@media screen and (max-width: 600px) {
    table#cart tbody td .form-control {
        width: 20%;
        display: inline !important;
    }

    .actions .btn {
        width: 36%;
        margin: 1.5em 0;
    }

    .actions .btn-info {
        float: left;
    }

    .actions .btn-danger {
        float: right;
    }

    table#cart thead {
        display: none;
    }

    table#cart tbody td {
        display: block;
        padding: .6rem;
        min-width: 320px;
    }

    table#cart tbody tr td:first-child {
        background: #333;
        color: #fff;
    }

    table#cart tbody td:before {
        content: attr(data-th);
        font-weight: bold;
        display: inline-block;
        width: 8rem;
    }

    table#cart tfoot td {
        display: block;
    }

    table#cart tfoot td .btn {
        display: block;
    }
}
</style>
<div class="container">
    <h1 class="page-header text-center">My Cart</h1>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
							$casql="SELECT * FROM cart where deviceid='$deviceid'";
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
                    <input type="number" class="form-control text-center" value="<?php echo $cart['quantity'] ?>">
                </td>
                <td data-th="Subtotal" class="text-center">
                    <?php echo $cart['price'] ?>/-</td>
                <td class="actions" data-th="">
                    <?php 
								                        if(isset($_POST['delete'])) {
                        $id=$_POST['delete'];
             $sqld="DELETE  FROM cart WHERE id=$id";
             var_dump($sqld);
                if ($db->query($sqld)) { 
                    header("Location: ".BASE_URL.'cart.php'); 
                }
            }
         ?>
                    <form action="" method="post" style="float: left; margin: 5px">
                        <input type="hidden" name="edit" value="<?php echo $cart['id'] ?>">
                        <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-refresh"></i></button>
                    </form>
                    <form action="" method="post" style="float: left; margin: 5px">
                        <input type="hidden" name="delete" value="<?php echo $cart['id'] ?>">
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-o"></i></button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total <?php echo $fprice; ?>/-</strong></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total <?php echo $fprice; ?>/-</strong></td>
                <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>
<?php 
require_once("template/footer.php"); 
}
else { $_SESSION["message"] = "Login For Check Your Cart";  header("Location: ".BASE_URL.'login.php'); } } else{$_SESSION["message"] = "Login For Check Your Cart";  header("Location: ".BASE_URL.'login.php'); }
?>