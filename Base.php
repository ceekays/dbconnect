<?php
/******************************************************************************
 *      Base.php                                                              *
 *      - Contains an autoload function for DBConnect                         *
 *                                                                            *
 *      https://github.com/ceekays/dbconnect                                  *
 *                                                                            *
 ******************************************************************************
 *                                                                            *
 *      Created on January 27, 2013                                           *
 *      by Edmond C. Kachale (Malawi)                                         *
 *      (kachaleedmond [at] gmail [dot] com)                                  *
 *                                                                            *
 ******************************************************************************/

  require 'lib/Singleton.php';
  require 'lib/Connection.php';
  require 'lib/DBConnectExceptions.php';
  require 'lib/Helpers.php';
  require 'lib/Inflector.php';
  require 'lib/Inflections.php';
  require 'lib/DBQuery.php';

  require 'lib/DBConnect.php';

  function __autoload_db_connect($class_name){
    $class_path = DBConnect::get_models_path();
    $class_path = null;
    $base_path  = realpath(isset($class_path) ? $class_path : '.');

    $class_path  = $base_path ;
    $class_path .= str_replace('_', DIRECTORY_SEPARATOR, $class_name);
    $class_path .= '.php';

    try{
      if (file_exists($class_path))
        require $class_path;
      else
        throw new DBConnectException('unable to load '.$class_path);
    } catch(DBConnectException $e){
      $e-.getMessage();
    }
  }

  spl_autoload_register('__autoload_db_connect');
?>

