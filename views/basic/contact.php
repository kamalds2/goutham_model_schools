
 <?php $i=1;
${"page" . $i}=[];
 foreach($this->pages->res as $page){
${"page" . $i} = $page;
$i++;}
?>

<?php echo $page1->page_description; ?>

 <section class="gap">
        <div class="container">
             <div class="row">
                <div class="col-lg-4">
                 <?php echo $page2->page_description; ?>
   </div>
<div class="col-lg-8 pt-3 pt-sm-0">
                    <h2>We love to hear from you</h2>
                    <p>Call us to book a meetup or send us emails to request for service consultation.</p>
                        <form class="pt-3" id="contact_form" action="<?php echo SITEURL.'pages/addContactDetails'?>" method="post">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                               
                                                <label for="name" class="form-label">Name*</label>
                                                <input type="text" class="form-control" id="name" placeholder="Write your name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="mail" class="form-label">Your Email*</label>
                                                <input type="email" class="form-control" id="mail" placeholder="name@youremail.com" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="phone" class="form-label">Phone Number*</label>
                                                <input type="text" class="form-control" id="phone" placeholder="Write Valid Number" name="mobile_no">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="sub" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="sub" placeholder="Write Subject" name="subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-group">
                                                <label for="msg" class="form-label">Message</label>
                                                <textarea style="height:150px;" class="form-control" id="msg" name="message" placeholder="Write Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" value="submit" class="btn sec-btn">Submit</button>
                                        </div>
                                    </div>
                                </form>
                </div>
            </div>


            
        </div>
    </section>


   <!-- <section class="breadcrumb_sec story">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-sm-6 text-center content">
                    <p><a href="index.html">Home</a> <i class="far fa-circle"></i> Contact Us</p>
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="gap">
        <div class="container">
             <div class="row">
                <div class="col-lg-4">
                    <div class="position-relative">
                        <h2>Contact Info</h2>
                        <address>
                            <ul class="contact_details">
                                <li class="address">#10-2-249/250, GVR's Lakshmi Nivas, Street No. 6, West Marredpally, Secunderabad-500026.</li>
                                <li class="email">info@gowtham.org, support@gowtham.org</li>
                                <li class="phone">+91 40 35174598, 35181449, Mobile No : 8096992222</li>
                            </ul>
                        </address>
                    </div>
                </div>
                <div class="col-lg-8 pt-3 pt-sm-0">
                    <h2>We love to hear from you</h2>
                    <p>Call us to book a meetup or send us emails to request for service consultation.</p>
                        <form class="pt-3" id="contact_form" action="" method="post">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="name" class="form-label">Name*</label>
                                                <input type="text" class="form-control" id="name" placeholder="Write your name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="mail" class="form-label">Your Email*</label>
                                                <input type="email" class="form-control" id="mail" placeholder="name@youremail.com" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="phone" class="form-label">Phone Number*</label>
                                                <input type="text" class="form-control" id="phone" placeholder="Write Valid Number" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="sub" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="sub" placeholder="Write Subject" name="sub">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-group">
                                                <label for="msg" class="form-label">Message</label>
                                                <textarea style="height:150px;" class="form-control" id="msg" name="msg" placeholder="Write Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" value="submit" class="btn sec-btn">Submit</button>
                                        </div>
                                    </div>
                                </form>
                </div>
            </div>


            
        </div>
    </section>-->
    