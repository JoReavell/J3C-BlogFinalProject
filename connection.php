<?php

class DB {
    
    private static $instance = NULL;

    //Singleton Design Pattern
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        try {
            self::$instance = new PDO('mysql:host=localhost;dbname=blogDatabase', 'blogUser', 'password1', $pdo_options);
            return self::$instance;
        }
        catch (Exception $e)    {
            echo '<script>alert("No database found")</script>';
            return call('pages','error');
            die();
        }      
      }
    }
}
?>