 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 require_once("id_generator.php");
 if(isset($_POST['btnAdd'])){
	 $id=makeid("ekush","id");
	 $txtName=$_POST['name'];
	
	 $txtYear=$_POST['year'];
	$txtsub=$_POST['sub'];
	$txtson=$_POST['son'];
	
	$pbdate = date("Y-m-d");
	
	
	$sqladd="insert into ekush values('$id', '$txtName','$txtsub', '$txtYear','$txtson')";
			//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "ekush.php?event=add";
				</script>
				
			<?php
            }else{
				echo "Fail to add ekush padak, Try again.";
			}
		}
 if(isset($_POST['update'])){
	 $id = $_POST['gid'];
	 $txtName=$_POST['name'];
	
	 $txtYear=$_POST['year'];
	
	$txtsub=$_POST['sub'];
	$txtson=$_POST['son'];
	 
			 $sqladd="update ekush set name ='$txtName', year = '$txtYear', son = $txtson , sub = $txtsub  where id = '$id'";

	 
				//echo "$sqladd";
			$add=mysql_query($sqladd);
			
			if($add != false){
			?>
				<script>
				  location= "ekush.php?event=add";
				</script>
				
			<?php
            }else{
				echo "Fail to edit ekush padak, Try again.";
			}
 
 }
		
		if(isset($_GET['event']) && $_GET['event'] == 'add') {
		 $typ = array();
 		 $typ = array(1976,1977,1978,1979,1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014);

			?>
			 <form name="frmadd" method="post" action="ekush.php" enctype="multipart/form-data">
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            <tr>
             <td colspan="2"  align="center"> 
             <?php if(isset($_GET['s']) && $_GET['s'] == "y") { echo "সফল ভাবে সংযুক্ত হয়েছে!"; } ?>
             </td>
            </tr>
          
           
          <tr>
			<td width="120" align="right">নাম</td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="name" size="50" value=""> </td>
		  </tr>
           <tr>
			<td width="120" align="right">ক্ষেত্র </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="sub" size="50" value=""> </td>
		  </tr>
           <tr>
			<td width="120" align="right">পুরস্কারের সাল</td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="year" size="50" value=""> </td>
		  </tr>
           <tr>
			<td width="120" align="right"> সন</td>
			<td width="387">: &nbsp;&nbsp;<select name="son" >
                 <option value=""> select one </option>
                 <?php
                      foreach($typ as  $value) {
                     ?>
                      <option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
                     <?php
                     
                     }
                     ?>
                  </select>                              
                 </td>
		  </tr>
		 		 		  
		  <tr>
			<td width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="btnAdd" class="button" value=" সংযুক্ত ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
		  </tr>
		</table>
</form>
 
			
			
			
<?php			
		}
		 else if(isset($_GET['event']) && $_GET['event'] == 'edit') {
		 $id= $_GET['gid'];
		 $sqlbook="select * from ekush  where id = '$id'";				
		 $exebook=mysql_query($sqlbook);
		 $rs = mysql_fetch_array($exebook);
 $typ = array();
 		 $typ = array(1976,1977,1978,1979,1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014);

?>
 <form name="frmEdit" method="post" action="ekush.php" enctype="multipart/form-data">
        <input type="hidden" name="gid" value="<?php echo $rs['id'] ;?>"/>
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
              
          <tr>
			<td width="120" align="right">নাম</td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="name" size="50" value="<?php echo $rs['name'] ;?>"> </td>
		  </tr>
           <tr>
			<td width="120" align="right">ক্ষেত্র </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="sub" size="50" value="<?php echo $rs['sub'] ;?>"> </td>
		  </tr>
           <tr>
			<td width="120" align="right">পুরস্কারের সাল</td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="year" size="50" value="<?php echo $rs['year'] ;?>"> </td>
		  </tr>
           <tr>
			<td width="120" align="right"> সন</td>
			<td width="387">: &nbsp;&nbsp;<select name="son" >
                  <option value="<?php echo $rs['son'] ;?>"  selected="selected"‍> <?php echo $rs['son'] ;?> </option>
                 <?php
                      foreach($typ as  $value) {
                     ?>
                      <option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
                     <?php
                     
                     }
                     ?>
                  </select>                              
                 </td>
		  </tr>
		 		 		  
		  <tr>
			<td  width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="update" class="button" value=" হালনাগাদ করা ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
		  </tr>
		</table>
</form>
			
			
			
		<?php	
		}  else if(isset($_GET['event']) && $_GET['event'] == 'del') {
			
		 $id= $_GET['gid'];
		 $sqlbook="select * from  ekush  where id = '$id'";				
		 $exebook=mysql_query($sqlbook);
		 $rs = mysql_fetch_array($exebook);
		 if(!empty($rs['photo'])) {
		 unlink("padak/thumb/" . $rs['photo']);
		 unlink("padak/" . $rs['photo']);
		 }
		 $q= mysql_query("delete from ekush where id = '$id'");
		if( $q != false){
			?>
				<script  language="javascript">
				  location= "ekush.php";
				</script>
				
			<?php
            }	
			
			
		}
		else {
			$targetpage = "ekush.php" ; 	
	$limit = 25; 
	$qry="select * from ekush order by id asc";	
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
			
					 
			/*$sqlbook="select * from ekush order by id desc";		
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
			<a  class="fontclass" href="ekush.php?event=add" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন তথ্য সংগ্রহ  </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  
      <tr class="light_bg">
		
         <td align="left" style=" padding-left:10px;" width="40%"> নাম</td>	
         <td align="left" style=" padding-left:10px;" width="20%" >ক্ষেত্র</td>			
		<td align="left" style=" padding-left:10px;" width="20%"> সাল </td>
        <td align="left" style=" padding-left:10px;" width="20%">তথ্য নিয়ন্তন </td>
	  </tr>
	  <?php while($rsbook=mysql_fetch_array($res)){?>
	  <tr align="center">
		
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[name]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[sub]";?></td>
        <td align="left" style=" padding-left:10px;"><?php echo "$rsbook[year]";?></td>
       
		
		<td align="left" style=" padding-left:10px;">
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr align="center">
			<td><a  href="ekush.php?event=edit&gid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;">  সম্পাদনা </a> |</td>
			<td><a href="ekush.php?event=del&gid=<?php echo "$rsbook[id]";?>" style="text-decoration:none; color:#616161;"> মুছুন </a> </td>
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
			<a  class="fontclass" href="ekush.php?event=add" style="text-decoration:none; color:#626262;"><img src="images/arrow2.jpg" width="10" height="11"  border="0"/> &nbsp;  নতুন তথ্য সংগ্রহ </a>
		</div>
		</td>
	  </tr>
	</table>	
	<table border="1" cellspacing="0" cellpadding="0" width="100%"  class="fontclass" align="center" style="border:1px solid #B7B7B7; border-collapse:collapse;">
	  <tr class="light_bg">
		
        		
		 <td align="left" style=" padding-left:10px;" width="40%"> নাম</td>	
         <td align="left" style=" padding-left:10px;" width="20%" >ক্ষেত্র</td>			
		<td align="left" style=" padding-left:10px;" width="20%"> সাল </td>
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