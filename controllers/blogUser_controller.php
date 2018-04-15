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
            
    


    public function login() {
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            require_once 'views/blogUser/login.php';
        } 
        else {
            $blogUser = BlogUser::login();
            echo "<script>alert('You are now signed in!')</script>";
            return call('blogPost','readAll');
        }
    }

//public function login() {
//    if($_SERVER["REQUEST_METHOD"] == "GET"){
//        require_once 'views/blogUser/login.php';
//    } 
//    else {
//        $blogUser = BlogUser::login();
//        echo "<script>alert('You are now signed in!')</script>";
//        //require_once('views/pages/home.php');
//        return call('blogPost','readAll');
//    }
//}}



//if($_SERVER["REQUEST_METHOD"] == "GET"){
//        
//        require_once('views/blogUser/login.php');
//    }else{
////       
//        BlogUser::login();
//        $blogUser = BlogUser::login();
//        require_once 'views/pages/home.php';
//}
    
// Claudia's login - need to make this MVC (use/edit Jen's code above?):
    
//    public function login() {
//        if($_SERVER["REQUEST_METHOD"] == "GET"){
//
//            require_once('views/blogUser/login.php');
//        }else{
//            if(empty(trim($_POST["username"]))){
//                $username_err = 'Please enter username.';
//                require_once('views/blogUser/login.php');
//            } else{
//                $username = trim($_POST["username"]);
//            }
//
//            if(empty(trim($_POST['password']))){
//                $password_err = 'Please enter your password.';
//                require_once('views/blogUser/login.php');
//            } else{
//                $password = trim($_POST['password']);
//            }
//            //your function in blog user requires some parameters. Are you going to pass these in?
//            //being as we've checked the username and password are ok here we could pass them as parameters to the login function
//            //this way we don't need to get them again later
//            // eg: BlogUser::login($username, $password);
//            // then change the function in blogUser.php to accept and use these parameters. Might make more sense.
//            $blogUser = BlogUser::login();
//            //When we have logged in we want to load the whole page again including refreshing the navbar
//            //I have no idea how to make this happen
//            //I think we should ask Victoria on monday about this and the general login stuff as it is well tricky!!!
//            //require_once 'index.php';
//        }
//
//
//        BlogUser::login();
//        $blogUser = BlogUser::login();
//        require_once 'views/pages/home.php';
//    }
    
    
    
    
    
    //logout

    //    public function logout(){
    //        if($_SERVER["REQUEST_METHOD"] == "GET"){
    //            require_once 'views/blogUser/logout.php';
    //        }else{
    //            BlogUser::logout();
    //            require_once 'views/blogUser/login';
    //        }
    //    }
    //    



    public function logout()    {
        echo "<script>alert('You logged out!')</script>";
        session_destroy();
        require_once('views/pages/home.php');
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