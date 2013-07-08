#!/bin/bash

set -e
set -x

current_script=$(readlink -f $0)
# we assume the script is in the patches directory
patch_dir=$(dirname "${current_script}")

# we assume the patch directory is located in sites/core_patches, i.e. two levels below the Drupal root directory
drupal_dir=$(readlink -f "${patch_dir}/../..")
echo "Applying patches to ${drupal_dir}..."

cd "${drupal_dir}" || (echo "Unable to change directory to ${drupal_dir}"; exit 20)

for patch_file in "${patch_dir}/"*.patch "${patch_dir}/"*.diff; do
	test -f "${patch_file}" || continue 
	echo "Attempting to apply ${patch_file}..."
	patch -p0 -b -i "${patch_file}"
done
