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
        $sql = "SELECT username, password FROM bloguser WHERE username = :username";
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
        <link href="../css/cssnew.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
        
    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="../Images/SL@1X.png" class="logo logo-admin"><img src="../Images/SL@1X.png" height="40" alt="logo"></a>
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
                        

                    </div>

                </div>
            </div>
        </div>


        
        
    </body>
</html>
