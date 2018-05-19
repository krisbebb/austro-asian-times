<?php
class Database{
    private static $connection = null;

    /* SET DATABASE CONNECTION DETAILS HERE FOR NOW.
       These details could go into a "config" file or associtive array, So the user of this object
       does not have to modify this base class.

       WARNING: This file must not be in the public document root for production mode. It has passwords etc. Don't be bad.
    */
    private $host = "localhost";
    private $database = "blogs_db";
    private $user = "root";
    private $password = "root";


    public function __construct(){
        try{
          if(self::$connection == null){
           self::$connection = new PDO("mysql:host={$this->host};dbname={$this->database}",$this->user,$this->password);
           self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           self::$connection->exec('SET NAMES "utf8"');
          }

        }
        catch(PDOException $e){
           throw new Exception("Cannot find database: {$e->getMessage()}");
        }
    }

    public function prepare($query){
        try{
            return self::$connection->prepare($query);
        }
        catch(PDOException $e){
           throw new Exception("Could not prepare the query. {$e->getMessage()}");
        }

    }

}
