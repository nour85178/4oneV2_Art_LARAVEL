@extends('FrontEnd.style')
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="footer_1 clearfix">
                <div class="col-sm-3">
                    <div class="footer_1i clearfix">
                        <h1 class="mgt"><a href="index.html"><span class="col_1">Art</span> Gallery</a></h1>
                        <p>Sed quia consequuntur magni dolor qui ratione porro tatem sequineque porro.</p>
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer_1i clearfix">
                        <h4>Our Company</h4>
                        <h6><a href="#">Legal Notice</a></h6>
                        <h6><a href="#">Terms And Conditions</a></h6>
                        <h6><a href="#">About Us</a></h6>
                        <h6><a href="#">Contact Us</a></h6>
                        <h6><a href="#">Sitemap</a></h6>
                        <h6><a href="#">My Account</a></h6>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer_1i clearfix">
                        <h4>Products</h4>
                        <h6><a href="#">Delivery</a></h6>
                        <h6><a href="#">Secure Payment</a></h6>
                        <h6><a href="#">Prices Drop</a></h6>
                        <h6><a href="#">New Products</a></h6>
                        <h6><a href="#">Best Sales</a></h6>
                        <h6><a href="#">Stores</a></h6>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer_1i clearfix">
                        <h4>Contact Us</h4>
                        <h6><a href="#"><i class="fa fa-map-marker col_1"></i> 35 Bay Semper Drive Ironstock, HB
                                10234, United States</a></h6>
                        <h6><a href="#"><i class="fa fa-phone col_1"></i> 0123456789</a></h6>
                        <h6><a href="#"><i class="fa fa-fax col_1"></i> 0123456789</a></h6>
                        <h6><a href="#"><i class="fa fa-envelope col_1"></i> info@gmail.com</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="footer_b clearfix">
                <div class="col-sm-5 space_left">
                    <div class="footer_br clearfix">
                        <ul class="mgt">
                            <li>
                                <a href="#">Our Policy</a>
                                <a href="#">Shipping</a>
                                <a href="#">Terms &amp; Conditions</a>
                                <a class="border_none" href="#">Refund Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7 space_left">
                    <div class="footer_bl  text-right clearfix">
                        <p class="mgt">© 2013 Your Website Name. All Rights Reserved | Design by <a class="col_1" href="http://www.templateonweb.com">TemplateOnWeb</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        /*****Fixed Menu******/
        var secondaryNav = $('.cd-secondary-nav'),
            secondaryNavTopPosition = secondaryNav.offset().top;
        navbar_height = document.querySelector('.navbar').offsetHeight;

        $(window).on('scroll', function(){
            if($(window).scrollTop() > secondaryNavTopPosition + navbar_height ) {
                secondaryNav.addClass('is-fixed');
                document.body.style.paddingTop = navbar_height + 'px';

            } else {
                secondaryNav.removeClass('is-fixed');
                document.body.style.paddingTop = '0'
            }
        });

    });
</script>
