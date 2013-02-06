<?php
/******************************************************************************
 *      Inflector.php                                                         *
 *      - Contains defintions of inflection methods                           *
 *                                                                            *
 * This is a php implementation of most of rubyst DHH's inflection methods:   *
 *  http://dev.rubyonrails.org/browser/trunk/activesupport/                   *
 *    lib/active_support/inflections.rb (used under MIT license)              *
 *                                                                            *
 *                                                                            *
 * For details on adding/applying regular expressions, see Inflections.php    *
 *      https://github.com/ceekays/dbconnect                                  *
 *                                                                            *
 ******************************************************************************
 *                                                                            *
 *      Created on January 27, 2013                                           *
 *      by Edmond C. Kachale (Malawi)                                         *
 *      (kachaleedmond [at] gmail [dot] com)                                  *
 *                                                                            *
 ******************************************************************************/

  class Inflector{

    private static $rules = array();

    // initialize rule entries
    private static function init(){

      if(!isset(self::$rules['plurals']))
        self::$rules['plurals'] = array();

      if(!isset(self::$rules['singulars']))
        self::$rules['singulars'] = array();

      if(!isset(self::$rules['uncountables']))
        self::$rules['uncountables'] = array();
    }

    private static function strip_special_chars($string){
      return preg_replace('/[\\\_-]/i', " ", $string);
    }

    private static function strip_underscore_id($string){
      return preg_replace('/_id$/i', "", $string);
    }

    // set pluralization rule
    public static function set_plurals_rule($pattern, $replacement){
      self::init();

      $plurals = array_reverse(self::$rules['plurals'],true);
      $plurals[$pattern] = $replacement;
      self::$rules['plurals'] = array_reverse($plurals,true);
    }

    // set singularization rule
    public static function set_singulars_rule($pattern, $replacement){
      self::init();

      $singulars = array_reverse(self::$rules['singulars'],true);
      $singulars[$pattern] = $replacement;
      self::$rules['singulars'] = array_reverse($singulars,true);
    }

    // set irregulars rule
    public static function set_irregulars_rule($singular, $plural){
      self::init();

      $plu_pattern  = "/(".substr($singular,0,1).")".substr($singular,1)."$/i";
      $plu_replacement  = "$1".substr($plural,1);

      $sing_pattern = "/(".substr($plural,0,1).")".substr($plural,1)."$/i";
      $sing_replacement = "$1".substr($singular,1);

      self::set_plurals_rule($plu_pattern, $plu_replacement);
      self::set_singulars_rule($sing_pattern, $sing_replacement);
    }

    // set uncountables rule
    public static function set_uncountables_rule($string){
      self::init();

      self::$rules['uncountables'][] = $string;
    }

    //
    public static function pluralize( $string ){
      self::init();

      $string = strtolower($string);

      if (in_array($string, self::$rules['uncountables'])) return $string;

      while($rule = each(self::$rules['plurals'])){
        if(preg_match($rule['key'], $string ))
          return preg_replace($rule['key'], $rule['value'], $string);
      }

      return $string;
    }

    public static function singularize( $string ){
      self::init();

      $string = strtolower($string);

      if (in_array($string, self::$rules['uncountables'])) return $string;

      while($rule = each(self::$rules['singulars'])){
        if(preg_match($rule['key'], $string ))
          return preg_replace($rule['key'], $rule['value'], $string);
      }

      return $string;
    }

    public static function titleize($string){
      return ucwords(strtolower(self::strip_special_chars($string)));
    }

    /**************************************************************************
     * Convert a string into its camel case.
     * By default, camelize converts strings to UpperCamelCase.
     * To yield lowerCamelCase, set $uppercase parameter to false
     **************************************************************************/
    public static function camelize($string, $uppercase = true){
      if($uppercase) $string[0] = strtoupper($string[0]);

      $string = str_replace(' ', '_', $string);

      return preg_replace('/[\\\_-]([a-z])/e', "strtoupper('\\1')", $string);
    }

    /**************************************************************************
     * Convert a string into its underscored lowercase.
     **************************************************************************/
    public static function underscore($string){
      $string[0] = strtolower($string[0]);
      $string = str_replace(' ', '_', $string);

      return preg_replace('/([A-Z])/e', "'_'.strtolower('\\1')", $string);
    }

    /**************************************************************************
     * Convert a string into a sentence case and trips _id if it is a table id
     **************************************************************************/
    public static function humanize($string){
      $string[0] = strtoupper($string[0]);

      return self::strip_special_chars(self::strip_underscore_id($string));
    }

    /**************************************************************************
     * Convert a class name into its associated table name.
     **************************************************************************/
    public static function tableize($class_name){
      return self::pluralize(self::underscore($class_name));
    }

    /**************************************************************************
     * Convert a number into an ordinal string
     **************************************************************************/
    public static function ordinalize($number){
      if(!is_numeric($number)) return $number;

      if(in_array(((int)$number %100), range(11, 13))) return $number."th";

      switch((int)$number % 10){
        case 1:   return $number."st";
        case 2:   return $number."nd";
        case 3:   return $number."rd";
        default:  return $number."th";
      }
    }

    /**************************************************************************
     * Create a class name from a table name or a primary key
     **************************************************************************/
    public static function classify($name){
      return self::camelize(self::singularize(self::strip_underscore_id($name)));
    }
  }
?>

