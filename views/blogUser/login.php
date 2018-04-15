<!DOCTYPE html>
<!--
<html>
    <head>
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../css/cssnewlog.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/style.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
      
    </head>


    <body>-->

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body" >

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="views/images/logo.png" class="logo logo-admin"><img src="views/images/logo.png" height="40" alt="logo"/></a>
                    </h3>

                    <div class="center-block" style="margin-left: 35%">
                        <form method="post" class="form-horizontal" action="?controller=blogUser&action=login">
                            
                        
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6 ">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            

                            <div class=" row">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center row m-t-20">
                                <div class="col-6">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit" value="login">Log In</button>  
                                    
                                </div>
                            </div>

                            <div class=" m-t-10 mb-0 row">
                                <div class="col-sm-4 m-t-20">
                                    <a href="../ForgotPass/ForgotPass.php"><small>Forgot your password ?</small></a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="?controller=blogUser&action=signUp"><small>Create an account ?</small></a>
                                </div>
                                
                            </div>
                            
                        </form>
                        

                    </div>

                </div>
            </div>
        </div>


<!--        
        
    </body>
</html>-->
