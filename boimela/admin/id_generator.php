<?php 
	function makeid($tbl_name,$field_name){
	$sql="select * from $tbl_name";
	$exe=mysql_query($sql);
	$row_num=mysql_num_rows($exe);
	if($row_num>0){
		$sql="SELECT IFNULL(MAX($field_name),0) AS max_id FROM books";
		$exe=mysql_query($sql);
		$row=mysql_fetch_array($exe);
		$new_id=$row['max_id']+1;
		return $new_id;
	}
	else{
		$id=1;
		return $id;
		}
	}
?>