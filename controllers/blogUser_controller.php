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
            $signup = BlogUser::signUp();
            echo "<script>alert('Success! You may now sign in" . $signup . "')</script>";
            if($signup == null) {
                require_once('views/blogUser/login.php'); // redirect to login after signup 
            }
            else    {
                //return call('pages','error');
                require_once('views/blogUser/signUp.php');
            }
        }      
    }        
     
//    //
//    protected function init()
//    {
//        //Check for logged in user and set the page state
//        if (SessionManager::getParameter('username') == null)
//            $this->_stState = self::STATE_NOT_LOGGED_IN;
//        else
//            $this->_stState = self::STATE_LOGGED_IN;
//    }
////
//    
//    public function draw()
//    {
//        $this->setPlaceholder('TITLE', 'index.php');
//
//        //Tell the page what its state is
//        $boLogin = $this->_stState == self::STATE_NOT_LOGGED_IN;
//        $this->setPlaceholder('boLogin', $boLogin);
//
//        parent::draw();
//    }
//    
    
    public function login() {
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            require_once 'views/blogUser/login.php';
        } 
        else {
            $blogUser = BlogUser::login();
            return call('blogPost','readAll');
        }
    }

    

    public function logout(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            //echo "<script>alert('You logged out!')</script>";
            session_destroy(); 
            require_once 'views/blogUser/login.php';
            //require_once('views/pages/home.php');
        }
    }
      

    
    public function viewMyAccount() {
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $blogUser = BlogUser::viewMyAccount($_SESSION['username']);
            require_once('views/blogUser/viewmyAccount.php');  
        } 
        else {
            return call('pages','error');
        }    
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