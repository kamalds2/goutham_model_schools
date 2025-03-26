
<?php 
    $settingsData = $this->getSettingsData(); 
    $menus = $this->getMenuDetails();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gowtham Model Schools</title>
    <meta name="description" content="Gowtham Model School (GMS), promoted by Sri M. Venkatanarayana and managed by Sri Gowtham Academy of General & Technical Education, is one of the biggest names in the educational services sector in Andhra Pradesh and Telangana. GMS has been ranked as one of the largest group in terms of number of schools and students.">
    <meta name="keywords" content="Gowtham Model School (GMS), Inquiry today about admissions at top most CBSE school">
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <meta name="robots" content="follow, index, notranslate" />
    <meta property="og:site_name" content="Gowtham Model School" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://gowtham.org/" />
    <meta property="og:title" content="Gowtham Model School" />
    <meta property="og:description" content="Gowtham Model School (GMS), promoted by Sri M. Venkatanarayana and managed by Sri Gowtham Academy of General & Technical Education, is one of the biggest names in the educational services sector in Andhra Pradesh and Telangana. GMS has been ranked as one of the largest group in terms of number of schools and students." />
    <meta property="og:image" content="<?php echo THEMEURL;?>assets/img/og_img.png" />
    <meta name="og:card" content="<?php echo THEMEURL;?>assets/img/og_img.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="twitter:title" content="Gowtham Model School" />
    <meta property="twitter:description" content="Gowtham Model School (GMS), promoted by Sri M. Venkatanarayana and managed by Sri Gowtham Academy of General & Technical Education, is one of the biggest names in the educational services sector in Andhra Pradesh and Telangana. GMS has been ranked as one of the largest group in terms of number of schools and students." />
    <meta property="twitter:image" content="https://vyz.bz/gowthammodelschools/assets/img/og_img.png"/>

    <link rel="icon" href="<?php echo THEMEURL;?>assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo THEMEURL;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/css/responsive.css">
</head>
<body>
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="row top-bar-slid">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-6">
                        <div class="phone-data">
                            <div class="phone d-flax align-items-center">
                                <i>
                                    <svg height="112" viewBox="0 0 24 24" width="112" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-rule="evenodd" fill="rgb(255255,255)" fill-rule="evenodd">
                                            <path d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z"></path>
                                            <path d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z"></path>
                                            <path d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z"></path>
                                        </g>
                                    </svg>
                                </i>
                                <span><b>Phone:</b> </span><a class="me-3" href="tel:+914035174598"> <?php echo $this->getSettingsData()->toll_free_no; ?></a>
                            </div>
                            <div class="phone">
                                <i>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <path d="M0,81v350h512V81H0z M456.952,111L256,286.104L55.047,111H456.952z M30,128.967l134.031,116.789L30,379.787V128.967z
                   M51.213,401l135.489-135.489L256,325.896l69.298-60.384L460.787,401H51.213z M482,379.788L347.969,245.756L482,128.967V379.788z"></path>
                                    </svg>
                                </i>
                                <span><b>Email:</b></span> <a href="mallto:<?php echo $this->getSettingsData()->email;?>"> <?php echo $this->getSettingsData()->email; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                            <div class="time">
                            <div class="login d-flex align-items-center">
                                <i class="fa-solid fa-map-marker-alt"></i>
                                <p><b>Address:</b> <?php echo $this->getSettingsData()->address; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="bottom-bar">
            <div class="container">
                <div class="row d-flex align-items-center ">
                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-4">
                        <a href="<?php echo SITEURL;?>"><img src="<?php echo UPLOADURL.'settings/'.$settingsData->logo; ?>" alt="logo" class="logo"></a>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-8">
                        <nav class="navbar">
                    <ul class="navbar-links">
                        <?php foreach($menus as $menu){  
                            $pageurl='pages/pagedetails/';
                            if($menu->menu_module == 'index'){ $pageurl = '';}?>
                        <li><a href="<?php echo SITEURL.$pageurl.$menu->menu_module;?>"><?php echo $menu->menu_name;?></a></li>
                      <?php  } ?>
                        <li><a href="<?php echo SITEURL.'pages/pagedetails/contact'?>" class="lightbox-toggle sec-btn">Enquiry Now</a></li>
                    </ul>
                </nav>
                <div class="bar-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </header>