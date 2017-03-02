<?php require_once("top.php"); ?>

<?php 
	  $targetpage = "stallist3.php" ; 


	$limit = 13; 
	$qry="select * from stall order by id asc";	
	//$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysql_num_rows(mysql_query($qry));
	//$total_pages = $total_pages[num];
	
	$stages = 3;
	if(isset($_GET['page'])){
	$page = mysql_escape_string($_GET['page']);
	}else{
		$page=1;
	}
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data
	$query1 = $qry. "LIMIT $start, $limit";
	$res = mysql_query($query1);
	 
	 $limit2 = " LIMIT ".$start.",".$limit;
    $res = mysql_query($qry.$limit2);
	
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;	
		if(!empty($_GET['limit'])){
			$l= $_GET['limit'];
			$sqlbook="select * from stall limit $l order by id asc";				
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		}
		else{ 
			$sqlbook="select * from stall order by id asc ";		
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		}
		if($total_pages>0){		

	?>	

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

 <meta http-equiv="refresh" content="300;url=index.php" />


<style>div,td, span{font-family: 'sutonnyMJ';} </style>

<div class="middle" id="container">
	<div align="right" style="margin-top:-30px; width:1090px;">
	<a href="index.php" style="margin-right:400px;">   <img src="image/Main-Page.png" width="207" height="88" border="0"/></a>
	 </div>
	<div class="bottombox5" style="margin-top:0px; position:relative;width:100%;margin-left:0px;">  

		<div class="bottombox5" style="margin-top:10px;padding-top:30px;border:1px solid black;min-height:630px; width:100%;margin-left:0px;overflow:hidden;" > 


		            <form name="book_search"  method="get" action="search_stallist_result.php">

		               <input type="radio" name="stall" id="stall_name"   checked="checked" /> ষ্টলের নাম

		               <input type="radio" name="stall"  id="stall_no"    /> ষ্টলের  নাম্বার 

		               <br/>  <br />

		                <!-- <input type="radio" name="syear" id="syear2" value="2013"  /> বইমেলা  এ প্রকাশিত গ্রন্থাবলী  --> 
		  



		              	<input type="text" class="bangla"  name="stall"  placeholder="ষ্টল খুঁজুন" id="searchbox" onkeyup="suggest(this.value);" onblur="fill();"  size="37" />

		                <input type="submit" style="display: none;"   name="submit_search" value="খুঁজুন" class="btn" />

		            </form>
 
				         

				     <?php // echo $bn->make_bangla_number('GK BDwbU') ?>

				 	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7;margin-top: 15px; border-collapse:collapse;">
						  <tr class="light_bg">
					      

								<td align="left" style=" padding-left:10px;" width="15%">সিরিয়াল </td>
						        
								<td align="left" style=" padding-left:10px;" width="35%">ষ্টলের নাম</td>		
								<td align="left" style=" padding-left:10px;" width="25%">ষ্টলের নাম্বার</td>
						        <td align="left" style=" padding-left:10px;" width="25%"> ইউনিট </td>		
								
							<!--td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td-->
						  </tr>
							  <?php  $r=1;  while($rsbook=mysql_fetch_array($res)){?>
						  <tr align="center">


					 		<td align="left" style=" padding-left:10px;font-size:20px;';">
					 			<?php echo "$rsbook[id]";?>
					 		</td>

							<td align="left" style=" padding-left:10px;font-size:20px;';"><?php echo "$rsbook[stall_name]";?></td>
					        <td align="left" style=" padding-left:10px;font-size:20px;';"><?php echo "$rsbook[stall_no]";?></td>

					        <?php if ($rsbook['unit']==1) {
					        	$rsbook['unit'] = "ইউনিট এক";
					      	  }
					      	  elseif ($rsbook['unit']==2) {
					        	$rsbook['unit'] = "ইউনিট এক";
					      	  }
					      	  elseif ($rsbook['unit']==3) {
					        	$rsbook['unit'] = "ইউনিট এক";
					      	  }
					      	  elseif ($rsbook['unit']==4) {
					        	$rsbook['unit'] = "ইউনিট চার";
						        }
						        elseif ($rsbook['unit']==5) {
						        	$rsbook['unit'] = "প্যাভিলিয়ান";
						        }
					         ?>
					        <td align="left" style=" padding-left:10px;font-';"><?php echo "$rsbook[unit]";?></td>

						  </tr>

							<?php $r++; ?>

					 	  <?php  } ?>
					 
					</table>

						<table style="padding-top:20px;" width="100%">
					      <tr>
						       <td align="right">

									<?php  require_once("admin/paging.php");
									
									echo $paginate;
									
									?>
							     </td>
						    </tr>
					   </table>
					
		 

		</div>

	          <?php
	          }
	?> 
	</div>
</div>
<?php require_once("bottom.php"); ?>