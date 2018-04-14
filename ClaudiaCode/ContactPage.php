
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Developer@Sky | Blogging with Passion</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap -->
    <link rel='stylesheet' href='css/bootstrap.min.css'/>

    <!-- Font Awesome -->
    <link rel='stylesheet' href='css/font-awesome.min.css'/>

    <!-- Main Style -->
    <link rel='stylesheet' href='css/style.css'/>


    <!-- Google Fonts -->
    <link href='/fonts/sky-medium.woff' rel='stylesheet' type='text/css'>
    <link href='/fonts/sky-regular.woff' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="images/sky.jpg"/>
</head>
<body >

<?php require_once 'Header.php'; ?>

<!-- End navigation -->

<!-- Main -->
<div id="main" class="top-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center pad-top-big pad-bottom-big error-page">
            <h2>Contact us</h2>
            </div>
            <div class="col-md-8">
                <!--Container-->
                <div id="container">
                    <div class="wrap-container">
                        <!-- Content-Box -->
                        <section class="content-box contact-form">
                            <div class="row wrap-box"><!--Start Box-->
                                <h2 class="text-center col-md-12">We're looking forward to hear from you</h2>
                                <div class="contact-form ">
                                    <form name='sentMessage' id='contactForm' method='post'><input type='hidden' name='form-name' value='sentMessage' />
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-left">
                                            <div class="form-group">
                                                <input id="name" type="text" placeholder="Name" required="required"/>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-right">
                                            <div class="form-group">
                                                <input id="email" type="email" placeholder="Email"  required="required"/>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad-right">
                                            <div class="form-group">
                                                <input id="subject" type="text" placeholder="Subject" required="required"/>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                            <div class="form-group">
                                                <textarea name="message" id="message" placeholder="Message" required></textarea>

                                            </div>
                                            <div id="success"></div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                            <div class="form-group contactus-btn">
                                                <button type="submit" class="cntct-btn"> Send Message </button>
                                            </div>
                                        </div>
                                    </form>
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

                        <a href="single-post.html" class="image"><img class="img-responsive" src="images/aboutus.jpg" alt="about us" /></a>
                        <div class="author-widget">
                            <h4 class="author-name">J3C</h4>
                            <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
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
        </div><!-- End-col-md-4 -->
    </div> <!-- End row -->
</div> <!-- End Container -->
<div id="instagram-footer">
</div>

<!-- Featured Posts -->
<!-- Google maps (centre set to london)-->
      
    <div id="map" style="height:400px;width:100%;"></div>   
      <!-- Map must be in HTML element --> 
      
<!-- featured-posts-END -->



    <!--back-to-top-->

    <div id="back-to-top">
        <a href="#top"><i class="fa fa-arrow-up"></i></a>
    </div>

    
<!-- End Main -->


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <script>
      
      function initMap() {
          
      var myLatLng = {lat: 53.789591, lng: -1.5333};
          
      var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 53.789591, lng: -1.5333},
          zoom: 15
          
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
<?php require_once 'Footer.php';?>
</body>
</html>