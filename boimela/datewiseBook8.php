 <?php
   require_once("top.php");

  $c= date("d");
 
  $d = $c - 1;

   // string date ( string $format [, int $timestamp = time() ] );
    
  // echo date(d);

 ?>

 
  <div class="middle2" id="container">
  <div class="bottombox2" style="margin-top:20px;">
           <a href="index.php"> 
                 <div class="home9" >
 
                  </div> 
              </a>
            
              <a href="booklist.php"> 
                 <div class="prev9" >
 
                  </div> 
              </a>
          <div class="toprow2" style="margin-top:95px;">
           <?php 
				if($d >= 0) {
				?>
               <a href="bookpage2017.php?d=1&c=3" class="imglink"> <img src="image/1.png" name="img1" border="0"   onmouseover="myOn('img1')"  onmouseout="myOut('img1')" /> </a>
                <?php  } else{  ?>
                <img src="img/1+++.png"  border="0"  />
                <?php  }
				 if($d >= 2) {?>
                
                <a href="bookpage2017.php?d=2&c=3" class="imglink"> <img src="image/2.png" name="img2" border="0"   onmouseover="myOn('img2')"  onmouseout="myOut('img2')" /> </a> 
                <?php } else{ ?>
                <img src="img/2+++.png"  border="0"  />
                
                <?php }  if($d >= 3 ) {?>
                <a href="bookpage2017.php?d=3&c=3" class="imglink"> <img src="image/3.png" name="img3" border="0"   onmouseover="myOn('img3')"  onmouseout="myOut('img3')" /> </a>
                <?php } else{ ?>
                <img src="img/3+++.png"  border="0"  />
			   <?php } if($d >= 4 ) {
					?>
                <a href="bookpage2017.php?d=4&c=3" class="imglink"> <img src="image/4.png" name="img4" border="0"  onmouseover="myOn('img4')"  onmouseout="myOut('img4')" /> </a>
				<?php
				} 
				else   {
                ?>
                   <img src="img/4+++.png"  border="0"  />
                <?php
				}
				if($d >= 5 ) {
					?>
                
                <a href="bookpage2017.php?d=5&c=3" class="imglink"> <img src="image/5.png" name="img5" border="0"   onmouseover="myOn('img5')"  onmouseout="myOut('img5')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/5+++.png"  border="0"  />
                <?php
				}
				?>
              
                </div>
                <div class="toprow2">
                <?php
				if($d >= 6 ) {
					?>
                  <a href="bookpage2017.php?d=6&c=3" class="imglink"> <img src="image/6.png" name="img6" border="0"   onmouseover="myOn('img6')"  onmouseout="myOut('img6')" /> </a>
                  <?php
				}
				else   {
                ?>
                   <img src="img/6+++.png"  border="0"  />
                <?php
				}
				if($d >= 7 ) {
					?>
                <a href="bookpage2017.php?d=7&c=3" class="imglink"> <img src="image/7.png" name="img7" border="0"   onmouseover="myOn('img7')" onMouseOut="myOut('img7')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/7+++.png"  border="0"  />
                <?php
				}
				if($d >= 8 ) {
					?>
                <a href="bookpage2017.php?d=8&c=3" class="imglink"> <img src="image/8.png" name="img8" border="0"   onmouseover="myOn('img8')"  onmouseout="myOut('img8')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/8+++.png"  border="0"  />
                <?php
				}
				if($d >= 9 ) {
					?>
                <a href="bookpage2017.php?d=9&c=3" class="imglink"> <img src="image/9.png" name="img9" border="0"  onmouseover="myOn('img9')"  onmouseout="myOut('img9')" /> </a>
                 <?php
				}
				else   {
                ?>
                   <img src="img/9+++.png"  border="0"  />
                <?php
				}
				if($d >= 10 ) {
					?>
                <a href="bookpage2017.php?d=10&c=3" class="imglink"> <img src="image/10.png" name="img10" border="0"   onmouseover="myOn('img10')"  onmouseout="myOut('img10')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/10+++.png"  border="0"  />
                <?php
				}
				?>
              
                </div>
                <div class="toprow2">
              <?php
			  if($d >= 11 ) {
					?>
                 <a href="bookpage2017.php?d=11&c=3" class=" imglink"> <img src="image/11.png" name="img11" border="0"   onmouseover="myOn('img11')"  onmouseout="myOut('img11')" /> </a>
                 <?php
				}
				else   {
                ?>
                   <img src="img/11+++.png"  border="0"  />
                <?php
				}
				if($d >= 12 ) {
					?>
                <a href="bookpage2017.php?d=12&c=3" class=" imglink"> <img src="image/12.png" name="img12" border="0"   onmouseover="myOn('img12')" onMouseOut="myOut('img12')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/12+++.png"  border="0"  />
                <?php
				}
				if($d >= 13 ) {
					?>
                <a href="bookpage2017.php?d=13&c=3" class=" imglink"> <img src="image/13.png" name="img13" border="0"   onmouseover="myOn('img13')"  onmouseout="myOut('img13')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/13+++.png"  border="0"  />
                <?php
				}
				if($d >= 14 ) {
					?>
                <a href="bookpage2017.php?d=14&c=3" class=" imglink"> <img src="image/14.png" name="img14" border="0"  onmouseover="myOn('img14')"  onmouseout="myOut('img14')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/14+++.png"  border="0"  />
                <?php
				}
				if($d >= 15 ) {
					?>
                <a href="bookpage2017.php?d=15&c=3" class=" imglink"> <img src="image/15.png" name="img15" border="0"   onmouseover="myOn('img15')"  onmouseout="myOut('img15')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/15+++.png"  border="0"  />
                <?php
				}
				?>
               
               </div>
                <div class="toprow2">
                <?php
				if($d >= 16 ) {
					?>
                         <a href="bookpage2017.php?d=16&c=3" class=" imglink"> <img src="image/16.png" name="img16" border="0"   onmouseover="myOn('img16')"  onmouseout="myOut('img16')" /> </a>
                         <?php
				}
				else   {
                ?>
                   <img src="img/16+++.png"  border="0"  />
                <?php
				}
				if($d >= 17 ) {
					?>
                <a href="bookpage2017.php?d=17&c=3" class=" imglink"> <img src="image/17.png" name="img17" border="0"   onmouseover="myOn('img17')" onMouseOut="myOut('img17')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/17+++.png"  border="0"  />
                <?php
				}
				if($d >= 18 ) {
					?>
                <a href="bookpage2017.php?d=18&c=3" class=" imglink"> <img src="image/18.png" name="img18" border="0"   onmouseover="myOn('img18')"  onmouseout="myOut('img18')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/18+++.png"  border="0"  />
                <?php
				}
				if($d >= 19 ) {
					?>
                <a href="bookpage2017.php?d=19&c=3" class=" imglink"> <img src="image/19.png" name="img19" border="0"  onmouseover="myOn('img19')"  onmouseout="myOut('img19')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/19+++.png"  border="0"  />
                <?php
				}
				if($d >= 20 ) {
					?>
                <a href="bookpage2017.php?d=20&c=3" class=" imglink"> <img src="image/20.png" name="img20" border="0"   onmouseover="myOn('img20')"  onmouseout="myOut('img20')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/20+++.png"  border="0"  />
                <?php
				}
				?>
 
          </div>
      
                 <div class="toprow2">
                 <?php
				 if($d >= 21 ) {
					?>
               <a href="bookpage2017.php?d=21&c=3" class=" imglink"> <img src="image/21.png" name="img21" border="0"   onmouseover="myOn('img21')"  onmouseout="myOut('img21')" /> </a>
               <?php
				}
				else   {
                ?>
                   <img src="img/21+++.png"  border="0"  />
                <?php
				}
				if($d >= 22 ) {
					?>

                <a href="bookpage2017.php?d=22&c=3" class=" imglink"> <img src="image/22.png" name="img22" border="0"   onmouseover="myOn('img22')" onMouseOut="myOut('img22')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/22+++.png"  border="0"  />
                <?php
				}
				if($d >= 23 ) {
					?>
                <a href="bookpage2017.php?d=23&c=3" class=" imglink"> <img src="image/23.png" name="img23" border="0"   onmouseover="myOn('img23')"  onmouseout="myOut('img23')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/23+++.png"  border="0"  />
                <?php
				}
				if($d >= 24 ) {
					?>
                <a href="bookpage2017.php?d=24&c=3" class=" imglink"> <img src="image/24.png" name="img24" border="0"  onmouseover="myOn('img24')"  onmouseout="myOut('img24')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/24+++.png"  border="0"  />
                <?php
				}
				if($d >= 25 ) {
					?>
                <a href="bookpage2017.php?d=25&c=3" class=" imglink"> <img src="image/25.png" name="img25" border="0"   onmouseover="myOn('img25')"  onmouseout="myOut('img25')" /> </a>   
                <?php
				}
				else   {
                ?>
                   <img src="img/25+++.png"  border="0"  />
                <?php
				}
				?>
				
                       </div>
                <div class="toprow2">
                <?php
				if($d >= 26 ) {
					?>
                 <a href="bookpage2017.php?d=26&c=3" class="imglink"> <img src="image/26.png" name="img26" border="0"   onmouseover="myOn('img26')"  onmouseout="myOut('img26')" /> </a>
               <?php
				}
				else   {
                ?>
                   <img src="img/26+++.png"  border="0"  />
                <?php
				}
				if($d >= 27 ) {
					?>
                  <a href="bookpage2017.php?d=27&c=3" class="imglink"> <img src="image/27.png" name="img27" border="0"   onmouseover="myOn('img27')" onMouseOut="myOut('img7')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/27+++.png"  border="0"  />
                <?php
				}
				if($d >= 28 ) {
					?>
                  <a href="bookpage2017.php?d=28&c=3" class="imglink"> <img src="image/28.png" name="img28" border="0"   onmouseover="myOn('img28')"  onmouseout="myOut('img28')" /> </a>
                <?php
				}
				else   {
                ?>
                   <img src="img/28+++.png"  border="0"  />
                <?php
				}  
				?>
               </div>
               
               
          
