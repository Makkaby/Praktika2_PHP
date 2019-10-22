<?php 
require_once "vendor/autoload.php";
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
var_dump(app);
class country { 
   public $code;
   public $name;
   public $continent;
   public $region;
   public $surfacearea;
   public $indepyear;
   public $population;
   public $lifeexpectancy;
   public $gnp;
   public $gnpold;
   public $localname;
   public $governmentform;
   public $headofstate;
   public $capital;
   public $code2;

} 
?>