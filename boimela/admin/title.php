 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 require_once("id_generator.php");
 if(isset($_POST['btnAdd'])){
	
	 $txtTic=$_POST['title'];
	
	
	
	
	 $sqladd="insert into title(title) values('$txtTic')";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "title.php";
				</script>
				
			<?php
            }else{
				echo "Fail to add title, Try again.";
			}
		}
 if(isset($_POST['update'])){
	 $id = $_POST['tid'];
	$txtSyn=$_POST['title'];

    $sqladd="update title set title ='$txtSyn' where id = '$id'";
	
	 
				//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
			    location= "title.php";
				</script>
				
			<?php
            }else{
				echo "Fail to edit tilte, Try again.";
			}
 
 }
		
		if(isset($_GET['event']) && $_GET['event'] == 'add') {
			?>
			 <form name="frmadd" method="post" action="title.php" >
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            <tr>
             <td colspan="2"  align="center"> 
             <?php if(isset($_GET['s']) && $_GET['s'] == "y") { echo "সফল ভাবে সংযুক্ত হয়েছে!"; } ?>
             </td>
            </tr>
          
           
           <tr>
			<td width="120" align="right">টাইটেল </td>
			<td width="387">: &nbsp;&nbsp;<textarea style="height:100px" type="text" name="title" size="50"></textarea></td>
		  </tr>
        
		 		 		  
		  <tr>
			<td  width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="btnAdd" class="button" value=" সংযুক্ত ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
		  </tr>
		</table>
</form>
 
			
			
			
<?php			
		}
		 else if(isset($_GET['event']) && $_GET['event'] == 'edit') {
		 $id= $_GET['tid'];
		 $sqlbook="select * from title  where id = '$id'";				
		 $exebook=mysql_query($sqlbook);
		 $rs = mysql_fetch_array($exebook);

?>
 <form name="frmEdit" method="post" action="title.php">
        <input type="hidden" name="tid" value="<?php echo $id ;?>"/>
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            
           <tr>
			<td width="120" align="right">টাইটেল </td>
			<td width="387">: &nbsp;&nbsp;<textarea style="height:100px;" type="text" name="title" size="50"><?php echo $rs['title'];?></textarea></td>
		  </tr>
		 		 		  
		  <tr>
			<td  width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="update" class="button" value=" হালনাগাদ করা ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
		  </tr>
		</table>
</form>
			
			
			
		<?php	
		}  else if(isset($_GET['event']) && $_GET['event'] == 'del') {
			
		 $id= $_GET['tid'];
		 $sqlbook="select * from title  where id = '$id'";				
		 $exebook=mysql_query($sqlbook);
		 $rs = mysql_fetch_array($exebook);
		
		 $q= mysql_query("delete from title where id = '$id'");
		if( $q != false){
			?>
				<script  language="javascript">
				  location= "title.php";
				</script>
				
			<?php
            }	
			
			
		}
		else {
			$targetpage = "title.php" ; 	
	$limit = 10; 
	$qry="select * from title order by id desc";	
	//$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysql_num_rows(mysql_query($qry));
	//$total_pages = $total_pages[num];
	
	$stages = 3;
	if(isset($_GET['page']))
	$page = mysql_real_escape_string($_GET['page']);
    else{
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
			$sqlbook="select * from gallery order by id desc";		
			$exebook=mysql_query($sqlbook);
			$num=mysql_num_rows($exebook);
		*/
		if($total_pages>0){	
	?>	
   
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">
		
		</td>		
		<td ‍ align="right">
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="title.php?event=add" style="text-decoration:none; color:#626262;"><img src="../images/arrow2.png" width="10" height="11"  border="0"/> &nbsp; নতুন টাইটেল সংগ্রহ  </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  
      <tr class="light_bg">
		
        <td align="left" style=" padding-left:10px;" width="20%">আইডি</td>		
		 <td align="left" style=" padding-left:10px;" width="60%">টাইটেল </td>				
		<td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($res)){?>
	  <tr align="center">
		
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[id]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[title]";?></td>
       
		
		<td align="left" style=" padding-left:10px;">
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a  href="title.php?event=edit&tid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">  সম্পাদনা </a> |</td>
			<td><a href="title.php?event=del&tid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;"> মুছুন </a> </td>
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
	<?php
		} else {
		?>
	
		  	
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>	  	
		<td align="left" style="padding:0px 0px 5px 0px;">
		
		</td>		
		<td ‍ align="right">
		<div style="float:right;padding:0px 0px 4px 0px;">
			<a  class="fontclass" href="title.php?event=add" style="text-decoration:none; color:#626262;"><img src="../images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন টাইটেল সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		
        
        <td align="left" style=" padding-left:10px;" width="20%">আইডি</td>		
		 <td align="left" style=" padding-left:10px;" width="60%">টাইটেল </td>				
		<td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>
	  </tr>
   </table>
	
            
          <?php
          }
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