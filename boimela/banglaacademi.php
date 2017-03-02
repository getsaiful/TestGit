 <?php
   require_once("top.php");
  
 ?>
  <div class="middle" id="container">
               <div class="toprow_right">
                       <a href="index.php" class=" imglink"> <img src="image/Main-Page.png" name="img5" border="0"   onmouseover="myOn('img5')"  onmouseout="myOut('img5')" /> </a>
               </div>
  <div class="bottombox_ekush">

				<table width="70%" border="0" align="center" style="margin-left:270px; margin-bottom:20px;" >
              <tr>
                <td><a href="gallery.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('gallery','','image/main_img/Gallery2.png',0)"><img src="image/main_img/Gallery.png" alt="gallery" width="290" height="370" id="gallery" /></a></td>
                <td><a href="ekush.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('ekushepadak','','image/main_img/Akusha_Podok2.png',0)"><img src="image/main_img/Akusha_Podok.png" alt="ekushepadak" width="290" height="370" id="ekushepadak" /></a></td>
              </tr>
     
    
            </table>
                <div class="toprow2">
                       <a href="bangla_academy_history.php" class=" imglink">  <img src="image/Bangla-Academy-small-history.png" name="img1" border="0"   onmouseover="myOn('img1')"  onmouseout="myOut('img1')" /> </a>
               </div>
              
                <div class="toprow2">
                       <a href="prize_writer_1.php" class=" imglink"> <img src="image/Bangla-Academy-puroskar-prapto-lakhok.png" name="img3" border="0"   onmouseover="myOn('img3')"  onmouseout="myOut('img3')" /> </a>  
                </div>
                 <div class="toprow2">
                       <a href="potrikagucho.php" class=" imglink"> <img src="image/Bangla-Academy-Protikaguso-o-annon.png" name="img4" border="0"  onmouseover="myOn('img4')"  onmouseout="myOut('img4')" /> </a>        
                 </div>
               
               
          
 <script language="javascript">
  if (document.images) {

//preload images

//base image

img1N= new Image(207,88);
img1N.src= 'image/Bangla-Academy-small-history.png' ;
img1H= new Image(207,88);
img1H.src= 'image/Bangla-Academy-small-history++.png' ;

img2N= new Image(207,88);
img2N.src= 'image/Omar-akusha-gronthomala.png' ;
img2H= new Image(207,88);
img2H.src= 'image/Omar-akusha-gronthomala++.png' ;

img3N= new Image(207,88);
img3N.src= 'image/Bangla-Academy-puroskar-prapto-lakhok.png' ;
img3H= new Image(207,88);
img3H.src= 'image/Bangla-Academy-puroskar-prapto-lakhokr++.png' ;

img4N= new Image(207,88);
img4N.src= 'image/Bangla-Academy-Protikaguso-o-annon.png' ;
img4H= new Image(207,88);
img4H.src= 'image/Bangla-Academy-Protikaguso-o-annon++.png' ;

img5N= new Image(207,88);
img5N.src= 'image/Main-Page.png';
img5H= new Image(207,88);
img5H.src= 'image/Main-Page++.png';

img05N= new Image(207,88);
img05N.src= 'image/akose-podok-0.png';
img05H= new Image(207,88);
img05H.src= 'image/akose-podok-1.png';





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
             </div>
    
              
    </div>




 <?php

   require_once("bottom.php");
 ?>