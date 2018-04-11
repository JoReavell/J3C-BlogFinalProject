<?php
// Include config file
require_once "../Login/db-config.php";
 
// Define variables and initialize with empty values
$username="";
$password ="";
$confirm_password ="";
$email="";
$firstName= "";
$lastName = "";

$username_err = $password_err = $confirm_password_err = "";
$firstName_err = $lastName_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username: just to validate the username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement from MySQL
        $sql = "SELECT blogUserID FROM bloguser WHERE username = :username";
        //prepare the statement
        
        if($stmt = $pdo->prepare($sql)){
           // Bind variables to the prepared statement as parameters
           //[With bindParam] the variable is bound as a reference and will only be evaluated at the time that PDOStatement::execute() is called.
//            $param_username = $username;
            
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters for username
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    //
    
    
    // Validate password: just to have a validation for pass
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
//            && empty($first_name_err) && empty($surname_err) && empty($email_address_err) && empty($telephone_err) && empty($house_number_err) && empty($postcode_err) ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO bloguser (username, password, firstName, lastName, email) VALUES (:username, :password, :firstName, :lastName, :email)";
        
       
        
        
        // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_firstName = $firstName;
            $param_lastName = $lastName;
            $param_email = $email;
            
            //catch the post
       
            if($stmt = $pdo->prepare($sql)){
//            
           $param_firstName = trim($_POST["firstName"]);
           $param_lastName = trim($_POST["lastName"]);
           $param_email = trim($_POST["email"]);
           
//            
//            Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
            $stmt->bindParam(':firstName', $param_firstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $param_lastName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
              
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: ../Login/Login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
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
        <title>SignUp</title>
    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="../Images/SL@1X.png" height="40" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal"  method="post">

                            <div class="row">
                                <div class="col-12 <?php echo (!empty($email_address_err)) ? 'has-error' : ''; ?>">
                                    <input  class="form-control"  name="email" type="email" required="" placeholder="Email" value="<?php echo $email; ?>">
                                    <span class="help-block"><?php echo $email_err; ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username" value="<?php echo $username; ?>">
                                    <span class="help-block"><?php echo $username_err; ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password" value="<?php echo $password; ?>">
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="confirm_password" type="password" required="" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
                                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                </div>
                            </div>
                           
                            
                            <div class="row">
                                <div class="col-12 <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="firstName" type="text" required="" placeholder="First Name" value="<?php echo $firstName; ?>">
                                    <span class="help-block"><?php echo $firstName_err; ?></span>

                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="lastName" type="text" required="" placeholder="lastName" value="<?php echo $lastName; ?>">
                                    <span class="help-block"><?php echo $lastName_err; ?></span>

                                </div>
                            </div>
                            
                            
                           <div class="row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit" value="submit">Register</button>
                                </div>
                            </div>
                            
                            <div class="m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                    <a href="../Login/Login.php" class="text-muted">Already have account?</a>
                                </div>
                            </div>
                            
                        </form>
                        </div>

                </div>
            </div>
        </div>

    </body>
</html>