<?php require_once("top.php"); ?>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">

  // Load the Google Transliteration API
  google.load("elements", "1", {
		packages: "transliteration"
	  });

  function onLoad() {
	var options = {
	  sourceLanguage:
		  google.elements.transliteration.LanguageCode.ENGLISH,
	  destinationLanguage:
		  google.elements.transliteration.LanguageCode.BENGALI,
	  shortcutKey: 'ctrl+g',
	  transliterationEnabled: true
	};
	// Create an instance on TransliterationControl with the required
	// options.
	var control =
		new google.elements.transliteration.TransliterationControl(options);

	// Enable transliteration in the textfields with the given ids.
	var ids = [ "searchbox" ];
	control.makeTransliteratable(ids);

	// Show the transliteration control which can be used to toggle between
	// English & Hindi.
	control.showControl('translControl', {
		controlType: google.elements.transliteration.TransliterationControl.
					 ControlType.SINGLE_LANGUAGE_BUTTON
	});
  }
  google.setOnLoadCallback(onLoad);
</script>
<script>
function suggest(inputString){
	//alert(inputString);
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
			var typValue = $('input[name=stype]:checked').val(); 
			var yearValue = $('input[name=syear]:checked').val(); 
			
		$('#searchbox').addClass('load');
			$.post("autosuggest.php", {queryString: ""+inputString+"", tp: "" + typValue + "", yr: "" + yearValue + "" }, function(data){
				
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#searchbox').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#searchbox').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>
div,input,p.submit{font-family: 'SolaimanLipiNormal';}
.bangla{ font-size:24px; padding:10px;}
.btn{ background:#CCC; padding:7px 10px 8px 10px; border:1px solid #DDD; width:110px;font-size: 25px; } 
#result {
	height:20px;
	font-size:16px;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
.suggestionsBox {
	position: absolute;
	left: 0px;
	top:110px;
	margin: 26px 0px 0px 0px;
	padding-left:20px;
	width: 300px;
	padding:0px;
	color: #8D8D8D;
	z-index:1;
	background:#FFF;

}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
	font-family: 'SolaimanLipiNormal';
}
.suggestionList ul li:hover {
	background-color: #EAEAEA;
	color:#636363;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#777;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}

</style>



  <div class="middle" id="container">
  <div class="bottombox2">
          
           <div class="toprow2" style="margin-top:20px;">
               <a href="index.php"> 
                    <img src="image/Main-Page.png" border="0">
                </a>  
          </div>
              
          <div class="toprow2" style="margin-top:60px;">
              <form name="book_search"  method="get" action="search_result.php">

              <input type="radio" name="syear" id="syear1" value="2017" checked="checked" /> বইমেলা ২০১৭  এ প্রকাশিত গ্রন্থাবলী 

              <input type="radio" name="syear" id="syear1" value="2016"  /> বইমেলা ২০১৬ এ প্রকাশিত গ্রন্থাবলী 

              <input type="radio" name="syear" id="syear1" value="2015"  /> বইমেলা ২০১৫ এ প্রকাশিত গ্রন্থাবলী  

              <input type="radio" name="syear" id="syear1" value="2014"  /> বইমেলা ২০১৪ এ প্রকাশিত গ্রন্থাবলী 

               <br /><br />

                <!-- <input type="radio" name="syear" id="syear2" value="2013"  /> বইমেলা ২০১৩ এ প্রকাশিত গ্রন্থাবলী  --> 
               <input type="radio" name="stype" id="st1" value="1" checked="checked" /> বইয়ের নাম অনুসারে খুঁজুন  &nbsp; 

               <input type="radio" name="stype" id="st2" value="2"  /> লেখকের নাম অনুসারে খুঁজুন <br /><br />

              	<input type="text" class="bangla"  name="c"  placeholder="বই খুঁজুন" id="searchbox" onkeyup="suggest(this.value);" onblur="fill();" size="37" />
                <input type="submit"  name="submit_search" style="display: none;" value="খুঁজুন" class="btn" />

              </form>
        
        
              <div class="suggestionsBox" id="suggestions" style="text-align:left; padding-top:10px; margin-left:280px; width:460px; float:left; padding-top:0; display:none; "> 
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
              
           <div id='suggest' style="text-align:left; margin-top:0; margin-left:310px; width:300px; float:left; padding-top:0; ">
          </div>
          </div>
			

             <div class="toprow2" style="margin-top:100px;">
         <a href="prime_book.php" class="imglink" > <img  src="image/prodan-montir-boi0.png" name="img00" border="0"   onmouseover="myOn('img00')" onMouseOut="myOut('img00')" /> </a> 
            
            </div>
            <div class="toprow2">
                    <!-- <a href="datewiseBook8.php" class="imglink"> একুশে বই মেলা ২০১৭ </a>   --> 

                    <a href="datewiseBook8.php" class="imglink"> <img  src="image/newBook2017.png" name="img2017" border="0"   onmouseover="myOn('img2017')" onMouseOut="myOut('img2017')" /> </a>  
                   
                    <a href="writer.php" class="imglink"> <img  src="image/writer0.png" name="img01" border="0"   onmouseover="myOn('img01')" onMouseOut="myOut('img01')" /> </a> 

        	                   
                    <a href="Categorywisebook.php" class="imglink"> <img  src="image/division.png" name="imgdivision" border="0"   onmouseover="myOn('imgdivision')" onMouseOut="myOut('imgdivision')" /> </a> 
 		
            </div>
               
          <div class="toprow2" style="margin-top:10px;">

          <a href="datewiseBook7.php" class="imglink"> <img  src="image/newBook2016.png" name="img2016" border="0"   onmouseover="myOn('img2016')" onMouseOut="myOut('img2016')" /> </a>  
                   

          <a href="datewiseBook5.php" class="imglink"> <img  src="image/newBook2015.png" name="img2015" border="0"   onmouseover="myOn('img2015')" onMouseOut="myOut('img2015')" /> </a>  



          
<!--           <img  src="image/newBook2015.png" name="img2015" border="0"   onmouseover="myOn('img2015')" onMouseOut="myOut('img2015')" />  -->




           <a href="datewiseBook4.php" class="imglink"> <img  src="image/boimela2014.png" name="img2014" border="0"   onmouseover="myOn('img2014')" onMouseOut="myOut('img2014')" /> </a>   

 <a href="datewiseBook3.php" class="imglink">  <img  src="image/Boimela_2013.png" name="img2013" border="0"   onmouseover="myOn('img2013')" onMouseOut="myOut('img2013')" /> </a> 
 <br><br>
 
  <!-- <a href="datewiseBook2.php" class="imglink"> <img  src="image/notun-boi-2012-0.png" name="img0" border="0"   onmouseover="myOn('img0')" onMouseOut="myOut('img0')" /> </a> 
  
  
  <a href="datewiseBook.php" class="imglink"> <img  src="image/boi-mela-2011-0.png" name="img2" border="0"   onmouseover="myOn('img2')" onMouseOut="myOut('img2')" /> </a>
                -->
        

                </div>
                
                 
               
          </div>
    </div>
  

 <script language="javascript">
  if (document.images) {

//preload ima

//base image
 
imgdivisionN= new Image(290,350);
imgdivisionN.src= 'image/division.png' ;
imgdivisionH= new Image(290,350);
imgdivisionH.src= 'image/division++.png' ;


img2017N= new Image(290,350);
img2017N.src= 'image/newBook2017.png' ;
img2017H= new Image(290,350);
img2017H.src= 'image/newBook2017++.png' ;


img2016N= new Image(290,350);
img2016N.src= 'image/newBook2016.png' ;
img2016H= new Image(290,350);
img2016H.src= 'image/newBook2016++.png' ;

img2015N= new Image(290,350);
img2015N.src= 'image/newBook2015.png' ;
img2015H= new Image(290,350);
img2015H.src= 'image/newBook2015++.png' ;

img2014N= new Image(290,350);
img2014N.src= 'image/boimela2014.png' ;
img2014H= new Image(290,350);
img2014H.src= 'image/boimela2014++.png' ;

img2013N= new Image(290,350);
img2013N.src= 'image/Boimela_2013.png' ;
img2013H= new Image(290,350);
img2013H.src= 'image/Boimela_2013++.png' ;

img1N= new Image(290,350);
img1N.src= 'image/A-porjonto-Boi.png' ;
img1H= new Image(290,350);
img1H.src= 'image/A-porjonto-Boi++.png' ;

img2N= new Image(290,350);
img2N.src= 'image/boi-mela-2011-0.png' ;
img2H= new Image(290,350);
img2H.src= 'image/boi-mela-2011-1.png' ;

img3N= new Image(290,350);
img3N.src= 'image/Old-Book.png' ;
img3H= new Image(290,350);
img3H.src= 'image/Old-Book++.png' ;

img4N= new Image(290,350);
img4N.src= 'image/Today-Book.png' ;
img4H= new Image(290,350);
img4H.src= 'image/Today-Book++.png' ;

img5N= new Image(290,350);
img5N.src= 'image/Boimala-2010.png' ;
img5H= new Image(290,350);
img5H.src= 'image/Boimala-2010++.png' ;


img0N= new Image(290,350);
img0N.src= 'image/notun-boi-2012-0.png' ;
img0H= new Image(290,350);
img0H.src= 'image/notun-boi-2012-1.png' ;

img01N= new Image(290,350);
img01N.src= 'image/writer0.png' ;
img01H= new Image(290,350);
img01H.src= 'image/writer1.png' ;


img00N= new Image(290,350);
img00N.src= 'image/prodan-montir-boi0.png' ;
img00H= new Image(290,350);
img00H.src= 'image/prodan-montir-boi1.png' ;



function myOn(myImgName) {

//we need to name the image in the BODY

//so we can use its name here

document[myImgName].src=eval(myImgName+ 'H' ).src;

}

function myOut(myImgName) {

document[myImgName].src=eval(myImgName+ 'N' ).src;

}

} //end of if document.images 
/*
function suggest() {
var string = document.getElementById('searchbox').value;
var suggestarea = document.getElementById('suggest');
suggestarea.style.visibility = 'visible';
if (string == "") suggestarea.style.visibility = 'hidden';
var url = 'suggest.php';
var params = 'suggest=' + string;
http.open("POST", url, true);
// Header information here
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.setRequestHeader("Content-length", params.length);
http.setRequestHeader("Connection", "close");
    http.onreadystatechange = function() {
        if (http.readyState == 4) {
        suggestarea.innerHTML = http.responseText;
        }
    }
    http.send(params);
}
*/

</script>


 <?php

   require_once("bottom.php");
 ?>