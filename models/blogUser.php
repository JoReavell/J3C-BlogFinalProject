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
    public $blogUserID = "";
    public $name = "";
    public $subject = "";
    public $message= "";
    public $profilePic= "";
    
    
      
    public function __construct($userID, $username, $firstName, $lastName, $email, $password, $profilePic) {
        $this->userID    = $userID;
        $this->username  = $username;
        $this->password = $password;
        //$this->confirm_password = $confirm_password;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->profilePic = $profilePic;
        //$this->username_err = $username_err;
        //$this->password_err = $password_err;
        //$this->confirm_password_err = $confirm_password_err;
        //$this->firstName_err = $firstName_err;
        //$this->lastName_err = $lastName_err;
        //$this->email_err = $email_err;
        //$this->blogUserID = $blogUserID;
        //$this->name = $name;
        //$this->subject =$subject;
        //$this->message =$message;
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
            }
        }    
        
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        $param_firstName = $firstName;
        $param_lastName = $lastName;
        $param_email = $email;
        

        $req->bindParam(':username', $param_username, PDO::PARAM_STR);
        $req->bindParam(':password', $param_password, PDO::PARAM_STR);
        $req->bindParam(':firstName', $param_firstName, PDO::PARAM_STR);
        $req->bindParam(':lastName', $param_lastName, PDO::PARAM_STR);
        $req->bindParam(':email', $param_email, PDO::PARAM_STR);
              

        if ($req->execute()){
             echo "You successfully signed up!";
        } else{
                echo "Something went wrong. Please try again later.";
            }
    }

    
    
    public static function login(){
      $instance=Db::getInstance();
      $req=$instance->prepare("SELECT username, password FROM bloguser WHERE username = :username"); 

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
                $sql = "SELECT username, password, blogUserID, firstName FROM bloguser WHERE username = :username";
                if($stmt = $instance->prepare($sql)){
                    $param_username = trim($_POST["username"]);
                    $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
                    if($stmt->execute()){
                        if($stmt->rowCount() == 1){

                            if($row = $stmt->fetch()){
                                $hashed_password = $row['password'];

                                if(password_verify($password, $hashed_password)){
//                                     
//                                    if (isset($_SESSION['username'])) {
//                                        echo 'logged in ' . $_SESSION['username'];
//                                       }
//                                    session_start();
                                    
                                       $param_password = trim($_POST["password"]);
                                       $_SESSION['username'] = $username;
                                       $_SESSION['userID'] = $row['blogUserID'];
                                       $_SESSION['firstname'] = $row['firstName'];

//                                        $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
                                }else {
                                    echo "<script>alert('The username/password you entered was not valid.')</script>";
//                                    $password_err = 'The password you entered was not valid.';
                                }
                            } 
//                            else {
//                                // Display an error message if username doesn't exist
//                                $username_err = 'No account found with that username.';
//                            }
                        } 
                        else { 
                            "<script>alert('Oops! Something went wrong. Please try again later.')</script>";
//                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }

                    // Close the prepared statement
                    unset($stmt);
                }

            // Close connection
            unset($pdo);
            }
        } 
    }
  
 
public static function viewMyAccount($blogUserID) {
      $instance = Db::getInstance();
      //use intval to make sure $id is an integer
      $id = intval($blogUserID);
      $req = $instance->prepare('SELECT * FROM bloguser WHERE blogUserID = :blogUserID');
      //the query was prepared, now replace :id with the actual $id value
      $req->execute(array('blogUserID' => $id));
      
      $blogUser = $req->fetch();
//      var_dump($blogUser);
    if($blogUser){
        return new BlogUser($blogUser['blogUserID'], $blogUser['username'], $blogUser['firstName'], $blogUser['lastName'], $blogUser['email'], $blogUser['password'], $blogUser['profilePic']);
      }
      else
      {         
          echo "Query failed: " .$e->getMessage();
      }
}

