<!-- Main -->
<div id="main" class='top-margin'>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Post -- Loop through all the blog posts and display each one-->
                <?php foreach($blogPosts as $blogPost) { ?>
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="?controller=blogPost&action=read&id=<?php echo $blogPost->id ; ?>"><?php echo $blogPost->title; ?></a></h2>
                            <p><?php echo $blogPost->summary; ?></p>
                        </div>
                        <div class="meta">
                            <time class="published" datetime="2018-04-07"><?php echo $blogPost->dateCreated; ?></time>
                            <a href="#" class="author"><span class="name"><?php echo $blogPost->author; ?></span>
                                <img src="views/images/<?php echo $blogPost->profilePic; ?>" alt="" /></a>
                        </div>                                                   
                    </header>
                    <a href="?controller=blogPost&action=read&id=<?php echo $blogPost->id ; ?>" class="image featured"><img src="views/images/<?php echo $blogPost->image; ?>" alt="" /></a>
                        <footer>
                            <ul class="actions">
                                    <li><a href="?controller=blogPost&action=read&id=<?php echo $blogPost->id ; ?>" class="button big">Read more</a></li>
                            </ul>
                            <ul class="stats">

                                    <li><a href="#" style="font-size: 10px"><?php echo $blogPost->category; ?></a></li>
                                    <li><a href="#" class="fa fa-eye" style="font-size: 12px"><?php echo $blogPost->noOfViews ?></a></li>
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
<?php include_once 'sidebar.php' ?>
        </div> <!-- End row -->
    </div> <!-- End Container -->
</div>