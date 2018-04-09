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
                            <h2><a href="single-post.html"><?php echo $blogPost->title; ?></a></h2>
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
            </div>
        </div>
    </div>
</div>