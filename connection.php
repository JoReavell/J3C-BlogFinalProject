<?php

class DB {
    
    private static $instance = NULL;

    //Singleton Design Pattern
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
//        self::$instance = new PDO('mysql:host=localhost;dbname=blogDatabase', 'blogUser', 'password1', $pdo_options);
        self::$instance = new PDO('arn:aws:rds:eu-west-1:446491677593:db:skydev, mysql:host=skydev.clhot6jhrn6b.eu-west-1.rds.amazonaws.com
; dbname=SkyDev', 'blogUser', '$2018SkyDev', $pdo_options);

      }
      return self::$instance;
    }
}
?>
