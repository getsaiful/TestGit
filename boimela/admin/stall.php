 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
  
        	
	$targetpage = "stall.php" ; 	
	$limit = 10; 
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
		/*if(!empty($_GET['limit'])){
			$l= $_GET['limit'];
			$sqlbook="select * from author limit $l order by id asc";				
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		}
		else{ 
			$sqlbook="select * from author order by id asc ";		
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		}*/
		if($total_pages>0){		
	?>	
   
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">&nbsp;
		
		</td>		
		<td>
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="addstall.php" style="text-decoration:none; color:#626262;"><img src="../images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন ষ্টল সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
      

		<td align="left" style=" padding-left:10px;" width="15%">সিরিয়াল </td>
        
		<td align="left" style=" padding-left:10px;" width="15%">ষ্টলের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="15%">ষ্টলের নাম্বার</td>
        <td align="left" style=" padding-left:10px;" width="35%"> ইউনিট </td>		
		
		<td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>
	  </tr>
	  <?php
	  $r=1;
	  while($rsbook=mysql_fetch_array($res)){?>
	  <tr align="center">
      <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[id]";?></td>
		<td align="left" style=" padding-left:10px;"><?php echo "$rsbook[stall_name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[stall_no]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[unit]";?></td>
       
		
		<td align="left" style=" padding-left:10px;">
		<table width="100"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a  href="editstall.php?bid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">  সম্পাদনা </a> |</td>
			<td><a href="deletestall.php?bid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;"> মুছুন </a> </td>
		</tr>
		</table>
		  
		</td>
	  </tr>
	  <?php
	  $r++;
	  }?>
	 
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
			<a  class="fontclass" href="addstall.php" style="text-decoration:none; color:#626262;"><img src="../../images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন ষ্টল সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		
       	
		<td align="left" style=" padding-left:10px;" width="15%">সিরিয়াল </td>
        
		<td align="left" style=" padding-left:10px;" width="15%">ষ্টলের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="15%">ষ্টলের নাম্বার</td>
        <td align="left" style=" padding-left:10px;" width="35%"> ইউনিট </td>		
		
		<td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>	
		
	  </tr>
	 
	  
	</table>
	
            
          <?php
          }
?> 
 
 
 
 
    
 <?php
 require_once("lower_part.php");
 ?>          
 
  <script type="text/javascript">
		function trim(stringToTrim) {
			return stringToTrim.replace(/^\s+|\s+$/g,"");
		}
		
		function SortLimit(opt)
		{
			if(opt == '')
				location = 'author.php';
			else
				location = 'author.php?limit='+opt;
		}
	</script>
    
    <?php
	}
		else
		{
			 require_once("index.php");
		}
	?>