public static function updateMyAccount($blogUserID, $firstName, $lastName, $email, $username) {
    //This is a bit quick and dirty in that it doesn't check the username is unique but it works enough for demo and I'm really tired now!
      $instance = Db::getInstance();
      $req = $instance->prepare('UPDATE blogUser SET username = :username, firstname = :firstname, lastname = :lastname,'
              . ' email = :email WHERE blogUserID = :blogUserID');
      //the query was prepared, now replace :id with the actual $id value
      
      //$req->execute(array('blogUserID' => $blogUserID));
      $req->bindParam(':username', $username, PDO::PARAM_STR);
      $req->bindParam(':firstname', $firstName, PDO::PARAM_STR);
      $req->bindParam(':lastname', $lastName, PDO::PARAM_STR);
      $req->bindParam(':email', $email, PDO::PARAM_STR);
      $req->bindParam(':blogUserID', $blogUserID, PDO::PARAM_STR);
      
      $blogUser = $req->execute();
      //We've now done the update. If successful this returns true
      //Now get the details to display on the page.
//      $instance = Db::getInstance();
//      $req = $instance->prepare("Insert into bloguser(profilePic) "
//                        . "values (:profilePic)");
      
      $profilePic = $_FILES['image']['name'];
//      var_dump($profilePic);
//      var_dump($blogUserID);
      $req = $instance->prepare("UPDATE bloguser set profilePic = :profilePic WHERE blogUserID = :blogUserID");
            
      $req->bindParam(':profilePic', $profilePic, PDO::PARAM_STR);
      $req->bindParam(':blogUserID', $blogUserID);
      $blogUser = $req->execute();

      if($blogUser){
        //return new BlogUser($blogUser['blogUserID'], $blogUser['username'], $blogUser['firstName'], $blogUser['lastName'], $blogUser['email'], $blogUser['password']);
        $blogUser = BlogUser::viewMyAccount($blogUserID);
        BlogUser::uploadFile($_FILES['image']['name']);
        return $blogUser;
      }
      else
      {         
          echo "Query failed: " .$e->getMessage();
      }
      //upload product image
  }

const AllowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'gif/svg'];
const InputKey = 'image';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
  
    public static function contactUs() {
      $list = [];
      $db = Db::getInstance();
      $sql = "SELECT name, email, subject, message"
          . "FROM contactUs;";
      $req = $db->query($sql);
      // we create a list of Product objects from the database results
      foreach($req->fetchAll() as $blogUser) {
        $list[] = new BlogUser($name['name'], $email['email'], $subject['subject'], $message['message']);
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
        $req = $db->prepare("Insert into contactUs (name, email, subject, message) values (:name, :email, :subject, :message)");
        $req->bindParam(':name', $name);
        $req->bindParam(':email', $email);
        $req->bindParam(':subject', $subject);
        $req->bindParam(':message', $message);
        
        // set parameters and execute
        if(isset($_POST['name'])&& $_POST['name']!=""){
        $filteredName = filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS);}
        
        if(isset($_POST['email'])&& $_POST['email']!=""){
        $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);}
        
        if(isset($_POST['subject'])&& $_POST['subject']!=""){
        $filteredSubject = filter_input(INPUT_POST,'subject', FILTER_SANITIZE_SPECIAL_CHARS);}
        
        if(isset($_POST['message'])&& $_POST['message']!=""){
        $filteredMessage = filter_input(INPUT_POST,'message', FILTER_SANITIZE_SPECIAL_CHARS);}
       
        $name = $filteredName;
        $email = $filteredEmail;
        $subject = $filteredSubject;
        $message = $filteredMessage;
        
        $req->execute();

        //upload product image
        //Product::uploadFile($name);
    }

   

 
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
        //$path = "C:/xampp/htdocs/blogFinalProject/views/images/";
        $path = dirname(__DIR__) . "/views/images/";
	$destinationFile = $path . $_FILES[self::InputKey]['name'];
        
	if (!move_uploaded_file($tempFile, $destinationFile)) {
		trigger_error("Handle Error");
	}
		
	//Clean up the temp file
	if (file_exists($tempFile)) {
		unlink($tempFile); 
	}
}
    
    
    //die() function calls replaced with trigger_error() calls
    //replace with structured exception handling


    
    
    
    
    
    
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