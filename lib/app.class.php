<?php

class App{

   protected static $m_router;

   public static function getRouter()
    {
        return self::$m_router;
    }

   public static function run($uri){
       self::$m_router = new Router($uri);

       Lang::load(self::$m_router->getLanguage());

       $controller_class =
           ucfirst(self::$m_router->getController()).'Controller';
       $controller_method = strtolower(self::$m_router->getMethodPrefix().self::$m_router->getAction());

       $controller_object = new $controller_class;

       if (method_exists($controller_object, $controller_method)){
           $view_path = $controller_object->$controller_method();
           $view_object = new View($controller_object->getData(), $view_path);
           $content = $view_object->render();
       }else{
           throw new Exception ('Method '.$controller_method. ' of class '. $controller_class .' don`t exist');
       }

       $layout = self::$m_router->getRoute();
       $layout_path = VIEWS_PATH.DS.$layout.'.html';
       $layout_view_object = new View(compact('content'), $layout_path);
       echo $layout_view_object->render();
   }
}