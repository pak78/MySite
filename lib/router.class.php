<?php

class Router{

    protected $m_uri;
    protected $m_controller;
    protected $m_action;
    protected $m_params;
    protected $m_route;
    protected $m_method_prefix;
    protected $m_language;

    public function getRoute(){
        return $this->m_route;
    }
    public function getMethodPrefix(){
        return $this->m_method_prefix;
    }
    public function getLanguage(){
        return $this->m_language;
    }
    public function getUri(){
        return $this->m_uri;
    }
    public function getController(){
        return $this->m_controller;
    }
    public function getAction(){
            return $this->m_action;
    }
    public function getParams(){
            return $this->m_params;
    }
    public function __construct($uri){

        $this->m_uri = urldecode(trim($uri,'/'));

        //Get default param.

        $routes = Config::get('routers');
        $this->m_route = Config::get('default_router');
        $this->m_method_prefix = isset($routes[$this->m_route]) ? $routes[$this->m_route] : '';
        $this->m_controller = Config::get('default_controller');
        $this->m_action = Config::get('default_action');
        $this->m_language = Config::get('default_language');

        $uri_parts = explode('?', $this->m_uri);

        // get path: /lng/controller/action/param1/param2.....

        $path = $uri_parts[0];
        $path_parts = explode('/', $path);

        //get route or language at first element

        if(count($path_parts)){
            if(in_array(strtolower(current($path_parts)), array_keys($routes))){
                 $this->m_route = strtolower(current($path_parts));
                 $this->m_method_prefix = isset($routes[$this->m_route]) ? $routes[$this->m_route] : '';
                 array_shift($path_parts);
            } elseif (in_array(strtolower(current($path_parts)), Config::get('languages'))){
                  $this->m_language = strtolower(current($path_parts));
                  array_shift($path_parts);
            }

            //get controller next element
            if(current($path_parts)){
                $this->m_controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            if(current($path_parts)){
                $this->m_action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            $this->m_params = $path_parts;
        }











    }


}

