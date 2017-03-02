 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 $id= $_GET['bid'];
 $sqlbook="select * from author where id = '$id'";				
 $exebook=mysql_query($sqlbook);
 $rs = mysql_fetch_array($exebook);
 
 $typ = array();
 $typ = array("অ","আ","ই","ঈ", "উ", "ঊ","এ","ঐ", "ও", "ঔ","ক","খ","গ","ঘ","চ","ছ","জ","ঝ","ট","ঠ","ড","ঢ","ণ","ত","থ","দ","ধ","ন","প","ফ","ব","ভ","ম","য","র","ল","শ","স","ষ","হ","য়","ড়","ঢ়",);

?>
 <form name="frmEdit" method="post" action="authorupdate.php" enctype="multipart/form-data">
        <input type="hidden" name="bid" value="<?php echo $id ;?>"/>
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            
           <tr>
			<td width="109" align="right"> খোজার শব্দ</td>
			<td width="387">: &nbsp;&nbsp;
                                        
                                          
                                           <select name="c_type" >
                                               <option value="<?php echo $rs['keyword'];?>"selected="selected"> <?php echo $rs['keyword'];?> </option>
                                                <option value="">----</option>
                                                <?php
                                                 foreach($typ as $n) {
												 ?>
                                                  <option value="<?php echo $n; ?>"> <?php echo $n; ?> </option>
                                                 
                                                 <?php
												 
												 }
												 ?>
 
                                           </select>
            
            
           </td>
		  </tr>
         
           <tr>
			<td width="120" align="right"> লেখকের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_author" size="50" value="<?php echo $rs['author_name'];?>"> </td>
		  </tr>
          <tr>
			<td width="120" align="right"> প্রকাশিত বই সমূহ </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_public" size="50" value="<?php echo $rs['published_book'];?>"> </td>
		  </tr>
		  <tr>
			<td align="right"  width="120">লেখকের বিস্তারিত   </td>
			<td>&nbsp; &nbsp;&nbsp;<textarea name="b_details" rows="8" cols="38"><?php echo $rs['short_desription'];?></textarea></td>
		  </tr>
          <tr>
			<td width="120" align="right"> ছবি   </td>
			<td width="387">: &nbsp;&nbsp;<input type="file" name="photo" size="38" ></td>
		  </tr>
           <tr>
			<td width="120" align="right">&nbsp;   </td>
			<td width="387" align="left"> &nbsp;&nbsp; &nbsp;&nbsp;<img src="photo/author/thumb/<?php echo $rs['photo'];?>" border="0" width="80" > </td>
		  </tr>
		 <tr>
			<td width="120" align="right"> পুন বিন্যাস নং </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="syn" size="50" value="<?php echo $rs['sync'];?>"> </td>
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