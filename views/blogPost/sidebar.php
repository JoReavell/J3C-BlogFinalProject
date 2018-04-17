    <div class="col-md-4">
                    <div class="sidebar" id="sidebar">
                        <!-- About -->
                        <section class="blurb">
                            <h2 class="title">ABOUT US</h2>

                            <a href="#" class="image"><img class="img-responsive" src="views/images/aboutus.jpg" alt="about us" /></a>
                            <div class="author-widget">
                                <h4 class="author-name">J3C Team</h4>
                                <p>Is the best team from GetIntoTech who created their first MVC project. They share a great passion for coding, teamwork, tears, smiles, gin and cats. Where is hard work and commitment is J3C.</p>
                            </div>
                        </section>
                        <!-- Mini Posts -->
                        <section>
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
                                            <h3><a href="#"><?php echo $blogPost['title'] ?></a></h3>
                                            <time class="published"><?php echo $blogPost['dateCreated'] ?></time>
                                            <a href="#" class="author"><img src="views/images/<?php echo $blogPost['profilePic'] ?>" alt="" /></a>
                                    </header>
                                <a href="#" class="image"><img src="views/images/<?php echo $blogPost['image'] ?>" alt="" /></a>
                            </article>
                          <?php                           
                            //$list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
                        }
                        ?>
                        </div>
                    </section>
                    <!-- Posts List -->
                    <section>
                        <h2 class="title">LATEST POSTS</h2>
                        <ul class="posts">
                            <li>
                                <article>
                                        <header>
                                                <h3><a href="#">How to create a blog from scratch</a></h3>
                                                <time class="published" datetime="2018-04-16">April 16, 2018</time>
                                        </header>
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                            <li>
                                <article>
                                        <header>
                                                <h3><a href="#">Why is fun to code?</a></h3>
                                                <time class="published" datetime="2018-04-15">April 15, 2018</time>
                                        </header>
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                            <li>
                                <article>
                                        <header>
                                                <h3><a href="#">How do we feel after our last project?</a></h3>
                                                <time class="published" datetime="2018-04-15">April 15, 2018</time>
                                        </header>
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                            <li>
                                <article>
                                        <header>
                                                <h3><a href="#">Why we love our team?</a></h3>
                                                <time class="published" datetime="2018-04-14">April 14, 2018</time>
                                        </header>
                                    <a href="#" class="image"><img src="views/images/Jo.png" alt="" /></a>
                                </article>
                            </li>
                        </ul>
                    </section>

                    <section>
                            <div class="widget">
                                    <h2 class="title">INSTAGRAM</h2>
                                    <div class="widget-content">
                                            <div class="row instagram-feeds row-gallery">
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/teamwork.jpg"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skyfaith.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3 "><img src="views/images/slider/sky2.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/slider/sky3.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/slider/victoria.png" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/learnedMoreThan.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skyfaith.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skycode.jpg" alt="Instagram Image"></a>
                                                <a href="#" class="col-sm-4 col-xs-3"><img src="views/images/skyfaith.jpg" alt="Instagram Image"></a>
                                            </div>
                                    </div>
                            </div>
                    </section> <!-- End inta -->

                </div> <!-- End Sidebar -->
                </div>