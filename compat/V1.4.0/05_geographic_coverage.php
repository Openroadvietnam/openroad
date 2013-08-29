<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//Add URI to the geographic coverage taxonomy (old = country)
$terms = array(
  array('Africa','http://sws.geonames.org/6255146'),
  array('Albania','http://sws.geonames.org/783754'),
  array('Asia','http://sws.geonames.org/6255147'),
  array('Australia','http://sws.geonames.org/2077456'),
  array('Austria','http://sws.geonames.org/2782113'),
  array('Belgium','http://sws.geonames.org/2802361'),
  array('Bosnia and Herzegovina','http://sws.geonames.org/3277605'),
  array('Bulgaria','http://sws.geonames.org/732800'),
  array('Central & South America','http://sws.geonames.org/6255150'),
  array('Croatia','http://sws.geonames.org/3202326'),
  array('Cyprus','http://sws.geonames.org/146669'),
  array('Czech Republic','http://sws.geonames.org/3077311'),
  array('Denmark','http://sws.geonames.org/2623032'),
  array('Estonia','http://sws.geonames.org/453733'),
  array('Europa','http://sws.geonames.org/6255148'),
  array('Finland','http://sws.geonames.org/660013'),
  array('France','http://sws.geonames.org/3017382'),
  array('Germany','http://sws.geonames.org/2921044'),
  array('Greece','http://sws.geonames.org/390903'),
  array('Hungary','http://sws.geonames.org/719819'),
  array('Iceland','http://sws.geonames.org/2629691'),
  array('Ireland','http://sws.geonames.org/2963597'),
  array('Italy','http://sws.geonames.org/3175395'),
  array('Latvia','http://sws.geonames.org/458258'),
  array('Lithuania','http://sws.geonames.org/597427'),
  array('Luxembourg','http://sws.geonames.org/2960313'),
  array('Malta','http://sws.geonames.org/2562770'),
  array('Netherlands','http://sws.geonames.org/2750405'),
  array('North America','http://sws.geonames.org/6255149'),
  array('Norway','http://sws.geonames.org/3144096'),
  array('Oceania','http://sws.geonames.org/6255151'),
  array('Poland','http://sws.geonames.org/798544'),
  array('Portugal','http://sws.geonames.org/2264397'),
  array('Romania','http://sws.geonames.org/798549'),
  array('Slovakia','http://sws.geonames.org/3057568'),
  array('Slovenia','http://sws.geonames.org/3190538'),
  array('Spain','http://sws.geonames.org/2510769'),
  array('Sweden','http://sws.geonames.org/2661886'),
  array('Switzerland','http://sws.geonames.org/2658434'),
  array('Turkey','http://sws.geonames.org/298795'),
  array('United Kingdom','http://sws.geonames.org/2635167'),
);

foreach($terms as $term) {
  //Insert the uri in term_fields_term
  $vid = variable_get('country_vid', 26);
  $query = "INSERT INTO term_fields_term (tid, vid, taxonomy_uri_value)
            SELECT tid, %s, '%s' FROM term_data WHERE name = '%s' AND vid = %d";
  db_query($query, $vid, $term[1], $term[0], $vid);
}