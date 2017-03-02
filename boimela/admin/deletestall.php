<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
  require_once("connection.php");
 $id= $_GET['bid'];
 $sqlbook="select * from stall  where id = '$id'";				
 $exebook=mysql_query($sqlbook);
 $rs = mysql_fetch_array($exebook);

 $q= mysql_query("delete from stall where id = '$id'");
if( $q != false){
			?>
				<script  language="javascript">
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