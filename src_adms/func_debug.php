<?php

/*
 * function to display the size of current variables
 * 
 */


// convertion d'un nombre d'octet en kB, MB, GB
function convert_SIZE($size)
{
    $unite = array('B','kB','MB','GB');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unite[$i];
}

// liste toutes les variables active et leur taille mémoire 
function aff_variables() 
{
   echo '<br/>';
   global $datas ;
   foreach($GLOBALS as $Key => $Val)
   {
      if ($Key != 'GLOBALS') 
      {   
         echo' <br/>'. $Key .' &asymp; '.sizeofvar( $Val );
      }
   }
    echo' <br/>';
}


//affiche l'empreinte mémoire  d'une variable
function sizeofvar($var) 
{

  $start_memory = memory_get_usage();   
  $temp =unserialize(serialize($var ));   
  $taille = memory_get_usage() - $start_memory;
  return convert_SIZE($taille) ;
}

//affiche des info sur l'espace mémoire du script PHP 
function memory_stat()
{
   echo  'Mémoire -- Utilisé : '. convert_SIZE(memory_get_usage(false)) .
   ' || Alloué : '.
   convert_SIZE(memory_get_usage(true)) .
   ' || MAX Utilisé  : '.
   convert_SIZE(memory_get_peak_usage(false)).
   ' || MAX Alloué  : '.
   convert_SIZE(memory_get_peak_usage(true)).
   ' || MAX autorisé : '.
   ini_get('memory_limit') ;  ;
}


?>
