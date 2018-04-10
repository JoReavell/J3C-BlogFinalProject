<?php
// Initialize the session (don't forget to close it on logout)
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../blogUser/login.php");
  exit;
}
?>
<p>Hello there  <?php if (!empty($_SESSION)) {echo "<h1>Hello " . $_SESSION['username'] . "," . "</h1>";}?>
<!--<p>Hello there <php echo $first_name . ' ' . $last_name; ?>!<p>-->
<p>The above data is present to demonstrate the utilisation of variables 
populated earlier within the page processing</p>
<p>This is the home page of the blog application</p>
<p>Click <a href="?controller=blogPost&action=readAll">here</a> to view all blog posts!</p>
    
    