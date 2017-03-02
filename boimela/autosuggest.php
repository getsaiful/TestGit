<?php
$exdate = $_POST['yr'];
   $db = new mysqli('localhost', 'root' ,'', 'boimela');
	
	if(!$db) {
	
		echo 'Could not connect to the database.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = rtrim($db->real_escape_string($_POST['queryString']));
			
			if(strlen($queryString) >0) {
  if($_POST['tp'] == 1) {
				$query = $db->query("SELECT book_name FROM books WHERE book_name LIKE '%$queryString%' and byear = '$exdate'   LIMIT 10");
  } else {
	            $query = $db->query("SELECT author FROM books WHERE author LIKE '%$queryString%' and byear = '$exdate'  LIMIT 10");
  }
				if($query) {
				echo '<ul>';
				 if($_POST['tp'] == 1) {
					while ($result = $query ->fetch_object()) {
						
	         			echo '<li onClick="fill(\''.addslashes($result->book_name).'\');">'.$result->book_name.'</li>';
	         		}
				 } else {
					 
					while ($result = $query ->fetch_object()) {
						
	         			echo '<li onClick="fill(\''.addslashes($result->author).'\');">'.$result->author.'</li>';
	         		} 
					 
				 }
				echo '</ul>';
					
				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>