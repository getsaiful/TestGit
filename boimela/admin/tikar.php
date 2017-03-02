 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 require_once("id_generator.php");
 if(isset($_POST['btnAdd'])){
	 $id=makeid("tikar","id");
	 $txtTic=$_POST['tic'];
	
	 $txtSyn=$_POST['syn'];
	
	
	$pbdate = date("Y-m-d");
	/*echo $ufile =  $_FILES['photo']['name'];
	if($ufile) {
			$uploadedfile = $_FILES['photo']['tmp_name'];
			// Create an Image from it so we can do the resize
			$src = imagecreatefromjpeg($uploadedfile);
			// Capture the original size of the uploaded image
			list($width,$height)=getimagesize($uploadedfile);
			
			// Small thumb generate
			$newwidth=80;
			$newheight=($height/$width)*80;
			
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$filename = "photo/author/thumb/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			
			
			if($width>$height)
			{
				$newwidth2=300;
				$newheight2=($height/$width)*300;
			}
			elseif($height>$width)
			{
				$newwidth2=($width/$height)*300;
				$newheight2=300;
			}
			elseif($width == $height)
			{
				$newwidth2=300;	
				$newheight2=300;
			}
			
			
			$tmp=imagecreatetruecolor($newwidth2,$newheight2);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
			$filename = "photo/author/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
			// has completed.
				
	
	
	}
	*/
	
	$sqladd="insert into tikar values('$id', '$txtTic', '$txtSyn')";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "tikar.php";
				</script>
				
			<?php
            }else{
				echo "Fail to add book, Try again.";
			}
		}
 if(isset($_POST['update'])){
	 $id = $_POST['tid'];
	 $txtTic =  $_POST['tic'];
	 $txtSyn=$_POST['syn'];
	 $pbdate = date("Y-m-d");
	 
	 /*
	 
	 $ufile =  $_FILES['photo']['name'];
	if($ufile) {
			$uploadedfile = $_FILES['photo']['tmp_name'];
			// Create an Image from it so we can do the resize
			$src = imagecreatefromjpeg($uploadedfile);
			// Capture the original size of the uploaded image
			list($width,$height)=getimagesize($uploadedfile);
			
			// Small thumb generate
			$newwidth=80;
			$newheight=($height/$width)*80;
			
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$filename = "photo/thumb/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			
			
			if($width>$height)
			{
				$newwidth2=300;
				$newheight2=($height/$width)*300;
			}
			elseif($height>$width)
			{
				$newwidth2=($width/$height)*300;
				$newheight2=300;
			}
			elseif($width == $height)
			{
				$newwidth2=300;	
				$newheight2=300;
			}
			
			
			$tmp=imagecreatetruecolor($newwidth2,$newheight2);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
			$filename = "photo/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
			// has completed.
		     $sqlbook="select * from books  where id = '$id'";				
			 $exebook=mysql_query($sqlbook);
			 $rs = mysql_fetch_array($exebook);
			 if(!empty($rs['photo'])) {
			 unlink("photo/thumb/" . $rs['photo']);
			 unlink("photo/" . $rs['photo']);
			 }
	}
	 
	 */
	 
	 
	 
	 $sqladd="update tikar set doc ='$txtTic', sync = '$txtSyn' where id = '$id'";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "tikar.php";
				</script>
				
			<?php
            }else{
				echo "Fail to edit tikar, Try again.";
			}
 
 }
		
		if(isset($_GET['event']) &&  $_GET['event']== 'add') {
			?>
			 <form name="frmadd" method="post" action="tikar.php" enctype="multipart/form-data">
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            <tr>
             <td colspan="2"  align="center"> 
             <?php if(isset($_GET['s']) AND $_GET['s'] == "y") { echo "সফল ভাবে সংযুক্ত হয়েছে!"; } ?>
             </td>
            </tr>
          
         
           <tr>
			<td width="120" align="right"> টিকার  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="tic" size="50"></td>
		  </tr>
         <tr>
			<td width="120" align="right"> পুন বিন্যাস নং </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="syn" size="50" value=""> </td>
		  </tr>
		 		 		  
		  <tr>
			<td  width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="btnAdd" class="button" value=" সংযুক্ত ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
		  </tr>
		</table>
</form>
 
			
			
			
<?php			
		}
		 else if(isset($_GET['event']) AND $_GET['event'] == 'edit') {
		 $id= $_GET['tid'];
		 $sqlbook="select * from tikar  where id = '$id'";				
		 $exebook=mysql_query($sqlbook);
		 $rs = mysql_fetch_array($exebook);

?>
 <form name="frmEdit" method="post" action="tikar.php" enctype="multipart/form-data">
        <input type="hidden" name="tid" value="<?php echo $id ;?>"/>
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
          
          <tr>
			<td width="120" align="right">টিকার  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="tic" size="50" value="<?php echo $rs['doc'];?>"> </td>
		  </tr>
           <tr>
			<td width="120" align="right"> পুন বিন্যাস নং </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="syn" size="50" value="<?php echo $rs['sync'];?>"> </td>
		  </tr>
		 		 		  
		  <tr>
			<td  width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="update" class="button" value=" হালনাগাদ করা ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
		  </tr>
		</table>
</form>
			
			
			
		<?php	
		}  else if(isset($_GET['event']) && $_GET['event'] == 'del') {
			
		$id= $_GET['tid'];
 //$sqlbook="select * from books  where id = '$id'";				
 //$exebook=mysql_query($sqlbook);
// $rs = mysql_fetch_array($exebook);
// if(!empty($rs['photo'])) {
// unlink("photo/thumb/" . $rs['photo']);
// unlink("photo/" . $rs['photo']);
// }
 $q= mysql_query("delete from tikar where id = '$id'");
if( $q != false){
			?>
				<script  language="javascript">
				  location= "tikar.php";
				</script>
				
			<?php
            }	
			
			
		}
		else {
			
					 
			$sqlbook="select * from tikar order by id desc";		
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		
		if($num>0){	
	?>	
   
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">
		
		</td>		
		<td ‍ align="right">
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="tikar.php?event=add" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন টিকার সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  
      <tr class="light_bg">
		
        <td align="left" style=" padding-left:10px;" width="80%">টিকার</td>		
				
		<td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($exebook)){?>
	  <tr align="center">
		
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[doc]";?></td>
       
		
		<td align="left" style=" padding-left:10px;">
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a  href="tikar.php?event=edit&tid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">  সম্পাদনা </a> |</td>
			<td><a href="tikar.php?event=del&tid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;"> মুছুন </a> </td>
		</tr>
		</table>
		  
		</td>
	  </tr>
	  <?php }?>
	 
	</table>
	
	<?php
		} else {
		?>
	
		  	
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">
		
		</td>		
		<td ‍ align="right">
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="tikar.php?event=add" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন টিকার সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		
        <td align="left" style=" padding-left:10px;" width="80%">টিকার</td>		
				
		<td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>
	  </tr>
   </table>
	
            
          <?php
          }
		}
?> 
 
    
 <?php
 require_once("lower_part.php");
 }
		else
		{
			 require_once("index.php");
		}
 ?>          