 <?php
   require_once("top.php");
  
 ?>
  <div class="middle" id="container">
  <div class="bottombox2">
          
           
          <div class="toprow2" style="margin-top:300px;">
               <a href="index.php"> 
                            <img src="image/Main-Page.png" border="0">
                </a>  
                <a href="booklist.php"> 
                            <img src="image/Back.png" border="0">
                </a>  
                             
          
               
                </div>
                 <div class="toprow2" style="margin-top:10px;">
            <a href="bookpage2.php?d=<?php echo date('d') ; ?>&c=2" class=" imglink"> <img  src="image/Today-Book.png" name="img4" border="0"  onmouseover="myOn('img4')"  onmouseout="myOut('img4')" /> </a>
          
                             
           <a href="datewiseBook.php" class=" imglink"> <img  src="image/A-porjonto-Boi.png"  name="img1" border="0"   onmouseover="myOn('img1')"  onmouseout="myOut('img1')" /> </a>
               
               
                </div>
               
    </div>
    </div>

 <script language="javascript">
  if (document.images) {

//preload ima

//base image

img1N= new Image(290,350);
img1N.src= 'image/A-porjonto-Boi.png' ;
img1H= new Image(290,350);
img1H.src= 'image/A-porjonto-Boi++.png' ;



img4N= new Image(290,350);
img4N.src= 'image/Today-Book.png' ;
img4H= new Image(290,350);
img4H.src= 'image/Today-Book++.png' ;



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