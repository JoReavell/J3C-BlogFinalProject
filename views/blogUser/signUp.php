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
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="../Images/SL@1X.png" height="40" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <form action="" class="form-horizontal"  method="post">

                            <div class="row">
                                <div class="col-12">
                                    <input  class="form-control"  name="email" type="email" required="" placeholder="Email" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12" >
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 ">
                                    <input class="form-control" name="confirm_password" type="password" required="" placeholder="Confirm Password" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                           
                            
                            <div class="row">
                                <div class="col-12">
                                    <input class="form-control" name="firstName" type="text" required="" placeholder="First Name" value="">
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <input class="form-control" name="lastName" type="text" required="" placeholder="Last Name" value="">
                                    <span class="help-block"></span>

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