@ECHO OFF
REM Prérequis: L'outil patch http://gnuwin32.sourceforge.net/downlinks/patch.php
REM Ce script met à jour automatiquement le core à partir de la liste fourni dans le fichier directory.txt
REM 

REM we assume the script is in the patches directory
SET current_path=%CD%

REM we assume the patch directory is located in sites/core_patches, i.e. two
REM levels below the Drupal root directory
cd ../..
echo Applying patches to %CD%...
FOR /f %%f IN ('DIR /B %current_path%\*.patch') DO (
	echo Attempting to apply %current_path%\%%f...
	patch -p0 -b -i %current_path%\%%f
)

pause
exit
