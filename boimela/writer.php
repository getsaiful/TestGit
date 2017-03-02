 <?php
   require_once("top.php");
  
				   require_once("admin/connection.php");
				   if(isset($_GET['ls']) && $_GET['ls']) {
				   $l = $_GET['ls'];
				   }
				   else
				   {
				   $l=0;
				   }
				   
				   $ls = $l ;
				   $le=  15;
				   $lp=$ls + 15 ;
				   $lm=  $ls - 15 ;
				  $query = mysql_query("select * from author order by id asc limit $ls ,$le ");
				  $num = mysql_num_rows(mysql_query("select id from author order by id asc"));
				 $nu = $num - 15;
				  ?>
  <style>	td, span{font-family: 'SolaimanLipiNormal';} </style>
  <div class="middle" id="container">
        
    
          <div class="bottombox" >
             <div class="fontclass" style="text-align:left; font-weight:bold; padding-top:20px; padding-bottom:20px;">
                <span style="font-size:30px; font-weight:bold;"> লেখকের তালিকা </span> <br><br>
             </div>
             <?php
			 if($ls == 0) {
				 ?>
                 
				 <a href="writer.php?ls=<?php echo $lp ;?> "> 
                 <div class="next" >
                  &nbsp;
                 </div> 
              </a>
              <a href="index.php"> 
                 <div class="home2" >
                  &nbsp;
                 </div> 
              </a>
              <a href="booklist.php"> 
                 <div class="prev" >
                  &nbsp;
                 </div> 
              </a>
			  <?php
			 }
			 else
			 if($ls >= $nu ) {
				?> 
                  <a href="writer.php?ls=<?php echo $lm ;?> "> 
                 <div class="prev2" >
                  &nbsp;
                 </div> 
              </a>
              
              <a href="index.php"> 
                 <div class="home3" >
                  &nbsp;
                 </div> 
              </a>
				 
                 <?php
			 }
			 else
			 {
			 ?>
             <a href="writer.php?ls=<?php echo $lm ;?> "> 
                 <div class="prev" >
                  &nbsp;
                 </div> 
              </a>
              <a href="writer.php?ls=<?php echo $lp ;?> "> 
                 <div class="next" >
                  &nbsp;
                 </div> 
              </a>
              <a href="index.php"> 
                 <div class="home2" >
                  &nbsp;
                 </div> 
              </a>
 
                 <?php
			 }
					 ?>
                  
                  	
                    <table width="100%">
                    <tr>
	  
	  <?php
	 $r=1;
	   while($rsbook=mysql_fetch_array($query)){
		 
		   ?>
           <td width="20%">
            <a href="writerdetails.php?id=<?php echo "$rsbook[id]";?>&ls=<?php echo $ls;?>" class="linkclass">
          
            <img src="admin/photo/author/thumb/<?php echo $rsbook['photo'] ? $rsbook['photo'] : 'nophoto.jpg' ; ?>" border="0" width="100"/> <br /> <?php echo "$rsbook[author_name]";?> </a> 
       
       </td>
       <?php
       if($r == 5) {
		   
		 $r =0;
		 ?>
        </tr> <tr>
         <?php
	   }
       
	  
	  $r++;
	  }?>
	 
	</tr>
    </table>
	
				  
                  
               </div>
    
              
    </div>




 <?php

   require_once("bottom.php");
 ?>