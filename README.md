AUTO-BACKUP-SERVER-FILES-WITH-PHP
===================================
X-BACKUP SERVER PHP SCRIPT

**This is a simple automated server side file backup built with php
**File multiple files was gotten from stackoverflow and modified by Atsu Emmanuel
**Email: atsuemmanuel@gmail.com 
**Simply place this single page php script on your server in the directory to be backed-up
**Finally, create a folder with the name 'xbackup' in that same directory, this is where all backups will reside
**Thats all, the folder or directory in which this file is placed will have all files archived with .zip and backed-up 
**Now, you can call the script via a browser to run a backup
**You can also setup a cron job to automatically backup the server monthly

LARAVEL SEUPT
=================
For users making use of laravel, add the below line of code in the .web.php file.

Route::get('/xbackup', function() { return view('pages/xbackup');});


CONFIGURATIONS
=================
Under PHP Configurations of your server, you may have to set up the maxExecutionTime to about 600sec (10mins) to allow.

Then you are to add this 'xbackup.php' script in your views folder of your laravel project.


SETTING UP CRON-JOBS FOR CONTINOUS BACKUP WITHOUT YOUR EFFORT
==============================================================
To setup full automatic backup on your php server, you will have to setup the cron job e.g. to a monthly backup where by the server does auto backup.

- (1) Go to the home directory of your server
- (2) Drop the 'xbackup.php' script inside this home directory
- (3) Create a folder in the home directory called 'xbackup'
- (4) Go to your cron jobs feature of your server and set the cron job to the frequency to run this script, and also locate the script in the cron job section.
- (5) Thats all! Your backup is done atomaically every month or week or day depending on what you set up
- (6) All your backups are stored in the 'xbackup' folder in the home directory

CRON-JOB METHOD
==================
This is the best backup method, as it can backup different subdirectories for you automatically
- If you are using a cron job to auto backup, then you will create the backup folder in the home directory of your server,
- You will also drop the 'xbackup.php' script in the home directory
- Then ensure to change the parameters in the 'xbackup.php' script to the values below

- $path_to_backup = "./public_html/"; //this is the directory to be backup
- $path_to_output = "xbackup/BACKUP_".$backup_name."_".$backup_time.".zip"; //this is the directory to store backup


Set cron-job as below 
=======================

- 0 0 1 * *	  
- (Set the above time for 1 month action in your cron job feature)

----------------------

- /usr/local/bin/php /home/wealthcr/public_html/path/to/cron/script
- (Set the above cron job command to link to the cron job script)

----------------------

- /usr/local/bin/ea-php99 /home/wealthcr/domain_path/path/to/cron/script
- (This is an alternate to the above if your script resides in your website domain and not in the home directory

----------------------

- /usr/bin/php /home/u403660426/xbackup.php
- (This is an actual cron job command example above that links to the 'xbackup.php' script)







