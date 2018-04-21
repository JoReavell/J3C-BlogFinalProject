<?php


//Controller class contains all the functions we need to DO things to the products
//Handles business logic and links VIEW to MODEL (front end to database)

//Read all method. To be displayed on main page when we go to site
class BlogPostController {
    
    public function readAll() {
      //This function will need to return ALL the blog post items to display on main page        
      $blogPosts = BlogPost::all();
      require_once('views/blogPost/viewAll.php');
    }
    
    public function readAllMyPosts() {
//    if (!isset($_GET['UserID']))
//      return call('pages', 'error');    
    try{
    if (empty($_SESSION))   {
        $blogPosts = BlogPost::all();
        require_once('views/blogPost/viewAll.php');
    }
    else {
        $blogPosts = BlogPost::allMyPosts($_SESSION['username']);
        //$blogPost = BlogPost::allMyPosts($_GET['username']);
        require_once('views/blogPost/viewAllMyPosts.php');
    }
    
    }
    catch (Exception $ex){
            return call('pages','error');
        }    
    }

    public function read() {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        //This will return a single blog after a user has clicked on it.
        if (!isset($_GET['id']))
          return call('pages', 'error');

        try{
        // we use the given id to get the correct post
        $blogPost = BlogPost::find($_GET['id']);
        BlogPost::updateNumberOfViews($_GET['id'], $blogPost->noOfViews);
        require_once('views/blogPost/viewSinglePost.php');
        }
        catch (Exception $ex){
            return call('pages','error');
        }
    }
    
    //Insert a blog post
    public function create() {
      // we expect a url of form ?controller=products&action=create
      // if it's a GET request display a blank form for creating a new product
      // else it's a POST so add to the database and redirect to readAll action
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/blogPost/createBlogPost.php');
      }
      else { 
            BlogPost::add();       
            $blogPosts = BlogPost::all(); //$blogPost get all the posts again and redirect to main page
            require_once('views/blogPost/viewAll.php');
      }      
    }
    
    //Insert a blog post
    public function addComment() {

     if($_SERVER['REQUEST_METHOD'] == 'GET'){
//     if (!isset($_GET['blogPostID']) || !isset($_GET['userID']))
//        return call('pages', 'error');
//     }
       $blogPostID = $_GET['blogPostID'];
       $userID = $_GET['userID'];
       $comment = $_GET['comment'];
//       $profilePic=$_GET['profilePic'];
//       $firstName=$_GET['firstName'];
//       $lastName=$_GET['lastName'];

       
        // we use the given id to get the correct product
        $commentText = BlogPost::addComment($blogPostID, $userID, $comment);
//        echo "Your comment: <br>" . $commentText . " has been added to this post!";
//        
            
   echo '<div class="row">' .              
        '<div class="blog-comments" style="width: 100%">'.
            '<div class="blog-comment-main">'.
                '<div class="blog-comment">' .
                    '<a class="comment-avtar">' .
                        '<img src="views/images/' . $_SESSION['profilepic'] . '" alt="image">' . '</a>' .
                    '<div class="comment-text">' .
                        '<h3>'. $_SESSION['firstname']. " " . $_SESSION['lastname'] .  '</h3>' .
                        '<p>'. $comment . '</p> '  .                     
                    '</div>'  .                       
                '</div>' .                        
            '</div>' .
        '</div>' .
        '</div>';              
//          
    }
    }
    
    public function update() {
           
     if($_SERVER['REQUEST_METHOD'] == 'GET'){
     if (!isset($_GET['id']))
     return call('pages', 'error');

        // we use the given id to get the correct product
       $blogPost = BlogPost::find($_GET['id']);
      
        require_once('views/blogPost/updateBlogPost.php');
    }}
    
    public function makeUpdate() {
        
     if(empty($_GET['id'])) {
     //if (!isset($_GET['id']))
     return call('pages', 'error');}   
     else {
            
     $id = $_GET['id'];
     
     
      blogPost::update($id);
                        
      $blogPosts = BlogPost::allMyPosts($_SESSION['username']);
      require_once('views/blogPost/viewAllMyPosts.php');
    }}
      
 
    public function delete() {
        //Delete a selected blog post. This will have an id in the $_GET variable
        //This could be called from the view blogs page?
            blogPost::remove($_GET['id']);
            
          $blogPosts = BlogPost::allMyPosts($_SESSION['username']); //$blogPost get all the posts again and redirect to main page
          
          require_once('views/blogPost/viewAllMyPosts.php');
      }
      
    public function searchByCategory() {
        //This function will need to return the posts for a given category
        if (!isset($_GET['categoryID']))
          return call('pages', 'error');
        
      $blogPosts = BlogPost::searchByCategory($_GET['categoryID']);
      require_once('views/blogPost/viewAll.php');
    }
    
    public function searchByKeyword() {
      //This function will need to return the posts for a given keyword
        if (!isset($_POST['searchString']))
          return call('pages', 'error');
      $keyword = "'%" . filter_input(INPUT_POST, 'searchString', FILTER_SANITIZE_STRING) . "%'";
      $blogPosts = BlogPost::searchByKeyword($keyword);
      require_once('views/blogPost/viewAll.php');
    }
    
    }  
?>