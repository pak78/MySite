<?php

class App{

   protected static $m_router;

   public static function getRouter()
    {
        return self::$m_router;
    }

   public static function run($uri){
       self::$m_router = new Router($uri);

       $controller_class =
           ucfirst(self::$m_router->getController()).'Controller';
       $controller_method = strtolower(self::$m_router->getMethodPrefix().self::$m_router->getAction());

       $controller_object = new $controller_class;

       if (method_exists($controller_object, $controller_method)){
           $result = $controller_object->$controller_method();
       }else{
           throw new Exception ('Method '.$controller_method. ' of class '. $controller_class .' don`t exist');
       }
   }
}