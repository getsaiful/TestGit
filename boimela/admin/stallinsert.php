<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
   require_once("connection.php");
   require_once("id_generator.php");

if(isset($_POST['btnAdd'])){
     $txtName=$_POST['stall'];
	 $txtDetails=$_POST['unit'];
	 $txtPublic=$_POST['stall_no'];
	 
     $pbdate = date("Y-m-d");
	
	
	
	echo $sqladd="insert into stall(stall_no,stall_name,unit,status) values(
			'$txtPublic','$txtName', '$txtDetails', '1')";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "addstall.php?s=y";
				</script>
				
			<?php
            }else{
				echo "Fail to add book, Try again.";
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