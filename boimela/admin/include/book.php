 <?php
 require_once("../uper_part.php");
 
		if(!empty($_GET['limit'])){
			$l= $_GET['limit'];
			$sqlbook="select * from books order by priority desc limit $l";				
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		}
		else{ 
			$sqlbook="select * from books order by priority desc";		
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		}
		if($num>0){		
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
		<td align="left" style="padding:0px 0px 5px 0px;">
		<div style="padding-bottom:4px;">
		<span class="fontclass"> প্রদর্শন: </span>
		<select onchange="SortLimit(this.value)">
			<option value="সকল"> সকল</option>
			<option value="৫">৫</option>
			<option value="২০">২০</option>
			<option value="৩০">৩০</option>			
		</select> 
		</div>
		</td>		
		<td>
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="addbook.php" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নাতুন বই সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		<td align="left" style=" padding-left:10px;" width="15%">ছবি  </td>
        <td align="left" style=" padding-left:10px;" width="12%">বইয়ের নাম </td>		
		<td align="left" style=" padding-left:10px;" width="15%">লেখকের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="12%">প্রকাশনির নাম </td>
        <td align="left" style=" padding-left:10px;" width="35%"> বইয়ের বিস্তারিত </td>		
		
		<td align="left" style=" padding-left:10px;" width="18%">তথ্য নিয়ন্তন </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($exebook)){?>
	  <tr align="center">
		<td align="left" style=" padding-left:10px;"><img src="../photo/thumb/<?php echo "$rsbook[photo]";?>" border="0" width="80"></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[book_name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[author]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[public]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[short_description]";?></td>
       		
		
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
			<a  class="fontclass" href="addbook.php" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নাতুন বই সংগ্রহ </a>
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
	  <?php while($rsbook=mysql_fetch_array($exebook)){?>
	  <tr align="center">
      
		<td align="left" style=" padding-left:10px;"><img src="../photo/thumb/<?php echo "$rsbook[photo]";?>" border="0" width="80"></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[book_name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[author]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[public]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[short_description]";?></td>
		
		
		<td align="left" style=" padding-left:5px;">
		<table width="110%"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			
			<td><a  href="editbook.php?bid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">  সম্পাদনা </a>| </td>
			<td><a href="deletebook.php?bid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">&nbsp; মুছুন </a> </td>
		</tr>
		</table>
		  
		</td>
	  </tr>
	  <?php }?>
	 
	</table>
	
            
          <?php
          }
?> 
 
 
 
 
    
 <?php
 require_once("../lower_part.php");
 ?>          