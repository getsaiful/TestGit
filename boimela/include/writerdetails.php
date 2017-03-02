 <?php
   require_once("top.php");
  
 ?>
  <div class="middle" id="container">
  <div class="bottombox2">
          
                  <span style="font-size:18px; font-weight:bold;">লেখকের বিস্তারিত <?php echo "$rsbook[author_name]";?></span> <br><br>
                  
                  <?php 
				   require_once("admin/connection.php");
				  
				  $query = mysql_query("select * from author where id ='". $_GET['id']."'");
				 
				
	               $rsbook=mysql_fetch_array($query));
		 
		   ?>
           <div>
                 <div class="ldiv">
                 
                     <div class="ltop">
                         <img src="admin/photo/author/<?php echo "$rsbook[photo]";?>" border="0">
                     </div>
                     <div class="lbot">
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