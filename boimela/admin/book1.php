 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 	$tableName="t_scrum";		
	$targetpage = "book.php" ; 	
	$limit = 20; 
	$qry="select * from books order by id desc";	
	//$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysql_num_rows(mysql_query($qry));
	//$total_pages = $total_pages[num];
	
	$stages = 3;
	$page = mysql_escape_string($_GET['page']);
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
	
/*
		if(!empty($_GET['limit'])){
			$l= $_GET['limit'];
			$sqlbook="select * from books order by id desc limit $l";				
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		}
		else{ 
			$sqlbook="select * from books order by id desc";		
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		} */
		if($total_pages>0){		
	?>	
    <script type="text/javascript">
		function trim(stringToTrim) {
			return stringToTrim.replace(/^\s+|\s+$/g,"");
		}
		
		function SortLimit(opt)
		{
			if(opt == '')
				location = 'book.php';
			else
				location = 'book.php?limit='+opt;
		}
	</script>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">&nbsp;
		
		</td>		
		<td>
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="addbook.php" style="text-decoration:none; color:#626262;"><img src="../images/arrow2.png" width="10" height="11"  border="0"/> &nbsp;  নতুন বই সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		
        <td align="left" style=" padding-left:10px;" width="15%">বইয়ের নাম </td>		
		<td align="left" style=" padding-left:10px;" width="15%">লেখকের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="15%">প্রকাশনির নাম </td>
        <td align="left" style=" padding-left:10px;" width="15%">বইয়ের প্রকার </td>
        <td align="left" style=" padding-left:10px;" width="10%"> সাল </td>		
		 <td align="left" style=" padding-left:10px;" width="10%"> মূল্য </td>	
		<td align="left" style=" padding-left:10px;" width="18%">তথ্য নিয়ন্তন </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($res)){
		  
		   $txtType = $rsbook['type'];
 if($txtType =="1") {
	$ty ="গল্প";
	   }
	   else if($txtType =="2") {
	   $ty ="প্রবন্ধ";
	   }                                
       else if($txtType =="3") {
	   $ty ="উপন্যাস";
	   }                                 
       else if($txtType =="4") {
	   $ty ="কবিতা";
	   }                                 
       else if($txtType =="5") {
	   $ty ="গবেষণা";
	   }                                 
       else if($txtType =="6") {
	   $ty ="ছড়া";
	   }                                  
       else if($txtType =="7") {
	   $ty ="শিশুসাহিত্য ";
	   }                                 
       else if($txtType =="8") {
	   $ty ="জীবনী";
	   }                                 
       else if($txtType =="9") {
	   $ty ="রচনাবলী";
	   }                                
       else if($txtType =="10") {
	   $ty ="মুক্তিযুদ্ধ";
	   }                                 
       else if($txtType =="11") {
	   $ty ="নাটক";
	   }                                 
       else if($txtType =="12") {
	   $ty ="বিজ্ঞান";
	   }                                 
       else if($txtType =="13") {
	   $ty ="ভ্রমণ";
	   }                                 
       else if($txtType =="14") {
	   $ty ="ইতিহাস";
	   }                                  
       else if($txtType =="15") {
	   $ty ="রাজনীতি";
	   }                                  
       else if($txtType =="16") {
	   $ty ="চি:/স্বাস্থ্য";
	   }                                 
       else if($txtType =="17") {
	   $ty ="কম্পিউটার";
	   }                                  
       else if($txtType =="18") {
	   $ty ="রম্য/ধাঁধা";
	   }                                  
       else if($txtType =="19") {
	   $ty ="ধর্মীয়";
	   }                                 
       else if($txtType =="20") {
	   $ty ="অনুবাদ";
	   }                                 
       else if($txtType =="21") {
	   $ty ="অভিধান";
	   }                                  
       else if($txtType =="22") {
	   $ty ="সাইন্স ফিকশন";
	   }   
	    else if($txtType =="23") {
	   $ty ="অন্যান্য";
	   }
	    else if($txtType =="24") {
	   $ty ="ছোটগল্প";
	   } 
	    else if($txtType =="25") {
	   $ty ="কাব্যগ্রন্থ";
	   } 
	    else if($txtType =="26") {
	   $ty ="গল্পগ্রন্থ";
	   }
	     else if($txtType =="27") {
	   $ty ="পশুপাখির গল্প";
	   } 
	    else if($txtType =="28") {
	   $ty ="অর্থনীতি";
	   }   
 
		  ?>
	  <tr align="center">
		
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[book_name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[author]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[public]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$ty";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[son]";?></td>
         <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[price]";?></td>
       		
		
		<td align="left" style=" padding-left:10px;">
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a  href="editbook.php?bid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">  সম্পাদনা </a> |</td>
			<td><a href="deletebook.php?bid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;"> মুছুন </a> </td>
		</tr>
		</table>
		  
		</td>
	  </tr>
	  <?php }?>
	 
	</table>
	<table style="padding-top:10px;" width="100%">
      <tr>
       <td align="right">
<?php 
require_once("paging.php");
	echo $paginate;
	?>
     </td>
    </tr>
   </table>
	
	<?php }
		  else{ ?>
		  	
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">
		<div style="padding-bottom:4px;">
		<span class="fontclass" style="font-size:12px;" > প্রদর্শন: </span>
		<select onchange="SortLimit(this.value)">
			<option value="সকল"> সকল</option>
			<option value="৫">৫</option>
			<option value="২০">২০</option>
			<option value="৩০">৩০</option>			
		</select> 
		</div>
		</td>		
		<td>
		<div style="float:right;padding:0px 0px 4px 0px;" >
			<a  class="fontclass" href="addbook.php" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন বই সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		<td align="left" style=" padding-left:10px;" width="10%">ছবি  </td>
        <td align="left" style=" padding-left:10px;" width="14%">বইয়ের নাম </td>		
		<td align="left" style=" padding-left:10px;" width="15%">লেখকের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="14%">প্রকাশনির নাম </td>
        <td align="left" style=" padding-left:10px;" width="35%"> বইয়ের বিস্তারিত </td>		
		
		<td align="left" style=" padding-left:10px;" width="18%">তথ্য নিয়ন্তন </td>
	  </tr>
	  
	 
	</table>
	
            
          <?php
          }
?> 
 
 
 
 
    
 <?php
 require_once("lower_part.php");
 }
		else
		{
			 require_once("index.php");
		}
 ?>          