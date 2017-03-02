 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 $id= $_GET['bid'];
 $sqlbook="select * from stall  where id = '$id'";				
 $exebook=mysql_query($sqlbook);
 $rs = mysql_fetch_array($exebook);
 


?>


 <form name="frmEdit" method="post" action="updatestall.php">
        <input type="hidden" name="sid" value="<?php echo $id ;?>"/>
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            
      
           <tr>
			<td width="120" align="right">ষ্টলের নাম </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="stall" value="<?php echo $rs['stall_name'];?>" size="50"></td>
		  </tr>
          <tr>
			<td width="109" align="right"> ইউনিট</td>
			<td width="387">: &nbsp;&nbsp;
                                                                                 
                                           <select name="unit">
                                               <option value=""selected="selected"> ইউনিট  </option>
                                              
                                                <option value="1" <?php if($rs['unit']==1) echo 'selected="selected"' ?>>১</option>
                                                <option value="2" <?php if($rs['unit']==2) echo 'selected="selected"' ?>>২</option>
                                                <option value="3" <?php if($rs['unit']==3) echo 'selected="selected"' ?>>৩</option>
                                               <option value="4" <?php if($rs['unit']==4) echo 'selected="selected"' ?>>৪</option>
 
 
                                           </select>
		  </tr>
          <tr>
			<td width="120" align="right"> স্টাল নাম্বার  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="stall_no" id="searchbox"   size="50" value="<?php echo $rs['stall_no'];?>"  ></td>
		  </tr>
		 
         
         
		 	 
		 		 		  
		  <tr>
			<td  width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="update" class="button" value=" হালনাগাদ করা ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
		  </tr>
		</table>
</form>
 
   
 <?php
 require_once("lower_part.php");
 }
		else
		{
			 require_once("index.php");
		}
 ?>          