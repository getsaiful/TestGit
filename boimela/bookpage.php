 <?php
   require_once("top.php");
   require_once("admin/connection.php");
				   if(!empty($_GET['c'])) {
					$cat =  $_GET['c'];  
				   }
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
				  $query = mysql_query("select * from books where cat = '$cat' limit $ls ,$le ");
				   $lm=  $ls - 10 ;
				  
				  $num = mysql_num_rows(mysql_query("select id from books  where cat = '$cat'"));
				 $nu = $num - 10;
 ?>
  <div class="middle" id="container">
  <div class="bottomboxTable">
          <div class="fontclass" style="text-align:left; font-size:20px; font-weight:bold; padding-top:20px; padding-bottom:20px;">
         
         
        
                 <span style="font-size:30px; font-weight:bold;">বই মেলা ২০১০ এর বই -এর তালিকা সমূহ</span> <br><br>
               
             </div>
             <?php
			 if($ls == 0) {
				 ?>
                 
				 <a href="booklist.php"> 
                 <div class="prev7" >
                  &nbsp;
                 </div> 
              </a>
              <a href="bookpage.php?c=<?php echo $cat; ?>&ls=<?php echo $lp ;?> "> 
                 <div class="next6" >
                  &nbsp;
                 </div> 
              </a>
              <a href="index.php"> 
                 <div class="home7" >
                  &nbsp;
                 </div> 
              </a>
              </a>
			  <?php
			 }
			 else
			 if($ls >= $nu ) {
				?> 
                  <a href="bookpage.php?c=1&ls=<?php echo $lm ;?> "> 
                 <div class="prev6" >
                  &nbsp;
                 </div> 
              </a>
              
              <a href="index.php"> 
                 <div class="home6" >
                  &nbsp;
                 </div> 
              </a>
				 
                 <?php
			 }
			 else
			 {
			 ?>
             <a href="bookpage.php?c=1&ls=<?php echo $lm ;?> "> 
                 <div class="prev7" >
                  &nbsp;
                 </div> 
              </a>
              <a href="bookpage.php?c=1&ls=<?php echo $lp ;?> "> 
                 <div class="next6" >
                  &nbsp;
                 </div> 
              </a>
              <a href="index.php"> 
                 <div class="home7" >
                  &nbsp;
                 </div> 
              </a>
 
                 <?php
			 }
					
				  ?>
                  	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg" style="font-weight:bold;">
		
        <td width="35%" height="36" align="left" style=" padding-left:10px;">বইয়ের নাম </td>		
		<td align="left" style=" padding-left:10px;" width="15%">লেখকের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="15%">প্রকাশনির নাম </td>
        <td align="left" style=" padding-left:10px;" width="15%">বইয়ের প্রকার </td>
        <td align="left" style=" padding-left:10px;" width="10%"> সাল </td>		
		 <td align="left" style=" padding-left:10px;" width="10%"> মূল্য </td>	
		
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($query)){
	  $txtType = $rsbook['type'];
	  if($txtType =="1") {
	$ty ="গল্প";
	   }
	   else if($txtType =="2") {
	   $ty ="প্রবন্দ";
	   }                                
       else if($txtType =="3") {
	   $ty ="উপন্যাস";
	   }                                 
       else if($txtType =="4") {
	   $ty ="কবিতা";
	   }                                 
       else if($txtType =="5") {
	   $ty ="গবেষণা";
	   }                                 
       else if($txtType =="6") {
	   $ty ="ছড়া";
	   }                                  
       else if($txtType =="7") {
	   $ty ="শিশুসাহিত্য ";
	   }                                 
       else if($txtType =="8") {
	   $ty ="জীবনী";
	   }                                 
       else if($txtType =="9") {
	   $ty ="রচনাবলী";
	   }                                
       else if($txtType =="10") {
	   $ty ="মুক্তিযুদ্ধ";
	   }                                 
       else if($txtType =="11") {
	   $ty ="নাটক";
	   }                                 
       else if($txtType =="12") {
	   $ty ="বিজ্ঞান";
	   }                                 
       else if($txtType =="13") {
	   $ty ="ভ্রমণ";
	   }                                 
       else if($txtType =="14") {
	   $ty ="ইতিহাস";
	   }                                  
       else if($txtType =="15") {
	   $ty ="রাজনীতি";
	   }                                  
       else if($txtType =="16") {
	   $ty ="চি:/স্বাস্থ্য";
	   }                                 
       else if($txtType =="17") {
	   $ty ="কম্পিউটার";
	   }                                  
       else if($txtType =="18") {
	   $ty ="রম্য/ধাঁধা";
	   }                                  
       else if($txtType =="19") {
	   $ty ="ধর্মীয়";
	   }                                 
       else if($txtType =="20") {
	   $ty ="অনুবাদ";
	   }                                 
       else if($txtType =="21") {
	   $ty ="অভিধান";
	   }                                  
       else if($txtType =="22") {
	   $ty ="সাইন্স ফিকশন";
	   }   
	    else if($txtType =="23") {
	   $ty ="অন্যান্য";
	   } else{
		   
		   $ty="";
		  
	   }
	                
	  
	  ?>
	  <tr align="center">
		      
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[book_name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[author]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[public]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo $ty ; ?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[son]";?></td>
         <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[price]";?></td>
       	


	  </tr>
	  <?php }?>
	 
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