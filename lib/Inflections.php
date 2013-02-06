<?php

/******************************************************************************
 *      Inflections.php                                                       *
 *      - Contains inflection rules.                                          *
 *                                                                            *
 *      - The rules are applied in reverse from from bottom up,               *
 *        so new rules are added at the end of each section                   *
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

/*************************** plurals ******************************************/
  Inflector::set_plurals_rule("/$/","s");
  Inflector::set_plurals_rule("/s$/i","s");
  Inflector::set_plurals_rule("/(us)$/i","$1es");
  Inflector::set_plurals_rule("/(ax|test)is$/i","$1es");
  Inflector::set_plurals_rule("/(octop)us$/i","$1i");
  Inflector::set_plurals_rule("/(alias)$/i","$1es");
  Inflector::set_plurals_rule("/(bu)s$/i","$1ses");
  Inflector::set_plurals_rule("/(tomat|potat|ech|her|vet)o$/i","$1oes");
  Inflector::set_plurals_rule("/([ti])um$/i","$1a");
  Inflector::set_plurals_rule("/sis$/i","ses");
  Inflector::set_plurals_rule("/(shea|lea|loa|thie)f$/i","$1ves");
  Inflector::set_plurals_rule("/(?:([^f])fe|([lr])f)$/i","$1$2ves");
  Inflector::set_plurals_rule("/(hive)$/i","$1s");
  Inflector::set_plurals_rule("/([^aeiouy]|qu)y$/i","$1ies");
  Inflector::set_plurals_rule("/(x|ch|ss|sh)$/i","$1es");
  Inflector::set_plurals_rule("/(matr|vert|ind)ix|ex$/i","$1ices");
  Inflector::set_plurals_rule("/([m|l])ouse$/i","$1ice");
  Inflector::set_plurals_rule("/^(ox)$/i","$1en");
  Inflector::set_plurals_rule("/(quiz)$/i","$1zes");
  /* add your own pluralization rules here */
/******************************************************************************/

/************************** singulars *****************************************/
  Inflector::set_singulars_rule("/s$/i","");
  Inflector::set_singulars_rule("/(us)es$/i","$1");
  Inflector::set_singulars_rule("/(corpse)s$/i","$1");
  Inflector::set_singulars_rule("/(h|bl)ouses$/i","$1ouse");
  Inflector::set_singulars_rule("/(n)ews$/i","$1ews");
  Inflector::set_singulars_rule("/([ti])a$/i","$1um");
  Inflector::set_singulars_rule("/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i","$1$2sis");
  Inflector::set_singulars_rule("/(^analy)ses$/i","$1sis");
  Inflector::set_singulars_rule("/(shea|loa|lea|thie)ves$/i","$1f");
  Inflector::set_singulars_rule("/(li|wi|kni)ves$/i","$1fe");
  Inflector::set_singulars_rule("/(hive)s$/i","$1");
  Inflector::set_singulars_rule("/(tive)s$/i","$1");
  Inflector::set_singulars_rule("/([lr])ves$/i","$1f");
  Inflector::set_singulars_rule("/([^aeiouy]|qu)ies$/i","$1y");
  Inflector::set_singulars_rule("/(s)eries$/i","$1eries");
  Inflector::set_singulars_rule("/(m)ovies$/i","$1ovie");
  Inflector::set_singulars_rule("/(x|ch|ss|sh)es$/i","$1");
  Inflector::set_singulars_rule("/([m|l])ice$/i","$1ouse");
  Inflector::set_singulars_rule("/(bus)es$/i","$1");
  Inflector::set_singulars_rule("/(o)es$/i","$1");
  Inflector::set_singulars_rule("/(shoe)s$/i","$1");
  Inflector::set_singulars_rule("/(cris|ax|test)es$/i","$1is");
  Inflector::set_singulars_rule("/(octop|vir)i$/i","$1us");
  Inflector::set_singulars_rule("/(alias)es$/i","$1");
  Inflector::set_singulars_rule("/^(ox)en$/i","$1");
  Inflector::set_singulars_rule("/(vert|ind)ices$/i","$1ex");
  Inflector::set_singulars_rule("/(matr)ices$/i","$1ix");
  Inflector::set_singulars_rule("/(quiz)zes$/i","$1");
  /* add your own singularization rules here */
/******************************************************************************/

/************************ irregulars ******************************************/
  Inflector::set_irregulars_rule("child","children");
  Inflector::set_irregulars_rule("foot","feet");
  Inflector::set_irregulars_rule("goose","geese");
  Inflector::set_irregulars_rule("man","men");
  Inflector::set_irregulars_rule("move","moves");
  Inflector::set_irregulars_rule("person","people");
  Inflector::set_irregulars_rule("sex","sexes");
  Inflector::set_irregulars_rule("tooth","teeth");
  /* add your own irregular pattern rules here */
/******************************************************************************/

/************************* uncountables ***************************************/
  Inflector::set_uncountables_rule('deer');
  Inflector::set_uncountables_rule('equipment');
  Inflector::set_uncountables_rule('fish');
  Inflector::set_uncountables_rule('information');
  Inflector::set_uncountables_rule('money');
  Inflector::set_uncountables_rule('rice');
  Inflector::set_uncountables_rule('series');
  Inflector::set_uncountables_rule('sheep');
  Inflector::set_uncountables_rule('species');
  /* add your own uncountable rules here */
/******************************************************************************/
?>

