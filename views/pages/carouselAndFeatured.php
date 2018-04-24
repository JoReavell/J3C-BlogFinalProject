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
                  <h2><a href="http://localhost/blogFinalProject/index.php?controller=blogPost&action=read&id=39">We learned how to be a team</a></h2>

                 </div>
               </div>
           </div>

             <div class="carousel-item carouseltop">
               <img class="d-block w-100" src="views/images/slider/sky2.jpg" alt="Second slide">
               <div class="feat-overlay">
                 <div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                     <h2><a href="http://localhost/blogFinalProject/index.php?controller=blogPost&action=read&id=33">We learned in an agile way</a></h2>
                 </div>
               </div>
           </div>


             <div class="carousel-item carouseltop">
                 <img class="d-block w-100" src="views/images/slider/sky3.jpg" alt="Third slide">
                     <div class="feat-overlay">
                         <div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                             <h2><a href="http://localhost/blogFinalProject/index.php?controller=blogPost&action=read&id=32">We started from scratch</a></h2>

                         </div>
                     </div>
             </div>

             <div class="carousel-item carouseltop">
                 <img class="d-block w-100" src="views/images/slider/victoria.png" alt="Forth slide">
                     <div class="feat-overlay">
                         <div class="carousel-caption d-none d-md-block carousel-title feat-inner">
                             <h2><a href="http://localhost/blogFinalProject/index.php?controller=blogPost&action=read&id=36">We've had a great teacher</a></h2>
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
    
<!-- JavaScript for the carousel -->

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
<!-- End Carousel-->              
<!-- Featured Posts -->
<section class="featured-posts">
    <div class="container">
        <div class="row">
                        <h4 class="heading col-lg-12 col-md-12">
                       <span>The Women in Tech Programme</span>
                    </h4>

            <div class="col-md-4">
                <div class="featured-post">
                    <div class="featured-post-image">
                        <img src="views/images/slider/AppDay.jpg" style="max-height: 200px"
                            alt="featured-post">
                    </div>
                    <div class="featured-post-title">
                        <h3><a href="http://localhost/blogFinalProject/index.php?controller=blogPost&action=read&id=30">Insight Day</a></h3>
                        <time datetime="2017" class="post-date">December 6, 2017</time>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featured-post">
                    <div class="featured-post-image">
                        <img src="views/images/slider/TheProgram.jpg" style="max-height: 200px" alt="featured-post">
                    </div>
                    <div class="featured-post-title">
                        <h3><a href="http://localhost/blogFinalProject/index.php?controller=blogPost&action=read&id=44">The programme</a></h3>
                        <time datetime="2018" class="post-date">January 15, 2018</time>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featured-post">
                    <div class="featured-post-image">
                        <img src="views/images/slider/tod.jpg"  style="max-height: 200px" alt="featured-post" >
                    </div>
                    <div class="featured-post-title">
                        <h3><a href="http://localhost/blogFinalProject/index.php?controller=blogPost&action=read&id=45#">Today</a></h3>
                        <time datetime="2018" class="post-date">April 25, 2018</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- featured-posts-END -->
