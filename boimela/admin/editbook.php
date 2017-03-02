 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 $id= $_GET['bid'];
 $sqlbook="select * from books  where id = '$id'";				
 $exebook=mysql_query($sqlbook);
 $rs = mysql_fetch_array($exebook);
 $txtType = $rs['type'];
 if($txtType =="1") {
	$ty ="গল্প";
	   }
	   else if($txtType =="2") {
	   $ty ="প্রবন্ধ";
	   }                                
       else if($txtType =="3") {
	   $ty ="উপন্যাস";
	   }                                 
       else if($txtType =="4") {
	   $ty ="কবিতা";
	   }                                 
       else if($txtType =="5") {
	   $ty ="গবেষণা";
	   }                                 
       else if($txtType =="6") {
	   $ty ="ছড়া";
	   }                                  
       else if($txtType =="7") {
	   $ty ="শিশুসাহিত্য ";
	   }                                 
       else if($txtType =="8") {
	   $ty ="জীবনী";
	   }                                 
       else if($txtType =="9") {
	   $ty ="রচনাবলী";
	   }                                
       else if($txtType =="10") {
	   $ty ="মুক্তিযুদ্ধ";
	   }                                 
       else if($txtType =="11") {
	   $ty ="নাটক";
	   }                                 
       else if($txtType =="12") {
	   $ty ="বিজ্ঞান";
	   }                                 
       else if($txtType =="13") {
	   $ty ="ভ্রমণ";
	   }                                 
       else if($txtType =="14") {
	   $ty ="ইতিহাস";
	   }                                  
       else if($txtType =="15") {
	   $ty ="রাজনীতি";
	   }                                  
       else if($txtType =="16") {
	   $ty ="চি:/স্বাস্থ্য";
	   }                                 
       else if($txtType =="17") {
	   $ty ="কম্পিউটার";
	   }                                  
       else if($txtType =="18") {
	   $ty ="রম্য/ধাঁধা";
	   }                                  
       else if($txtType =="19") {
	   $ty ="ধর্মীয়";
	   }                                 
       else if($txtType =="20") {
	   $ty ="অনুবাদ";
	   }                                 
       else if($txtType =="21") {
	   $ty ="অভিধান";
	   }                                  
       else if($txtType =="22") {
	   $ty ="সাইন্স ফিকশন";
	   }   
	    else if($txtType =="23") {
	   $ty ="অন্যান্য";
	   }
	    else if($txtType =="24") {
	   $ty ="ছোটগল্প";
	   } 
	    else if($txtType =="25") {
	   $ty ="কাব্যগ্রন্থ";
	   } 
	    else if($txtType =="26") {
	   $ty ="গল্পগ্রন্থ";
	   }
	     else if($txtType =="27") {
	   $ty ="পশুপাখির গল্প";
	   } 
	    else if($txtType =="28") {
	   $ty ="অর্থনীতি";
	   }  
 

 $typ = array();
 $typ = array(1=>"অ",2=>"আ",3=>"ই",4=>"ঈ", 5=>"উ", 6=>"ঊ",7=>"এ",8=>"ঐ", 9=>"ও", 10=>"ঔ",11=>"ক",12=>"খ",13=>"গ",14=>"ঘ",15=>"চ",16=>"ছ",17=>"জ",18=>"ঝ",19=>"ট",20=>"ঠ",21=>"ড",22=>"ঢ",23=>"ণ",24=>"ত",25=>"থ",26=>"দ",27=>"ধ",28=>"ন",29=>"প",30=>"ফ",31=>"ব",32=>"ভ",33=>"ম",34=>"য",35=>"র",36=>"ল",37=>"শ",38=>"স",39=>"ষ",40=>"হ",41=>"য়",42=>"ড়",43=>"ঢ়",);
$date1 = array();
$date1 = array("2017-02-01"=>"01-02-2017","2017-02-02"=>"02-02-2017","2017-02-03"=>"03-02-2017","2017-02-04"=>"04-02-2017","2017-02-05"=>"05-02-2017","2017-02-06"=>"06-02-2017","2017-02-07"=>"07-02-2017","2017-02-08"=>"08-02-2017","2017-02-09"=>"09-02-2017","2017-02-10"=>"10-02-2017","2017-02-11"=>"11-02-2017","2017-02-12"=>"12-02-2017","2017-02-13"=>"13-02-2017","2017-02-14"=>"14-02-2017","2017-02-15"=>"15-02-2017","2017-02-16"=>"16-02-2017","2017-02-17"=>"17-02-2017","2017-02-18"=>"18-02-2017","2017-02-19"=>"19-02-2017","2017-02-20"=>"20-02-2017","2017-02-21"=>"21-02-2017","2017-02-22"=>"22-02-2017","2017-02-23"=>"23-02-2017","2017-02-24"=>"24-02-2017","2017-02-25"=>"25-02-2017","2017-02-26"=>"26-02-2017","2017-02-27"=>"27-02-2017","2017-02-28"=>"28-02-2017","2017-02-29"=>"29-02-2017");
 $key = $rs['keyword'];
