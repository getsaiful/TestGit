<?php
require_once("top.php");
require_once("admin/connection.php"); 
$son = $_GET['y'];
$query = mysql_query("select * from ekush where son = '$son' order by sub ");
$query2 = mysql_query("SELECT DISTINCT(year) AS ye FROM  ekush where son = '$son' ");
$rs2 = mysql_fetch_array($query2);
 $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
$output = str_replace(range(0, 9),$bn_digits, $son);

?>
<!--year  -->
<style>
div,td,span,u{font-family: 'SolaimanLipiNormal';}
</style>
  <div class="middle" id="container">
  <div class="bottombox">
  
             <a href="ekush.php"> 
                 <div class="prev22" >
                  &nbsp;
                 </div> 
              </a>
              
              <a href="index.php"> 
                 <div class="home33" >
                  &nbsp;
                 </div> 
              </a>
           <div class="fontclass" style="text-align:left; font-size:20px; font-weight:bold; padding-top:20px; padding-bottom:20px;">
           
          <u>  একুশে পদক তালিকা  <span style="font-size:25px; "> <?php echo $output ; ?> </span> </u>   
           </div>
         <table width="100%" border="0">
         <tr>
                  <td width="35%" align="left" style=" font-size:28px; font-weight:bold; text-decoration:underline">
                     নাম
                 </td>
                 <td align="left" style=" font-size:28px; font-weight:bold; text-decoration:underline">
					 ক্ষেত্র
                     </td>
                     </tr>
        
         <?php
		 while($rs = mysql_fetch_array($query)) {
			 ?>
              <tr>
                  <td width="35%" align="left">
                     <?php
                      echo $rs['name'];
                      ?>
                 </td>
                 <td align="left">
					 <?php
                     echo $rs['sub'];
                     ?>
                     </td>
                     </tr>
                     <?php
			 
		 }
?>
</table>
             </div>
    
              
    </div>




 <?php

   require_once("bottom.php");
 ?>