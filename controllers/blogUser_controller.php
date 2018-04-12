<?php
//Controller class contains all the functions we need to DO things to the products
//Handles business logic and links VIEW to MODEL (front end to database)

class BlogUserController {
    
    public function login($username, $password) {
        
        //User login functionality
        //have code to start login here then go to model to do actual login
        //set session variable with userID
        $blogUser = BlogUser::login();
        //set session variables here too!!
        
        require_once 'view/connection.php';
 
//Define variables and initialized with empty values
$username = $password = "";
$username_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
            $username_err = 'Please enter username.';
        } else{
            $username = trim($_POST["username"]);
        }
    if(empty(trim($_POST['password']))){
            $password_err = 'Please enter your password.';
        } else{
            $password = trim($_POST['password']);
        }
//    if(empty($username_err) && empty($password_err)){
//        $sql = "SELECT username, password FROM bloguser WHERE username = :username";
//    if($stmt = $pdo->prepare($sql)){
//        $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
//        $param_username = trim($_POST["username"]);
//    if($stmt->execute()){
//        if($stmt->rowCount() == 1){
//            if($row = $stmt->fetch()){
//                $hashed_password = $row['password'];
//                if(password_verify($password, $hashed_password)){
//                session_start();
//                $_SESSION['username'] = $username; 
//                header("location: views/blogPost/viewAll.php");
//                    } else{
//                    $password_err = 'The password you entered was not valid.';
//                    }
//                  }
//                } else{
//                    // Display an error message if username doesn't exist
//                    $username_err = 'No account found with that username.';
//                }
//            } else{ 
//                echo "Oops! Something went wrong. Please try again later.";
//            }
//        }
//        unset($stmt);
//    }
//    unset($pdo);
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
      else
          { 
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