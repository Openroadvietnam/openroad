<?php

ini_set('ini_set register_argc_argv', 1);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/delete_vf_error.log');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


#####################
# PREPARE ARGUMENTS #
#####################

$options = getopt("p:f:n:");

if (empty($options['p']) || empty($options['f']) || empty($options['n'])) {
  echo ("\r\nMissing a parameter.\n\r");
  get_usage();
  exit;
}

$joinup_path = $options['p'];
$vf_list_path = $options['f'];
$vf_name = $options['n'];

// -p : joinup path //
if (!file_exists($joinup_path . '/includes') && !file_exists($joinup_path . '/sites')) {
  get_error("The path to joinup sources is not correct: '$joinup_path'");
}

// -f file to vf map //
if (!file_exists($vf_list_path) || !is_file($vf_list_path)) {
  get_error("The file '$vf_list_path' is not found");
} elseif (!is_writable($vf_list_path)) {
  get_error("The file '$vf_list_path' is not writable");
}

$theme = variable_get('theme_default', NULL);
$theme_path = drupal_get_path('theme', $theme);
$vf_stylessheets = $joinup_path . "/" . $theme_path . "/styles/" . $vf_name;

if (!file_exists($vf_stylessheets)){
  echo "The directory '$vf_stylessheets' is not found".PHP_EOL;
}elseif (!is_writable($vf_stylessheets)){
  get_error("The directory '$vf_stylessheets' is not writable");
}

############################
# DELETE VF NAME IN VF.MAP #
############################
$lines = file($vf_list_path);

$ok = FALSE;
// search lines and delete 
foreach ($lines as $num => $line) {
  $data = split(' ', $line);
  if (strpos($data[0], $vf_name) === 0) {
    $ok = TRUE;
    unset($lines[$num]);
  }
}
if (!$ok) {
  echo "The virtual forge '$vf_name' is not found in file '$vf_list_path' " . PHP_EOL;
} else {
  $handle = fopen($vf_list_path, 'w+');
  fwrite($handle, implode("", $lines));
  fclose($handle);
}

#################
# DELETE TABLES #
#################

$sql = "SHOW TABLES LIKE '%s_%' ";
$querry = db_query($sql, $vf_name);
while ($result = db_fetch_array($querry)) {
  $tables[] = array_shift($result);
}

foreach ($tables as $key => $table_name) {
  $sql = sprintf("DROP TABLE %s", $table_name);
  $result = db_query($sql);
  if (!$result) {
    echo "Error deleting table {$table_name}" . PHP_EOL . " Request: {$sql}" . PHP_EOL;
  }
}

##############
# DELTE TERM #
##############

$tid = db_result(db_query("SELECT tid FROM term_data WHERE name='%s' AND vid='%d'", $vf_name, variable_get('isa_vf_access_vid_virtual_forge', -1)));
taxonomy_del_term($tid);

######################
# REMOVE STYLE SHEET #
######################

clear_directory ($vf_stylessheets);

 if (file_exists($vf_stylessheets)){
   echo "Error, the directory '$vf_stylessheets' is still".PHP_EOL;
 }
 
echo PHP_EOL."The virtual forge '$vf_name' is deleted.".PHP_EOL;


#############
# FUNCTIONS #
#############


/**
 * Delete the directory
 *
 * @param string $dossier  path to the directory
 */
function clear_directory($dossier) {
  $ouverture = @opendir($dossier);
  if (!$ouverture)
    return;
  while ($fichier = readdir($ouverture)) {
    if ($fichier == '.' || $fichier == '..') {
      continue;
    }
    if (is_dir($dossier . "/" . $fichier)) {
      clear_directory($dossier . "/" . $fichier);
    } else {
      @unlink($dossier . "/" . $fichier);
    }
  }
  closedir($ouverture);
  @rmdir($dossier);
}


/*
 * Displays a message and exit script
 */
function get_error($message) {
  echo PHP_EOL . $message . PHP_EOL;
  echo "The virtual forge is not deleted.".PHP_EOL ;
  exit;
}

/**
 * Get parameters usage
 */
function get_usage() {
  echo PHP_EOL . "Usage: " . PHP_EOL;
  echo "-p \t Path to joinup sources.Example: /var/www/joinup." . PHP_EOL;
  echo "-f \t Path to the map virtual forge file. Example: /var/www/joinup/vf.map." . PHP_EOL;
  echo "-n \t Name of the virtual forge" . PHP_EOL;
}