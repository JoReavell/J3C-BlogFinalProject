<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../css/cssnew.css" rel="stylesheet" type="text/css"/>
        <title>Sign Up</title>
        
    </head>


    <body>
        
<!-- This php code is just to temp store the variables so can test the signup form displays correctly in browser -->        
<?php
    $userID;
     $username="";
     $password ="";
     $confirm_password ="";
     $email="";
     $firstName= "";
     $lastName = "";
    
     $username_err = "";
     $password_err = "";
     $confirm_password_err = "";
     $firstName_err = "";
     $lastName_err = "";
     $email_err = "";
    ?>
<!-- delete above php once MVC is sorted -->



<div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="../Images/SL@1X.png" height="40" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal"  method="post">

                            <div class="row">
                                <div class="col-12 <?php //echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                    <input  class="form-control"  name="email" type="email" required="" placeholder="Email" value="<?php //echo $email; ?>">
                                    <span class="help-block"><?php //echo $email_err; ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 <?php //echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username" value="<?php //echo $username; ?>">
                                    <span class="help-block"><?php //echo $username_err; ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12  <?php //echo (!empty($password_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password" value="<?php //echo $password; ?>">
                                    <span class="help-block"><?php //echo $password_err; ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12  <?php //echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="confirm_password" type="password" required="" placeholder="Confirm Password" value="<?php //echo $confirm_password; ?>">
                                    <span class="help-block"><?php //echo $confirm_password_err; ?></span>
                                </div>
                            </div>
                           
                            
                            <div class="row">
                                <div class="col-12 <?php //echo (!empty($firstName_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="firstName" type="text" required="" placeholder="First Name" value="<?php //echo $firstName; ?>">
                                    <span class="help-block"><?php //echo $firstName_err; ?></span>

                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?> ">
                                    <input class="form-control" name="lastName" type="text" required="" placeholder="Last Name" value="<?php //echo $lastName; ?>">
                                    <span class="help-block"><?php //echo $lastName_err; ?></span>

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
                                    <a href="login.php" class="text-muted">Already have an account?</a>
                                </div>
                            </div>
                            
                        </form>
                        </div>

                </div>
            </div>
        </div>
    </body>
</html>