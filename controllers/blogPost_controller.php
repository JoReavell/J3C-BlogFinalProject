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
    if (!isset($_GET['UserID']))
      return call('pages', 'error');
    
    try{
    
    $blogPost = BlogPost::allMyPosts($_GET['username']);
    require_once('views/blogPost/viewAllMyPosts.php');
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
    public function update() {
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['id']))
        return call('pages', 'error');

        // we use the given id to get the correct product
        $product = Product::find($_GET['id']);
      
        require_once('views/products/update.php');
        }
      else
          { 
            $id = $_GET['id'];
            Product::update($id);
                        
            $products = Product::all();
            require_once('views/products/viewAll.php');
      }
      
    }
    public function delete() {
        //Delete a selected blog post. This will have an id in the $_GET variable
        //This could be called from the view blogs page?
            Product::remove($_GET['id']);
            
            $products = Product::all();
            require_once('views/products/viewAll.php');
      }
      
    }
  
?>