<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=spreadsheet.xlsx" );
session_start();	
	// print your data here. note the following:
	// - cells/columns are separated by tabs ("\t")
	// - rows are separated by newlines ("\n")
	
	// for example:
	$val=$_SESSION['vall'];

	echo 'book name' . "\t" . 'author' . "\t" . 'Pulic' ."\t" . 'Type' . "\t" .'Son'. "\t" .  'Price' ."\t" .'date' ."\t" .'sync' ."\t" .'keyward' ."\t" .'cat' ."\t" ."\n";
	
foreach($val AS $val=>$val1){

		foreach($val1 AS $val2=>$val3){


		echo $val3."\t";
}
echo "\n";
}
	
	exit();
	
?>