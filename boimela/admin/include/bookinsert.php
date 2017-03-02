<?php

   require_once("../connection.php");
    require_once("../id_generator.php");

if(isset($_POST['btnAdd'])){
	 $id=makeid("books","id");
	 $txtName=$_POST['b_name'];
	 $txtAuth=$_POST['b_author'];
	 $txtPublic=$_POST['b_public'];
	 $txtType=$_POST['b_type'];
     $txtKeyword=$_POST['c_type'];
	 $txtDetails=$_POST['b_details'];
	 $txtSyn=$_POST['syn'];
	
	
	$pbdate = date("Y-m-d");
	echo $ufile =  $_FILES['photo']['name'];
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
				
	
	
	}
	
	
	$sqladd="insert into books values(
			'$id', '$txtName', '$txtAuth', '$txtDetails', '$txtPublic', '$txtType', '$ufile', '$id','$txtKeyword', '$txtSyn')";
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
        
        ?>