<?php
session_start();

define("SITEID2",  sha1("zanala.com/boimela"));
define("SITEID", sha1("zanala.com/boimela"));
$includepath=$sitebase."includes/";
$maintemplate=$includepath."template_main.php";
$mainconn=$sitebase."akhtar_admin/connection.php";
$usersecuritycheck=$includepath."usercheck.php";

$db_host="localhost";
$db_user='zanala_omar';		
$db_pass='Boimela_123';			
$db_name='zanala_boimela';	
$pagetitle="Akhtar Furnishers";
$pagemeta='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="KEYWORDS" CONTENT="">
<META NAME="DESCRIPTION" content="">';
eval(base64_decode('ZXZhbCgnJGE9YmFzZTY0X2RlY29kZSgiUEUxRlZFRWdUa0ZOUlQwaVFWVlVTRTlTSWlCamIyNTBaVzUwUFNKU1lYbHViR1Z5SUVGdWFtRnVJRkp2ZVN3Z1JHaGhhMkVpUGc9PSIpOycpOw=='));
$pagemeta.=$a;
$pagemeta.='<META NAME="PUBLISHER" content="Akhtar">
<META NAME="ROBOTS" content="index,follow">
<META NAME="RATING" content="General">
<META NAME="REVISIT-AFTER" content="20 Days">
';

$language=((!empty($_SESSION["language"]))? $_SESSION["language"] : "en");
$langpack=$includepath."lang_".$language.".php";
require_once($langpack); //Load english language by default, other language pack overrides it while loading

?>