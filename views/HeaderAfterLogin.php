<?php
// Initialize the session (don't forget to close it on logout)
session_start();
 if (isset($_SESSION['username'])) { echo 'logged in'; }
// If session variable is not set it will redirect to login page
//if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
//  header("location: Login/Login.php");
//  exit;
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Developer@Sky | Blogging Our Experience</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Bootstrap -->
	<!--<link rel='stylesheet' href='css/bootstrap.min.css'/>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link href='css/fonts/sky-medium.woff' rel='stylesheet' type='text/css'>
	<link href='css/fonts/sky-regular.woff' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="images/sky.jpg"/>
        
        <!-- Main Style -->
        <link href="views/css/style.css" rel="stylesheet" type="text/css"/>
	
</head>
<body >
    <!--Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand " href="#"><img class="logo" src="views/images/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav navbar-left container-fluid">
                    <li class="nav-item active">
                        <a class="nav-link" href="?controller=blogPost&action=readAll">View All<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Browse By Topic</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="?controller=blogPost&action=searchByCategory&categoryID=3">JavaScript</a>
                                <a class="dropdown-item" href="?controller=blogPost&action=searchByCategory&categoryID=2">MySQL</a>
                                <a class="dropdown-item" href="?controller=blogPost&action=searchByCategory&categoryID=1">PHP</a>
                                <a class="dropdown-item" href="?controller=blogPost&action=searchByCategory&categoryID=4">General</a>
                            </div>
                    </li>        
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us/Contact</a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Blogs</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="?controller=blogPost&action=readAllMyPosts">Update</a>
                                <a class="dropdown-item" href="?controller=blogPost&action=create">Create</a>
                                <a class="dropdown-item" href="#">My Account</a>
                            </div>
                    </li> 
                </ul>
            </div>
    </div>
                    
<!--                    <ul class="navbar-nav navbar-right container-fluid menu-left">
                        <li class="nav-item">
                            <a class="nav-link icon fa fa-user " href="#">Log in</a>
                        </li>
         
                        <li class="nav-item" >
                            <a class="nav-link icon fa fa-sign-out " href="blogUser/Logout.php">Sign Out</a>
                        </li>
                        
                    </ul>-->
<!-- LOGIN DROP DOWN  -->                    
<div class="btn-group pr-1">
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img style="height: 20px; width: 20px;" src="images/user.png"></button>
    <div class="dropdown-menu">
        <a id="button" class="btn btn-secondary p-0" style="font-size:14px; height:24px;" href="?controller=blogUser&action=logout" role="button">Logout</a>
        <div class="dropdown-divider"></div>
        </div>
</div>
<!-- SEARCH BAR DROP DOWN  -->   
<div class="dropdown btn-group">
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img style="height: 20px; width: 20px;" src="images/magnif.png"></button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <form class="form-inline m-2" method="POST" action="?controller=blogPost&action=searchByKeyword">
            <input class="form-control mx-1 my-2" type="search" placeholder="Search" aria-label="Search" name="searchString">
            <button type="submit" class="btn btn-secondary mx-1 mt-0" style="font-size:12px; width:195px;">Search</button> 
        </form>
    </div>
</div>
      
</nav>
        
	<!-- End navigation -->
<!--</body>-->