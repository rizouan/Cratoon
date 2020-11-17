<!--//products-->
<!-- footer-top -->
<div class="w3agile-ftr-top">
    <div class="container">
        <!-- <div class="ftr-toprow">
            <div class="col-md-4 ftr-top-grids">
                <div class="ftr-top-left">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </div>
                <div class="ftr-top-right">
                    <h4>FREE DELIVERY</h4>
                    <p>Get delivery within four working days in side dhaka totally free.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 ftr-top-grids">
                <div class="ftr-top-left">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="ftr-top-right">
                    <h4>CUSTOMER CARE</h4>
                    <p>Contact us for any FAQ and feedback. Customer's setisfection is our number one priority.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 ftr-top-grids">
                <div class="ftr-top-left">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </div>
                <div class="ftr-top-right">
                    <h4>GOOD QUALITY</h4>
                    <p>Find you next quality and premium purchase with Computer Mart</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div> -->
    </div>
</div>
<!-- //footer-top -->
<!-- subscribe -->
<div class="subscribe">
    <div class="container">
        <div class="col-md-12 social-icons w3-agile-icons text-center">
            <h4>Keep in touch</h4>
            <ul>
                <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                <li><a href="#" class="fa fa-rss icon rss"> </a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //subscribe -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-info w3-agileits-info">
            <div class="col-md-12">
                <div class="col-md-4 footer-grids">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-grids">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-grids">
                    <h3>Payment Methods</h3>
                    <ul>
                        <li><a href="">Payment</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //footer -->
<div class="copy-right">
    <div class="container">
        <p>© 2019
            <?php echo SITE_NAME?> Developed by <a href="https://www.facebook.com/rizouanm">Rizouan Nohan</a></p>
    </div>
</div>
<!-- cart-js -->
<script src="<?php echo BASE_URL;?>template/js/minicart.js"></script>
<script>
w3ls.render();
w3ls.cart.on('w3sb_checkout', function(evt) {
    var items, len, i;
    if (this.subtotal() > 0) {
        items = this.items();
        for (i = 0, len = items.length; i < len; i++) {
            items[i].set('shipping', 0);
            items[i].set('shipping2', 0);
        }
    }
});
</script>
<!-- //cart-js -->
<!-- menu js aim -->
<script src="<?php echo BASE_URL;?>template/js/jquery.menu-aim.js"> </script>
<script src="<?php echo BASE_URL;?>template/js/main.js"></script> <!-- Resource jQuery -->
<!-- //menu js aim -->
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo BASE_URL;?>template/js/bootstrap.js"></script>
</div>
</body>

</html>