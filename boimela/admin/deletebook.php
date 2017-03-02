<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
  require_once("connection.php");
 $id= $_GET['bid'];
 $sqlbook="select * from books  where id = '$id'";				
 $exebook=mysql_query($sqlbook);
 $rs = mysql_fetch_array($exebook);
 if(!empty($rs['photo'])) {
 unlink("photo/thumb/" . $rs['photo']);
 unlink("photo/" . $rs['photo']);
 }
 $q= mysql_query("delete from books where id = '$id'");
if( $q != false){
			?>
				<script  language="javascript">
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