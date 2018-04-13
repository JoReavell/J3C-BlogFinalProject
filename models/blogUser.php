

<?php
  class BlogUser {
    // we define our attributes
    // A blog user has 9 attributes
    public $userID;
    public $username="";
    public $password ="";
    public $confirm_password ="";
    public $email="";
    public $firstName= "";
    public $lastName = "";
    
    // Not sure we need these errors since the form won't submit if empty due to required fields
    public $username_err = "";
    public $password_err = "";
    public $confirm_password_err = "";
    public $firstName_err = "";
    public $lastName_err = "";
    public $email_err = "";

      
      
    public function __construct($userID, $username, $password, $confirm_password, $email, $firstName, $lastName, 
            $username_err, $password_err, $confirm_password_err, $firstName_err, $lastName_err, $email_err) {
        $this->userID    = $userID;
        $this->username  = $username;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        
        $this->username_err = $username_err;
        $this->password_err = $password_err;
        $this->confirm_password_err = $confirm_password_err;
        $this->firstName_err = $firstName_err;
        $this->lastName_err = $lastName_err;
        $this->$email_err = $email_err;
    }


    public static function signUp() {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO bloguser (username, password, firstName, lastName, email) "
                . "VALUES (:username, :password, :firstName, :lastName, :email)");
        
        // set parameters and execute
        //Filter the text part of the input.
        if(!empty(trim($_POST["username"]))){
            $filteredUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $sql = "SELECT blogUserID FROM bloguser WHERE username = :username";
        }
        if(!empty(trim($_POST["email"]))){
            $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(!empty(trim($_POST["firstName"]))){
            $filteredFirstName = filter_input(INPUT_POST,'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(!empty(trim($_POST["lastName"]))){
            $filteredLastName = filter_input(INPUT_POST,'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        $username = $filteredUsername;
        $email = $filteredEmail;
        $firstName = $filteredFirstName;
        $lastName = $filteredLastName;
        
        
        if($req->rowCount() == 1){
                $username_err = "This username is already taken.";
            } 
            else {
                $username = trim($_POST["username"]);
            }
            
            
        // Validate password
        if(!empty(trim($_POST['password']))){
            if(strlen(trim($_POST['password'])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } 
            else {
                $password = trim($_POST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            }
        }    
        
        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);
        $req->bindParam(':firsName', $firstName);
        $req->bindParam(':lastName', $lastName);
        $req->bindParam(':password', $password);
        $req->bindParam(':confirm_password', $confirm_password);


        
        $req->execute(array(
            'username' => $username,
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'password' => $password = password_hash($password, PASSWORD_DEFAULT) // Creates a password hash
            //'confirm_password' => $confirm_password
            )
        );
        
//        if($req->execute()){
//            if($req->rowCount() == 1){
//                $username_err = "This username is already taken.";
//            } 
//            else {
//                $username = trim($_POST["username"]);
//            }
//        } 


            
        // Attempt to execute the prepared statement
            if($req->execute()) {
                // Redirect to login page
                header("location: login.php");
            } 
            else {
                echo "Something went wrong. Please try again later.";
            }
            
    }

            
//                // Set parameters
//                    $param_username = $username;
//                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
//                    $param_firstName = $firstName;
//                    $param_lastName = $lastName;
//                    $param_email = $email;

//                    //catch the post
//
//                    if($stmt == $pdo_options->prepare($sql)){
//                    
//                    $param_firstName = trim($_POST["firstName"]);
//                    $param_lastName = trim($_POST["lastName"]);
//                    $param_email = trim($_POST["email"]);
//
//                 
//                // Bind variables to the prepared statement as parameters
//                    $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
//                    $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
//                    $stmt->bindParam(':firstName', $param_firstName, PDO::PARAM_STR);
//                    $stmt->bindParam(':lastName', $param_lastName, PDO::PARAM_STR);
//                    $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
//
                    
                    

//                // Close statement
//                unset($stmt);
//            }
//
//            // Close connection
//            unset($pdo_options);
        
               
                

        
         
    public function login(){
      
        $db=Db::getInstance();
        $req=$db->prepare("SELECT username, password FROM bloguser WHERE username = :username"); 
       
    
//Include config file
require_once 'connection.php';
 
//Define variables and initialized with empty values
//$username = $password = "";
//$username_err = $password_err = "";
//    
//// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty(if the username inserted in the field is empty) 
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty(if the username inserted in the field is empty) 
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials with MySQL (check if what the user is posting is the same with the user from mysql
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $instance = DB::getInstance();
        $sql = "SELECT username, password FROM bloguser WHERE username = :username";
        //A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.
        if($stmt = $instance->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        //[With bindParam] the variable is bound as a reference and will only be evaluated at the time that PDOStatement::execute() is called.
             // Set parameters (Strip whitespace (or other characters from the beginning and end of a string with trim))
            $param_username = trim($_POST["username"]);
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
            // Check if username exists, if yes then verify password
            //PDOStatement::rowCount() returns the number of rows affected by the last
            // DELETE, INSERT, or UPDATE statement executed by the corresponding 
            // PDOStatement object.
                if($stmt->rowCount() == 1){
                 
                 //Fetch results from a prepared statement into the bound variables
                 /*A bound variable is a variable that was previously free, but has been bound to a specific value or set of values 
                called domain of discourse or universe. For example, the variable x becomes a bound variable when we write: 
                'For all x, (x + 1)2 = x2 + 2x + 1.' or 'There exists x such that x2 = 2.' */  
                    
                    if($row = $stmt->fetch()){
                    //hashed_pass help us to have pass protected
                    $hashed_password = $row['password'];
                    if(password_verify($password, $hashed_password)){
                    // Password is correct, so start a new session and save the username to the session and go to index.php
//                    session_start();
                    $_SESSION['username'] = $username; 
                    //thake the user to the landing page
//                    header("location: ../index.php");
                    } else{
                    // Display an error message if password is not valid
                    $password_err = 'The password you entered was not valid.';
                    }
                  }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{ 
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close the prepared statement
        
        unset($stmt);
    }
    
    // Close connection
    //unset() will destroy the variable inside this function???when we close the statement??
    unset($pdo);
    }}

   
  
     public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM product');
      // we create a list of Product objects from the database results
      foreach($req->fetchAll() as $product) {
        $list[] = new Product($product['id'], $product['name'], $product['price']);
      }
      return $list;
    }

    
    
    public static function find($id) {
      $db = Db::getInstance();
      //use intval to make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM product WHERE id = :id');
      //the query was prepared, now replace :id with the actual $id value
      $req->execute(array('id' => $id));
      $product = $req->fetch();
    if($product){
          return new Product($product['id'], $product['name'], $product['price']);
        }
        else
        {
            //replace with a more meaningful exception
            throw new Exception('A real exception should go here');
        }
        }

    
    
public static function update($id) {
    $db = Db::getInstance();
    $req = $db->prepare("Update product set name=:name, price=:price where id=:id");
    $req->bindParam(':id', $id);
    $req->bindParam(':name', $name);
    $req->bindParam(':price', $price);

// set name and price parameters and execute
    if(isset($_POST['name'])&& $_POST['name']!=""){
        $filteredName = filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['price'])&& $_POST['price']!=""){
        $filteredPrice = filter_input(INPUT_POST,'price', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$name = $filteredName;
$price = $filteredPrice;
$req->execute();

//upload product image if it exists
        if (!empty($_FILES[self::InputKey]['name'])) {
		Product::uploadFile($name);
	}

    }
    
    
    
    public static function add() {
    $db = Db::getInstance();
    $req = $db->prepare("Insert into product(name, price) values (:name, :price)");
    $req->bindParam(':name', $name);
    $req->bindParam(':price', $price);

// set parameters and execute
    if(isset($_POST['name'])&& $_POST['name']!=""){
        $filteredName = filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['price'])&& $_POST['price']!=""){
        $filteredPrice = filter_input(INPUT_POST,'price', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$name = $filteredName;
$price = $filteredPrice;
$req->execute();

//upload product image
Product::uploadFile($name);
    }

const AllowedTypes = ['image/jpeg', 'image/jpg'];
const InputKey = 'myUploader';

      
//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    
    
public static function uploadFile(string $name) {

	if (empty($_FILES[self::InputKey])) {
		//die("File Missing!");
                trigger_error("File Missing!");
	}

	if ($_FILES[self::InputKey]['error'] > 0) {
		trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
	}


	if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
		trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
	}

	$tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = "C:/xampp/htdocs/MVC_Skeleton/views/images/";
	$destinationFile = $path . $name . '.jpeg';

	if (!move_uploaded_file($tempFile, $destinationFile)) {
		trigger_error("Handle Error");
	}
		
	//Clean up the temp file
	if (file_exists($tempFile)) {
		unlink($tempFile); 
	}
}
    
    
    
public static function remove($id) {
      $db = Db::getInstance();
      //make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('delete FROM product WHERE id = :id');
      // the query was prepared, now replace :id with the actual $id value
      $req->execute(array('id' => $id));
  }
  
}
?>