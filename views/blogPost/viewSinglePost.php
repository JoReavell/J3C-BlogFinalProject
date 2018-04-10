<!-- Main -->
<div id="main" class="top-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Post -->
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="#"><?php echo $blogPost->title; ?></a></h2>
                            <p><?php echo $blogPost->summary; ?></p>
                        </div>
                        <div class="meta">
                            <time class="published" datetime="2018-04-14"><?php echo $blogPost->dateCreated; ?></time>
                            <a href="#" class="author"><span class="name"><?php echo $blogPost->author; ?></span><img src="views/images/<?php echo $blogPost->profilePic; ?>" alt="" /></a>
                        </div>
                    </header>
                    <div class="image featured"><img src="views/images/<?php echo $blogPost->image; ?>" alt="" /></div>
                    <p><?php echo $blogPost->mainContent; ?></p>
            </div>
                <!-- Pagination -->
                <ul class="actions pagination">
                    <li><a href="" class="disabled button big previous">Previous Post</a></li>
                    <li><a href="#" class="button big next">Next Post</a></li>
                </ul>
            </div> <!-- End col-12 -->
        </div> <!-- End row -->
    </div> <!-- End Container -->



