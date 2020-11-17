<?php 
$sscatid= $_GET['id'];
$order= $_GET['o'];
$ascdesc= $_GET['f'];
if ($sscatid!="") {
require_once("library/function.php");
            $wxsql="SELECT id,name,subcategoryid FROM sscategory where id=$sscatid";
            $wxsql = $db->query($wxsql);
            $wxsql2 = $wxsql->fetch_assoc();
            $rxsql="SELECT categoryid,name FROM subcategory where id={$wxsql2['subcategoryid']}";
            $rxsql = $db->query($rxsql);
            $rxsql2 = $rxsql->fetch_assoc();
            $yxsql="SELECT id,name FROM category where id={$rxsql2['categoryid']}";
            $yxsql = $db->query($yxsql);
            $yxsql2 = $yxsql->fetch_assoc();
require_once("template/header.php");
?>
<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            <!-- breadcrumbs -->
            <ol class="breadcrumb breadcrumb1">
                <li><a href="index.html">Home</a></li>
                <li>
                    <?php echo ucfirst($yxsql2['name']); ?>
                </li>
                <li>
                    <?php echo ucfirst($rxsql2['name']); ?>
                </li>
                <li class="active">
                    <?php echo ucfirst($wxsql2['name']); ?>
                </li>
            </ol>
            <div class="clearfix"> </div>
            <!-- //breadcrumbs -->
            <div class="product-top">
                <h4><?php echo ucfirst($wxsql2['name']); ?></h4>
                <ul>
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter By<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo BASE_URL.'category'.'/'.$wxsql2['id'].'/price/asc/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']); ?>"
                                    >Low price</a></li>
                            <li><a href="<?php echo BASE_URL.'category'.'/'.$wxsql2['id'].'/price/desc/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']); ?>">High price</a></li>
                            <li><a href="<?php echo BASE_URL.'category'.'/'.$wxsql2['id'].'/id/desc/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']); ?>">Latest</a></li>
                            <li><a href="<?php echo BASE_URL.'category'.'/'.$wxsql2['id'].'/view/desc/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']); ?>">Popular</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="products-row">
                <?php 
   $sql2 = "SELECT id,title,pic,price,tsell,delivery from product  WHERE sscategoryid='$sscatid' order by $order ".' '.$ascdesc;
    $sql2 = $db->query($sql2);
    while($product = $sql2->fetch_assoc()){
        $link='details'.'/'.$product['id'].'/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']).'/'.url_slug($product['title']);
                     ?>
               
                <div class="col-md-4 product-grids">
                    <div class="agile-products">
                        <a href="<?php echo BASE_URL.$link;?>"><img src="<?php echo BASE_URL;?>product/product<?php echo $product['id'] ; ?>-1_thumb.<?php echo $product['pic'] ; ?>" class="img-responsive" alt="img"></a>
                        <div class="agile-product-text">
                            <h5><a href="<?php echo BASE_URL.$link;?>"><?php echo ucfirst($product['title']) ; ?></a></h5>
                            <p>Price:
                                <?php echo $product['price'] ; ?> /- Per Pieces</p>
                            <p>Delivery in
                                <?php echo $product['delivery'] ; ?> Days </p>
                            <input name="rating" value="" id="rating_star<?php echo $product['id'] ; ?>" type="hidden" postID="<?php echo $product['id']; ?>" />
                            
                            <a href="<?php echo BASE_URL.$link;?>">
                                    <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i>Details</button>
                                    </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 rsidebar">
            <div class="rsidebar-top">
                <div class="slider-left">
                    <h4>More From Category</h4>
                </div>
                <div class="sidebar-row">
                    <h4> <?php echo ucfirst($yxsql2['name']); ?></h4>
                    <ul class="faq">
                        <?php 
                                $scl="SELECT id,name FROM subcategory where categoryid={$yxsql2['id']}";
                                $scl = $db->query($scl);
                                while($scl2 = $scl->fetch_assoc()){
                             ?>
                        <li class="item<?php echo $scl2['id']; ?>"><a href="#"><?php echo ucfirst($scl2['name']); ?><span class="glyphicon glyphicon-menu-down"></span></a>
                            <ul style="display: none;">
                                <?php 
                                $xscl="SELECT id,name FROM sscategory where subcategoryid={$scl2['id']}";
                                $xscl = $db->query($xscl);
                                while($xscl2 = $xscl->fetch_assoc()){
                                    $link2='category'.'/'.$xscl2['id'].'/id/desc/'.url_slug($yxsql2['name']).'/'.url_slug($scl2['name']).'/'.url_slug($xscl2['name']);
                             ?>
                                <li class="subitem1" class="active"><a href="<?php echo BASE_URL.$link2;?>"><?php echo ucfirst($xscl2['name']); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- script for tabs -->
                    <script type="text/javascript">
                    $(function() {
                        var menu_ul = $('.faq > li > ul'),
                            menu_a = $('.faq > li > a');
                        menu_ul.hide();
                        menu_a.click(function(e) {
                            e.preventDefault();
                            if (!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true, true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true, true).slideUp('normal');
                            }
                        });
                    });
                    </script>
                    <!-- script for tabs -->
                </div>
                <div class="sidebar-row">

                    
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <?php require_once ("template/most-view.php") ?>
    </div>
</div>
<?php require_once("template/footer.php");  } ?>