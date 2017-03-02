<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
   require_once("connection.php");
   
if(isset($_POST['update'])){
	$id=$_POST['sid'];
    $txtName=$_POST['stall'];
	 $txtDetails=$_POST['unit'];
	 $txtPublic=$_POST['stall_no'];
	 
	
 	
	
	
	echo $sqladd="update stall set stall_no='$txtPublic', stall_name='$txtName', unit='$txtDetails' where id ='$id'";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "stall.php";
				</script>
				
			<?php
            }else{
				echo "Fail to update stall, Try again.";
			}
		}
        else if(isset($_POST['btnCancel'])){
		?>
				<script>
				  location= "stall.php";
				</script>
				
			<?php
			
		}
		}
		else
		{
			 require_once("index.php");
		}
        ?>
       