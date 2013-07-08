<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
//ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//New taxonomies


$terms = array(
    // Geographic coverage
    array(26, 'European Union', 'http://www.geonames.org/6695072', 0, 'http://www.geonames.org/6695072'),
);

foreach ($terms as $value) {
  list($vid,$name,$desc,$w,$term_uri) = $value;

  // check if term already exists - by description
  $tid = db_fetch_object(db_query('SELECT tid FROM {term_data} WHERE description = \'%s\'', $desc));
  if (!$tid) {
    $term = array(
      'vid'           => $vid,
      'name'          => $name,
      'description'   => $desc,
      'weight'        => $w,
    );
    taxonomy_save_term($term);
    $tid = $term['tid'];
    
    //Insert the tid + uri in term_fields_term
    if (!empty($term_uri)) {
      $query = "INSERT INTO term_fields_term (tid, vid, taxonomy_uri_value) VALUES (%d, %d, '%s')";
      db_query($query, $tid, $vid, $term_uri);
    }
    echo "\n$name ($desc) is new - saved";
  } else {
    echo "\n$name ($desc) already exists - skip";
  }

}

?>