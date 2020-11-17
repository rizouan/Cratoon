<?php 
$keyword= $_GET['q']; 
$keyword=trim($keyword);
$keyword = htmlspecialchars($keyword, ENT_QUOTES);
$title = $keyword;
$ktitle = str_replace("-", " ", $keyword);
$keyword = str_replace("&", "and", $keyword);
$keyword = str_replace(" ", "-", $keyword);
$datakey = $keyword;
require_once("library/function.php");
require_once("template/header.php");
 ?>
<div class="products">
    <div class="container">
        <div class="col-md-12 product-w3ls-right">
            <ol class="breadcrumb breadcrumb1">
                <li><a href="index.html">Home</a></li>
                <li class="active">
                    <?php echo ucfirst($title); ?>
                </li>
            </ol>
            <div class="clearfix"></div>
            <div class="product-top">
                <h4>Serach Result</h4>
                <div class="clearfix"> </div>
            </div>
            <?php 
$condition = '';
$query = explode("-", $keyword);  
    foreach($query as $keyword){
        if($keyword!='+'){
            $condition .= "title LIKE '%$keyword%' OR details LIKE '%$keyword%' OR "; 
            }
        else{
            header("Location: ".BASE_URL); 
        }  
    }  
    $condition = substr($condition, 0, -4);  
    $sql_query = "SELECT * FROM product WHERE " . $condition. "order by id desc limit 20";  
    $result = mysqli_query($db, $sql_query);  
    if(mysqli_num_rows($result) > 0){  
        while($post = mysqli_fetch_array($result)){ 
            $tutorial_id = $post['id'];
            $sscatid = $post['sscategoryid'];
                        $wxsql="SELECT id,name,subcategoryid FROM sscategory where id=$sscatid";
            $wxsql = $db->query($wxsql);
            $wxsql2 = $wxsql->fetch_assoc();
            $rxsql="SELECT categoryid,name FROM subcategory where id={$wxsql2['subcategoryid']}";
            $rxsql = $db->query($rxsql);
            $rxsql2 = $rxsql->fetch_assoc();
            $yxsql="SELECT id,name FROM category where id={$rxsql2['categoryid']}";
            $yxsql = $db->query($yxsql);
            $yxsql2 = $yxsql->fetch_assoc();
           ?>
            <div class="products-row">
                <?php 
   $sql2 = "SELECT id,title,pic,price,tsell,delivery from product  WHERE sscategoryid='$sscatid' order by id";
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
            <?php
        }
    }
    else{
        echo "<h2 class='page-header text-center'>No Result</h1>";
    }
?>
        </div>
    </div>
</div>
<?php
require_once("template/footer.php");  
 ?>