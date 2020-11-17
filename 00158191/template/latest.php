<div class="products">
    <?php  
    $sql = "select id,name from category";
    $sql = $db->query($sql);
    while($category = $sql->fetch_assoc()){
  ?>
    <div class="container">
        <div class="product-top">
            <h4><?php echo strtoupper($category['name']) ; ?></h4>
            <div class="clearfix"> </div>
        </div>
        <div class="products-row">
            <?php 
$sql2 = "select id,title,tsell,pic from product where categoryid={$category['id']}";
    $sql2 = $db->query($sql2);
    while($product = $sql2->fetch_assoc()){
 ?>
            <?php 
            $tsql="SELECT id,title,delivery,price,categoryid,subcategoryid,sscategoryid FROM product where id={$product['id']} limit 4";
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
            $link='details'.'/'.$tsql2['id'].'/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']).'/'.url_slug($tsql2['title']);
  ?>
           
            <div class="col-md-3  col-xs-12">
                <div class="agile-products">
                    <!-- <div class="new-tag"><h6>18%<br>Off</h6></div>-->
                    <a href="<?php echo BASE_URL.$link;?>"><img src="<?php echo BASE_URL;?>product/product<?php echo $product['id'] ; ?>-1_thumb.<?php echo $product['pic'] ; ?>" class="img-responsive" alt="img"></a>
                    <div class="agile-product-text">
                        <h5><a href="<?php echo BASE_URL.$link;?>"><?php echo ucfirst($product['title']) ; ?></a></h5>
                        <p>Price:
                            <?php echo $tsql2['price'] ; ?> /- Per Pieces</p>
                        <p>Delivery in
                            <?php echo $tsql2['delivery'] ; ?> Days </p>
                        <input name="rating" value="" id="rating_star<?php echo $tsql2['id'] ; ?>" type="hidden" postID="<?php echo $tsql2['id']; ?>" />
                        
                        <a href="<?php echo BASE_URL.$link;?>">
                                    <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i>Details</button>
                                    </a>
                    </div>
                </div>
            </div>
            <?php         } ?>
            <div class="clearfix"> </div>
        </div>
    </div>
    <br>
    <?php }?>
</div>