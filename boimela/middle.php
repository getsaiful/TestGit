    <script type="text/javascript">
       function getcount(value1){
			
           // alert(value1);
               //var url = "countclick.php?button=" + value1;
			   
               // window.location.href = url;
			   $.ajax({
				   url:"countclick.php?button=" + value1,
				   type: "GET", 
				   success: function(result){
       // $("#div1").html(result);
	  // alert(result);
    }
	});
			   
            }
    
    </script>
<div class="middle" id="container">
    <div class="bottombox">        
  		
    <table width="80%" border="0" align="center">
              <tr > <!-- maps.php -->
                <td><a href="stallist3.php" onclick="getcount('button_one');"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('stall','','image/main_img/stalList2.png',0)"><img src="image/main_img/stalList.png" alt="map" width="290" height="370" id="stall" /></a></td>
                <td><a href="booklist.php" onclick="getcount('button_two');"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Books','','image/main_img/image4.jpg',0)"><img src="image/main_img/image3.jpg" alt="Books" width="290" height="370" id="Books" /></a></td>
               <td><a href="map.html" title="Boimela Map" onclick="getcount('button_three');"  class="fancybox fancybox.iframe" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('map','','image/Map++.png',0)"><img src="image/Map.png" alt="Public Library Portal" width="290" height="370" id="map" /></a></td>
                               
			 </tr>
    </table>    
    <table width="100%" style="margin-left: -145px; !important;">
           <tr>

              <td><a href="http://konnect.gov.bd/public/" onclick="getcount('button_four');"  title="Service Portal" class="fancybox fancybox.iframe" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('Image6','','image/main_img/kishorbatayan2.png',0)"><img src="image/main_img/kishorbatayan.png" alt="Service Portal" width="290" height="370" id="Image6" /></a></td>		

              <td><a href="http://services.portal.gov.bd/" onclick="getcount('button_seven');"  title="Sebakungo" class="fancybox fancybox.iframe" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('Image7','','image/main_img/sebakungo2.png',0)"><img src="image/main_img/sebakungo.png" alt="Sebakungo" width="290" height="370" id="Image7" /></a></td>

              <td><a href="http://www.bangladesh.gov.bd/" onclick="getcount('button_six');"  title="National Portal" class="fancybox fancybox.iframe" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('Nportal','','image/main_img/nationalportal2.png',0)"><img src="image/main_img/nationalportal.png" alt="National Portal" width="290" height="370" id="Nportal" /></a></td>

              <td><a href="http://a2i.pmo.gov.bd/" onclick="getcount('button_five');"  title="a2i" class="fancybox fancybox.iframe" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('publicLibrary','','image/main_img/a2i2.png',0)"><img src="image/main_img/a2i.png" alt="a2i Portal" width="290" height="370" id="publicLibrary" /></a></td>


               <!-- <td><a href="http://www.bangladesh.gov.bd/www.bangladesh.gov.bd/index16f0.html?q=bn" title="National Portal" class="fancybox fancybox.iframe" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('pmolib','','image/main_img/Digital_Li2.png',0)"><img src="image/main_img/Digital_Li.png" alt="pmolib" width="290" height="370" id="pmolib" /></a></td>-->

              </tr>
    
            </table> 
           
   </div>
</div>
   
