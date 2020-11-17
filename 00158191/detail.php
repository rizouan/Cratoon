<?php 
$postid= $_GET['id'];
if ($postid!="") {
    require_once("library/function.php");
    $insert=$db->query("UPDATE product SET view=view+1 WHERE id='$postid'");
    $tsql="SELECT * FROM product where id='$postid'";
    $tsql = $db->query($tsql);
    $theproduct = $tsql->fetch_assoc();
    $yxsql="SELECT name FROM category where id={$theproduct['categoryid']}";
    $yxsql = $db->query($yxsql);
    $yxsql2 = $yxsql->fetch_assoc();
    $rxsql="SELECT name FROM subcategory where id={$theproduct['subcategoryid']}";
    $rxsql = $db->query($rxsql);
    $rxsql2 = $rxsql->fetch_assoc();
    $wxsql="SELECT name FROM sscategory where id={$theproduct['sscategoryid']}";
    $wxsql = $db->query($wxsql);
    $wxsql2 = $wxsql->fetch_assoc();
    $pslink=BASE_URL.'details'.'/'.$postid.'/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']).'/'.url_slug($theproduct['title']);
    $title=$theproduct['title'];
    require_once("template/header.php");
    ?>
    <style type="text/css">
    .product-part {
        background: #fff;
        width: 100%;
        padding: 15px 10px;
    }

    .product-part {
        margin: 5px 0;
        box-shadow: 0 2px 15px rgba(0, 0, 0, .1);
        border-radius: 10px;
    }

    .product-part {
        overflow: hidden;
    }

    label.view-page {
        margin: 7px 3px;
    }

    .single-page-icons.social-icons {
        margin: 1em;
    }

    .about,
    .card-page,
    .contact,
    .deals,
    .faq-w3agile,
    .help,
    .login-page,
    .privacy,
    .products,
    .related-products,
    .sitemap,
    .values,
    .w3l-services,
    .welcome,
    .wthree-offers {
        padding: 1em 0;
    }
