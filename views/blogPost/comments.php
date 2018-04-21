<!-- Main -->
<!-- This connects to the db and retrieves the comments for this post.
Is this an OK way to do it? Had to put sql in here as it's like a page in a page -->
<div id="main" class="top-margin">
    <div class="container">
        <?php        
        if(!empty($_SESSION)) {   ?>
            <div class="form-group">
                <textarea class="form-control" name="comment" required id="comment" placeholder="Please enter your comment here"></textarea>
            </div>
        <button type="button" onclick="addComment(<?php echo $blogPost->id; ?>, <?php echo $_SESSION['userID']; ?>)">Add Comment</button><br/>
        <?php
        } else { 
        ?>
        Please <a href="?controller=blogUser&action=login">login</a> to add comments
        <?php
        }
        ?>
        <br/>
        <span id="newComment"></span>
        <br>
        <?php
        $db = Db::getInstance();
        $sql = "SELECT CONCAT(firstname, ' ', lastname) AS username, profilePic, blogComment "
                . "FROM blogcomments JOIN bloguser "
                . "ON blogcomments.blogUserID = bloguser.blogUserID "
                . "WHERE blogPostID = $blogPost->id "
                . "ORDER BY blogCommentID desc;";
        $req = $db->query($sql);
        // we create a list of Product objects from the database results
        foreach($req->fetchAll() as $blogComment) {
        ?>
        <div class="row">               
        <!-- Blog Comments Begins -->
        <div class="blog-comments" style="width: 100%">
            <div class="blog-comment-main">
                <div class="blog-comment">
                    <a class="comment-avtar"><img src="views/images/<?php echo $blogComment['profilePic'] ?>" alt="image"></a>
                    <div class="comment-text">
                        <h3><?php echo $blogComment['username'] ?></h3>
                        <p><?php echo $blogComment['blogComment'] ?></p>                        
                    </div>                         
                </div>                        
            </div>
        </div>
        </div>
        <?php }
        //end comment row here ?>
    </div>
</div>
<script>
function addComment(blogPostID, userID){
    //Called from the onclick on add comment. Insert to DB and display on page.
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()   {
        if (this.readyState === 4 && this.status === 200) { 
            //Split the response text into the different variables we need.
            //populate the different elements.
            //alert(this.responseText);
            document.getElementById("newComment").innerHTML = this.responseText;
            //Clear out the comment box too
            document.getElementById("comment").value = "";
        }
    };
    var comment = document.getElementById("comment").value;
    if (comment == "")     {
        alert("Please enter a comment before you try and add one, you muppet!");
        return;
    }
    //alert(comment);
    //alert("?controller=blogPost&action=addComment&blogPostID"+blogPostID+"&userID="+userID+"&comment="+comment);
    //Calls a GET request to send ths query string to the php page
    xhttp.open("GET", "?controller=blogPost&action=addComment&blogPostID="+blogPostID+"&userID="+userID+"&comment="+comment, true);
    xhttp.send();
}
</script>