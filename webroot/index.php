<?php

try{

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');


require_once(ROOT.DS.'lib'.DS.'init.php');

App::run($_SERVER['REQUEST_URI']);

}
catch(Exception $e){
 echo "<hr>Exception: ". $e->getMessage()."<br>";
 echo "File: ". $e->getFile()."<br>";
 echo "Line ". $e->getLine()."<br>"."<hr>";
}

/////here all exception

