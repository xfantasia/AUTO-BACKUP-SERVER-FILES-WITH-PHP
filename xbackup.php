
<?php

//////////////////////////////////////////////////////  
//X-BACKUP SERVER PHP SCRIPT
//This is a simple automated server side file backup built with php
//File multiple files was gotten from stackoverflow and modified by Atsu Emmanuel
//atsuemmanuel@gmail.com 
//Simply place this single page php script on your server in the directory to be backed-up
//Finally, create a folder with the name 'xbackup' in that same directory, this is where all backups will reside
//Thats all, the folder or directory in which this file is placed will have all files archived with .zip and backed-up 
//Now, you can call the script via a browser to run a backup
//////////////////////////////////////////////////////

//core startup variables
$backup_name = "X"; //change this name 'X' if you have a special name for your backup
$backup_time = date("Y-m-d")."_".time();
$path_to_backup = "./";
$path_to_output = "xbackup/BACKUP_".$backup_name."_".$backup_time.".zip";

new GoodZipArchive($path_to_backup, $path_to_output) ; 


class GoodZipArchive extends ZipArchive 
{

    public function __construct($a=false, $b=false) { $this->create_func($a, $b);  }
    
    public function create_func($input_folder=false, $output_zip_file=false)
    {

        if($input_folder !== false && $output_zip_file !== false)
        {
            $res = $this->open($output_zip_file, ZipArchive::CREATE);
            if($res === TRUE) { $this->addDir($input_folder, basename($input_folder)); $this->close(); 
				  echo "<div style='color:green;'><b>Backup Process was Successful!</b></div>";
				        //$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
						$url = home_base_url();
						$validURL = str_replace("&", "&amp;", $url);
				  echo "<a href='".$validURL.'/'.$output_zip_file."' download >Download Backup: <b>".$output_zip_file."</b></a>";
			}
            else{ echo 'Could not create a zip archive. Contact Admin.'; }
        }
    }
    
    // Add a Dir with Files and Subdirs to the archive
    public function addDir($location, $name) {
        $this->addEmptyDir($name);
        $this->addDirDo($location, $name);
    }

    // Add Files & Dirs to archive 
    private function addDirDo($location, $name) {
        $name .= '/';         $location .= '/';
        // Read all Files in Dir
        $dir = opendir ($location);

        while ($file = readdir($dir))    {
		//change 'xbackup' if you renamed your 
		if($file != 'xbackup')
		{
			if (($file == '.' || $file == '..')) continue;

			//Rekursiv, If dir: GoodZipArchive::addDir(), else ::File();
			$do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
			$this->$do($location . $file, $name . $file);
		}
        }
    } 
}



//FUNCTION TO GET WEBSITE BASE
function home_base_url(){   

// first get http protocol if http or https

$base_url = (isset($_SERVER['HTTPS']) &&

$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

// get default website root directory

$tmpURL = dirname(__FILE__);

// when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",

//convert value to http url use string replace, 

// replace any backslashes to slash in this case use chr value "92"

$tmpURL = str_replace(chr(92),'/',$tmpURL);

// now replace any same string in $tmpURL value to null or ''

// and will return value like /localhost/my_website/ or just /my_website/

$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

// delete any slash character in first and last of value

$tmpURL = ltrim($tmpURL,'/');

$tmpURL = rtrim($tmpURL, '/');


// check again if we find any slash string in value then we can assume its local machine

    if (strpos($tmpURL,'/')){

// explode that value and take only first value

       $tmpURL = explode('/',$tmpURL);

       $tmpURL = $tmpURL[0];

      }

// now last steps

// assign protocol in first value

   if ($tmpURL !== $_SERVER['HTTP_HOST'])

// if protocol its http then like this

      $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';

    else

// else if protocol is https

      $base_url .= $tmpURL.'/';

// give return value

return $base_url; 

}


?>