</style>
<div class="container">
    <br>
    <ol class="breadcrumb breadcrumb1">
        <li><a href="index.html">Home</a></li>
        <li>
            <?php echo ucfirst($yxsql2['name']); ?>
        </li>
        <li>
            <?php echo ucfirst($rxsql2['name']); ?>
        </li>
        <li>
            <?php echo ucfirst($wxsql2['name']); ?>
        </li>
        <li class="active">
            <?php echo ucfirst($theproduct['title']); ?>
        </li>
    </ol>
    <div class="clearfix"> </div>
    <div class="container">
        <div class="products">
            <div class="">
                <div class="single-page">
                    <div class="row" id="detail-21">
                        <div class="col-md-6 single-top-left">
                            <div class="product-part">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <?php 
                                        $ptsql="SELECT picid,ext FROM productpic where productid='$postid'";
                                        $ptsql = $db->query($ptsql);
                                        while($ptheproduct = $ptsql->fetch_assoc()){
                                            ?>
                                            <li data-thumb="<?php echo BASE_URL ;?>product/product<?php echo $postid; ?>-<?php echo $ptheproduct['picid']; ?>_thumb.<?php echo $ptheproduct['ext']; ?>">
                                                <div class="thumb-image detail_images">
                                                    <img src="<?php echo BASE_URL ;?>product/product<?php echo $postid; ?>-<?php echo $ptheproduct['picid']; ?>_resize.<?php echo $ptheproduct['ext']; ?>"  class="img-responsive" alt="">
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 single-top-right">
                            <div class="product-part">
                                <h3 class="item_name"><?php echo ucfirst($theproduct['title']); ?></h3>
                            </div>
                            <div class="product-part">
                                <div class="col-md-5 col-xs-12">
                                    
                                   
                                
                                  
                                    <p>Product ID:
                                        <?php echo $theproduct['pid']; ?>
                                    </p>
                                    <p>Delivery In:
                                        <?php echo $theproduct['delivery']; ?> days </p>
                                        <!-- <p>Total view:
                                            <?php echo $theproduct['view']; ?> times </p> -->
                                        </div>
                                        <div class="col-md-7 col-xs-12">
                                           <!--  <p style="color:green">Total Order -
                                                <?php echo $theproduct['tsell']; ?>
                                            </p> -->
                                        </div>
                                    </div>
                                    <div class="product-part">
                                        <div class="col-lg-12">
                                            <div class="single-price">
                                                <p> Price :
                                                    <?php echo $theproduct['price']; ?>/- Per Pieces</p>
                                                    <p>Total Stock Left -
                                                        <?php 
                                                        $lptsql="SELECT stock,colorid FROM productcolorstock where productid='$postid'";
                                                        $lptsql = $db->query($lptsql);
                                                        $total_stock=0;
                                                        while($_stock=$lptsql->fetch_assoc()){
                                                            $total_stock+=$_stock['stock'];
                                                        }
                                                        echo $total_stock;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <?php
if (isset($_SESSION['cart_alert'])){
  $msg = $_SESSION['cart_alert'];
  if ($msg != NULL) {
 echo $msg;
  unset($_SESSION['cart_alert']); }  } ?>


                                        <div class="product-part" id="cart-red">
                                            <div class="col-lg-12">
                                            
                                                <form action="<?php echo VALIDATE_URL ?>" method="post">
                                                    <input type="hidden" name="postlink" value="<?php echo $pslink; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $theproduct['price']; ?>">
                                                    <input type="hidden" name="postid" value="<?php echo $theproduct['id']; ?>">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group"> <label for="color" class="view-page">Select Color</label>
                                                                <select class="form-control" id="color" name="clr">
                                                                    <?php   
                                                                    $lptsql="SELECT stock,colorid FROM productcolorstock where productid='$postid'";
                                                                    $lptsql = $db->query($lptsql);
                                                                    while($lptheproduct = $lptsql->fetch_assoc()){
                                                                        $crxsql="SELECT id,name FROM color where id={$lptheproduct['colorid']}";
                                                                        $crxsql = $db->query($crxsql);
                                                                        $crxsql2 = $crxsql->fetch_assoc();?>
                                                                        <option value="<?php echo $crxsql2['id']?>">
                                                                            <?php echo ucfirst($crxsql2['name']).' ( Available '.$lptheproduct['stock'].' )' ?>
                                                                        </option>
                                                                        <?php 
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="view-page">Select Quantity: ( Min
                                                                <?php echo $theproduct['minimum']; ?> )</label>
                                                                <div class="input-group spinner">
                                                                    <input type="text" name="stk" class="form-control" value="<?php echo $theproduct['minimum']; ?>" min="<?php echo $theproduct['minimum']; ?>" max="<?php echo $total_stock; ?>">
                                                                    <div class="input-group-btn-vertical">
                                                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 " style="margin:5px 0">
                                                                <button type="submit" class="btn" name="add_to_cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-part">
                                                <div class="single-page-icons social-icons">
                                                    <ul>
                                                        <li><h4>Share on</h4>
                                                        </li>
                                                        <li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $pslink ?>" class="fa fa-facebook icon facebook"> </a></li>
                                                        <li><a target="_blank" href="http://www.twitter.com/share?url=<?php echo $pslink ?>" class="fa fa-twitter icon twitter"> </a></li>
                                                        <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $pslink ?>" class="fa fa-google-plus icon googleplus"> </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="product-part">
                                                <div class="row">
                                                    <div id="exTab1" class="col-md-12">
                                                        <ul class="nav nav-pills">
                                                            <li class="active">
                                                                <a  href="#1a" data-toggle="tab">Description</a>
                                                            </li>
                                                            
                                                            
                                                      <li><a href="#3a" data-toggle="tab">Payment Method</a>
                                                      </li>
                                                  </ul>
                                                  <div class="tab-content clearfix">
                                                    <div class="tab-pane active" id="1a">
                                                        <div class="product-part" style="box-shadow: none">
                                                            <?php echo $theproduct['details']; ?>
                                                        </div>
                                                    </div>



                                                  
                                    <div class="tab-pane" id="3a">
                                        <div class="product-part" style="box-shadow: none"> Bkash Payment </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once ("template/most-view.php") ?>
</div>
</div>
</div>
<?php
require_once("template/footer.php"); }
?>