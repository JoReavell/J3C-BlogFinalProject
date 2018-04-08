<?php
//Include config file
require_once 'db-config.php';
 
//Define variables and initialized with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
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
        $sql = "SELECT username, password FROM Member WHERE username = :username";
        //A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.
        if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        //[With bindParam] the variable is bound as a reference and will only be evaluated at the time that PDOStatement::execute() is called.
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters (Strip whitespace (or other characters) from the beginning and end of a string with trim)
            $param_username = trim($_POST["username"]);
            
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
                    session_start();
                    $_SESSION['username'] = $username; 
                    //thake the user to the landing page
                    header("location: ../index.php");
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
}
?>

<!DOCTYPE html>

<html>
    <head>
        
        <meta charset="utf-8" />
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../css/cssnewlog.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
        
    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">
                    
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="../images/logo.png" class="logo logo-admin"><img src="../images/logo.png" height="40" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal m-t-20">
                            
                        
                            <div class="row">
                                <div class="col-12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username" value="<?php echo $username; ?>">
                                    <span class="help-block"><?php echo $username_err; ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password" onblur="return validateForm();">
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
                            </div>
                            
                            

                            <div class=" row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center row m-t-20">
                                <div class="col-12">
                                    <a href=""></a>  
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit" value="Login">Log In</button>
                                </div>
                            </div>

                            <div class=" m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="../ForgotPass/ForgotPass.php"><small>Forgot your password ?</small></a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="../SignUp/SignUpp.php"><small>Create an account ?</small></a>
                                </div>
                            </div>
                            
                        </form>
                        
    
<!--//   require_once("/Applications/XAMPP/xamppfiles/htdocs/LibraryCSS/Login/connection.php");-->
 
   
<!--//    if(!empty($_POST)){
//    $_SESSION["username"] = $_POST['username'];
//    $_SESSION["password"] = $_POST['password'];
//    $username = $_POST['username'];
//    $password = $_POST['password'];
//    $hashed_password= password_hash($password, PASSWORD_DEFAULT);
//    }
//    
//        if(password_verify($password, $hashed_password)) {
//        if(password_needs_rehash($hashed_password, PASSWORD_DEFAULT)){
//            
//        }
//        $sql = "SELECT username, password FROM Member WHERE username=? AND 
//        password=? ";
//        $query = $conn->prepare($sql);
//        $query->execute(array($username,$password));
//
//        if($query->rowCount() >= 1) {
//        $_SESSION['username'] = $username;
//        echo "<a href='../index.php'>Login</a><br>";
//    
//    if(empty($_SESSION)) {
//    echo "Welcome Guest".'<br>';
//    echo "<a href='../index.php'>Login</a><br>";
//}   } else {
//            $message = "Username/Password is wrong";
//        }
//
//    
//    } -->
    
    
   
   
<!--//    if(isset($_POST['login'])){
//    $username = $_POST['username'];
//    $password = $_POST['password'];
//    $hashed_password= password_hash($password, PASSWORD_DEFAULT);
//    $message = "";
//    }
//    if(password_verify($password, $hashed_password)) {
//        if(password_needs_rehash($hashed_password, PASSWORD_DEFAULT)){
//            
//        }
//        $sql = "SELECT username, password FROM Member WHERE username=? AND 
//        password=? ";
//        $query = $conn->prepare($sql);
//        $query->execute(array($username,$password));
//
//        if($query->rowCount() >= 1) {
//            $_SESSION['username'] = $username;
//            
//            echo "<a href='../index.php'>Login</a><br>";
//        } else {
//            $message = "Username/Password is wrong";
//        }
//    }
    // If the password inputs matched the hashed password in the database
    // Do something, you know... log them in.

   // Else, Redirect them back to the login page.

    -->
    
    
<!--    
//    require_once("/Applications/XAMPP/xamppfiles/htdocs/LibraryCSS/Login/connection.php");
//    

