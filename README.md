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

(1) Go to the home directory of your server
(2) Drop the 'xbackup.php' script inside this home directory
(3) Create a folder in the home directory called 'xbackup'
(4) Go to your cron jobs feature of your server and set the cron job to the frequency to run this script, and also locate the script in the cron job section.
(5) Thats all! Your backup is done atomaically every month or week or day depending on what you set up
(6) All your backups are stored in the 'xbackup' folder in the home directory


