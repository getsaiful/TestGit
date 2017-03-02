<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
   require_once("connection.php");
   
if(isset($_POST['update'])){
	$id=$_POST['bid'];

	 $txtName=$_POST['b_author'];
	 $txtDetails=$_POST['b_details'];
	 $txtPublic=$_POST['b_public'];
	 
     $txtKeyword=$_POST['c_type'];
	
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
			 $sqlbook="select * from author  where id = '$id'";				
			 $exebook=mysql_query($sqlbook);
			 $rs = mysql_fetch_array($exebook);
			  if(!empty($rs['photo'])) {
		     unlink("photo/author/thumb/" . $rs['photo']);
             unlink("photo/author/" . $rs['photo']);
			  }
 
	$sqladd="update author set author_name='$txtName', published_book='$txtPublic', short_desription = '$txtDetails' , keyword  = '$txtKeyword', photo = '$ufile', sync ='$txtSyn'  where id ='$id'";
	}
	else
	{
	$sqladd="update author set author_name='$txtName', published_book='$txtPublic', short_desription = '$txtDetails' , keyword = '$txtKeyword', sync ='$txtSyn'  where id ='$id'";
	}
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "author.php";
				</script>
				
			<?php
            }else{
				echo "Fail to update author, Try again.";
			}
		}
        else if(isset($_POST['btnCancel'])){
		?>
				<script>
				  location= "author.php";
				</script>
				
			<?php
			
		}
		}
		else
		{
			 require_once("index.php");
		}
        ?>