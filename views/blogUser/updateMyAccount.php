 <!-- Main -->
 <form id="updateAccount" method="post" enctype="multipart/form-data" action= "?controller=blogUser&action=updateMyAccount">
<div id="main">
    <div class="container">
	<div class="row">
            <div class="col-md-4 ">
		<div class="sidebar" id="sidebar">
		<!-- About -->
                    <section class="blurb">
                        <h2 class="title"><?php echo $blogUser->firstName;?></h2>
                            <a href="#" class="image"><img class="img-responsive" src="views/images/<?php echo $blogUser->profilePic ?>" alt="<?php echo $blogUser->profilePic; ?>" /></a>
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
                            <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
            <input type="file" name="image" class="btn" required />
        </div>
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
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
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>First Name:</td>
                                    <td><input type="text" name="firstname" placeholder="First name" value="<?= $blogUser->firstName; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td><input type="text" name="lastname" placeholder="Last name" value="<?= $blogUser->lastName; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td><input type="text" name="email" placeholder="email" value="<?= $blogUser->email; ?>"/></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?= $blogUser->username; ?></td>
                                </tr>
                            </tbody>
                        </table>
                            <div style="margin-top: 15%">
                  
                  <a href="#" onclick="document.getElementById('updateAccount').submit()" class="btn btn-primary">Update my account</a>
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
 </form>