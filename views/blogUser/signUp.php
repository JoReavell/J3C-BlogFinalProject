<!DOCTYPE html>

        <div class="wrapper-page">

            <div class="card">
                <div class="form-control card-body">

                    <h3 class="text-center mt-5 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="views/images/logo.png" height="40" alt="logo"></a>
                    </h3>

                    <div class="" style="margin-left: 35%">
                        <form action="" class="form-horizontal"  method="post">

                            <div class="row">
                                <div class="col-6">
                                    <input  class="form-control"  name="email" type="email" required="" placeholder="Email" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6" >
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6 ">
                                    <input class="form-control" name="confirm_password" type="password" required="" placeholder="Confirm Password" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                           
                            
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" name="firstName" type="text" required="" placeholder="First Name" value="">
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" name="lastName" type="text" required="" placeholder="Last Name" value="">
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            
                            
                           <div class="row">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center row m-t-20">
                                <div class="col-6">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit" value="submit">Register</button>
                                </div>
                            </div>
                            
                            <div class="m-t-10 mb-0 row">
                                <div class="col-6 m-t-20 text-center">
                                    <a href="?controller=blogUser&action=login" class="text-muted">Already have an account?</a>
                                </div>
                            </div>
                            
                        </form>
                        </div>

                </div>
            </div>
        </div>
