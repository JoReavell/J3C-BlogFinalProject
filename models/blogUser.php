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
        $req = $db->prepare("INSERT INTO bloguser (username, firstName, lastName, email, password) "
                . "VALUES (:username, :firstName, :lastName, :email, :password)");

        
        // set parameters and execute
        //Filter the text part of the input.
        if(!empty(trim($_POST["username"]))){
            $filteredUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $sql = "SELECT blogUserID FROM bloguser WHERE username = :username";

            $checkUsername = $db->prepare($sql);
            $checkUsername->execute([':username' => $filteredUsername]);
            $checkUsername->fetchAll();
            if($checkUsername->rowCount() != 0){
                $username_err = "Sorry! This username is already taken. Please choose another";
                //return out of the function. We don't want to do the insert.
                return $username_err;
            } 
            else {
                $username = $filteredUsername;
            }
        }
        if(!empty(trim($_POST["email"]))){
            $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $sql = "SELECT blogUserID FROM bloguser WHERE email = :email";

            $checkEmail = $db->prepare($sql);
            $checkEmail->execute([':email' => $filteredEmail]);
            $checkEmail->fetchAll();
            if($checkEmail->rowCount() != 0){
                $email_err = "Sorry! This email is already in use. Please choose another or sign in";
                //return out of the function. We don't want to do the insert.
                return $email_err;
            } 
            else {
                $email = $filteredEmail;
            }
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
                //return out of the function. We don't want to do the insert.
                return $password_err;
            } 
            else if(trim($_POST['password']) !== trim($_POST['confirm_password'])){
                $password_err = "Your passwords do not match. Please enter the same password twice.";
                //return out of the function. We don't want to do the insert.
                return $password_err;
            }
            else {
                $password = trim($_POST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            }
        }    
        
        $req->bindParam(':username', $username);
        $req->bindParam(':firsName', $firstName);
        $req->bindParam(':lastName', $lastName);
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $password);
        $req->bindParam(':confirm_password', $confirm_password);


        $req->execute(
                array(
            'username' => $username,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password = password_hash($password, PASSWORD_DEFAULT) // Creates a password hash
            )
        );
        //all went OK, return true
    }        

  

    
public static function login(){
  $db=Db::getInstance();
//        $req=$db->prepare("SELECT username, password FROM bloguser WHERE username = :username"); 
 
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
       
    $instance = DB::getInstance();

      
      
//JP commented out some of the below lines (ones with JP in) in order to do Jo's merge, these lines below were in Jo's version but conflicted with master version:
    
      //here as you may see I asigned the MySQL query to variable $sql (it's not a prepared statment just an assignemnt to a variable
//JP   $sql = "SELECT username, password, blogUserID, firstName FROM bloguser WHERE username = :username";
    //A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.
    //$instance = DB::getInstance();        //We don't need to do this twice ...
    //
    //I tried without DB::getInstance() = this was my error for one day of code...this line missing
//JP    if($stmt = $instance->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    //[With bindParam] the variable is bound as a reference and will only be evaluated at the time that PDOStatement::execute() is called.
         // Set parameters (Strip whitespace (or other characters from the beginning and end of a string with trim))
//JP    $param_username = trim($_POST["username"]);
//JP    $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
//JP       if($stmt->execute()){
//JP            if($stmt->rowCount() == 1){

             //Fetch results from a prepared statement into the bound variables
             /*A bound variable is a variable that was previously free, but has been bound to a specific value or set of values
            called domain of discourse or universe. For example, the variable x becomes a bound variable when we write:
            'For all x, (x + 1)2 = x2 + 2x + 1.' or 'There exists x such that x2 = 2.' */
             //( you are right check the unset)
//JP            if($row = $stmt->fetch()){
            //hashed_pass help us to have pass protected
//JP            $hashed_password = $row['password'];

//JP            if(password_verify($password, $hashed_password)){
                // Password is correct, so start a new session and save the username to the session and go to index.php
                //session_start();
//
//                if (isset($_SESSION['username'])) {
//                    echo 'logged in';//
//                }
//JP                $param_password = trim($_POST["password"]);
//JP                $_SESSION['username'] = $username;
//JP                $_SESSION['userID'] = $row['blogUserID'];
//JP                $_SESSION['firstname'] = $row['firstName'];
                //I don't understand what this is doing. There is no :password in the $stmt sql.
                //Doesn't the password verify do the check that the password is correct?
                //You never actually do aything with the parameter anyway so this is pointless


            //the parameter will help me to discover my hashed password ...you can try without it and you will see that won't work
//JP            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
//JP            } else{
           // Display an error message if password is not valid
//JP            $password_err = 'The password you entered was not valid.';

//JP commented out some of the above lines (ones with JP in) in order to do Jo's merge, these lines above were in Jo's version but conflicted with master version
      
      
      
    $sql = "SELECT username, password, firstName, blogUserID FROM bloguser WHERE username = :username";
    $instance = DB::getInstance();
        if($stmt = $instance->prepare($sql)){
            $param_username = trim($_POST["username"]);
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                    $hashed_password = $row['password'];
                    
                    if(password_verify($password, $hashed_password)){
                        if (isset($_SESSION['username'])) { 
                            echo 'Hello ' . $_SESSION['username']; 
                        }
                    $param_password = trim($_POST["password"]);
                    $_SESSION['username'] = $username;
                    $_SESSION['userID'] = $row['blogUserID'];
                    $_SESSION['firstname'] = $row['firstName'];
                    
                    $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
                    } else{
                    // Display an error message if password is not valid
                    $password_err = 'The password you entered was not valid.';

                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';

                }
            } else { 
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close the prepared statement
        
        unset($stmt);
    }
    
    // Close connection
    //unset() will destroy the variable inside this function???when we close the statement??
    unset($pdo);
    }
    
    }
} 
  
            
//    public function logout(){   
//       $db = Db::getInstance();
//       // Initialize the session
//       session_start();
//
//       // Unset all of the session variables
//       $_SESSION = array();
//
//}
//    
//
//
//       // Destroy the session.
//       session_destroy();

       // Redirect to login page
//       header("location: login.php");
//       exit;
//  }
 
   
  
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