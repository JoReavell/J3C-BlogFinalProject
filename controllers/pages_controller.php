<?php
//This redirects to the home page or error page on loading.
//This is called if the productController hasn't been used, ie we aren't trying to do a valid thing to a product
class PagesController {
   
    public function home() {
      //example data to use in the home page
        //We could set this as guest and then get it from SESSION once a user has logged in
//      $first_name = 'Lisa';
//      $last_name  = 'Simpson';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
    

    public function aboutUs() {
        // we expect a url of form ?controller=pages&action=aboutUs
        
            require_once('views/pages/aboutUs.php'); // show about us / contact page
        
    }
    public function contactUs() {
        // we expect a url of form ?controller=pages&action=aboutUs
        
            require_once('views/pages/contactUs.php'); // show about us / contact page
        
    }
}
?>
