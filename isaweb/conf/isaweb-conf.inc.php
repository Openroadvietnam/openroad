<?php
/*
	Common configuration for ISA/Web scripts.
*/

// adjust include path - we expect the "isacommon" directory to be a sibling of isaweb/
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/../../isacommon');

// The ISA server is the MySQL database of the ISA Drupal application.
define('ISA_SERVER',        'isadrupalserver');
define('ISA_DB_USERNAME',   'isa');
define('ISA_DB_PASSWORD',   'change me');
define('ISA_DB_NAME',       'isa');

// This directory will host lock files
define('LOCK_DIR', '/tmp');

/* Database-related options */
// Name of the table storing repositories operations
// Note this value must include the Drupal table prefix, if any
define('WEB_DIRECTORIES_TABLE', 'web_directories');
/// Field name for the task id
define('TASK_ID_FIELD', 'web_id');
/// Field name for the result data
define('TASK_DATA_FIELD', 'action_data');

/* web directories options */
// Parent directory for all web directories
// Note the directory must exist and be writable.
define('WEB_ROOT_DIR', '/path/to/parent/directory/of/web/directories');
// Skeleton directory when creating a web directory
// Do not define this constant if you do not want directories to be initialized this way
define('WEB_SKELETON', dirname(__FILE__) . '/../conf/web-skeleton');

// Default quota checked every day for each web directory
define('WEB_DEFAULT_QUOTA', 100 * 1048576);
// array of web directories not to be checked
$WEB_DIRECTORIES_WHITELIST = array('trustedproject');
// Array associating web directories with custom quotas
$WEB_DIRECTORIES_QUOTA = array('example' => 42 * 1048576);

/* RewriteMap-related options */
// Path to the map to be updated when creating, enabling or disabling a web directory
define('WEB_MAP_FILEPATH', '/path/to/web_directories.map');
// optional command that will be called after the map is updated, to allow its replication
define('WEB_SYNC_MAP_SCRIPT', '');
