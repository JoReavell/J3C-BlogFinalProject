
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Developer@Sky | Blogging Our Experience</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Google Fonts -->
	<!--<link href='views/css/fonts/sky-medium.woff' rel='stylesheet' type='text/css'>-->
	<!--<link href='views/css/fonts/sky-regular.woff' rel='stylesheet' type='text/css'>-->
        <link rel="icon" href="views/images/favicon/favicon.ico">
        
        <!-- Main Style -->
        <link href="views/css/style.css" rel="stylesheet" type="text/css"/>
        
        <!--JS-->
        
	
</head>
<body>
<!--Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <div class="container">
        <a class="navbar-brand " href="index.php"><img class="logo" src="views/images/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav navbar-left container-fluid">
                    <li class="nav-item active">
                        <a class="nav-link" href="?controller=blogPost&action=readAll">Recent Posts<span class="sr-only">(current)</span></a>
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
                        <a class="nav-link" href="?controller=pages&action=aboutUs">About Us</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=pages&action=contactUs">Contact</a>
                    </li>
                    <?php 
                    //If we are logged in display the links to my posts and logged in message.
                    if(!empty($_SESSION)) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Posts</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="?controller=blogPost&action=readAllMyPosts">Update</a>
                                <a class="dropdown-item" href="?controller=blogPost&action=create">Create</a>
                                
                            </div>
                    </li>
                    
                    <?php } ?>
                </ul>
          
       
            <!-- LOGIN DROP DOWN  --> 
                       <div class=" navbar-nav navbar-right container-fluid menu-left">

            <?php 
            if(!empty($_SESSION)){
                //display log out button if we are logged in
                ?>

            
            <div class=" btn-group pr-1">
                <button class="btn btn-sm btn-outline-secondary" type="button"  data-toggle="dropdown">
                <img style="width: 25px;" src="views/images/user.png"></button>
                <div class="dropdown-menu" style="width:180px;">
                    <?php    
            echo "<h6 style='margin-left: 22%'> Hello " . $_SESSION["firstname"] . "." . "</h6>";?>
                    <a id="button" class="btn btn-primary center-block" style="font-size:8px; height:24px; width:125px;" href="?controller=blogUser&action=viewMyAccount">My Account</a>
                    <a id="button" class="btn btn-primary center-block" style="font-size:8px; height:24px; width:125px;" href="?controller=blogUser&action=logout" role="button">Logout</a>
                </div>
            </div>
            
            <?php 
            
            
            } else  {
                
                //display login button if we are not logged in
                ?> 
            <div class="btn-group pr-1 right"> 
                <button class="btn btn-sm btn-outline-secondary " type="button"  data-toggle="dropdown"  >
                <img style=" width: 25px;" src="views/images/user.png"></button>
                <div class="dropdown-menu" style="width:180px;">
                    <a id="button" class="btn btn-primary center-block" style="font-size:16px; height:48px; width:125px;" href="?controller=blogUser&action=login" role="button">Login</a>
                    <a id="button" class="btn btn-secondary p-0" style="font-size:14px; height:24px; width:125px;" href="?controller=blogUser&action=signUp" role="button">Register</a>
                </div>
            </div>
                 
            <?php }
            ?>
            <!-- SEARCH BAR DROP DOWN  -->   
            <div class="dropdown btn-group">
                <button class="btn btn-sm btn-outline-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img style=" width: 25px;" src="views/images/magnif.png"></button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form class="form-inline m-2" method="POST" action="?controller=blogPost&action=searchByKeyword">
                        <input class="form-control mx-1 my-2" type="search" placeholder="Search" aria-label="Search" name="searchString">
                        <button type="submit" class="btn btn-secondary mx-1 mt-0" style="font-size:12px; width:195px">Search</button> 
                    </form>
                </div>
            </div>
                       </div>     
</div>
         
    </div>    
</nav>
        
<!-- End navigation -->
<!--</body>-->