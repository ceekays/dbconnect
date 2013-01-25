<?php
/******************************************************************************
 *      Singleton.php                                                         *
 *      - Implements a singleton pattern                                      *
 *                                                                            *
 *      https://github.com/ceekays/dbconnect                                  *
 *                                                                            *
 ******************************************************************************
 *                                                                            *
 *      Created on January 25, 2013                                           *
 *      by Edmond C. Kachale (Malawi)                                         *
 *      (kachaleedmond [at] gmail [dot] com)                                  *
 *                                                                            *
 ******************************************************************************/

abstract class Singleton {

//singleton instance
  private static $instances = array();

//to prevent external instantiation
  private function __construct() {}

//instance method
  final public static function instantiate() {

    $called_class = get_called_class();

    if (!isset(self::$instances[$called_class]))
      self::$instances[$called_class] = new $called_class;

    return self::$instances[$called_class];
  }
}

?>

