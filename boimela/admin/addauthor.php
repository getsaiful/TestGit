 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 $qbook = mysql_query("select max(sync) from author" );
 $rbook = mysql_fetch_row($qbook);
 $typ = array();
 $typ = array(1=>"অ",2=>"আ",3=>"ই",4=>"ঈ", 5=>"উ", 6=>"ঊ",7=>"এ",8=>"ঐ", 9=>"ও", 10=>"ঔ",11=>"ক",12=>"খ",13=>"গ",14=>"ঘ",15=>"চ",16=>"ছ",17=>"জ",18=>"ঝ",19=>"ট",20=>"ঠ",21=>"ড",22=>"ঢ",23=>"ণ",24=>"ত",25=>"থ",26=>"দ",27=>"ধ",28=>"ন",29=>"প",30=>"ফ",31=>"ব",32=>"ভ",33=>"ম",34=>"য",35=>"র",36=>"ল",37=>"শ",38=>"স",39=>"ষ",40=>"হ",41=>"য়",42=>"ড়",43=>"ঢ়",);

?>
 <form name="frmadd" method="post" action="authorinsert.php" enctype="multipart/form-data">
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            <tr>
             <td colspan="2"  align="center"> 
             <?php if(isset($_GET['s']) && $_GET['s'] == "y") { echo "সফল ভাবে সংযুক্ত হয়েছে!"; } ?>
             </td>
            </tr>
           <tr>
			<td width="109" align="right"> খোজার শব্দ</td>
			<td width="387">: &nbsp;&nbsp;
                                                                                 
                                           <select name="c_type" >
                                               <option value=""selected="selected"> শব্দ  </option>
                                                <option value="">----</option>
                                                <?php
                                                 foreach($typ as $key => $value) {
												 ?>
                                                  <option value="<?php echo $key; ?>"> <?php echo $value; ?> </option>
                                                 
                                                 <?php
												 
												 }
												 ?>
 
                                           </select>
            
            
           </td>
		  </tr>
         
           <tr>
			<td width="120" align="right"> লেখকের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_author" size="50"></td>
		  </tr>
          <tr>
			<td width="120" align="right"> প্রকাশিত বই সমূহ  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_public" size="50"></td>
		  </tr>
		  <tr>
			<td align="right"  width="120"> লেখকের বিস্তারিত   </td>
			<td>&nbsp; &nbsp;&nbsp;<textarea name="b_details" rows="8" cols="38"></textarea></td>
		  </tr>
          <tr>
			<td width="120" align="right"> ছবি   </td>
			<td width="387">: &nbsp;&nbsp;<input type="file" name="photo" size="38" ></td>
		  </tr>
		 <tr>
			<td width="120" align="right"> পুন বিন্যাস নং </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="syn" size="50" value="<?php  echo $rbook[0]; ?> "></td>
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
 