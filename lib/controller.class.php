<?php

class Controller{

    protected $m_data;
    protected $m_model;
    protected $m_params;

    public function getData(){
        return $this->m_data;
    }

    public function getModel(){
        return $this->m_model;
    }

    public function getParams(){
        return $this->m_params;
    }

    public function __construct($data = array()){
        $this->m_data = $data;
        $this->m_params = App::getRouter()->getParams();
    }

}

 