//LogIn();
//
//function LogIn()
//{
//
//   $log_username = mysql_real_escape_string($_POST['username']);
//    $log_password = mysql_real_escape_string($_POST['password']);
//
//    $query = "SELECT password FROM Member WHERE username = '$log_username'";
//    $storedPassword = mysql_query("SELECT password FROM Member WHERE username = '$log_username'");
//    $row = mysql_fetch_row($storedPassword);
//    $storedUsername = mysql_query("SELECT username FROM Member WHERE username = '$log_username'");
//    $UsernameTrow = mysql_fetch_row($storedUsername);
//    $options = [
//        'cost' => 12,
//    ];
//
//    $hash = password_hash($row, PASSWORD_BCRYPT);
//    $data = mysql_query ($query)or die(mysql_error());
//    if($data)
//    {
//        if (password_verify($log_password, $row[0])) 
//        {
//            //echo "Valid login";
//            session_start(); 
//            $_SESSION["uname"] = $log_username;
//            echo "<a href='../index.php'>Login</a><br>";
//        }
//        else 
//        {
//            echo 'Invalid username or password.';
//        }
//    }
//}



//require_once("/Applications/XAMPP/xamppfiles/htdocs/LibraryCSS/Login/connection.php");

//if(isset($_POST['submit'])){
//	$username = trim($_POST['username']);
//	$password = trim($_POST['password']);
//	
//	$sql = "SELECT * FROM Member where username = '".$username."'";
//	$rs = mysqli_query($pdo,$sql);
//	$numRows = mysqli_num_rows($rs);
//	
//	if($numRows  == 1){
//		$row = mysqli_fetch_assoc($rs);
//		if(password_verify($password,$row['password'])){
//		echo "<a href='../index.php'>Login</a><br>";	
//		}
//		else{
//			echo "Wrong Password";
//		}
//	}
//	else{
//		echo "No User found";
//	}
//}-->
 
<!--//
//if(isset($_POST['submit'])){
//		
//		$username = $_POST['username'];
//		$password = $_POST['password'];
//		
//		$options = array("cost"=>4);
//		$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
//		
//		$sql = "INSERT INTO Member(first_name, surname, username, password, email_address, telephone, house_number, postcode)
//                VALUES('".$first_name."', '".$surname."', '".$username."', '".$password."', '".$email_address."', '".$telephone."', '".$house_number."', '".$postcode."')"; 
//		$result = mysqli_query($pdo, $sql);
//		if($result)
//		{
//			echo "Registration successfully";
//		}
//	}
//        -->
  

<!--
// 
// $dsn = "mysql:dbname=Library";
// $username = "root";
// $password = "";
//            
//    try {
//        $conn = new PDO( $dsn, $username, $password );
//        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//        } catch (Exception $e) {
//        echo "connection failed: ".$e->getMessage();
//        }
//        $sql = "SELECT * FROM Member";
//            
//        echo "<ul>";
//            
//       try {
//        $rows = $conn->query($sql );
//        foreach( $rows as $row ) {
//        echo "<li> " .$row["username"] . " " . $row["password"] . " </li>";
//                    
//        }
//        }   catch( PDOException $e ) {
//        echo "Query failed: " .$e->getMessage();
//            }
//            
//        echo "</ul>";
//        $conn = null;
// 
////            $user = $_POST['username'];
////            $pass = $_POST['password'];
//            
//        if((($row["username"])===($_POST["username"])) && (($row["password"])===($_POST["password"]))){
//            
//        
//        
//        if(($row["username"]) === ($_POST["username"])){
//        echo "<a href='../index.php'><button class='btn btn-danger btn-block waves-effect waves-light' type='submit' value='login'>Login</button></a><br>";   
//        }else{
//         echo"You're stupid";
//        }
//        }
//            
//      include_once 'class.php';
//        $object=new DBH;
//        $object ->connect();
//        echo "baby";  
          //print_r(PDO:: getAvailableDrivers());

