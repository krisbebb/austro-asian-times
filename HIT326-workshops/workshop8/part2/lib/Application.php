<?php
function get($route,$callback){
    Application::register($route,$callback);
}

class Application{
    private static $instance;
    private static $route_found = false;
    private $route = "";
    
    
    public static function get_instance(){
        if(!isset(static::$instance)){
            static::$instance = new Application();
        }
        return static::$instance;
    }
    
    protected function __construct(){
        $this->route = $this->get_route();
    }
    
    /* What happens if you change the access modifier to Private or Protected */
    public function get_route(){
      return $_SERVER['REQUEST_URI'];  
    }
    
    public static function register($route,$callback){
        $application = static::get_instance();
        if($route == $application->route && !static::$route_found){
            static::$route_found = true;
            echo $callback($application);
        }
        else{
            return false;
        }
    }   
}



