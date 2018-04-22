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
            echo "<script>alert('" . $signup . "')</script>";
            
            if($signup == "You successfully signed up!") {
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
        else if ($blogUser = BlogUser::login()) {
                if($blogUser == "You logged in!") {
                    ?>
                    <script>
                    window.location.replace("index.php?controller=blogPost&action=readAll");
                    </script>
                    <?php  
                } else {
                    echo "<script>alert('" . $blogUser . "')</script>";
                    require_once 'views/blogUser/login.php';
            }
        }
    }

    

    public function logout(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            session_destroy(); 
            ?>
            <script>
            window.location.replace("index.php?controller=blogUser&action=login");
            </script>
        <?php  
        }
    }
      

    
    public function viewMyAccount() {
    if($_SERVER["REQUEST_METHOD"] == "GET") {
            //We came here from a get (i.e. clicking on the my account link
            //so populate the page with the user details
            $blogUser = BlogUser::viewMyAccount($_SESSION['userID']);
            require_once('views/blogUser/viewMyAccount.php'); 
        } 
        else {
//            $blogUser = BlogUser::viewMyAccount($_SESSION['userID']);
            return call('pages','error');
        }    
    }
    
   
        public function create() {
      // we expect a url of form ?controller=products&action=create
      // if it's a GET request display a blank form for creating a new product
      // else it's a POST so add to the database and redirect to readAll action
      //if($_SERVER['REQUEST_METHOD'] == 'GET'){
            BlogUser::add();             
            return call('blogPost','readAll');
            
            
        }      

    public function updateMyAccount() {
      
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        
            //We came here from a get (i.e. clicking on the update my account link
            //so populate the page with the user details and redirect to update my account page
            $blogUser = BlogUser::viewMyAccount($_SESSION['userID']);
            
            require_once('views/blogUser/updateMyAccount.php'); 
        } 
        else {
//           //It's a POST so update the details
            $userID = $_SESSION['userID'];
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['email'];
            
            $blogUser = BlogUser::updateMyAccount($userID, $firstName, $lastName, $email);
            require_once('views/blogUser/viewMyAccount.php');
        } 
    }

    
   public function contactUs() {
      // we expect a url of form ?controller=products&action=create
      // if it's a GET request display a blank form for creating a new product
      // else it's a POST so add to the database and redirect to readAll action
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/pages/aboutUs.php');
      }
      else { 
            BlogUser::add();       
            $blogPosts = BlogUser::all(); //$blogPost get all the posts again and redirect to main page
            require_once('views/blogPost/viewAll.php');
      }      
    }

    //////////
    
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