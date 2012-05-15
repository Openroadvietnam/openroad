<?php

// Use script coder_format.php for all files (.module,.info,.inc,.php) 
// in modules/custom and themes/isa_icp folders
//
//
//

ini_set('display_errors', 1);


parcours('./sites/all/modules/custom');
parcours('./sites/all/themes/isa_icp');

function parcours($chemin) {
  $dossier = opendir($chemin);  // open directory
  if (!$dossier)
    return; //oups

  while ($entree = readdir($dossier)) {
    if ($entree == "." || $entree == "..") // current directory or previous directory
      continue;
    $cheminEntree = $chemin . '/' . $entree;
    if (is_dir($cheminEntree)) { // in directory
      parcours($cheminEntree); // explores this directory...
    } else {
      $tab = explode(".", $entree);
      $extension = array('module', 'info', 'inc', 'php'); 
      if (in_array($tab[count($tab) - 1], $extension)) { // check format type
      //if ( strpos ($entree, '.module') !== FALSE && strpos ($entree,'.svn-base') === FALSE){
      //echo "$cheminEntree \r\n";
      //echo $cheminEntree."\r\n";
        // uses script coder_format.php to format the file
        $result = @shell_exec('php ./sites/all/modules/contributed/coder/scripts/coder_format/coder_format.php ' . $cheminEntree);
        unlink($cheminEntree . '.coder.orig');
      }
    }
  }
}