<script language="javascript">
  if (document.images) {

//preload images

//base image

img1N= new Image(207,88);
img1N.src= 'image/1.png' ;
img1H= new Image(207,88);
img1H.src= 'image/1++.png' ;

img2N= new Image(2,88);
img2N.src= 'image/2.png' ;
img2H= new Image(207,88);
img2H.src= 'image/2++.png' ;

img3N= new Image(207,88);
img3N.src= 'image/3.png' ;
img3H= new Image(207,88);
img3H.src= 'image/3++.png' ;

img4N= new Image(207,88);
img4N.src= 'image/4.png' ;
img4H= new Image(207,88);
img4H.src= 'image/4++.png' ;

img5N= new Image(207,88);
img5N.src= 'image/5.png' ;
img5H= new Image(207,88);
img5H.src= 'image/5++.png' ;

img6N= new Image(207,88);
img6N.src= 'image/6.png' ;
img6H= new Image(207,88);
img6H.src= 'image/6++.png' ;

img7N= new Image(207,88);
img7N.src= 'image/7.png' ;
img7H= new Image(207,88);
img7H.src= 'image/7++.png' ;

img8N= new Image(207,88);
img8N.src= 'image/8.png' ;
img8H= new Image(207,88);
img8H.src= 'image/8++.png' ;

img9N= new Image(207,88);
img9N.src= 'image/9.png' ;
img9H= new Image(207,88);
img9H.src= 'image/9++.png' ;

img10N= new Image(207,88);
img10N.src= 'image/10.png' ;
img10H= new Image(207,88);
img10H.src= 'image/10++.png' ;

img11N= new Image(207,88);
img11N.src= 'image/11.png' ;
img11H= new Image(207,88);
img11H.src= 'image/11++.png' ;

img12N= new Image(207,88);
img12N.src= 'image/12.png' ;
img12H= new Image(207,88);
img12H.src= 'image/12++.png' ;

img13N= new Image(207,88);
img13N.src= 'image/13.png' ;
img13H= new Image(207,88);
img13H.src= 'image/13++.png' ;

img14N= new Image(207,88);
img14N.src= 'image/14.png' ;
img14H= new Image(207,88);
img14H.src= 'image/14++.png' ;

img15N= new Image(207,88);
img15N.src= 'image/15.png' ;
img15H= new Image(207,88);
img15H.src= 'image/15++.png' ;

img16N= new Image(207,88);
img16N.src= 'image/16.png' ;
img16H= new Image(207,88);
img16H.src= 'image/16++.png' ;

img17N= new Image(207,88);
img17N.src= 'image/17.png' ;
img17H= new Image(207,88);
img17H.src= 'image/17++.png' ;

img18N= new Image(207,88);
img18N.src= 'image/18.png' ;
img18H= new Image(207,88);
img18H.src= 'image/18++.png' ;

img19N= new Image(207,88);
img19N.src= 'image/19.png' ;
img19H= new Image(207,88);
img19H.src= 'image/19++.png' ;

img20N= new Image(207,88);
img20N.src= 'image/20.png' ;
img20H= new Image(207,88);
img20H.src= 'image/20++.png' ;

img21N= new Image(207,88);
img21N.src= 'image/21.png' ;
img21H= new Image(207,88);
img21H.src= 'image/21++.png' ;

img22N= new Image(207,88);
img22N.src= 'image/22.png' ;
img22H= new Image(207,88);
img22H.src= 'image/22++.png' ;

img23N= new Image(207,88);
img23N.src= 'image/23.png' ;
img23H= new Image(207,88);
img23H.src= 'image/23++.png' ;

img24N= new Image(207,88);
img24N.src= 'image/24.png' ;
img24H= new Image(207,88);
img24H.src= 'image/24++.png' ;

img25N= new Image(207,88);
img25N.src= 'image/25.png' ;
img25H= new Image(207,88);
img25H.src= 'image/25++.png' ;

img26N= new Image(207,88);
img26N.src= 'image/26.png' ;
img26H= new Image(207,88);
img26H.src= 'image/26++.png' ;

img27N= new Image(207,88);
img27N.src= 'image/27.png' ;
img27H= new Image(207,88);
img27H.src= 'image/27++.png' ;

img28N= new Image(207,88);
img28N.src= 'image/28.png' ;
img28H= new Image(207,88);
img28H.src= 'image/28++.png' ;

img29N= new Image(207,88);
img29N.src= 'image/29.png';
img29H= new Image(207,88);
img29H.src= 'image/29++.png';




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