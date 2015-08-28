<?php

class Config{

    protected static $m_settings = array();

    public static function get($key){

        return isset(self::$m_settings[$key]) ? self::$m_settings[$key] : null;
    }

    public static function set($key, $value){
            self::$m_settings[$key] = $value;
    }
}