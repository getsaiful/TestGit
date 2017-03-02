<?php
require_once("administrator/adminconfig.php");
require_once("administrator/connection.php"); 
 
	?>
	<form name="frmEdit" method="post">
		<table width="520"  border="0" cellspacing="0" cellpadding="6">
		   <tr>
			<td width="109" align="right"> বইয়ের </td>
			<td width="387">: &nbsp;&nbsp;
                                         <select name="b_type" >
                                             <option value=""> নিচের মেনু থেকে একটি পছন্দ করুন  </option>
                                             <option value="">---------------------</option>
                                             <option value="গল্প">গল্প</option>
                                             <option value="প্রবন্দ">প্রবন্দ</option>
                                             <option value="উপন্যাস">উপন্যাস</option>
                                             <option value="কবিতা">কবিতা</option>
                                          </select>
            
            
           </td>
		  </tr>
          <tr>
			<td width="109" align="right">বইয়ের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_name" size="40"></td>
		  </tr>
           <tr>
			<td width="109" align="right"> লেখকের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_author" size="40"></td>
		  </tr>
          <tr>
			<td width="109" align="right"> প্রকাশকের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_public" size="40"></td>
		  </tr>
		  <tr>
			<td align="right"> বিস্তারিত    </td>
			<td>&nbsp; &nbsp;&nbsp;<textarea name="b_details" rows="8" cols="50"></textarea></td>
		  </tr>
          <tr>
			<td width="109" align="right"> ছবি   </td>
			<td width="387">: &nbsp;&nbsp;<input type="file" name="photo"></td>
		  </tr>
		 <tr>
			<td width="109" align="right">Synchronus  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="txtTitle" size="40"></td>
		  </tr>
		 	 
		 		 		  
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="btnAdd" class="button" value="Add New">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value="Cancel"></td>
		  </tr>
		</table>
