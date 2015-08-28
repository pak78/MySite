<?php


class View{

    protected $m_data;
    protected $m_path;

    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if(!$router)
            return false;
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.html';

        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }

    public function __construct($data = array(), $path = null){
        if(!$path){
        $path = self::getDefaultViewPath();
    }
        if(!file_exists(($path))){
            throw new Exception('Template file is not found in path',$path);
    }
        $this->m_data = $data;
        $this->m_path = $path;
    }

    public function render(){
        $data = $this->m_data;
        ob_start();
        include($this->m_path);
        $content = ob_get_clean();

        return $content;
    }
}
 