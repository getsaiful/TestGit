 <?php

   require_once("top.php");
   
    require_once("admin/connection.php");
    
 
   if(isset($_GET['ls'])) {
   $l = $_GET['ls'];
   }
   else
   {
   $l=0;
   }
	$ls = $l ;
	$le=  10;
	$lp=$ls + 10 ;
 
 
      $stall= rtrim($_GET['stall']);  

   //   var_dump($stall) ;

 //	echo $stall_no = $_GET['stall'];  

 	if ( is_numeric($stall) ) {

 		//echo $stall." "."স্টল সংখ্যা";


		// $query = mysql_query("select * from stall where stall_no LIKE '%$stall%' ");
		// $num = mysql_num_rows(mysql_query("select * from stall where stall_no LIKE '%$stall%' "));
	 
	  	$query = mysql_query("select * from stall where stall_no LIKE '%$stall%' limit $ls ,$le ");
	$lm=  $ls - 10 ;

	    $num = mysql_num_rows(mysql_query("select * from stall where stall_no LIKE '%$stall%' "));
 	 $nu = $num - 10;

 	}

 	else if (is_string($stall)) {

 		/// echo $stall."স্টল নাম ";

	 	$query = mysql_query("select * from stall where stall_name LIKE '%$stall%'  and stall_no LIKE '%$stall%'");
		$num = mysql_num_rows(mysql_query("select * from stall where stall_name LIKE '%$stall%' and stall_no LIKE '%$stall%'"));

 	}


 	else if (is_empty($stall)) {
 
  		echo "অনুসন্ধান মিলছে না  , অনুগ্রহ করে পুনরায় প্রবেশ করান";
 	}

 	else{
 
  		echo "অনুসন্ধান মিলছে না  , অনুগ্রহ করে পুনরায় প্রবেশ করান";
 	}



 ?>

  


 <style>	table > tr > td, span{font-family: 'sutonnyMJ';} </style>
 
 <meta http-equiv="refresh" content="300;url=index.php" />

  <div class="middle" id="container" unselectable="on"
 onselectstart="return false;" 
 onmousedown="return false;">
  <div class="bottomboxTable" style="margin-top:0px;border:1px solid black;height:630px; width:100%;margin-left:0px; " >
          <div class="fontclass" style="text-align:left; font-size:20px; font-weight:bold; padding-top:20px; padding-bottom:20px;">
 
 			<span style="font-size:24px; font-weight:bold; color:#007F00;">অমর একুশে বইমেলায় স্টল এর তালিকা  </span> <br><br>

				 <a href="index.php"> 
	                 <div class="home7" >
	                  &nbsp;
	                 </div> 
	              </a>
				 <a href="stallist3.php"> 
	                 <div class="prev7" >
	                  &nbsp;
	                 </div> 
	              </a>

	 
             </div>

    
                 <?php if($num > 0) {   ?>

                  	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
						
						  <tr class="light_bg" style="font-weight:bold;">
							
							<td align="left" style=" padding-left:10px;" width="15%">সিরিয়াল </td>
					        
							<td align="left" style=" padding-left:10px;" width="35%">ষ্টলের নাম</td>		
							<td align="left" style=" padding-left:10px;" width="25%">ষ্টলের নাম্বার</td>
					        <td align="left" style=" padding-left:10px;" width="25%"> ইউনিট </td>		
							
						  </tr>

		  	<?php $r = 1; while($rsbook=mysql_fetch_array($query)){   ?>
					  <tr align="center" style="font-size:30px;">
				 
				 		<td align="left" style=" padding-left:10px;font-size:25px;"><?php echo $r; ?></td>
				 
						<td align="left" style=" padding-left:10px;font-size:25px;"><?php echo "$rsbook[stall_name]";?></td>
				        <td align="left" style=" padding-left:10px;font-size:25px;"><?php echo "$rsbook[stall_no]";?></td>

				    <?php if ($rsbook['unit']==1) {
					        	$rsbook['unit'] = "ইউনিট এক";
					      	  }
					      	  elseif ($rsbook['unit']==2) {
					        	$rsbook['unit'] = "ইউনিট এক";
					      	  }
					      	  elseif ($rsbook['unit']==3) {
					        	$rsbook['unit'] = "ইউনিট এক";
					      	  }
					      	  elseif ($rsbook['unit']==4) {
					        	$rsbook['unit'] = "ইউনিট চার";
						        }
						        elseif ($rsbook['unit']==5) {
						        	$rsbook['unit'] = "প্যাভিলিয়ান";
						        }
					         ?>
				        <td align="left" style=" padding-left:10px;font-size:25px;"><?php echo "$rsbook[unit]";?></td>

					  </tr>
	  <?php  	   $r++; } 	

	}
					else
					{?>
						<tr>
                           <td colspan="6" align="center"> কোনো তথ্য পাওয়া যায়নি!  অনুগ্রহ করে পুনরায় প্রবেশ করান</td>
                        </tr>
						<?php }

	  ?>
	 
	</table> 
    
     
    
           
 </div>
</div>

 <script language="javascript">
  if (document.images) {

		//preload ima

		//base image

		img1N= new Image(290,350);
		img1N.src= 'image/Map.png' ;
		img1H= new Image(290,350);
		img1H.src= 'image/Map++.png' ;

		img2N= new Image(290,350);
		img2N.src= 'image/Book.png' ;
		img2H= new Image(290,350);
		img2H.src= 'image/Book++.png' ;

		img3N= new Image(290,350);
		img3N.src= 'image/Writer.png' ;
		img3H= new Image(290,350);
		img3H.src= 'image/Writer++.png' ;

		img4N= new Image(290,350);
		img4N.src= 'image/Gallery.png' ;
		img4H= new Image(290,350);
		img4H.src= 'image/Gallery++.png' ;

		img5N= new Image(290,350);
		img5N.src= 'image/Ekushey-padak.png' ;
		img5H= new Image(290,350);
		img5H.src= 'image/Ekushey-padak++.png' ;

		img6N= new Image(290,350);
		img6N.src= 'image/Bangla-Academy.png' ;
		img6H= new Image(290,350);
		img6H.src= 'image/Bangla-Academy++.png' ;





		function myOn(myImgName) {

		//we need to name the image in the BODY

		//so we can use its name here

		document[myImgName].src=eval(myImgName+ 'H' ).src;

		}

		function myOut(myImgName) {

		document[myImgName].src=eval(myImgName+ 'N' ).src;

		}

		} //end of if document.images 

</script>


 <?php

   require_once("bottom.php");

 ?>