<?php

   require_once("../connection.php");
   
if(isset($_POST['update'])){
	$id=$_POST['bid'];
	$txtName=$_POST['b_name'];
	$txtAuth=$_POST['b_author'];
	$txtPublic=$_POST['b_public'];
	$txtType=$_POST['b_type'];
	$txtKeyword=$_POST['c_type'];
	$txtDetails=$_POST['b_details'];
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
			$newwidth=80;
			$newheight=($height/$width)*80;
			
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$filename = "../photo/thumb/". $_FILES['photo']['name'];
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
			$filename = "../photo/". $_FILES['photo']['name'];
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
			// has completed.
		     $sqlbook="select * from books  where id = '$id'";				
			 $exebook=mysql_query($sqlbook);
			 $rs = mysql_fetch_array($exebook);
			 if(!empty($rs['photo'])) {
			 unlink("../photo/thumb/" . $rs['photo']);
			 unlink("../photo/" . $rs['photo']);
			 }
				
	$sqladd="update books set book_name='$txtName', author='$txtAuth', short_description = '$txtDetails', public = '$txtPubli', type = '$txtType', keyword = '$txtKeyword', sync ='$txtSyn' , photo = '$ufile' where id ='$id'";
	}
	else
	{
	$sqladd="update books set book_name='$txtName', author='$txtAuth', short_description = '$txtDetails', public = '$txtPubli', type = '$txtType', keyword = '$txtKeyword', sync ='$txtSyn'  where id ='$id'";
	}
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
        
        ?>