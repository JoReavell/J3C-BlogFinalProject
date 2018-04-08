
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

<?php require_once 'Header.php';?>

<!-- End navigation -->

<!-- Main -->
<div id="main" class="top-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Post -->
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="#">Come to sky</a></h2>
                            <p>Leo reco dolor amet nullam consequat etiam feugiat</p>
                        </div>
                        <div class="meta">
                            <time class="published" datetime="2018-04-20">April 20, 2018</time>
                            <a href="#" class="author"><span class="name">Claudia Danciu</span><img src="images/Dia.jpg" alt="" /></a>
                        </div>
                    </header>
                    <div class="image featured"><img src="images/skygirl.jpg" alt="" /></div>
                    <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl.
                        Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim,
                        ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper.
                        Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae,
                        ultricies congue gravida diam non fringilla.</p>
                    <div class="excerpt"><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum exercitation ullamco laboris nisi ut aliquip.</p></div>
                    <p>Leo reco dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                    <blockquote><p>Stet clita kasd gubergren, no sea takimata sanctus est Leo reco dolor sit amet vultatup duista.</p></blockquote>
                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril.</p>
                    <h2>Heading 1</h2>
                    <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse lorem ipLeo reco dolor sit amet.</p>
                    <h2>Heading 2</h2>
                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo.</p>
                    <h2>Heading 3</h2>
                    <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum hendrerit in vulputate velit esse molestie.</p>
                    <p>Leo reco dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                    <p><code>Stet clita kasd gubergren, no sea takimata sanctus est Leo reco dolor sit amet.</code></p>
                    <p>Leo reco dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Leo reco dolor sit amet.</p>
                    <div class="note">
                        <ol>
                            <li>Leo reco</li>
                            <li>Sit amet vultatup nonumy</li>
                            <li>Duista sed diam</li>
                        </ol>
                        <div class="clear"></div>
                    </div>

                    <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores.</p>

                    <footer>

                        <div class="social actions">
                            <ul class="icons">
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-instagram"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i> </a></li>


                            </ul>
                        </div>

                        <ul class="stats">
                            <li><a href="#">General</a></li>
                            <li><a href="#" class="icon fa fa-heart">28</a></li>
                            <li><a href="#" class="icon fa fa-comment">128</a></li>
                        </ul>
                    </footer>
                </article>


                <!-- Pagination -->
                <ul class="actions pagination">
                    <li><a href="" class="disabled button big previous">Previous Post</a></li>
                    <li><a href="#" class="button big next">Next Post</a></li>
                </ul>
                <?php require_once 'RelatedPost.php';?>

                <!-- Blog Comments Begins -->
                <?php require_once 'comments.php'; ?>
                <!-- Blog Pagination Ends -->
                <!-- Blog Contact Form Begins -->
                <?php require_once 'ContactForm.php';?>
                <!-- Blog Contact Form Ends -->

            </div> <!-- End col-8 -->
            
            
        </div><!-- End-col-md-4 -->
    </div> <!-- End row -->
</div> <!-- End Container -->
<?php require_once 'rightAboutPosts.php';?>
<div id="instagram-footer">
</div>



    <!--back-to-top-->

    <div id="back-to-top">
        <a href="#top"><i class="fa fa-arrow-up"></i></a>
    </div>

    
    <div class="container-fluid">
<?php require_once 'Footer.php';?>
    </div>

<!-- End Main -->


</body>
</html>