<?php
//Test URL: http://dev.vm/htdocs/myapplication/mycontroller/action

//Application Bootstrap
const PUP_DIR = "../../includes/puppy/";
const APP_DIR = "../../applications/myapplication/";

error_reporting(E_ALL);

function bootBrake($msg){
	echo "<div style='background-color:#FFF7D3;padding:10px;margin:10px;'>Boot Failed: $msg</div>";
}

if(file_exists(PUP_DIR."puppy.php5")) require_once(PUP_DIR."puppy.php5");
else bootBrake('Path to Puppy Framework is not Correct.');

//global object
$puppy = puppy::instance(APP_DIR);
