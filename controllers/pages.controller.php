<?php

class PagesController extends Controller{

    public function index(){
        $this->m_data['test_content'] = "Here will be a pages list";
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if( isset($params[0])){
            $alias = strtolower($params[0]);
            $this->m_data['content'] = "Here will be a page with '{$alias}' alias";
        }
    }


}