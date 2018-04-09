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
             <img class="d-block w-100" src="views/images/slider/sky1.jpg" alt="First slide">
               <div class="feat-overlay">
                 <div class="carousel-caption d-none d-md-block carousel-title feat-inner ">
                  <h2><a href="">We learned how to be a team</a></h2>

                 </div>
               </div>
           </div>

             <div class="carousel-item carouseltop">
               <img class="d-block w-100" src="views/images/slider/sky2.jpg" alt="Second slide">
               <div class="feat-overlay">
                 <div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                     <h2><a href="single-post.html">We learned in an agile way</a></h2>
                 </div>
               </div>
           </div>


             <div class="carousel-item carouseltop">
                 <img class="d-block w-100" src="views/images/slider/sky3.jpg" alt="Third slide">
                     <div class="feat-overlay">
                         <div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                             <h2><a href="">We started from scratch</a></h2>

                         </div>
                     </div>
             </div>

             <div class="carousel-item carouseltop">
                 <img class="d-block w-100" src="views/images/slider/victoria.png" alt="Forth slide">
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
                        <img src="views/images/skygirl.jpg" alt="featured-post">
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
                        <img src="views/images/skyfaith.jpg" alt="featured-post">
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
                        <img src="views/images/skycode.jpg" alt="featured-post">
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
                <!-- Post -- Loop through all the blog posts and display each one-->
                <?php foreach($blogPosts as $blogPost) { ?>
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="index.php?controller=blogPost&action=read&id=<?php echo $blogPost->id ; ?>"><?php echo $blogPost->title; ?></a></h2>
                            <p><?php echo $blogPost->summary; ?></p>
                        </div>
                        <div class="meta">
                            <time class="published" datetime="2018-04-07"><?php echo $blogPost->dateCreated; ?></time>
                            <a href="#" class="author"><span class="name"><?php echo $blogPost->author; ?></span><img src="views/images/<?php echo $blogPost->image; ?>" alt="" /></a>
                        </div>                                                   
                    </header>
                    <a href="#" class="image featured"><img src="views/images/<?php echo $blogPost->image; ?>" alt="" /></a>
                        <p><?php echo $blogPost->mainContent; ?></p>
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
                <?php } ?>
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

                            <a href="#" class="image"><img class="img-responsive" src="views/images/aboutus.jpg" alt="about us" /></a>
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
                                            <a href="#" class="author"><img src="views/images/Jo.png" alt="" /></a>
                                    </header>
                                <a href="#" class="image"><img src="views/images/women in tech.jpg" alt="" /></a>
                            </article>

                            <!-- Mini Post -->
                            <article class="mini-post">
                                    <header>
                                            <h3><a href="#">Did we learned more than coding?</a></h3>
                                            <time class="published" datetime="2018-04-19">April 19, 2018</time>
                                            <a href="#" class="author"><img src="views/images/JenPat.png" alt="" /></a>
                                    </header>
                                <a href="#" class="image"><img src="views/images/learnedMoreThan.jpg" alt="" /></a>
                            </article>

                            <!-- Mini Post -->
                            <article class="mini-post">
                                    <header>
                                            <h3><a href="#">How women in tech program changed my life</a></h3>
                                            <time class="published" datetime="2018-04-18">April 18, 2018</time>
                                            <a href="#" class="author"><img src="images/Jenny.png" alt="" /></a>
                                    </header>
                                    <a href="#" class="image"><img src="views/images/sky-feel.jpeg" alt="" /></a>
                            </article>

                            <!-- Mini Post -->
                            <article class="mini-post">
                                    <header>
                                            <h3><a href="#">How do I feel about this last project</a></h3>
                                            <time class="published" datetime="2018-04-17">April 17, 2018</time>
                                            <a href="#" class="author"><img src="views/images/Dia.jpg" alt="" /></a>
                                    </header>
                                <a href="#" class="image"><img src="views/images/skyToday.jpeg" alt="" /></a>
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
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                            <li>
                                <article>
                                        <header>
                                                <h3><a href="#">Why is fun to code?</a></h3>
                                                <time class="published" datetime="2018-04-15">April 15, 2018</time>
                                        </header>
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                            <li>
                                <article>
                                        <header>
                                                <h3><a href="#">How do we feel after our last project?</a></h3>
                                                <time class="published" datetime="2018-04-15">April 15, 2018</time>
                                        </header>
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                            <li>
                                <article>
                                        <header>
                                                <h3><a href="#">Why we love our team?</a></h3>
                                                <time class="published" datetime="2018-04-14">April 14, 2018</time>
                                        </header>
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                        </ul>
                    </section>

                    <section>
                            <div class="widget">
                                    <h2 class="title">INSTAGRAM</h2>
                                    <div class="widget-content">
                                            <div class="row instagram-feeds row-gallery">
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/teamwork.jpg"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skyfaith.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3 "><img src="views/images/slider/sky2.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/slider/sky3.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/slider/victoria.png" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/learnedMoreThan.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skyfaith.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skycode.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skyfaith.jpg" alt="Instagram Image"></a>
                                            </div>
                                    </div>
                            </div>
                    </section> <!-- End inta -->

                </div> <!-- End Sidebar -->
            </div><!-- End-col-md-4 -->
        </div> <!-- End row -->
    </div> <!-- End Container -->
</div>