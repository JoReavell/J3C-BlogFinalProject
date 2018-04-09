<!DOCTYPE html>
<html>
<head>
	<title>Developer@Sky | Blogging Our Experience</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Bootstrap -->
	<!--<link rel='stylesheet' href='css/bootstrap.min.css'/>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel='stylesheet' href='css/font-awesome.min.css'/>
	<!-- Main Style -->
	<link rel='stylesheet' href='views/css/style.css'/>
	<!-- Google Fonts -->
	<link href='/fonts/sky-medium.woff' rel='stylesheet' type='text/css'>
	<link href='/fonts/sky-regular.woff' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="images/sky.jpg"/>
</head>
<body>
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
                        <a class="nav-link" href="?controller=blogPost&action=readAll">Something <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Project Journey</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">First Week</a>
                                <a class="dropdown-item" href="#">Second Week</a>
                                <a class="dropdown-item" href="#">Third Week</a>
                            </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right container-fluid menu-left">
                    <li class="nav-item">
                        <a class="nav-link icon fa fa-user " href="#">Sign Up</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link icon fa fa-sign-in " href="#">Login</a>
                    </li>

                </ul>
            </div>
    </div>           
</nav>
    <?php require_once('routes.php'); ?>

    <footer class="text-center footer">
    <div class="container">
	<div class="row">
            <div class="full col-md-12">
		<ul class="quick-link ">
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-youtube-play"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-soundcloud"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-vimeo-square"></i> </a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-rss"></i> </a></li>
                </ul>
                    <div class="copy-right">
			<p>Copyright J3C &copy; 2018 - All Rights Reserved. <a href="#">Developer@Sky</a></p>
                    </div>
            </div>
	</div>
    </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>