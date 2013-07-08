<?php

ini_set('ini_set register_argc_argv', 1);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/create_vf_errors.log');
error_reporting(E_ALL);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


#####################
# PREPARE ARGUMENTS #
#####################

$options = getopt("p:f:n:u:");

if (empty($options['p']) || empty($options['f']) || empty($options['n'])) {
  echo ("\r\nMissing a parameter.\n\r");
  get_usage();
  exit;
}
if (!empty($options['u'])) {
  $user = $options['u'];
  $uid = db_result(db_query("SELECT uid from users where name='%s'", $user));
  if (!$uid) {
    get_error("The user '$user' is not found in the database.");
  }
}

$joinup_path = $options['p'];
$vf_list_path = $options['f'];
$vf_name = $options['n'];

// -p : joinup path //
if (!file_exists($joinup_path . '/includes') && !file_exists($joinup_path . '/sites')) {
  get_error("The path to joinup sources is not correct: '$joinup_path'");
}
$theme = variable_get('theme_default', NULL);
$theme_path = drupal_get_path('theme', $theme);
$styles_path = $joinup_path . "/" . $theme_path . "/styles";
if (!is_writable($styles_path)) {
  get_error("The directory '$styles_paths' is not writable.");
}

// -f file to vf map //
if (!file_exists($vf_list_path) || !is_file($vf_list_path)) {
  get_error("The file '$vf_list_path' is not found");
} elseif (!is_writable($vf_list_path)) {
  get_error("The file '$vf_list_path' is not writable");
}

// -n virtual forge name //
if (!preg_match('/^[-_a-z0-9]+$/', $vf_name)) {
  get_error("The virtual forge name '$vf_name' is not correct.".PHP_EOL ."Please only use lowercase characters, digits, underscores or dash for the virtual forge name");
}

if (exec("grep -w $vf_name $vf_list_path")) {
  get_error("A virtual forge '$vf_name' already exist.");
}

############################
# INSERT VF NAME IN VF.MAP #
############################

$vf_list = fopen($vf_list_path, 'a+') or die("can't open file: " . $vf_list_path);
fwrite($vf_list, "$vf_name enabled".PHP_EOL );
fclose($vf_list);


###################
## CREATE TABLES  #
###################

$tables = array('users_roles', 'cache');
$sql = "SHOW TABLES LIKE 'cache_%' ";
$querry = db_query($sql);
while ($result = db_fetch_array($querry)) {
  $tables[] = array_shift($result);
}

foreach ($tables as $key => $table_name) {
  $sql = sprintf("CREATE TABLE %s LIKE %s", $vf_name . '_' . $table_name, $table_name);
  $result = db_query($sql);
  if (!$result) {
    echo "Error creating table {$vf_name}_{$table_name}".PHP_EOL." Request: {$sql}".PHP_EOL;
  }
}

###############
# CREATE TERM #
###############

$form_values['name'] = $vf_name;
$form_values['vid'] = variable_get ("isa_vf_access_vid_virtual_forge",40);
taxonomy_save_term($form_values);

################
# ADD VF ADMIN #
################
if ($uid){
  $rid = variable_get ("vf_admin_rid");  
  db_query("INSERT INTO %s_users_roles (uid, rid) VALUES (%d,%d)",$vf_name,$uid,$rid);  
}
####################
# COPY STYLE SHEET #
####################

$source = $joinup_path . "/" . $theme_path . "/styles/default";
$destination = $joinup_path . "/" . $theme_path . "/styles/" . $vf_name;
copy_directory($source, $destination);
copy_directory($source, $destination.'/theme_editor_backup','bak');

$sql = "INSERT INTO %s_users_roles (uid, rid)
        SELECT uid, rid
        FROM {users_roles} ur
        WHERE ur.rid = '%d'
        OR ur.rid = '%d'";
          $result_insert = db_query( $sql,$vf_name,variable_get ('moderator_rid',NULL),variable_get('administrator_rid'));


echo PHP_EOL."The virtual forge '$vf_name' has successfully created.".PHP_EOL;



#############
# FUNCTIONS #
#############

/**
 * copy a directory source to a destination directory
 * 
 * @param string $source path to the source directory
 * @param string $destination path to the destination directory
 */
function copy_directory($source, $destination,$file_extension = NULL) {
  if (is_dir($source)) {
    @mkdir($destination);

    copy_own_grp_perm($source, $destination);
    $directory = dir($source);
    while (FALSE !== ( $readdirectory = $directory->read() )) {
      if ($readdirectory == '.' || $readdirectory == '..') {
        continue;
      }
      $PathDir = $source . '/' . $readdirectory;
      if (is_dir($PathDir)) {
        copy_directory($PathDir, $destination . '/' . $readdirectory);
        continue;
      }
      if ($file_extension){
        $readdirectory = $readdirectory.'.'.$file_extension;
      }
      
      copy($PathDir, $destination . '/' . $readdirectory);
      copy_own_grp_perm($PathDir, $destination . '/' . $readdirectory);
    }

    $directory->close();
  } else {
    copy($source, $destination);
    copy_own_grp_perm($source, $destination);
  }
}



/**
 * copy the owner,group and permissions of source to destination
 * 
 * @param type $source
 * @param type $destination 
 */
function copy_own_grp_perm($source, $destination) {
  if (file_exists($source) && file_exists($destination)) {
    @chown($destination, fileowner($source));
    @chmod($destination, fileperms($source));
    @chgrp($destination, filegroup($source));
  }
}

/*
 * Get parameters usage
 */

function get_usage() {
  echo PHP_EOL."Usage: ".PHP_EOL;
  echo "-p \t Path to joinup sources.Example: /var/www/joinup.".PHP_EOL ;
  echo "-f \t Path to the map virtual forge file. Example: /var/www/joinup/vf.map.".PHP_EOL ;
  echo "-n \t Name of the new virtual forge (only use lowercase characters, digits, underscores or dash).".PHP_EOL;
  echo "-u \t The username of the virtual forge admin.".PHP_EOL;
}

/*
 * Displays a message and exit script
 */

function get_error($message) {
  echo PHP_EOL . $message . PHP_EOL;
  echo "The virtual forge is not created.".PHP_EOL ;
  exit;
}