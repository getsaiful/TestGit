<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("connection.php");
 
define ("MAX_SIZE","100"); 

function getExtension2($str) 
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}

$flag1=2;
$errors=1;
$error_type = "!";
$newname = '';
$status='';
$fail_reason='';
$errors=0;

////////////////////////file upload//////////////////////////////////
 	$org_file=$exfile=$_FILES['exfile']['name'];
 	if ($exfile) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['exfile']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension2($filename);
 		$extension = strtolower($extension);
 		
	if ($extension != 'xls' && $extension != 'xlsx') 
		{
			//print error message
			$fail_reason='Unknown extension ';
			$err = '<div id="fail_div">'.$fail_reason.'! File not uploaded.</div>';
			$fail_reason.=$extension;
			$errors=1;
		}
 		$size=filesize($_FILES['exfile']['tmp_name']);

	//compare the size with the maxim size we defined and print error if bigger
	if ($size > MAX_SIZE*8000)
		{
		$fail_reason='exceeded the size limit ';
		$err = '<div id="fail_div">You have '.$fail_reason.'! File not uploaded.</div>';
		$errors=1;
		}
		
		if($errors==1){
			echo $err;
		}
		else
		{

			date_default_timezone_set('Asia/Dhaka');

 			if($extension == "xls")
			$newname="files/".date("Y-m-d-His").".xls";
 			if($extension == "xlsx")
			$newname="files/".date("Y-m-d-His").".xlsx";
			if($errors!=1){
			
			$copied = move_uploaded_file($_FILES['exfile']['tmp_name'], $newname);
			}
			if (!$copied) 
			{
				$fail_reason='Could not move uploaded file ';
				$errors=1;
				$error_type = ".";
			}
			else 
			{
				if($errors!=1){
					$status='Uploaded';
					$str11=1;
					echo '<div id="success_div">Congratulations! You have successfully submitted the file. </div>';
				}
				else
				{
					$status='Not Uploaded';
					$flag1=1;
					echo '<div id="fail_div">Error in submitting. Your file was not saved! Please try to upload again!</div>';
				}
			
			}
		}
	}
//echo $filename;

////////////////////////////////////////file upload///////////////////////////////////////////////


          
         	      require_once "PHPExcel/IOFactory.php";

     	   
		         $fileType = 'Excel2007'; 
                 $inputFileType = PHPExcel_IOFactory::identify($newname);              
                 PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType,$fileType); 
                $objReader->setReadDataOnly(true);

                $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
                $cacheSettings = array( 'memoryCacheSize' => '128MB'); 
                PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
                ini_set('max_execution_time', 123456);

                $objPHPExcel = $objReader->load($newname);
                $total_sheets=$objPHPExcel->getSheetCount(); 
                $allSheetName=$objPHPExcel->getSheetNames(); 
                $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); 
                $highestRow = $objWorksheet->getHighestRow(); 
                $highestColumn = $objWorksheet->getHighestColumn();  
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  
              
                for ($row = 1; $row <= $highestRow;++$row) 
                {  
                    for ($col = 0; $col <$highestColumnIndex;++$col)
                    {  
                        $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  

                         $arraydata[$row-1][$col]=$value; 
                            
                /*  $sqladd="insert into books values(
			'".$value[$col][0]."', '".$value$col][1]."', '".$value[$col][2]."', '".$value[$col][3]."','".$value[$col][4]."', '".$value[$col][5]."','".$value[$col][6]."','".$value[7]."', '".$value[8]."','".$value[9]."','".$value[10]."','".$value[11]."')";
		  */
                    }  

       
                }

	//print_r($arraydata);		
for($row=1; $row<$highestRow; $row++){
	
	
      $id = $arraydata[$row][0]; 
	  $bookname = $arraydata[$row][1];
	  $author = $arraydata[$row][2];
	  $type = $arraydata[$row][3];
	  $public = $arraydata[$row][4];
	  $son = $arraydata[$row][5];
	  $price=$arraydata[$row][6];
	  $pbdate=$arraydata[$row][7];
	  $txtsyn=$arraydata[$row][8];
      $txtKeyword=$arraydata[$row][9]; 
	  $bookStatus=$arraydata[$row][10]; 
	  $byear=$arraydata[$row][11]; 

     $sqladd="insert into books values(
			'$id', '$bookname', '$author', '$type','$public', '$son','$price','$pbdate', '$txtsyn','$txtKeyword','$bookStatus','$byear')";
		$add=mysql_query($sqladd); 
		 
		if($row==$highestRow-1){
			?>
			<script>
			 location="book.php";
			</script>
			
	<?php		
		} 
	}	 

}else{
	
	require_once("index.php");
}

?>



