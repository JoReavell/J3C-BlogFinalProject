<!-- is logged in????? -->
<?php   
if(!empty($_SESSION)){
    require_once 'HeaderAfterLogin.php';
}   
 else {
        require_once 'Header.php';
}
 ?> 
    
<?php require_once('routes.php'); ?>

<?php require_once 'Footer.php'; ?>
