<?php

class DB {
    
    private static $instance = NULL;

    //Singleton Design Pattern
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
//       self::$instance = new PDO('mysql:host=localhost;dbname=blogDatabase', 'blogUser', 'password1', $pdo_options);
        self::$instance = new PDO('mysql:host=skydev.clhot6jhrn6b.eu-west-1.rds.amazonaws.com;dbname=SkyDev', 'SkyDev', '$2018SkyDev', $pdo_options);
      }
      return self::$instance;
    }
}
?>
<!--define(‘DB_NAME’, $_SERVER[‘RDS_DB_NAME’]);
define(‘DB_USER’, $_SERVER[‘RDS_USERNAME’]);
define(‘DB_PASSWORD’, $_SERVER[‘RDS_PASSWORD’]);
define(‘DB_HOST’, $_SERVER[‘RDS_HOSTNAME’]);
define(‘DB_CHARSET’, ‘utf8’);
define(‘DB_COLLATE’, ‘’);\
baza de date:
ARN
arn:aws:rds:eu-west-1:446491677593:db:skydev
Endpoint
skydev.clhot6jhrn6b.eu-west-1.rds.amazonaws.com
DB Name
SkyDev
Username
SkyDev
Pass
$2018SkyDev
Engine
MySQL 5.7.17-->