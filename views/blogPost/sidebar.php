    <div class="col-md-4">
                    <div class="sidebar" id="sidebar">
                        <!-- About -->
                        <section class="blurb">
                            <h2 class="title"><a  href="?controller=pages&action=aboutUs">ABOUT US</a></h2>

                            <a href="?controller=pages&action=aboutUs" class="image"><img class="img-responsive" src="views/images/aboutus.jpg" alt="about us" /></a>
                            <div class="author-widget">
                                <h4 class="author-name">J3C Team</h4>
                                <p style="margin-bottom: 10%;">Is the best team from GetIntoTech who created their first MVC project. They share a great passion for coding, teamwork, tears, smiles, gin and cats. Where there is hard work and commitment is J3C.</p>
                            </div>
                        </section>
                        <!-- Mini Posts -->
                        <section class="blurb" style="margin-top: 5%;">
                            <h2 class="title">POPULAR POSTS</h2>
                            <div class="mini-posts">
                        <!-- connect to database here to retrieve the 4 most popular posts -->
                        <?php
                        $db = Db::getInstance();
                        $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author, dateCreated, category, noOfViews, profilePic "
                            . "FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID "
                                . "ORDER BY noOfViews DESC LIMIT 4;";
                        $req = $db->query($sql);
                        // we create a list of Product objects from the database results
                        foreach($req->fetchAll() as $blogPost) {
                            ?>
                            <!-- Mini Post -->
                            <article class="mini-post">
                                    <header>
                                            <h3><a href="index.php?controller=blogPost&action=read&id=<?php echo $blogPost['blogPostID']; ?>"><?php echo $blogPost['title'] ?></a></h3>
                                            <time class="published"><?php echo $blogPost['dateCreated'] ?></time>
                                            <a href="index.php?controller=blogPost&action=read&id=<?php echo $blogPost['blogPostID']; ?>" class="author"><img src="views/images/<?php echo $blogPost['profilePic'] ?>" alt="" /></a>
                                    </header>
                                <a href="index.php?controller=blogPost&action=read&id=<?php echo $blogPost['blogPostID']; ?>" class="image"><img src="views/images/<?php echo $blogPost['image'] ?>" alt="" /></a>
                            </article>
                          <?php                           
                            //$list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
                        }
                        ?>
                        </div>
                    </section>
                    <!-- Posts List -->
                    <section class="blurb">
                        <h2 class="title" style="margin-top: 20%">LATEST POSTS</h2>
                        <ul class="posts">
                            <!-- connect to database here to retrieve the 4 most popular posts -->
                        <?php
                        $db = Db::getInstance();
                        $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author, dateCreated, category, noOfViews, profilePic "
                            . "FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID "
                                . "ORDER BY dateCreated DESC LIMIT 4;";
                        $req = $db->query($sql);
                        // we create a list of Product objects from the database results
                        foreach($req->fetchAll() as $blogPost) {
                            ?>
                            <li>
                                <article>
                                    <header>
                                        <h3><a href="index.php?controller=blogPost&action=read&id=<?php echo $blogPost['blogPostID']; ?>"><?php echo $blogPost['title'] ?></a></h3>
                                        <time class="published"><?php echo $blogPost['dateCreated'] ?></time>
                                    </header>   
                                        <a href="index.php?controller=blogPost&action=read&id=<?php echo $blogPost['blogPostID']; ?>" class="image"><img src="views/images/<?php echo $blogPost['image'] ?>" alt="" /></a>                       
                            </article>
                            </li>
                          <?php                           
                            //$list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
                        }
                        ?>                          
                        </ul>
                    </section>

                    <section>
                            <div class="widget">
                                    <h2 class="title" style="margin-top: 20%">Gallery</h2>
                                    <div class="widget-content">
                                            <div class="row">
                                               
                                                <a target="_blank" href="views/images/slider/tod.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/slider/tod.jpg"></a>
                                                <a target="_blank" href="views/images/slider/jan.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/slider/jan.jpg" alt="Instagram Image"></a>
                                                <a target="_blank" href="views/images/slider/january.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/slider/january.jpg" alt="Instagram Image"></a>
                                                <a target="_blank" href="views/images/class.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/class.jpg" alt="Instagram Image"></a>
                                                <a target="_blank" href="views/images/abus.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/abus.jpg" alt="Instagram Image"></a>
                                                <a target="_blank" href="views/images/wote.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/wote.jpg" alt="Instagram Image"></a>
                                                <a target="_blank" href="views/images/joje.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/joje.jpg" alt="Instagram Image"></a>
                                                <a target="_blank" href="views/images/clajen.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/clajen.jpg" alt="Instagram Image"></a>
                                                <a target="_blank" href="views/images/skyfaith.jpg" class="col-sm-4 col-xs-3 galleryPic"><img src="views/images/skyfaith.jpg" alt="Instagram Image"></a>
                                            </div>
                                    </div>
                            </div>
                    </section> <!-- End inta -->

                </div> <!-- End Sidebar -->
                </div>