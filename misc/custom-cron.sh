#!/bin/sh

function __msend() {
	level="INFO"
	if [ "$3" = "MAJOR" ]; then
		level="MAJOR"
	fi
	
	NbOfRetryRef=3
	SecTimeOut=30

	until [[ $NbOfRetry -eq 0 ]] ; do
		/usr/sbin/msend -n @more-integration.cc.cec.eu.int:1828 -a JOB_EV -r $level -b "mc_object_class='DIGIT-JOINUP';mc_object='$1';mc_parameter='JobStatus';mc_parameter_value='$2'" 1>/dev/null 2>&1
		
		if [[ $? -ne 0  &&  $NbOfRetry -gt 1 ]];then
		{
			# The mcell call failed...trying another time
			sleep $SecTimeOut
			let NbOfRetry=$NbOfRetry-1
		}
		elif [[ $? -ne 0  && $NbOfRetry -eq 1 ]];then
		{
			echo "The mcell call failed..."
			exit 1
		}
		else
		{
			NbOfRetry=0;
		}
		fi
	done
}	

# Configuration
stdout_path="/tmp/cron.$$.out"
stderr_path="/tmp/cron.$$.err"
wget_command="/usr/bin/wget -S -t 1 -O ${stdout_path} -o ${stderr_path}"

url='http://server/path/to/cron.php'
target_addr="dlfr-ce-drupal-isa.ext@atos.net"
# The target file is used to trace the last execution of the script - please use
# one file per instance (e.g. applicationname-instancename)
target_file='/tmp/fpfis-drupal-joinup-devel-cron.log'

__msend WEB_CRON STARTED
		
# Work
echo -e "Last execution of $(whoami)@$(hostname):$(readlink -f $0) on $(date '+%F %T') \n" > ${target_file}
${wget_command} "${url}"
wget_exit_code=$?

mail_subject="Execution of $(whoami)@$(hostname):$(readlink -f $0)"

# Analyze the wget exit code and output
if [ ${wget_exit_code} -gt 0 ] || ! grep -q '200 OK' "${stderr_path}"; then
	(
		echo "$(date '+%F %T'): wget returned ${wget_exit_code} along with the following output:"
		echo '---'
		cat "${stderr_path}"
		echo '---'
		echo "... when trying to fetch ${url}."
		if [ -s ${stdout_path} ]; then
			echo 'Downloaded content:'
			cat "${stdout_path}"
		else
			echo 'No content was downloaded.'
		fi
	) | mail -s "${mail_subject}" ${target_addr}
	__msend WEB_CRON ERROR MAJOR
fi

# Analyze the PHP script output, which is expected to be empty
if [ -s ${stdout_path} ]; then
	(
		echo "The PHP script at ${url} output something:"
		cat "${stdout_path}"
	) | mail -s "${mail_subject}" ${target_addr}
	__msend WEB_CRON ERROR MAJOR
fi

unlink "${stdout_path}"
unlink "${stderr_path}"

__msend WEB_CRON TERMINATED

exit 0
