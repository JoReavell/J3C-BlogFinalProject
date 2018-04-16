<!--<p>Here is a list of all products:</p>-->

<?php //foreach($products as $product) { ?>
<!--  <p>
    //<?php //echo $product->name; ?> &nbsp; &nbsp;
    <a href='?controller=product&action=read&id=//<?php //echo $product->id; ?>'>See product information</a> &nbsp; &nbsp;
    <a href='?controller=product&action=delete&id=//<?php //echo $product->id; ?>'>Delete Product</a> &nbsp; &nbsp;
    <a href='?controller=product&action=update&id=//<?php //echo $product->id; ?>'>Update Product</a> &nbsp;
  </p>-->
<?php // } ?>

<?php

?>  

  <!-- Main -->
<div id="main">
    <div class="container">
	<div class="row">
            <div class="col-md-4 ">
		<div class="sidebar" id="sidebar">
		<!-- About -->
                    <section class="blurb">
                        <!-- <h2 class="title">Claudia Danciu</h2> -->
                        <input type="text" name="firstName lastName" value="<?= $blogUser->firstName, $blogUser->lastName; ?>"/>
                            <a href="single-post.html" class="image"><img class="img-responsive" src="images/Dia.jpg" alt="about us" /></a>
                                <div class="author-widget">
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

					</ul>
                                    </div>
                    </section>
                </div> <!-- End Sidebar -->
            </div><!-- End-col-md-4 -->
            <div class="col-md-8">
                <article class="post">
                    <header>
                       <div class="title">
                            <!-- <h2><a href="single-post.html">MY ACCOUNT</a></h2> -->
                            <h2>MY ACCOUNT</h2>
			</div>
                    </header>
                        <div> 
                        <table class="table table-user-information" action= "?controller=blogUser&action=viewMyAccount&id=<?php echo $blogUser->id ;?>">
                            <tbody>
                                <tr>
                                    <td>First Name:</td>
                                    <td><input type="text" name="firstName" value="<?= $blogUser->firstName; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td><input type="text" name="lastName" value="<?= $blogUser->lastName; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td><input type="text" name="email" value="<?= $blogUser->email; ?>"/></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" value="<?= $blogUser->username; ?>"/></td>
                                </tr>
                      
                            </tbody>
                        </table>
                            <div style="margin-top: 15%">
                  <a href="#" class="btn btn-sm">Delete my account</a>
                  <a href="#" class="btn btn-primary">Update my account</a>
                            </div>
                </div>
			<p style="margin-bottom: 10%"></p>			
					</article>
                                </div>
				
					<!-- Post -->
					 
                  

				
			</div> <!-- End row -->
		</div> <!-- End Container -->
		
		<!--back-to-top-->


		
	</div><!-- End Main -->
        