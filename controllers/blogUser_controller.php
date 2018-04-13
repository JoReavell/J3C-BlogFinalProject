<?php
//Controller class contains all the functions we need to DO things to the products
//Handles business logic and links VIEW to MODEL (front end to database)

class BlogUserController {
    
    // Sign up a new blog user 
    public function signUp() {
        // we expect a url of form ?controller=blogUser&action=signUp
        // if it's a GET request display a blank form for signing up a new user
        // else it's a POST request - add user to the database and redirect to login action

        if($_SERVER["REQUEST_METHOD"] == "GET") {
            require_once('views/blogUser/signUp.php'); // show signup page
        } 
        else { 
            BlogUser::signUp();       
            require_once('views/blogUser/login.php'); // redirect to login after signup 
        }      
    }        
            
    
    
    public function login() {
    if($_SERVER["REQUEST_METHOD"] == "GET"){
//        $username = "";
//        $password = "";
//        $username_err = "";
//        $password_err = "";
        require_once('views/blogUser/login.php');
    }else{

        if(empty(trim($_POST["username"]))){
            $username_err = 'Please enter username.';
            require_once('views/blogUser/login.php');
        } else{
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
        require_once('views/blogUser/login.php');
    } else{
        $password = trim($_POST['password']);            
    }
        //your function in blog user requires some parameters. Are you going to pass these in?
        //
        $blogUser = BlogUser::login();
        require_once 'views/pages/home.php';
    }      
                    
        BlogUser::login();
        $blogUser = BlogUser::login();
        require_once 'views/pages/home.php';
    }
    




    
    public function readAll() {
      // we store all the posts in a variable
        //Get all the products from the database using the all() function in product.php MODEL
        //These are then used in readAll.php and displayed.
        
      $products = Product::all();
      require_once('views/products/readAll.php');
    }

    public function read() {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
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
            else { 
                $id = $_GET['id'];
                Product::update($id);

                $products = Product::all();
                require_once('views/products/readAll.php');
            }
      
    }
    
    public function delete() {
        Product::remove($_GET['id']);

        $products = Product::all();
        require_once('views/products/readAll.php');
    }
      
}
  
?>