 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 require_once("id_generator.php");
 if(isset($_POST['btnAdd'])){
	 $id=makeid("gallery","id");
	 $txtTic=$_POST['doc'];
	
	 $txtSyn=$_POST['syn'];
	
	
	$pbdate = date("Y-m-d");
	$ufile =  $_FILES['photo']['name'];
	if($ufile) {
			$uploadedfile = $_FILES['photo']['tmp_name'];
			// Create an Image from it so we can do the resize
			$src = imagecreatefromjpeg($uploadedfile);
			// Capture the original size of the uploaded image
			list($width,$height)=getimagesize($uploadedfile);
			
			// Small thumb generate
			$newwidth=120;
			$newheight=($height/$width)*120;
			
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$filename = "gallery/thumb/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			
			
			if($width>$height)
			{
				$newwidth2=1000;
				$newheight2=($height/$width)*1000;
			}
			elseif($height>$width)
			{
				$newwidth2=($width/$height)*1000;
				$newheight2=1000;
			}
			elseif($width == $height)
			{
				$newwidth2=1000;	
				$newheight2=1000;
			}
			
			
			$tmp=imagecreatetruecolor($newwidth2,$newheight2);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
			$filename = "gallery/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
			// has completed.
				
	
	
	}
	
	
	$sqladd="insert into gallery values('$id','$ufile', '$txtTic', '$txtSyn')";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "gallery.php";
				</script>
				
			<?php
            }else{
				echo "Fail to add book, Try again.";
			}
		}
 if(isset($_POST['update'])){
	 $id = $_POST['gid'];
	 $txtTic =  $_POST['doc'];
	 $txtSyn=$_POST['syn'];
	 $pbdate = date("Y-m-d");
	 
	
	 
	 $ufile =  $_FILES['photo']['name'];
	if($ufile) {
			$uploadedfile = $_FILES['photo']['tmp_name'];
			// Create an Image from it so we can do the resize
			$src = imagecreatefromjpeg($uploadedfile);
			// Capture the original size of the uploaded image
			list($width,$height)=getimagesize($uploadedfile);
			
			// Small thumb generate
			$newwidth=120;
			$newheight=($height/$width)*120;
			
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$filename = "gallery/thumb/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			
			
			if($width>$height)
			{
				$newwidth2=1000;
				$newheight2=($height/$width)*1000;
			}
			elseif($height>$width)
			{
				$newwidth2=($width/$height)*1000;
				$newheight2=1000;
			}
			elseif($width == $height)
			{
				$newwidth2=1000;	
				$newheight2=1000;
			}
			
			
			$tmp=imagecreatetruecolor($newwidth2,$newheight2);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
			$filename = "gallery/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
			// has completed.
		     $sqlbook="select * from gallery  where id = '$id'";				
			 $exebook=mysql_query($sqlbook);
			 $rs = mysql_fetch_array($exebook);
			 if(!empty($rs['photo'])) {
			 unlink("gallery/thumb/" . $rs['photo']);
			 unlink("gallery/" . $rs['photo']);
			 }
			 
			  $sqladd="update gallery set doc ='$txtTic', photo = '$ufile', sync = '$txtSyn' where id = '$id'";
		}
		else
		{
			 $sqladd="update gallery set doc ='$txtTic', sync = '$txtSyn' where id = '$id'";
		}
	 
				//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "gallery.php";
				</script>
				
			<?php
            }else{
				echo "Fail to edit photo, Try again.";
			}
 
 }
		
		if(isset($_GET['event']) && $_GET['event'] == 'add') {
			?>
			 <form name="frmadd" method="post" action="gallery.php" enctype="multipart/form-data">
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            <tr>
             <td colspan="2"  align="center"> 
             <?php if(isset($_GET['s']) && $_GET['s'] == "y") { echo "সফল ভাবে সংযুক্ত হয়েছে!"; } ?>
             </td>
            </tr>
          
            <tr>
			<td width="120" align="right"> ছবি   </td>
			<td width="387">: &nbsp;&nbsp;<input type="file" name="photo" size="38" ></td>
		  </tr>
           <tr>
			<td width="120" align="right">বর্ণনা   </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="doc" size="50"></td>
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
		 else if(isset($_GET['event']) && $_GET['event'] == 'edit') {
		 $id= $_GET['gid'];
		 $sqlbook="select * from gallery  where id = '$id'";				
		 $exebook=mysql_query($sqlbook);
		 $rs = mysql_fetch_array($exebook);

?>
 <form name="frmEdit" method="post" action="gallery.php" enctype="multipart/form-data">
        <input type="hidden" name="gid" value="<?php echo $id ;?>"/>
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
           <tr>
			<td width="120" align="right"> ছবি   </td>
			<td width="387">: &nbsp;&nbsp;<input type="file" name="photo" size="38" ></td>
		  </tr>
          <tr>
			<td width="120" align="right">&nbsp;   </td>
			<td width="387" align="left"> &nbsp;&nbsp; &nbsp;&nbsp;<img src="gallery/thumb/<?php echo $rs['photo'];?>" border="0" width="80" > </td>
		  </tr>
          <tr>
			<td width="120" align="right">বর্ণনা </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="doc" size="50" value="<?php echo $rs['doc'];?>"> </td>
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
			
		 $id= $_GET['gid'];
		 $sqlbook="select * from gallery  where id = '$id'";				
		 $exebook=mysql_query($sqlbook);
		 $rs = mysql_fetch_array($exebook);
		 if(!empty($rs['photo'])) {
		 unlink("gallery/thumb/" . $rs['photo']);
		 unlink("gallery/" . $rs['photo']);
		 }
		 $q= mysql_query("delete from gallery where id = '$id'");
		if( $q != false){
			?>
				<script  language="javascript">
				  location= "gallery.php";
				</script>
				
			<?php
            }	
			
			
		}
		else {
			$targetpage = "gallery.php" ; 	
	$limit = 10; 
	$qry="select * from gallery order by id desc";	
	//$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysql_num_rows(mysql_query($qry));
	//$total_pages = $total_pages[num];
	
	$stages = 3;
	if(isset($_GET['page'])){
	$page = mysql_real_escape_string($_GET['page']);
	}else{
		$page=0;
	}
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data
	$query1 = $qry. "LIMIT $start, $limit";
	$res = mysql_query($query1);
	 
	 $limit2 = " LIMIT ".$start.",".$limit;
    $res = mysql_query($qry.$limit2);
	
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;	
			
		/*			 
			$sqlbook="select * from gallery order by id desc";		
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		*/
		if($total_pages>0){	
	?>	
   
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">
		
		</td>		
		<td ‍ align="right">
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="gallery.php?event=add" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন ছবি সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  
      <tr class="light_bg">
		
        <td align="left" style=" padding-left:10px;" width="20%">ছবি</td>		
		 <td align="left" style=" padding-left:10px;" width="60%">ছবির বিস্তারিত </td>				
		<td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($res)){?>
	  <tr align="center">
		<td align="left" style=" padding-left:10px;"><img src="gallery/thumb/<?php echo $rsbook['photo'];?>" border="0" width="80" ></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[doc]";?></td>
       
		
		<td align="left" style=" padding-left:10px;">
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a  href="gallery.php?event=edit&gid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">  সম্পাদনা </a> |</td>
			<td><a href="gallery.php?event=del&gid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;"> মুছুন </a> </td>
		</tr>
		</table>
		  
		</td>
	  </tr>
	  <?php }?>
	 
	</table>
	 <table style="padding-top:10px;" width="100%">
      <tr>
       <td align="right">
<?php 
require_once("paging.php");
	echo $paginate;
	?>
     </td>
    </tr>
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
			<a  class="fontclass" href="gallery.php?event=add" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন ছবি সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		
        <td align="left" style=" padding-left:10px;" width="20%">ছবি</td>		
		 <td align="left" style=" padding-left:10px;" width="60%">ছবির বিস্তারিত </td>				
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