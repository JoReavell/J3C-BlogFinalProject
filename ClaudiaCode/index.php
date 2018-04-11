<?php
// Initialize the session (don't forget to close it on logout)
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Login/Login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Developer@Sky | Blogging Our Experience</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Bootstrap -->
	<!--<link rel='stylesheet' href='css/bootstrap.min.css'/>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel='stylesheet' href='css/font-awesome.min.css'/>

	<!-- Main Style -->
        <link href="css/cssnewlog.css" rel="stylesheet" type="text/css"/>


	<!-- Google Fonts -->
	<link href='/fonts/sky-medium.woff' rel='stylesheet' type='text/css'>
	<link href='/fonts/sky-regular.woff' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="images/sky.jpg"/>
</head>
<body >
    
    <?php 
    require_once 'Header.php';
    ?>
       <!-- Carousel-->
       <section class="slide"> 
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide carouseltop" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active carouseltop"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3" ></li>
                </ol>
                
                <div class="carousel-inner carouseltop">
                  <div class="carousel-item active carouseltop">
                    <img class="d-block w-100" src="images/slider/sky1.jpg" alt="First slide">
                      <div class="feat-overlay">
                        <div class="carousel-caption d-none d-md-block carousel-title feat-inner ">
                         <h2><a href="">We learned how to be a team</a></h2>
                            
			</div>
                      </div>
                  </div>
                  
                    <div class="carousel-item carouseltop">
                      <img class="d-block w-100" src="images/slider/sky2.jpg" alt="Second slide">
                      <div class="feat-overlay">
			<div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                            <h2><a href="single-post.html">We learned in an agile way</a></h2>
                        </div>
                      </div>
                  </div>
                    
                     
                    <div class="carousel-item carouseltop">
                        <img class="d-block w-100" src="images/slider/sky3.jpg" alt="Third slide">
                            <div class="feat-overlay">
				<div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                                    <h2><a href="">We started from scratch</a></h2>
					
				</div>
                            </div>
                    </div>
                    
                    <div class="carousel-item carouseltop">
                        <img class="d-block w-100" src="images/slider/victoria.png" alt="Forth slide">
                            <div class="feat-overlay">
                                <div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                                    <h2><a href="">We've had a great teacher</a></h2>
                                </div>
                            </div>
                    </div>
                    </div>
                
                
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
            </div>
                  
        </div>
       </section> 
        <!-- End Carousel-->              
              
		<!-- Featured Posts -->
		        <section class="featured-posts">
		            <div class="container">
		                <div class="row">
						<h4 class="heading col-lg-12 col-md-12">
					       <span>The Women in Tech Program</span>
					    </h4>
                                    
		                    <div class="col-md-4">
		                        <div class="featured-post">
		                            <div class="featured-post-image">
		                                <img src="images/skygirl.jpg" alt="featured-post">
		                            </div>
		                            <div class="featured-post-title">
		                                <h3><a href="#">The application moment</a></h3>
		                                <time datetime="2017" class="post-date">October 30, 2017</time>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                        <div class="featured-post">
		                            <div class="featured-post-image">
		                                <img src="images/skyfaith.jpg" alt="featured-post">
		                            </div>
		                            <div class="featured-post-title">
		                                <h3><a href="#">The program</a></h3>
		                                <time datetime="2018" class="post-date">January 15, 2018</time>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                        <div class="featured-post">
		                            <div class="featured-post-image">
		                                <img src="images/skycode.jpg" alt="featured-post">
		                            </div>
		                            <div class="featured-post-title">
		                                <h3><a href="#">Today</a></h3>
		                                <time datetime="2018" class="post-date">April 20, 2018</time>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </section><!-- featured-posts-END -->

	<!-- Main -->
	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Post -->
					<article class="post">
						<header>
							<div class="title">
								<h2><a href="single-post.html">First day @ SKY</a></h2>
								<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
							</div>
							<div class="meta">
								<time class="published" datetime="2018-04-07">April 7, 2018</time>
								<a href="#" class="author"><span class="name">Jen Patchett</span><img src="images/JenPat.png" alt="" /></a>
							</div>
                                                   
						</header>
                                            <a href="single-post.html" class="image featured"><img class="home-img-blog" src="images/skyfood.jpg" alt="" /></a>
						<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
						<footer>
							<ul class="actions">
								<li><a href="single-post.html" class="button big">Spend 3 min reading</a></li>
							</ul>
							<ul class="stats">
								<li><a href="#">General</a></li>
								<li><a href="#" class="icon fa fa-heart">28</a></li>
								<li><a href="#" class="icon fa fa-comment">128</a></li>
							</ul>
						</footer>
					</article>

					<!-- Post -->
					<article class="post">
						<header>
							<div class="title">
								<h2><a href="single-post.html">How my programmer life improved after the immersion week @ Sky</a></h2>
								<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
							</div>
							<div class="meta">
								<time class="published" datetime="2018-04-10">April 10, 2017</time>
                                                                <a href="#" class="author"><span class="name">Jo Reavell</span><img src="images/Jo.png" alt="" /></a>
							</div>
						</header>
                                            <a href="single-post.html" class="image featured"><img src="images/hello-world.jpg" alt="" /></a>
						<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper.</p>
						<footer>
							<ul class="actions">
								<li><a href="single-post.html" class="button big">Spend 5 min reading</a></li>
							</ul>
							<ul class="stats">
								<li><a href="#">General</a></li>
								<li><a href="#" class="icon fa fa-heart">28</a></li>
								<li><a href="#" class="icon fa fa-comment">128</a></li>
							</ul>
						</footer>
					</article>

					<!-- Post -->
					<article class="post">
						<header>
							<div class="title">
								<h2><a href="single-post.html">My experience in a team project</a></h2>
								<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
							</div>
							<div class="meta">
								<time class="published" datetime="2018-04-14">April 14, 2017</time>
                                                                <a href="#" class="author"><span class="name">Jenny O'Leary</span><img src="images/Jenny.png" alt="" /></a>
							</div>
						</header>
                                            <a href="single-post.html" class="image featured"><img src="images/teamwork.jpg" alt="" /></a>
						<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Cras vehicula tellus eu ligula viverra, ac fringilla turpis suscipit. Quisque vestibulum rhoncus ligula.</p>
						<footer>
							<ul class="actions">
								<li><a href="single-post.html" class="button big">Spend 2 min reading</a></li>
							</ul>
							<ul class="stats">
								<li><a href="#">General</a></li>
								<li><a href="#" class="icon fa fa-heart">28</a></li>
								<li><a href="#" class="icon fa fa-comment">128</a></li>
							</ul>
						</footer>
					</article>
                                        
                                        <article class="post">
						<header>
							<div class="title">
								<h2><a href="single-post.html">How do I feel today after this experience? </a></h2>
								<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
							</div>
							<div class="meta">
								<time class="published" datetime="2018-04-17">April 17, 2018</time>
                                                                <a href="#" class="author"><span class="name">Claudia Danciu</span><img src="images/Dia.jpg" alt="" /></a>
							</div>
						</header>
                                            <a href="single-post.html" class="image featured"><img src="images/skyfeel.jpg" alt="" /></a>
						<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper.</p>
						<footer>
							<ul class="actions">
								<li><a href="single-post.html" class="button big">Spend 5 min reading</a></li>
							</ul>
							<ul class="stats">
								<li><a href="#">General</a></li>
								<li><a href="#" class="icon fa fa-heart">28</a></li>
								<li><a href="#" class="icon fa fa-comment">128</a></li>
							</ul>
						</footer>
					</article>
                                        
                                <!-- Pagination -->
                                <ul class="actions pagination">
                                        <li><a href="" class="disabled button big previous">Previous Page</a></li>
                                        <li><a href="#" class="button big next">Next Page</a></li>
                                </ul>
				</div> <!-- End col-8 -->

				<div class="col-md-4">
					<div class="sidebar" id="sidebar">
						<!-- About -->
						<section class="blurb">
							<h2 class="title">ABOUT US</h2>

                                                        <a href="single-post.html" class="image"><img class="img-responsive" src="images/aboutus.jpg" alt="about us" /></a>
							<div class="author-widget">
								<h4 class="author-name">J3C Team</h4>
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

						<!-- Mini Posts -->
						<section>
							<h2 class="title">POPULAR POSTS</h2>
							<div class="mini-posts">

								<!-- Mini Post -->
								<article class="mini-post">
									<header>
										<h3><a href="#">Why we loved this program</a></h3>
										<time class="published" datetime="2018-04-20">April 20, 2018</time>
                                                                                <a href="#" class="author"><img src="images/Jo.png" alt="" /></a>
									</header>
                                                                    <a href="#" class="image"><img src="images/women in tech.jpg" alt="" /></a>
								</article>

								<!-- Mini Post -->
								<article class="mini-post">
									<header>
										<h3><a href="#">Did we learned more than coding?</a></h3>
										<time class="published" datetime="2018-04-19">April 19, 2018</time>
                                                                                <a href="#" class="author"><img src="images/JenPat.png" alt="" /></a>
									</header>
                                                                    <a href="#" class="image"><img src="images/learnedMoreThan.jpg" alt="" /></a>
								</article>

								<!-- Mini Post -->
								<article class="mini-post">
									<header>
										<h3><a href="#">How women in tech program changed my life</a></h3>
										<time class="published" datetime="2018-04-18">April 18, 2018</time>
                                                                                <a href="#" class="author"><img src="images/Jenny.png" alt="" /></a>
									</header>
									<a href="#" class="image"><img src="images/sky-feel.jpeg" alt="" /></a>
								</article>

								<!-- Mini Post -->
								<article class="mini-post">
									<header>
										<h3><a href="#">How do I feel about this last project</a></h3>
										<time class="published" datetime="2018-04-17">April 17, 2018</time>
                                                                                <a href="#" class="author"><img src="images/Dia.jpg" alt="" /></a>
									</header>
                                                                    <a href="#" class="image"><img src="images/skyToday.jpeg" alt="" /></a>
								</article>
							</div>
						</section>
						<!-- Posts List -->
						<section>
							<h2 class="title">LATEST POSTS</h2>
							<ul class="posts">
								<li>
									<article>
										<header>
											<h3><a href="#">How to create a blog from scratch</a></h3>
											<time class="published" datetime="2018-04-16">April 16, 2018</time>
										</header>
                                                                            <a href="#" class="image"><img src="images/Jo.png" alt="" /></a>
									</article>
								</li>
								<li>
									<article>
										<header>
											<h3><a href="#">Why is fun to code?</a></h3>
											<time class="published" datetime="2018-04-15">April 15, 2018</time>
										</header>
                                                                            <a href="#" class="image"><img src="images/Jo.png" alt="" /></a>
									</article>
								</li>
								<li>
									<article>
										<header>
											<h3><a href="#">How do we feel after our last project?</a></h3>
											<time class="published" datetime="2018-04-15">April 15, 2018</time>
										</header>
                                                                            <a href="#" class="image"><img src="images/Jo.png" alt="" /></a>
									</article>
								</li>
								<li>
									<article>
										<header>
											<h3><a href="#">Why we love our team?</a></h3>
											<time class="published" datetime="2018-04-14">April 14, 2018</time>
										</header>
                                                                            <a href="#" class="image"><img src="images/Jo.png" alt="" /></a>
									</article>
								</li>
							</ul>
						</section>

						<section>
							<div class="widget">
								<h2 class="title">INSTAGRAM</h2>
								<div class="widget-content">
									<div class="row instagram-feeds row-gallery">
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/teamwork.jpg"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/skyfaith.jpg" alt="Instagram Image"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3 "><img src="images/slider/sky2.jpg" alt="Instagram Image"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/slider/sky3.jpg" alt="Instagram Image"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/slider/victoria.png" alt="Instagram Image"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/learnedMoreThan.jpg" alt="Instagram Image"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/skyfaith.jpg" alt="Instagram Image"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/skycode.jpg" alt="Instagram Image"></a>
                                                                            <a href="#" class="col-sm-4 col-xs-3"><img src="images/skyfaith.jpg" alt="Instagram Image"></a>
									</div>
								</div>
							</div>
						</section> <!-- End inta -->

					</div> <!-- End Sidebar -->
				</div><!-- End-col-md-4 -->
			</div> <!-- End row -->
		</div> <!-- End Container -->
		<div id="instagram-footer">
		</div>

		<!--back-to-top-->

		<div id="back-to-top">
			<a href="#top"><i class="fa fa-arrow-up"></i></a>
		</div>

		<?php 
    require_once 'Footer.php';
    ?>
	</div><!-- End Main -->
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        
        
        
        <script type="text/javascript">
            $(document).ready(function(){
                $(".start-slide").click(function(){
                    $("#myCarousel").carousel('cycle');
                });
            });
            $(document).ready(function(){
                $(".prev-slide").click(function(){
                    $("#myCarousel").carousel('prev');
                });
            });
            $(document).ready(function(){
                $(".next-slide").click(function(){
                    $("#myCarousel").carousel('next');
                });
            });
        </script>
        



</body>
</html>