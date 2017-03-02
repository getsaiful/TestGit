<?php
if($_GET['req']!='ajax')
	require_once("antihack.php");
?>
<?php
if($_GET['event'] == 'allowitem')
{	require_once("configuration/config.php");
	$item = $_GET['item_id'];
	$allowed = $_GET['allowed'];
	$ret = mysql_query("UPDATE books SET notice_status=".$allowed." WHERE notice_id=".$item);	
	if($ret == false)
		die('failed');
	else
	{
		if($allowed == 1)
			die('added');
		else
			die('removed');
	}
}
if(isset($_POST['btnAdd'])){
	$id=makeid("books","id");
	$txtName=$_POST['b_name'];
	$txtAuth=$_POST['b_author'];
	$txtPublic=$_POST['b_public'];
	$txtType=$_POST['b_type'];
	$txtDetails=$_POST['b_details'];
	
	$pbdate = date("Y-m-d");
	$sqladd="insert into t_notice(
			notice_id, notice_title, notice_details, notice_status, notice_priority, notice_date,read_status ) values(
			$id, '$txtTitle', '$txtDetails', '$radStatus', $id, '$txtDate','1','$pbdate')";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
				header("Location:admin_home.php?item=manage_notice");
				exit();
			}else{
				echo "Fail to add notice, Try again.";
			}
		}
	if(isset($_POST['btnUpdate'])){
		$txtTitle=$_POST['txtTitle'];
		$txtDetails=$_POST['txtDetails'];		
		$txtDate=$_POST['txtDate'];
		
		$sqlup="update t_notice set
		       notice_title='$txtTitle', notice_details='$txtDetails', notice_date='$txtDate' where notice_id=$_GET[nid]";
			   $update=mysql_query($sqlup);
			   
			   if($update != false){
			   header("Location:admin_home.php?item=manage_notice");
			   exit();
			   }else{
			   		echo "Fail to update notice, Try again.";
			   }			   		
		}
	if(isset($_POST['btnCancel'])){
		header("Location:admin_home.php?item=manage_notice");
		exit();
	}	
	

	if($_GET[event]=='view')
	{
		$sqlview="select * from t_notice where notice_id=$_GET[bid]";
		$exeview=mysql_query($sqlview);
		$num=mysql_num_rows($exeview);
		if($num>0){
		$resqltview=mysql_fetch_array($exeview);
			?>
			<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding:10px 0px 10px 0px;">
			  <tr>
				<td class="subNotice"><?php echo "$resqltview[notice_title]";?></td>
			  </tr>
			  <tr>
				<td><?php echo "$resqltview[notice_details]";?></td>
			  </tr>
               <tr>
				<td>&nbsp;</td>
			  </tr>
			    
			</table>
            <?php 					
		}
	}
	else if($_GET[event]=='addbook'){
	?>
	<form name="frmEdit" method="post">
		<table width="520"  border="0" cellspacing="0" cellpadding="6">
		   <tr>
			<td width="109" align="right"> বইয়ের প্রকার </td>
			<td width="387">: &nbsp;&nbsp;
                                         <select name="b_type" >
                                             <option value=""> নিচের মেনু থেকে একটি পছন্দ করুন  </option>
                                             <option value="">---------------------</option>
                                             <option value="গল্প">গল্প</option>
                                             <option value="প্রবন্দ">প্রবন্দ</option>
                                             <option value="উপন্যাস">উপন্যাস</option>
                                             <option value="কবিতা">কবিতা</option>
                                          </select>
            
            
            &nbsp;<span style="color:#FF0000;font-size:14px;">*</span></td>
		  </tr>
          <tr>
			<td width="109" align="right">বইয়ের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_name" size="40">&nbsp;<span style="color:#FF0000;font-size:14px;">*</span></td>
		  </tr>
           <tr>
			<td width="109" align="right"> লেখকের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_author" size="40">&nbsp;<span style="color:#FF0000;font-size:14px;">*</span></td>
		  </tr>
          <tr>
			<td width="109" align="right"> প্রকাশকের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_public" size="40">&nbsp;<span style="color:#FF0000;font-size:14px;">*</span></td>
		  </tr>
		  <tr>
			<td align="right"> বিস্তারিত    </td>
			<td>&nbsp; &nbsp;&nbsp;<textarea name="b_details" rows="8" cols="50"></textarea></td>
		  </tr>
          <tr>
			<td width="109" align="right"> ছবি   </td>
			<td width="387">: &nbsp;&nbsp;<input type="file" name="photo">&nbsp;<span style="color:#FF0000;font-size:14px;">*</span></td>
		  </tr>
		 <tr>
			<td width="109" align="right">Synchronus  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="txtTitle" size="40">&nbsp;<span style="color:#FF0000;font-size:14px;">*</span></td>
		  </tr>
		 	 
		 		 		  
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="btnAdd" class="button" value="Add New">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value="Cancel"></td>
		  </tr>
		</table>
</form>


	 <script type="text/javascript">
		    Calendar.setup({
        	inputField     :    "f_date_c2",      
        	ifFormat       :    "%d/%m/%Y",     
        	showsTime      :    true,           
        	button         :    "f_trigger_c2",   
        	singleClick    :    false,           
        	step           :    1               
   		 });
</script>
	<?php
	}
	else if($_GET[event]=='edit'){
		$sqledit="select * from books where id=$_GET[bid]";
		$exeedit=mysql_query($sqledit);
		$num=mysql_num_rows($exeedit);
		if($num>0){
		$resqltedit=mysql_fetch_array($exeedit);
		?>
		<form name="frmEdit" method="post">
		<table width="573"  border="0" cellspacing="0" cellpadding="6" class="itembox">
		  <tr>
			<td width="109" align="right">Title  </td>
			<td width="440">: &nbsp;&nbsp; <input type="text" name="txtTitle" value="<?php echo "$resqltedit[notice_title]";?>" size="40"></td>
		  </tr>
		  <tr>
			<td align="right">Details  </td>
			<td>&nbsp; &nbsp;&nbsp;<textarea name="txtDetails" rows="10" cols="50"><?php echo "$resqltedit[notice_details]";?></textarea></td>
		  </tr>
		  
		  <tr>
		  <?php
		  $sdate=dateconvert($resqltedit['notice_date'],2);
		  ?>
			<td align="right"> Date </td>
			<td>: &nbsp;&nbsp;<input type="text" name="txtDate" size="35" id="f_date_c2" readonly="1" value="<?php echo $sdate;?>">
					&nbsp;<img src="calendar/img.gif" id="f_trigger_c2" title="Date selector" height="15" border="0" ></td>
		  </tr>	
		  	  
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnUpdate" class="button" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value="Cancel"></td>
		  </tr>
		</table>
		
		</form>
		 <script type="text/javascript">
		    Calendar.setup({
        	inputField     :    "f_date_c2",      
        	ifFormat       :    "%d/%m/%Y",     
        	showsTime      :    true,           
        	button         :    "f_trigger_c2",   
        	singleClick    :    false,           
        	step           :    1               
   		 });
</script>
		
		<?php
		}
	}
	else if($_GET[event]=='delete'){
		$sqledel="delete from books where id=$_GET[bid]";
		$exeedel=mysql_query($sqledel);
		if($exeedel != false){
			header("Location:admincp.php?detail=book");
		}else{
			echo "Can't delete the task, Try again.";
		}				
	}
	elseif($_GET['event'] == 'sort')
	{	
		$move = $_GET['move'];
		$id = $_GET['id'];
		$priority = $_GET['order'];
		if($move == "down")
			$qry = "SELECT * FROM books WHERE priority > $priority ORDER BY priority desc LIMIT 1";
		elseif($move == "up")
			$qry = "SELECT * FROM books WHERE priority < $priority ORDER BY priority DESC LIMIT 1";
		
		$res = mysql_query($qry);
		if(mysql_num_rows($res)>0){
			$rs = mysql_fetch_assoc($res);
			echo $rs['id'];
			echo $pagetomoveto = $rs['priority'];
		
			$sqlmove2="UPDATE books SET priority = ".$priority." WHERE id = ".$rs['id'];
			$move2 = mysql_query($sqlmove2)or die ("Cant move replacement entry");
			

			$sqlmove="UPDATE books SET priority = $pagetomoveto WHERE id = $id";
			$move = mysql_query($sqlmove)or die ("Cant move entry into position");

		}
	
		header("Location:admincp.php?detail=book");
	}
	else{
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
			<option>All</option>
			<option>1</option>
			<option>30</option>
			<option>45</option>			
		</select> records.
		</div>
		</td>		
		<td>
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a href="<?php echo $_SERVER['PHP_SELF'];?>?detail=book&event=addbook"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;Add New Book</a>&nbsp;&nbsp;
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="5" width="100%" class="bordered" align="center">
	  <tr class="light_bg">
		<td align="left" style=" padding-left:10px;" width="15%">Photo</td>
        <td align="left" style=" padding-left:10px;" width="12%">Book Nam</td>		
		<td align="left" style=" padding-left:10px;" width="15%">Author Name</td>		
		<td align="left" style=" padding-left:10px;" width="40%">Description</td>		
		<td align="left" style=" padding-left:10px;" width="8%">Priority</td>
		<td align="left" style=" padding-left:10px;" width="10%">Manage</td>
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
			<a href="<?php echo $_SERVER['PHP_SELF'];?>?detail=book&event=addbook"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;Add New Book</a>&nbsp;&nbsp;
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="5" width="100%" class="bordered" align="center">
	  <tr class="light_bg">
		<td align="left" style=" padding-left:10px;" width="15%">Photo</td>
        <td align="left" style=" padding-left:10px;" width="12%">Book Nam</td>		
		<td align="left" style=" padding-left:10px;" width="15%">Author Name</td>		
		<td align="left" style=" padding-left:10px;" width="40%">Description</td>		
		<td align="left" style=" padding-left:10px;" width="8%">Priority</td>
		<td align="left" style=" padding-left:10px;" width="10%">Manage</td>
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
}
?>
