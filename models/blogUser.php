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
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->profilePic = $profilePic;
    }


    public static function signUp() {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO bloguser (username, firstName, lastName, email, password, profilePic) "
                . "VALUES (:username, :firstName, :lastName, :email, :password, :defaultPic)");        
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

        $firstName = $filteredFirstName;
        $lastName = $filteredLastName;
         
        // Validate password
        if(!empty(trim($_POST['password']))){
            if(strlen(trim($_POST['password'])) < 6){
                $password_err = "Password must have at least 6 characters.";
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
        $defaultPic = 'default.jpg';

        $req->bindParam(':username', $param_username, PDO::PARAM_STR);
        $req->bindParam(':password', $param_password, PDO::PARAM_STR);
        $req->bindParam(':firstName', $param_firstName, PDO::PARAM_STR);
        $req->bindParam(':lastName', $param_lastName, PDO::PARAM_STR);
        $req->bindParam(':email', $param_email, PDO::PARAM_STR);
        $req->bindParam(':defaultPic', $defaultPic, PDO::PARAM_STR);
              
        if ($req->execute()){

           return "You successfully signed up!";
        } else{
           return "Something went wrong. Please try again later.";
        }
    }

    
    public static function login(){
      $instance=Db::getInstance();
      $req=$instance->prepare("SELECT username, password FROM bloguser WHERE username = :username"); 

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            // Check if username is empty(if the username inserted in the field is empty) 
            if(empty(trim($_POST["username"]))){
                $username_err = 'Please enter your username.';
                return $username_err;
            } else{
                $username = trim($_POST["username"]);
            }

            // Check if password is empty(if the username inserted in the field is empty) 
            if(empty(trim($_POST['password']))){
                $password_err = 'Please enter your password.';
                return $password_err;
            } else{
                $password = trim($_POST['password']);
            }

            // Validate credentials with MySQL (check if what the user is posting is the same with the user from mysql
            if(empty($username_err) && empty($password_err)){
                $sql = "SELECT username, password, blogUserID, firstName, lastName, profilePic FROM bloguser WHERE username = :username";
                if($stmt = $instance->prepare($sql)){
                    $param_username = trim($_POST["username"]);
                    $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
                    if($stmt->execute()){
                        if($stmt->rowCount() == 1){

                            if($row = $stmt->fetch()){
                                $hashed_password = $row['password'];

                                if(password_verify($password, $hashed_password)){
                                    
                                    $param_password = trim($_POST["password"]);
                                    $_SESSION['username'] = $username;
                                    $_SESSION['userID'] = $row['blogUserID'];
                                    $_SESSION['firstname'] = $row['firstName'];
                                    $_SESSION['lastname'] = $row['lastName'];
                                    $_SESSION['profilepic'] = $row['profilePic'];

                                    $loginSuccess = "You logged in!";
                                    return $loginSuccess;
                                }else {
                                    $password_err = 'The password you entered was incorrect.';
                                    return $password_err;
                                }
                            } 

                        } 
                        else { 
                            $password_err = "The username or password you entered was incorrect. Please try again";
                            return $password_err;
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

public static function updateMyAccount($blogUserID, $firstName, $lastName, $email) {
   
      $instance = Db::getInstance();
      $req = $instance->prepare('UPDATE blogUser SET firstname = :firstname, lastname = :lastname,'
              . ' email = :email WHERE blogUserID = :blogUserID');
      //the query was prepared, now replace :id with the actual $id value
     
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
      $blogProfileSuccess = TRUE;
      if ($_FILES['image']['name'] != "") {
        BlogUser::uploadFile($_FILES['image']['name']);
        //If there is a file to upload then update the database. Otherwise don't.
        $profilePic = $_FILES['image']['name'];
        $req = $instance->prepare("UPDATE bloguser set profilePic = :profilePic WHERE blogUserID = :blogUserID");
        $req->bindParam(':profilePic', $profilePic, PDO::PARAM_STR);
        $req->bindParam(':blogUserID', $blogUserID);
        $blogProfileSuccess = $req->execute();
      }

      if($blogUser && $blogProfileSuccess){
        //return new BlogUser($blogUser['blogUserID'], $blogUser['username'], $blogUser['firstName'], $blogUser['lastName'], $blogUser['email'], $blogUser['password']);
        $blogUser = BlogUser::viewMyAccount($blogUserID);
        return $blogUser;
      }
      else
      {         
          echo "Query failed: " .$e->getMessage();
      }
      //upload product image
  }

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

const AllowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'gif/svg'];
const InputKey = 'image';

 public static function uploadFile(string $name) {

	if (empty($_FILES[self::InputKey])) {
		//die("File Missing!");
                trigger_error("File Missing!");
	}
	if ($_FILES[self::InputKey]['error'] > 0) {
		trigger_error("Handle the error! " . $_FILES[self::InputKey]['error']);
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