<?php $footer =  $this->getAllFooterMenus();
  $settingsData = $this->getSettingsData(); ?>
    <footer class="two gap no-bottom" style="background-image:url(<?php echo UPLOADURL.'/settings/'.$this->getSettingsData()->footer_logo;?>)">
        <div class="container">
            <div class="footer-contact">
                <div class="get-in-touch">
                    <i>
                        <svg height="112" viewBox="0 0 24 24" width="112" xmlns="http://www.w3.org/2000/svg">
                            <g clip-rule="evenodd" fill="rgb(255255,255)" fill-rule="evenodd">
                                <path d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z"></path>
                                <path d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z"></path>
                                <path d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z"></path>
                            </g>
                        </svg>
                    </i>
                    <div>
                        <span>Phone No :</span>
                        <h6><a href="tel:<?php echo $this->getSettingsData()->contact_nos; ?>"><?php echo $this->getSettingsData()->contact_nos; ?></a> </h6>
                    </div>
                </div>
                <div class="boder"></div>
                <div class="get-in-touch">
                    <i>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <path d="M0,81v350h512V81H0z M456.952,111L256,286.104L55.047,111H456.952z M30,128.967l134.031,116.789L30,379.787V128.967z
                   M51.213,401l135.489-135.489L256,325.896l69.298-60.384L460.787,401H51.213z M482,379.788L347.969,245.756L482,128.967V379.788z"></path>
                        </svg>
                    </i>
                    <div>
                        <span>Email Address :</span>
                        <h6><a href="mailto:<?php echo $this->getSettingsData()->email; ?>"><?php echo $this->getSettingsData()->email; ?></a></h6>
                    </div>
                </div>
                <div class="boder"></div>
                <div class="get-in-touch two">
                    <i>
                        <svg version="1.1" xml:space="preserve" width="682.66669" height="682.66669" viewBox="0 0 682.66669 682.66669" xmlns="http://www.w3.org/2000/svg">
                            <clipPath clipPathUnits="userSpaceOnUse">
                                <path d="M 0,512 H 512 V 0 H 0 Z"></path>
                            </clipPath>
                            <g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                                <g>
                                    <g clip-path="url(#clipPath2333)">
                                        <g transform="translate(256,92)">
                                            <path d="m 0,0 c -126.964,143.662 -160,165.23 -160,240 0,88.366 71.634,160 160,160 88.365,0 160,-71.634 160,-160 C 160,165.854 130.212,147.337 0,0 Z" style="fill:none;stroke:#fff;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"></path>
                                        </g>
                                        <g transform="translate(316,372)">
                                            <path d="m 0,0 -80,-80 -40,40" style="fill:none;stroke:#fff;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </i>
                    <div>
                        <span class="pt-2 pb-0"> <?php echo $this->getSettingsData()->address; ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-title">
                        <h3>ABOUT US</h3>
                        <div class="boder"></div>
                        <p><?php echo $footer[0]->menu_description; ?><p>
                    </div>
                </div>
               <div class="col-lg-4 col-md-6">
                    <div class="widget-title">
                        <h3>Quick Links</h3>
                        <div class="boder"></div>
                        <ul>
                            <?php foreach($footer as $menu): ?>
                                <?php 
                                    $pageurl = ($menu->menu_module === 'index') ? '' : 'pages/pagedetails/';
                                    if ($menu->menu_module !== 'login'):
                                ?>
                                    <li>
                                        <i class="fa-solid fa-angle-right"></i>
                                        <a href="<?php echo SITEURL . $pageurl . $menu->menu_module; ?>">
                                            <?php echo $menu->menu_name; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget-title">
                        <h3>Logins</h3>
                        <div class="boder"></div>
                        <ul>
                            <?php foreach($footer as $menu): ?>
                                <?php if ($menu->menu_module === 'login'): ?>
                                    <li>
                                        <i class="fa-solid fa-angle-right"></i>
                                        <a href="https://erp.gowtham.org/" target="_blank">
                                            <?php echo $menu->menu_name; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

        <div class="footer-bootom-bar position-relative">
            <div class="container">
                <div class="copyright">
                    <p>Copyright © 2023, <b>Gowtham Model Schools</b> All Rights Reserved.</b></p>
                    <ul class="social-media">
                        <li>
                            <a href="https://www.facebook.com/GMS.Schools" target="_blank"><img src="<?php echo THEMEURL;?>assets/img/fb.png" /></a>
                        </li>
                        <li>
                            <a href="https://x.com/GowthamSchools" target="_blank"><img src="<?php echo THEMEURL; ?>assets/img/tw.png" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div id="progress">
        <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>