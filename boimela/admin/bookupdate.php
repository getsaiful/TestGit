<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
   require_once("connection.php");
   
if(isset($_POST['update'])){
	$id=$_POST['bid'];
	 $txtName=$_POST['b_name'];
	 $txtAuth=$_POST['b_author'];
	 $txtPublic=$_POST['b_public'];
	 $txtType=$_POST['b_type'];
     $txtKeyword=$_POST['c_type'];
	  $bookStatus=$_POST['bookStatus'];
	 $bookdate=$_POST['bookdate'];
	 
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
 	
	
	
	$sqladd="update books set book_name='$txtName', author='$txtAuth', public='$txtPublic', price = '$txtPrice', son = '$txtTm', date ='$pbdate',  type = '$txtType', keyword = '$txtKeyword',cat='$bookStatus', sync ='$txtSyn'  where id ='$id'";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "book.php";
				</script>
				
			<?php
            }else{
				echo "Fail to update book, Try again.";
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
       