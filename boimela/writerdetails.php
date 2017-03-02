 <?php
   require_once("top.php");
  
 ?>
  <style>div,td, span{font-family: 'SolaimanLipiNormal';} </style>
  <div class="middle" id="container">
  <div class="bottombox4">
          
                  <a href="writer.php?ls=<?php echo $_GET['ls'] ;?> "> 
                 <div class="prev22" >
                  &nbsp;
                 </div> 
              </a>
              
              <a href="index.php"> 
                 <div class="home33" >
                  &nbsp;
                 </div> 
              </a>
                  
                  <?php 
				   require_once("admin/connection.php");
				  
				  $query = mysql_query("select * from author where id ='". $_GET['id']."'");
				 
				
	               $rsbook=mysql_fetch_array($query);
		 
		   ?>
            <div class="fontclass" style="text-align:left;  font-weight:bold; margin-top:60px; padding-top:20px; padding-bottom:10px;">
           
           <span style="font-size:30px; font-weight:bold;"> <?php echo "$rsbook[author_name]";?>  এর বিস্তারিত বর্ণনা</span> <br><br>
           </div>
           
           <div>
                 <div class="ldiv">
                 
                     <div class="ltop">
                         <img src="admin/photo/author/<?php echo $rsbook['photo'] ? $rsbook['photo'] : 'nophoto.jpg' ; ?>" border="0">
                     </div>
                     <div class="lbot">
                      <span style="font-size:14px; font-weight:bold;"> <?php echo "$rsbook[author_name]";?> এর প্রকাশিত বই সমূহ </span> <br />
                       <?php echo "$rsbook[published_book]";?>
                     
                     </div>
                 </div>
                 <div class="rdiv">
                      <div>
                      
                            <?php echo "$rsbook[short_desription]";?>
                      </div>
                     
                 </div>
           </div>
                  
               </div>
    
              
    </div>




 <?php

   require_once("bottom.php");
 ?>