<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php if (isset($title)) { echo $title.' | '.SITE_NAME; } else{ echo SITE_NAME.SITE_TITLE;} ?>
    </title>
    <meta property="og:title" content="<?php if (isset($title)) { echo $title; } else{ echo SITE_NAME.SITE_TITLE;} ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    
    <script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

    function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <link href="<?php echo BASE_URL;?>template/css/cmart.css" rel="stylesheet">
    <script src="<?php echo BASE_URL;?>template/js/my.js"></script>
    <style>
        p{
    color: #525151
}
</style>
    <script>
    $(document).ready(function() {
        $('.header-two').scrollToFixed();
        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];
            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10,
                zIndex: 999
            });
        });
    });
    </script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
        });
    });
    </script>
    <script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var defaults = {
            containerID: 'toTop',
            containerHoverID: 'toTopHover',
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
    </script>
    <script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
    $(function() {
        $('.spinner .btn:first-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                input.val(parseInt(input.val(), 10) + 1);
            } else {
                btn.next("disabled", true);
            }
        });
        $('.spinner .btn:last-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                input.val(parseInt(input.val(), 10) - 1);
            } else {
                btn.prev("disabled", true);
            }
        });
    })
    </script>
    <script type="text/javascript" id="sourcecode">
    $(function() {
        $('.scroll-pane').jScrollPane();
    });
    </script>
</head>

<body>
    <div class="header">
        <div class="w3ls-header">
            <div class="w3ls-header-left">
                <p><a style="color:white" href="" class="dropdown-toggle">About Us   |  </a>
                    <a style="color:white" href="" class="dropdown-toggle"> Contact</a>
                </p>
            </div>
            <div class="w3ls-header-right">
                <ul>
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php   if (!isset($_SESSION['type']) OR $_SESSION['type']== NULL){
                                    echo '<li><a href="'.BASE_URL.'login.php">Login</a></li>';
                                    echo '<li><a href="'.BASE_URL.'signup.php">Sign Up</a></li>'; }
                                else{ 
                                    if($_SESSION['type']== 'admin'){   
                                        echo '<li><a href="'.BASE_URL.'admin-dashboard">Admin</a></li>'; 
                                           echo '<li><a href="'.BASE_URL.'logout.php">Logout</a></li>'; 
                                    } 
                                    else{
                                        $zid=$_SESSION['proid'];
                                    echo '<li><a href="'.BASE_URL.'profile/'.$zid.'">Profile</a></li>';
                                    echo '<li><a href="'.BASE_URL.'logout.php">Logout</a></li>';
}
                                    ?>
                            <?php } ?>
                        </ul>
                    <li class="dropdown head-dpdn">
                        <a href="<?php echo BASE_URL; ?>cart.php" class="dropdown-toggle"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> My Cart    
                            <?php 
                            $tagQuery=$db->query("SELECT id FROM cart WHERE deviceid='$deviceid' && porder='1'");
                            if($tagQuery->num_rows>0){
                                echo '( '.$tagQuery->num_rows.' )';
                            }?></a>
                    </li>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="header-two">
            <div class="container">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="logoi">
                        <h5><a href="<?php echo BASE_URL?>"> <img src="<?php echo BASE_URL?>logo.png" class="img-responsive"></a></h5>
                    </div>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <div class="header-search" style="width:100%">
                        <form action="<?php echo BASE_URL?>search.php" method="get">
                            <input type="search" name="q" placeholder="Search for a Product..." required="">
                            <button type="submit" class="btn btn-default" aria-label="Left Align"> <i class="fa fa-search" aria-hidden="true"> </i> </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="header-three">
        <div class="container">
            <div class="menu">
                <div class="cd-dropdown-wrapper">
                    <a class="cd-dropdown-trigger" href="#0">Catagories</a>
                    <nav class="cd-dropdown">
                        <a href="#0" class="cd-close">Close</a>
                        <ul class="cd-dropdown-content">
                            <!--<li><a href="offers.html">Today's Offers</a></li>-->
                            <?php 
                                    $nsql ="SELECT id,name FROM category";
                                    $nsql = $db->query($nsql);
                                    while($nsql2 = $nsql->fetch_assoc()){
                                 ?>
                            <li class="has-children">
                                <a href="#"><?php echo ucfirst($nsql2['name']); ?></a>
                                <ul class="cd-secondary-dropdown is-hidden">
                                    <li class="go-back"><a href="#">Go Back</a></li>
                                    <?php 
                                            $nnsql ="SELECT id,name FROM subcategory where categoryid={$nsql2['id']}";
                                            $nnsql = $db->query($nnsql);
                                            while($nnsql2 = $nnsql->fetch_assoc()){
                                        ?>
                                    <li class="has-children">
                                        <a href="#"><?php echo ucfirst($nnsql2['name']); ?></a>
                                        <ul class="is-hidden">
                                            <li class="go-back"><a href="#">Go Back</a></li>
                                            <?php 
                                            $nnnsql ="SELECT id,name FROM sscategory where subcategoryid={$nnsql2['id']}";
                                            $nnnsql = $db->query($nnnsql);
                                            while($nnnsql2 = $nnnsql->fetch_assoc()){
                                        $link='category'.'/'.$nnnsql2['id'].'/id/desc/'.url_slug($nsql2['name']).'/'.url_slug($nnsql2['name']).'/'.url_slug($nnnsql2['name']);
                                        ?>
                                            <li><a href="<?php echo BASE_URL.$link;?>"><?php echo ucfirst($nnnsql2['name']); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <!--  <li><a href="sitemap.html">Full Site Directory </a></li>  -->
                        </ul>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    <?php if (isset($_SESSION['message'])){$msg = $_SESSION['message'];    if($msg != NULL){ echo '<div class="col-md-12"><ul class="breadcrumb"><center>'.$msg.'</center></ul></div>'; unset($_SESSION['message']); } } ?>