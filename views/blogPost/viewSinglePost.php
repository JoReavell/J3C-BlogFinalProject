<!-- Main -->
<div id="main" class="top-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="width: 100%;">
                <!-- Post -->
                <div>
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
                    <p><?php echo str_replace(array("\r\n", "\r", "\n", "&#13;&#10;"), "<br />", $blogPost->mainContent); ?></p>
                            <ul class="actions">
                            <li><a href="?controller=blogPost&action=readAllMyPosts&id=<?php echo $blogPost->id ; ?>" class="button big">BACK</a></li> 
                            </ul> 
                </article>
                </div>
            <!-- Pagination -->
            <div>
                <ul class="actions pagination">
                    <li><a href="" class="disabled button big previous">Previous Post</a></li>
                    <li><a href="#" class="button big next">Next Post</a></li>
                </ul>
            </div>            
            <div>
                <?php require_once 'comments.php'; ?>  
            </div>
            </div>
            <!-- sidebar has div class = col-md-4 in it -->
            <?php include_once 'sidebar.php'; ?>
            </div> <!-- End row -->            
        </div> <!-- End container -->   
    </div> <!-- End -->
    
    



