<?php
/******************************************************************************
 *      Helpers.php                                                           *
 *      - Contains miscellaneous handy functions for DBConnect                *
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

  /**************************************************************************
   * This is like Ruby's 'inspect' method. Whenever you are not sure, dump
   **************************************************************************/
  function dump($object) {
    echo "<pre>";
      print_r($object);
    echo "</pre>";
    exit;
  }

  /**************************************************************************
   * Find the last element in an array
   **************************************************************************/
  function array_last($array){
    if(!is_array($array)) return null;
    if(sizeof($array) < 1) return null;

    $keys = array_keys($array);
    $last = $keys[sizeof($keys) - 1];

    return $array[$last];
  }

  /**************************************************************************
   * Checks if an array is a 'hash' (i.e. it is an associative array)
   **************************************************************************/
  function is_hash($array){
      if(!is_array($array)) return false;
      $keys       = array_keys($array);
      $key_range  = array_keys($keys);

      if($keys !== $key_range) return true;

    return false;
  }

  /**************************************************************************
   * Flattens an array of arrays (if any)
   * Credit: http://snippets.dzone.com/posts/show/4660
   **************************************************************************/
  function array_flatten(array $array){
	  $i = 0;
	  $n = count($array);

	  while ($i < $n){
	    if (is_array($array[$i]))
	      array_splice($array,$i,1,$array[$i]);
      else
        ++$i;

		  $n = count($array);
    }
    return $array;
  }
?>