//    require_once("/Applications/XAMPP/xamppfiles/htdocs/LibraryCSS/Login/connection.php");

//    if(isset($_SESSION['username'])){
//    header("location: ../index.php");
//    }
//    require "connection.php";
//
//    if(isset($_POST['login'])){
//    $username = $_POST['username'];
//    $password = $_POST['password'];
//    $message = "";
//
//    if(empty($username) || empty($password)) {
//        $message = "Username/Password can't be empty";
//    } else {
//        $sql = "SELECT username, password FROM Member WHERE username=$username AND 
//      password=$password ";
//        $query = $conn->prepare($sql);
//        $query->execute(array($username,$password));
//
//        if($query->rowCount() >= 1) {
//            $_SESSION['username'] = $username;
//            echo "<a href='../index.php'>Login</a><br>";
////            header("location: ../index.php");
//        } else {
//            $message = "Username/Password is wrong";
//        }
//    }
//    }
 
 
// $dsn = "mysql:dbname=Library";
//            $username = "root";
//            $password = "";
//            
//            try {
//                $conn = new PDO( $dsn, $username, $password );
//                $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//            } catch (Exception $e) {
//                echo "connection failed: ".$e->getMessage();
//            }
//            $sql = "SELECT * FROM authors";
//            
//            echo "<ul>";
//            
//            try {
//                $rows = $conn->query( $sql );
//                foreach( $rows as $row ) {
//                    echo "<li> " .$row["first_name"] . " " . $row["middle_name"] . " " . $row["surname"] . "</li>";
//                    
//                }
//            }   catch( PDOException $e ) {
//                echo "Query failed: " .$e->getMessage();
//            }
//            
//            echo "</ul>";
//            
//        ?>
 -->
 

<!--//$db = 'your PDO database connection that was already created'; 
// 
//# Get username and password from the login form 
//$username = $_POST['username'];
//$password = $_POST['password'];
// 
//$sql = "SELECT username, password FROM users WHERE username = ? and password = ?";
// 
//$query = $db->prepare( $sql );
//$query->execute( [ $username, $password ] ); 
// 
//if ( $query )
//{ 
//    # Do stuff 
//    foreach( $query as $user ) 
//    {
//        echo "Sup, {$user['username']}"; 
//    } 
//}

//    if(isset($_POST['login'])){
//    $username = $_POST['username'];
//    $password = $_POST['password'];
//    $hash= password_hash($password, PASSWORD_DEFAULT);
//    $message = "";
//
//    if(password_verify($password, $hashed_password)) {
//        if(password_needs_rehash($hashed_password, PASSWORD_DEFAULT)){
//            
//        }
//        $sql = "SELECT username, password FROM Member WHERE username=? AND 
//        password=? ";
//        $query = $conn->prepare($sql);
//        $query->execute(array($username,$password));
//
//        if($query->rowCount() >= 1) {
//            $_SESSION['username'] = $username;
//            
//            echo "<a href='../index.php'>Login</a><br>";
//        } else {
//            $message = "Username/Password is wrong";
//        }
//    }
//    -->
    
<!--    // If the password inputs matched the hashed password in the database
    // Do something, you know... log them in.

   // Else, Redirect them back to the login page.


//    if(empty($username) || empty($password)) {
//        $message = "Username/Password con't be empty";
//    } else {
//        $sql = "SELECT username, password FROM Member WHERE username=? AND 
//      password=? ";
//        $query = $conn->prepare($sql);
//        $query->execute(array($username,$password));
//
//        if($query->rowCount() >= 1) {
//            $_SESSION['username'] = $username;
//            
//            header("location: ../index.php");
//        } else {
//            $message = "Username/Password is wrong";
//        }
//    }-->
  

    
 
                       
                    </div>

                </div>
            </div>
        </div>


        
        
    </body>
</html>
