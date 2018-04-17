 <!-- Main -->
<div id="main">
    <div class="container">
	<div class="row">
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
                                    <td><?php echo $blogUser->firstName; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td><?php echo $blogUser->lastName; ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td><?php echo $blogUser->email; ?></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $blogUser->username; ?></td>
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
<?php
//}
?>