</form>


	<?php
	
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
		function toggleAllow(itemid, val)
		{
			var data = $.ajax({
				url: "book.php?req=ajax&event=allowitem&item_id="+itemid+"&allowed="+val,
				async: false
			}).responseText;
			//alert(data);
			if(trim(data) == 'added')
				$('#allowitem_'+itemid).html('<a href="javascript:toggleAllow('+itemid+', 0)"><img src="<?php echo $imagepath;?>tick.png"></a>')
			else if(trim(data) == 'removed')
				$('#allowitem_'+itemid).html('<a href="javascript:toggleAllow('+itemid+', 1)"><img src="<?php echo $imagepath;?>cross.png"></a>')
			else
				alert("An error has occured while changing permission of this task. Please try again");
				//alert(data);
		}
		function SortLimit(opt)
		{
			if(opt == '')
				location = '<?php echo $_SERVER['PHP_SELF']?>?detail=book';
			else
				location = '<?php echo $_SERVER['PHP_SELF']?>?detail=book&limit='+opt;
		}
	</script>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">
		<div style="padding-bottom:4px;">
		Display : 
		<select onchange="SortLimit(this.value)">
			<option value="সকল"> সকল</option>
			<option value="৫">৫</option>
			<option value="২০৫">২০</option>
			<option value="৩০">৩০</option>			
		</select> 
		</div>
		</td>		
		<td>
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a href="<?php echo $_SERVER['PHP_SELF'];?>?event=addbook"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp; নাতুন বই সংগ্রহ </a>&nbsp;&nbsp;
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="5" width="100%" class="bordered" align="center">
	  <tr class="light_bg">
		<td align="left" style=" padding-left:10px;" width="15%">ছবি  </td>
        <td align="left" style=" padding-left:10px;" width="12%">বইয়ের নাম </td>		
		<td align="left" style=" padding-left:10px;" width="15%">লেখকের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="40%">প্রকাশকের নাম </td>
        <td align="left" style=" padding-left:10px;" width="40%">বিস্তারিত </td>		
		<td align="left" style=" padding-left:10px;" width="8%">ক্রম </td>
		<td align="left" style=" padding-left:10px;" width="10%">তথ্য বাবস্তা </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($exenotice)){?>
	  <tr align="center">
		<td align="left" style=" padding-left:10px;"><img src="<?php echo "$rsbook[book_name]";?>" border="0" width="80"></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[book_name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[author]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[short_description]";?></td>		
		
		<td align="center" style=" padding-left:10px;"><a href="admincp.php?detail=book&event=sort&id=<?php echo $rsbook['id'];?>&order=<?php echo $rsbook['priority'];?>&move=up"></a><a href="admincp.php?detail=book&event=sort&id=<?php echo $rsbook['id'];?>&order=<?php echo $rsbook['priority'];?>&move=up"><img src="<?php echo $imagepath;?>arrow_up.gif" /></a>&nbsp;
			<a href="admincp.php?detail=book&event=sort&id=<?php echo $rsbook['id'];?>&order=<?php echo $rsbook['priority'];?>&move=down"><img src="<?php echo $imagepath;?>arrow_down.gif"></a>
		</td>
		<td align="left" style=" padding-left:10px;">
		<table width="120"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a href="admincp.php?detail=book&event=view&bid=<?php echo "$rsbook[id]";?>">View</a> |</td>
			<td><a href="admincp.php?detail=book&event=edit&bid=<?php echo "$rsbook[id]";?>">Edit</a> |</td>
			<td><a href="admincp.php?detail=book&event=delete&bid=<?php echo "$rsbook[id]";?>">Delete</a> </td>
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
		Display : 
		<select onchange="SortLimit(this.value)">
			<option>All</option>
			<option>1</option>
			<option>30</option>
			<option>45</option>			
		</select> records.
		</div>
		</td>		
		<td>
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a href="<?php echo $_SERVER['PHP_SELF'];?>?event=addbook"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নাতুন বই সংগ্রহ </a>&nbsp;&nbsp;
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="5" width="100%" class="bordered" align="center">
	  <tr class="light_bg">
		<td align="left" style=" padding-left:10px;" width="15%">ছবি  </td>
        <td align="left" style=" padding-left:10px;" width="12%">বইয়ের নাম </td>		
		<td align="left" style=" padding-left:10px;" width="15%">লেখকের নাম</td>		
		<td align="left" style=" padding-left:10px;" width="40%">প্রকাশকের নাম </td>
        <td align="left" style=" padding-left:10px;" width="40%">বিস্তারিত </td>		
		<td align="left" style=" padding-left:10px;" width="8%">ক্রম </td>
		<td align="left" style=" padding-left:10px;" width="10%">তথ্য বাবস্তা </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($exebook)){?>
	  <tr align="center">
      
		<td align="left" style=" padding-left:10px;"><img src="<?php echo "$rsbook[book_name]";?>" border="0" width="80"></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[book_name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[author]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[short_description]";?></td>
		
		<td align="center" style=" padding-left:10px;"><a href="admincp.php?detail=book&event=sort&id=<?php echo $rsbook['id'];?>&order=<?php echo $rsbook['priority'];?>&move=up"></a><a href="admincp.php?detail=book&event=sort&id=<?php echo $rsbook['id'];?>&order=<?php echo $rsbook['priority'];?>&move=up"><img src="<?php echo $imagepath;?>arrow_up.gif" /></a>&nbsp;
			<a href="admincp.php?detail=book&event=sort&id=<?php echo $rsbook['id'];?>&order=<?php echo $rsbook['priority'];?>&move=down"><img src="<?php echo $imagepath;?>arrow_down.gif"></a>
		</td>
		<td align="left" style=" padding-left:10px;">
		<table width="120"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a href="admincp.php?detail=book&event=view&nid=<?php echo "$rsbook[id]";?>">View</a> |</td>
			<td><a href="admincp.php?detail=book&event=edit&nid=<?php echo "$rsbook[id]";?>">Edit</a> |</td>
			<td><a href="admincp.php?detail=book&event=delete&nid=<?php echo "$rsbook[id]";?>">Delete</a> </td>
		</tr>
		</table>
		  
		</td>
	  </tr>
	  <?php }?>
	 
	</table>
	
            
          <?php
          }
?>