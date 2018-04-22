

<!-- Main -->
<div id="main" class="top-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center error-page">
            <h2>Contact us</h2>
            </div>
            <div class="col-md-8">
                <!--Container-->
                <div id="container">
                    <div class="wrap-container">
                        <!-- Content-Box -->
                        <section class="content-box contact-form">
                            <div class="row wrap-box"><!--Start Box-->
                                <h2 class="text-center col-md-12">We look forward to hearing from you!</h2>
                                <div class="contact-form ">
                                    <form name='sentMessage' id='contactForm' method='post' action= "?controller=blogUser&action=create"  enctype="multipart/form-data"><input type='hidden' name='form-name' value='sentMessage'/>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-left">
                                            <div class="form-group">
                                                <input id="name" type="text" placeholder="Name" required="required" name="name"/>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-right">
                                            <div class="form-group">
                                                <input id="email" type="email" placeholder="Email" name="email"  required="required"/>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad-right">
                                            <div class="form-group">
                                                <input id="subject" type="text" placeholder="Subject" required="required" name="subject"/>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                            <div class="form-group">
                                                <textarea name="message" id="message" placeholder="Message"  required></textarea>

                                            </div>
                                            <div id="success"></div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                            <div class="form-group contactus-btn">
                                                <button type="submit" class="cntct-btn" onclick="myFunction()"> Send Message </button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <script>
                                    function myFunction() {
                                    alert("Thanks for your message! We'll respond within the next 48 hours :)");
                                    }
                                    </script>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">

                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div> <!-- End col-8 -->

            <div class="col-md-4">
                <div class="sidebar" id="sidebar">
                    <!-- About -->
                    <section class="blurb">
                        <h2 class="title">ABOUT US</h2>

                        <a href="index.php?controller=pages&action=aboutUs" class="image"><img class="img-responsive" src="views/images/aboutus.jpg" alt="about us" /></a>
                        <div class="author-widget">
                            <h4 class="author-name">J3C</h4>
                            <p>Is the best team from GetIntoTech who created their first MVC project. They share a great passion for coding, teamwork, tears, smiles, gin and cats. Where there is hard work and commitment is J3C.</p>
                        </div>
                        <div class="social">
                            <ul class="icons">
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-instagram"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-youtube-play"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-soundcloud"></i> </a></li>

                            </ul>
                        </div>
                    </section>
                </div> <!-- End Sidebar -->
            </div><!-- End-col-md-4 -->
        </div> <!-- End row -->
    
    <!-- Google maps (centre set to Sky Leeds Dock)-->
    <div class="container" id="map" style="height:400px;width:100%;"></div>   
    </div> <!-- End container for map -->
    
</div> <!-- end container main -->

<!--<div id="instagram-footer">
</div>-->

<!-- Featured Posts -->

<!-- featured-posts-END -->


<!--back-to-top-->


<script>
    function initMap() {
          
      var myLatLng = {lat: 53.789591, lng: -1.5333};
          
      var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 53.789591, lng: -1.5333},
          zoom: 16
          
        });
        
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Sky Leeds'
        });
      }
    </script>
   
    <!-- map variable defines properties for map. var map = .... creates new map inside <div> element --> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrsthx6SjytN7X5hfwab5sINCwjwIATLg&callback=initMap"
    async defer></script>
    <!-- script loads once page loaded -->  