<?php

class Lang{

    protected static $m_data;

    public static function load($lang_code){
        $lang_file_path = ROOT.DS.'lang'.DS.strtolower($lang_code).'.php';

        if(file_exists($lang_file_path)){
            self::$m_data = include($lang_file_path);
        }else{
            throw new Exception('Lang file not found '.$lang_file_path);
        }
    }

    public static function get($key, $default_value = ''){
        return isset(self::$m_data[strtolower($key)]) ? self::$m_data[strtolower($key)] : $default_value;
    }

}