<?php
require_once("adminconfig.php");
require_once($mainconn);

if($_POST['submit'])
{
	  require_once("photo_resize_about.php");
	  $photofile = $rand_name.'.'.$file_ext;
	
		$qry_insert = mysql_query("insert into tbl_about values('1', '".$_REQUEST['textarea1']."' , '$photofile')");
		if($qry_insert)
			{
				header("Location: admincp.php?detail=about");	
			}
			else
			{
				header("Location: admincp.php?detail=about");	
			}
}
if($_POST['update'])
{
	 if($_FILES['uphoto']['name']) {
		 
   	require_once("photo_resize_about.php");	
	$query = mysql_query("select * from tbl_about where id = '$_REQUEST[id]'");  
	$fetch_array = mysql_fetch_array($query);
	
	$imguploadpath = "../images/";		
	unlink($imguploadpath.$fetch_array['photo']);	

	$photofile = $rand_name.'.'.$file_ext;
	 
	$qry = mysql_query("update tbl_about set about_msg='$_REQUEST[textarea1]', photo = '$photofile'  where id = '1' ");
	 }
	 else
	 {
		$qry = mysql_query("update tbl_about set about_msg='$_REQUEST[textarea1]' where id = '1' ");
	 }
	if($qry)
	{
		header("Location: admincp.php?detail=about");	
	}
	else
	{
		header("Location: admincp.php?detail=about");	
	}
}


?>