<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
   require_once("connection.php");
    require_once("id_generator.php");

if(isset($_POST['btnAdd'])){
	 $id=makeid("books","id");
	  $bookStatus=$_POST['bookStatus'];
	 $bookdate=$_POST['bookdate'];
	  $txtName=$_POST['b_name'];
	 $txtAuth=$_POST['b_author'];
	 $txtPublic=$_POST['b_public'];
	 $txtType=$_POST['b_type'];
     $txtKeyword=$_POST['c_type'];
	// $txtDetails=$_POST['b_details'];
	 $txtTm=$_POST['time'];
	 $txtPrice=$_POST['price'];
	 $txtSyn=$_POST['syn'];
	
	if($bookStatus == '3') {
	  $pbdate = $bookdate;	
	}
	else
	{
		$pbdate = '';
	}
 	
	
	
	$byear = date('Y');
	
	echo  $sqladd="insert into books values(
			'$id', '$txtName', '$txtAuth', '$txtType','$txtPublic', '$txtTm','$txtPrice','$pbdate', '$txtSyn','$txtKeyword','$bookStatus','$byear')";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				location= "addbook.php?s=y";
				</script>
				
			<?php
            }else{
				echo "Fail to add book, Try again.";
			}
		}
		else if(isset($_POST['btnCancel'])){
		      ?>
				<script>
				 location= "book.php";
				</script>
				
			<?php
         }
		}
		else
		{
			 require_once("index.php");
		}
        
        ?>