$value = $typ[$key];

 $key2 = $rs['date']?$rs['date']:'';
 if($key2) {
$value2 = $date1[$key2];
 }
?>
 <form name="frmEdit" method="post" action="bookupdate.php" enctype="multipart/form-data">
        <input type="hidden" name="bid" value="<?php echo $id ;?>"/>
		<table width="520"  border="0" cellspacing="0" cellpadding="6" class="fontclass">
		   
            
           <tr>
			<td width="109" align="right"> বইয়ের প্রকার </td>
			<td width="387">: &nbsp;&nbsp;
                                         <select name="b_type" >
                                             <option value="<?php echo $rs['type'];?>" selected="selected"> <?php echo $ty; ;?>  </option>
                                             <option value="">--------------------------------------</option>
                                             <option value="1">গল্প</option>
                                             <option value="2">প্রবন্ধ</option>
                                             <option value="3">উপন্যাস</option>
                                             <option value="4">কবিতা</option>
                                             <option value="5">গবেষণা </option>
                                             <option value="6">ছড়া </option>
                                             <option value="7">শিশুসাহিত্য </option>
                                             <option value="8">জীবনী</option>
                                             <option value="9">রচনাবলী</option>
                                             <option value="10">মুক্তিযুদ্ধ </option>
                                             <option value="11">নাটক </option>
                                             <option value="12">বিজ্ঞান</option>
                                             <option value="13">ভ্রমণ </option>
                                             <option value="14">ইতিহাস </option>
                                             <option value="15">রাজনীতি</option>
                                             <option value="16">চি:/স্বাস্থ্য</option>
                                             <option value="17">কম্পিউটার </option>
                                             <option value="18">রম্য/ধাঁধা </option>
                                             <option value="19">ধর্মীয়</option>
                                             <option value="20">অনুবাদ </option>
                                             <option value="21">অভিধান</option>
                                             <option value="22">সাইন্স ফিকশন </option>
                                             <option value="25 ">কাব্যগ্রন্থ</option>
                                              <option value="24 ">ছোটগল্প</option>
                                               <option value="26 ">গল্পগ্রন্থ</option>
                                             <option value="23 ">অন্যান্য </option>
                                             
                                          </select>  &nbsp;&nbsp;
                                         
                                           <select name="c_type" >
                                               <option value="<?php echo $rs['keyword'];?>"selected="selected"> <?php echo $value ;?> </option>
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
			<td width="120" align="right">বইয়ের ধরন  </td>
			<td width="387">: &nbsp;&nbsp;<input  type="checkbox"  name="bookStatus" value="1" > &nbsp; পুরাতন &nbsp;&nbsp; <input  type="checkbox" checked="checked"   name="bookStatus" value="3" > &nbsp;  নতুন&nbsp;&nbsp; <input  type="checkbox" name="bookStatus" value="3" > &nbsp;  বাংলাএকাডেমী </td>
		  </tr>
           <tr>
			<td width="120" align="right">তারিখ  </td>
			<td width="387">: &nbsp;&nbsp; <select name="bookdate">
            <option value=""> বইয়ের তারিখ </option>
            <option value="">------------------------ </option>
             <option selected="selected" value="<?php echo $rs['date']; ?>"> <?php echo $value2; ?> </option>
            <?php
                                                 foreach($date1 as $key1 => $value1) {
												 ?>
                                                  <option value="<?php echo $key1; ?>"> <?php echo $value1; ?> </option>
                                                 
                                                 <?php
												 
												 }
												 ?>
                                       </select>
            
            </td>
		  </tr>
            <tr>
			<td width="120" align="right">বইয়ের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_name" size="50" value="<?php echo $rs['book_name'];?>"> </td>
		  </tr>
           <tr>
			<td width="120" align="right"> লেখকের নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_author" size="50" value="<?php echo $rs['author'];?>"> </td>
		  </tr>
          <tr>
			<td width="120" align="right"> প্রকাশনির নাম  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="b_public" size="50" value="<?php echo $rs['public'];?>"> </td>
		  </tr>
		 
         
           <tr>
			<td width="120" align="right">প্রকাশ কাল  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="time" size="50"  value="<?php echo $rs['son'];?>" ></td>
		  </tr>
           <tr>
			<td width="120" align="right"> মূল্য  </td>
			<td width="387">: &nbsp;&nbsp;<input type="text" name="price" size="50"  value="<?php echo $rs['price'];?>" ></td>
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