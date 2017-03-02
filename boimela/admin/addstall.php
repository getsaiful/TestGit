 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 
?>
 <form name="frmadd" method="post" action="stallinsert.php">
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            <tr>
             <td colspan="2"  align="center"> 
             <?php if(isset($_GET['s']) && $_GET['s'] == "y") { echo "সফল ভাবে সংযুক্ত হয়েছে!"; } ?>
             </td>
            </tr>
          
         
           <tr>
			<td width="120" align="right"> স্টালের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="stall" size="50"></td>
		  </tr>
		      <tr>
			<td width="109" align="right"> ইউনিট</td>
			<td width="387">: &nbsp;&nbsp;
                                                                                 
                                           <select name="unit">
                                               <option value=""selected="selected"> ইউনিট  </option>
                                                <option value="">----</option>
                                                <option value="1">১</option>
                                                <option value="2">২</option>
                                                <option value="3">৩</option>
 
                                           </select>
            
            
           </td>
		  </tr>
          <tr>
			<td width="120" align="right"> স্টাল নাম্বার  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="stall_no" size="50"></td>
		  </tr>
		 
          
		 
		 	 
		 		 		  
		  <tr>
			<td  width="120">&nbsp;</td>
			<td>&nbsp; &nbsp;&nbsp;<input type="submit" name="btnAdd" class="button" value=" সংযুক্ত ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnCancel" class="button" value=" বাতিল "></td>
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
  