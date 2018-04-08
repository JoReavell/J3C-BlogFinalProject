<?php
//Controller class contains all the functions we need to DO things to the products
//Handles business logic and links VIEW to MODEL (front end to database)

class BlogPostController {
    public function readAll() {
      //This function will need to return ALL the blog post items to display on mian page
        
      $products = Product::all();
      require_once('views/products/readAll.php');
    }

    public function read() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      //This will return a single blog after a user has clicked on it.
      if (!isset($_GET['id']))
        return call('pages', 'error');

      try{
      // we use the given id to get the correct post
      $product = Product::find($_GET['id']);
      require_once('views/products/read.php');
      }
 catch (Exception $ex){
     return call('pages','error');
 }
    }
    public function create() {
      // we expect a url of form ?controller=products&action=create
      // if it's a GET request display a blank form for creating a new product
      // else it's a POST so add to the database and redirect to readAll action
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/products/create.php');
      }
      else { 
            Product::add();
             
            $products = Product::all(); //$products is used within the view
            require_once('views/products/readAll.php');
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
            require_once('views/products/readAll.php');
      }
      
    }
    public function delete() {
        //Delete a selected blog post. This will have an id in the $_GET variable
        //This could be called from the view blogs page?
            Product::remove($_GET['id']);
            
            $products = Product::all();
            require_once('views/products/readAll.php');
      }
      
    }
  
?>