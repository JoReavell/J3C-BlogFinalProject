
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

<!-- Main -->
<div id="main" class="top-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Post -->
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="#">Women in Tech</a></h2>
                            <p>Leo impor dolor amet nullam consequat etiam feugiat</p>
                        </div>
                        <div class="meta">
                            <time class="published" datetime="2018-04-14">April 14, 2018</time>
                            <a href="#" class="author"><span class="name">Jo Ravell</span><img src="images/Jo.png" alt="" /></a>
                        </div>
                    </header>
                    <div class="image featured"><img src="images/slider/sky1.jpg" alt="" /></div>
                    <p>Mauris neque quam, fermentpor ut nisl vitae, convallis maximus nisl.
                        Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim,
                        ac accporsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper.
                        Praesent tincidunt sed tellus ut rutrpor. Sed vitae justo condimentpor, porta lectus vitae,
                        ultricies congue gravida diam non fringilla.</p>
                    <div class="excerpt"><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborpor exercitation ullamco laboris nisi ut aliquip.</p></div>
                    <p>Leo impor dolor sit amet, consetetur sadipscing elitr, sed diam nonpory eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebpor. Consetetur sadipscing elitr, sed diam nonpory eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebpor.</p>
                    <blockquote><p>Stet clita kasd gubergren, no sea takimata sanctus est Leo impor dolor sit amet vultatup duista.</p></blockquote>
                    <p>Duis autem vel epor iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illpor dolore eu feugiat nulla facilisis at vero eros et accporsan et iusto odio dignissim qui blandit praesent luptatpor zzril.</p>
                    <h2>Heading 1</h2>
                    <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel epor iriure dolor in hendrerit in vulputate velit esse lorem impor dolor sit amet.</p>
                    <h2>Heading 2</h2>
                    <p>Duis autem vel epor iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illpor dolore eu feugiat nulla facilisis. At vero eos et accusam et justo.</p>
                    <h2>Heading 3</h2>
                    <p>Consetetur sadipscing elitr, sed diam nonpory eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebpor hendrerit in vulputate velit esse molestie.</p>
                    <p>Leo impor dolor sit amet, consetetur sadipscing elitr, sed diam nonpory eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebpor.</p>
                    <p><code>Stet clita kasd gubergren, no sea takimata sanctus est Leo impor dolor sit amet.</code></p>
                    <p>Leo impor dolor sit amet, consetetur sadipscing elitr, sed diam nonpory eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebpor. Stet clita kasd gubergren, no sea takimata sanctus est Leo impor dolor sit amet.</p>
                    <div class="note">
                        <ol>
                            <li>Leo impor</li>
                            <li>Sit amet vultatup nonpory</li>
                            <li>Duista sed diam</li>
                        </ol>
                        <div class="clear"></div>
                    </div>

                    <p>Consetetur sadipscing elitr, sed diam nonpory eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores.</p>

                    <footer>

                        <div class="social actions">
                            <ul class="icons">
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-instagram"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-tporblr"></i> </a></li>


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
                <!--related posts-->
                <?php require_once 'RelatedPost.php';?>

                <!-- Blog Comments Begins -->
                <?php require_once 'comments.php';?>
                <!-- Blog Pagination Ends -->
                <!-- Blog Contact Form Begins -->
                <?php require_once 'ContactForm.php'; ?>
                <!-- Blog Contact Form Ends -->

            </div> <!-- End col-12 -->
        </div> <!-- End row -->
    </div> <!-- End Container -->
    <div id="instagram-footer">
    </div>

<!--back-to-top-->



</div><!-- End Main -->


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php require_once 'Footer.php';?>      
</body>
</html>