 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 	$tableName="t_scrum";		
	$targetpage = "count.php" ; 	
	$limit = 20; 
	$qry="select * from countclick  order by date desc ";	
	//$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysql_num_rows(mysql_query($qry));
	//$total_pages = $total_pages[num];
	
	$stages = 3;
	if(isset($_GET['page'])){
	$page = mysql_real_escape_string($_GET['page']);
	}else{
		$page=0;
		
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
				location = 'count.php';
			else
				location = 'count.php?limit='+opt;
		}
	</script>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">&nbsp;
		
		</td>		
		<td>
		
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		
        <td align="center">তারিখ </td>		
		<td align="center"> ষ্টল(1)</td>
        <td align="center"> বই(2)</td>
        <td align="center">ম্যাপ(3) </td>		
		 <td align="center"> সেবা কুঞ্জ(4)</td>	
		<td align="center">মুক্তপাঠ(5)</td>
		<td align="center">তথ্য বাতায়ন (6)</td>
	  </tr>
	  <?php 
	  $sl=1;
	  while($rsbook=mysql_fetch_array($res)){
	?>
	  <tr align="center">
		 <td align="center"><?php echo "$rsbook[date]";?></td>
        <td align="center"><?php echo "$rsbook[button_one]";?></td>
        <td align="center"><?php echo "$rsbook[button_two]";?></td>
        <td align="center"><?php echo "$rsbook[button_three]";?></td>
        <td align="center"><?php echo "$rsbook[button_four]"; ?></td>
        <td align="center"><?php echo "$rsbook[button_five]";?></td>
       <td align="center"><?php echo "$rsbook[button_six]";?></td>
       		
		
		
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
		
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	   <tr class="light_bg">
		     <td align="left" style=" padding-left:10px;" width="15%">তারিখ </td>		
		<td align="left" style=" padding-left:10px;" width="10%"> ষ্টল(1)</td>
        <td align="left" style=" padding-left:10px;" width="15%"> বই(2)</td>
        <td align="left" style=" padding-left:10px;" width="10%">ম্যাপ(3) </td>		
		 <td align="left" style=" padding-left:10px;" width="18%"> সেবা কুঞ্জ(4)</td>	
		<td align="left" style=" padding-left:10px;" width="18%">মুক্তপাঠ(5)</td>
		<td align="left" style=" padding-left:10px;" width="18%">তথ্য বাতায়ন (6)</td>
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