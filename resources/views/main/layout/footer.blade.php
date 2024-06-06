<footer class="nk-footer">

    <div class="container">
        <div class="nk-gap-3"></div>
        <div class="row vertical-gap">
            <div class="col-md-6">
                <div class="nk-widget">
                    <h4 class="nk-widget-title"><span class="text-main-1">Contact</span> With Us</h4>
                    <div class="nk-widget-content">
                        <form action="php/ajax-contact-form.php" class="nk-form nk-form-ajax">
                            <div class="row vertical-gap sm-gap">
                                <div class="col-md-6">
                                    <input type="email" class="form-control required" name="email" placeholder="Email *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control required" name="name" placeholder="Name *">
                                </div>
                            </div>
                            <div class="nk-gap"></div>
                            <textarea class="form-control required" name="message" rows="5" placeholder="Message *"></textarea>
                            <div class="nk-gap-1"></div>
                            <button class="nk-btn nk-btn-rounded nk-btn-color-white">
                                <span>Send</span>
                                <span class="icon"><i class="ion-paper-airplane"></i></span>
                            </button>
                            <div class="nk-form-response-success"></div>
                            <div class="nk-form-response-error"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="nk-widget">
                    <h4 class="nk-widget-title"><span class="text-main-1">Latest</span> Posts</h4>
                    <div class="nk-widget-content">
                        <div class="row vertical-gap sm-gap">

                            <div class="col-lg-6">
                                <div class="nk-widget-post-2">
                                    <a href="blog-article.html" class="nk-post-image">
                                        <img src="{{asset('main/images/post-1-sm.jpg')}}" alt="">
                                    </a>
                                    <div class="nk-post-title"><a href="blog-article.html">Smell magic in the air. Or maybe barbecue</a></div>
                                    <div class="nk-post-date">
                                        <span class="fa fa-calendar"></span> Sep 18, 2018
                                        <span class="fa fa-comments"></span> <a href="#">4</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="nk-widget-post-2">
                                    <a href="blog-article.html" class="nk-post-image">
                                        <img src="{{asset('main/images/post-2-sm.jpg')}}" alt="">
                                    </a>
                                    <div class="nk-post-title"><a href="blog-article.html">Grab your sword and fight the Horde</a></div>
                                    <div class="nk-post-date">
                                        <span class="fa fa-calendar"></span> Sep 5, 2018
                                        <span class="fa fa-comments"></span> <a href="#">7</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="nk-widget">
                    <h4 class="nk-widget-title"><span class="text-main-1">In</span> Twitter</h4>
                    <div class="nk-widget-content">
                        <div class="nk-twitter-list" data-twitter-count="1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-gap-3"></div>
    </div>

    <div class="nk-copyright">
        <div class="container">
            <div class="nk-copyright-left">
                <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
            </div>
            <div class="nk-copyright-right">
                <ul class="nk-social-links-2">
                    <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                    <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                    <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>
                    <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                    <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                    <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>
                    <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>

                    <!-- Additional Social Buttons
                        <li><a class="nk-social-behance" href="#"><span class="fab fa-behance"></span></a></li>
                        <li><a class="nk-social-bitbucket" href="#"><span class="fab fa-bitbucket"></span></a></li>
                        <li><a class="nk-social-dropbox" href="#"><span class="fab fa-dropbox"></span></a></li>
                        <li><a class="nk-social-dribbble" href="#"><span class="fab fa-dribbble"></span></a></li>
                        <li><a class="nk-social-deviantart" href="#"><span class="fab fa-deviantart"></span></a></li>
                        <li><a class="nk-social-flickr" href="#"><span class="fab fa-flickr"></span></a></li>
                        <li><a class="nk-social-foursquare" href="#"><span class="fab fa-foursquare"></span></a></li>
                        <li><a class="nk-social-github" href="#"><span class="fab fa-github"></span></a></li>
                        <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a class="nk-social-linkedin" href="#"><span class="fab fa-linkedin"></span></a></li>
                        <li><a class="nk-social-medium" href="#"><span class="fab fa-medium"></span></a></li>
                        <li><a class="nk-social-odnoklassniki" href="#"><span class="fab fa-odnoklassniki"></span></a></li>
                        <li><a class="nk-social-paypal" href="#"><span class="fab fa-paypal"></span></a></li>
                        <li><a class="nk-social-reddit" href="#"><span class="fab fa-reddit"></span></a></li>
                        <li><a class="nk-social-skype" href="#"><span class="fab fa-skype"></span></a></li>
                        <li><a class="nk-social-soundcloud" href="#"><span class="fab fa-soundcloud"></span></a></li>
                        <li><a class="nk-social-slack" href="#"><span class="fab fa-slack"></span></a></li>
                        <li><a class="nk-social-tumblr" href="#"><span class="fab fa-tumblr"></span></a></li>
                        <li><a class="nk-social-vimeo" href="#"><span class="fab fa-vimeo"></span></a></li>
                        <li><a class="nk-social-vk" href="#"><span class="fab fa-vk"></span></a></li>
                        <li><a class="nk-social-wordpress" href="#"><span class="fab fa-wordpress"></span></a></li>
                        <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>
                    -->
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<script src="{{asset('main/vendor/object-fit-images/dist/ofi.min.js')}}"></script>

<!-- GSAP -->
<script src="{{asset('main/vendor/gsap/src/minified/TweenMax.min.js')}}"></script>
<script src="{{asset('main/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js')}}"></script>

<!-- Popper -->
<script src="{{asset('main/vendor/popper.js/dist/umd/popper.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('main/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Sticky Kit -->
<script src="{{asset('main/vendor/sticky-kit/dist/sticky-kit.min.js')}}"></script>

<!-- Jarallax -->
<script src="{{asset('main/vendor/jarallax/dist/jarallax.min.js')}}"></script>
<script src="{{asset('main/vendor/jarallax/dist/jarallax-video.min.js')}}"></script>

<!-- imagesLoaded -->
<script src="{{asset('main/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>

<!-- Flickity -->
<script src="{{asset('main/vendor/flickity/dist/flickity.pkgd.min.js')}}"></script>

<!-- Photoswipe -->
<script src="{{asset('main/vendor/photoswipe/dist/photoswipe.min.js')}}"></script>
<script src="{{asset('main/vendor/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>

<!-- Jquery Validation -->
<script src="{{asset('main/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>

<!-- Jquery Countdown + Moment -->
<script src="{{asset('main/vendor/jquery-countdown/dist/jquery.countdown.min.js')}}"></script>
<script src="{{asset('main/vendor/moment/min/moment.min.js')}}"></script>
<script src="{{asset('main/vendor/moment-timezone/builds/moment-timezone-with-data.min.js')}}"></script>

<!-- Hammer.js -->
<script src="{{asset('main/vendor/hammerjs/hammer.min.js')}}"></script>

<!-- NanoSroller -->
<script src="{{asset('main/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js')}}"></script>

<!-- SoundManager2 -->
<script src="{{asset('main/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js')}}"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="{{asset('main/vendor/bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('main/vendor/summernote/dist/summernote-bs4.min.js')}}"></script>

<!-- nK Share -->
<script src="{{asset('main/plugins/nk-share/nk-share.js')}}"></script>

<!-- GoodGames -->
<script src="{{asset('main/js/goodgames.min.js')}}"></script>
<script src="{{asset('main/js/goodgames-init.js')}}"></script>
<!-- END: Scripts -->
</body>
</html>
