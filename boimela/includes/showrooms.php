<?php
require_once("adminconfig.php");
require_once($mainconn);
require_once("../FCKeditor/fckeditor.php"); 
$query = mysql_query("select * from tbl_showrooms"); 
$fetch_array = mysql_fetch_array($query);

if($_REQUEST['submit'])
{      
      require_once("photo_resize_showrooms.php");
	  $photofile = $rand_name.'.'.$file_ext;
	  
	  $query = mysql_query("insert into tbl_showrooms values('', '".$_REQUEST['br_name']."', '".$_REQUEST['br_add']."', '".$_REQUEST['br_email']."', '".$_REQUEST['br_contact']."' , '$photofile')");
		if($query)
		{
			$msg = "Insert Successfully!";	
		}
		else
		{
		 	$msg = "Insert Failed!";
		}
}
if($_REQUEST['update'])
{
	if($_FILES['uphoto']['name']) {
	
	require_once("photo_resize_showrooms.php");	
	$query = mysql_query("select * from tbl_showrooms where id='$_REQUEST[id]'");
	$fetch_array = mysql_fetch_array($query);
	
	$imguploadpath = "../images/";		
	unlink($imguploadpath.$fetch_array['photo']);	

	$photofile = $rand_name.'.'.$file_ext;
	
	$query_update = mysql_query("update tbl_showrooms set br_name='$_REQUEST[br_name]', br_add='$_REQUEST[br_add]', br_email = '$_REQUEST[br_email]', br_contact='$_REQUEST[br_contact]' , photo = '$photofile' where id='$_REQUEST[id]'");	
	}
	else
	{
	$query_update = mysql_query("update tbl_showrooms set br_name='$_REQUEST[br_name]', br_add='$_REQUEST[br_add]', br_email = '$_REQUEST[br_email]', br_contact='$_REQUEST[br_contact]' where id='$_REQUEST[id]'");
	
	}
	if($query_update)
	{
		$msg = 'Update Successfully!';;	
	}
	else
	{
		$msg ='Update Failed';	
	}
}
?>
<table width="80%" border="0" class="box_round" style="padding-left:20px;">
  <?php if($_REQUEST['view'] == 'add_new') { ?>
  
  <tr>
        <td height="33" style="font-size:16px; font-weight:bold" colspan="2">Showrooms</td>
      </tr>     
      <tr><td height="27" colspan="2" valign="top"><hr size="1"></td></tr>
  <tr>
    <td align="center" colspan="2">
    	<table width="100%" border="0">
          <form name="showrooms" method="post" action="<?php echo $PHP_SELF;?>" onsubmit="return validate_form(this);" enctype="multipart/form-data">
          <tr>
             <td>Photo</td>
             <td align="left"><input type="file" name="photo" class="field" size="20">&nbsp; </td>
          </tr>
          <tr>
            <td>Branch Name</td>
            <td width="77%"><input type="text" name="br_name" size="30"></td>
          </tr>
          
          <tr>
            <td>Branch address</td>
            <td><textarea name="br_add" cols="23"></textarea></td>
          </tr>
          <tr>
            <td>Branch Email</td>
            <td><input type="text" name="br_email" size="30"></td>
          </tr>
          <tr>
            <td>Contact Person</td>
            <td><input type="text" name="br_contact" size="30"></td>
          </tr>
           <tr>
			<td>&nbsp;</td>           
            <td style="padding:0px 0px 20px 10px;"><input type="submit" name="submit" value="Insert"  /> &nbsp; <?php  if(isset($msg)){echo $msg;} ?></td>
          </tr>
          </form>       
        </table>

    </td>
  </tr>
 
  <?php } 
  	else if($_REQUEST['view'] == 'del') 
	{
		$query = mysql_query("select * from tbl_showrooms where id = '$_REQUEST[id]'");  
		$fetch_array = mysql_fetch_array($query);
		
		$imguploadpath = "../images/";
		unlink($imguploadpath.$fetch_array['photo']);
		
		$query_del = mysql_query("delete from tbl_showrooms where id = '$_REQUEST[id]'");  
		if($query_del)
		{
			header("Location: admincp.php?detail=showrooms");	
		}
  	 } 	
	 else if($_REQUEST['view'] == 'edit_view') { 
	 	
		$qry_update = mysql_query("select * from tbl_showrooms where id = '$_REQUEST[id]'");
	 	$fetch_array = mysql_fetch_array($qry_update);
	 ?>
     <form name="about" method="post" action="<?php echo $PHP_SELF;?>" onsubmit="return validate_form(this);" enctype="multipart/form-data">
      <tr>
        <td height="33" style="font-size:16px; font-weight:bold" colspan="2">Showrooms</td>
      </tr>     
      <tr><td height="27" colspan="2" valign="top"><hr size="1"></td></tr>
       <tr>
         <td>Photo</td>
         <td align="left"><input type="file" name="uphoto" class="field" size="20"></td>
      </tr>
      <tr>
         <td>&nbsp;</td>
         <td align="left"><img src="../images/<?php echo $fetch_array['photo'] ; ?>" border="0" width="30" height="30" /> </td>
      </tr>
      <tr>
        <td>Branch Name</td>
        <td width="77%"><input type="text" name="br_name" value="<?php echo $fetch_array['br_name']; ?>" size="30"></td>
      </tr>  
          
      <tr>
        <td>Branch address</td>
        <td><textarea name="br_add"  cols="23"><?php echo $fetch_array['br_add']; ?></textarea></td>
      </tr>
      <tr>
        <td>Branch Email</td>
        <td><input type="text" name="br_email" value="<?php echo $fetch_array['br_email'] ?>" size="30"></td>
      </tr>
      <tr>
        <td>Contact Person</td>
        <td><input type="text" name="br_contact" value="<?php echo $fetch_array['br_contact']; ?>" size="30"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
            <input type="hidden" name="id" value="<?php echo $fetch_array['id']; ?>" />
            <input type="submit" name="update" value="Update"  /> &nbsp; <?php  if(isset($msg)){echo $msg;} ?>
        </td>
      </tr>
      <tr><td>&nbsp;</td></tr>
  </form>
  <?php } else { 
  	 $qry = "select * from tbl_showrooms";
	$exep=mysql_query($qry);
	$nump=mysql_num_rows($exep);
	
	$count = 15;
	if(empty($_GET['page']))
		$page = 0;
	else
		$page = (intval($_GET['page'])-1);
	$limit = " LIMIT ".($page*$count).",".$count;
	$res2 = mysql_query($qry.$limit);	
  	$query = mysql_query("select * from tbl_showrooms"); 
	$num = mysql_num_rows($query);
	if($num>0)
		{
	
  ?>
    
    <tr>
        <td height="33" style="font-size:16px; font-weight:bold" colspan="2">Showrooms</td>
      </tr>     
      <tr><td height="27" colspan="2" valign="top"><hr size="1"></td></tr>
     <tr>
     	<td style="padding-top:10px; padding-left:10px"><strong>Branch Name</strong></td><td align="right" style="padding-top:10px; padding-right:10px"><a href="admincp.php?detail=showrooms&view=add_new">Add New</a></td>
     </tr>
     <tr><td colspan="2"><hr size="1"></td></tr>
     <tr><td>&nbsp;</td></tr>
	 <?php
	 	while($fetch_array = mysql_fetch_array($res2))
		{	
	 ?>
     <tr>
        <td style="padding:0px 0px 0px 10px;"><?php echo $fetch_array['br_name']; ?></td>                
        <td align="right" style="padding:0px 10px 0px 0px;"><a href="admincp.php?detail=showrooms&view=edit_view&id=<?php echo $fetch_array['id'];  ?>" class="action">Edit</a> | <a href="admincp.php?detail=showrooms&view=del&id=<?php echo $fetch_array['id'];  ?>" class="action">Delete</a></td>
     </tr> 
      <?php } ?> 
            <tr>
              <td style="padding-left:8px; padding-top:10px; padding-bottom:10px;">
                  <?php 
                        require_once("ps_pagination.php");
                        $pager = new PS_Pagination($dblink, $qry, 15, 5, 'detail=drawer&n=2&cat=7');
                        $rspage = $pager->paginate();
                        echo $pager->renderFullNav();								
                  ?>
              </td>
          </tr>
   <?php } else {  ?>  
     

  <tr>
     <td height="33" style="font-size:16px; font-weight:bold">Showrooms</td>
  </tr> 
  <tr><td colspan="2" align="right"><a href="admincp.php?detail=showrooms&view=add_new">Add New</a>&nbsp;</td></tr>
  <tr>
  	<td colspan="2" style="padding:5px 0px 5px 0px;" align="left"><hr size="1"></td>
  </tr>
  <tr><td colspan="2" style="padding:20px 10px 20px 10px;" align="center">No contents here.</td> </tr> 
  <?php } } ?>
  <tr><td>&nbsp;</td></tr>
</table>
<script type="text/javascript">
function validate_email(field,alerttxt) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  with (field)
  {
   if(reg.test(value) == false) {
      alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(photo,"Please upload photo!")==false)
  {photo.focus();return false;}
  if (validate_required(br_name,"Please Enter Branch Name!")==false)
  {br_name.focus();return false;}
  if (validate_required(br_add,"Please Enter Branch Address!")==false)
  {br_add.focus();return false;}
  if (validate_required(br_email,"Please Enter Valid Email Address!")==false)
  {br_email.focus();return false;}
  if (validate_email(br_email," Your Email Address is invalid Please Enter Valid Email Address!")==false)
  {br_email.focus();return false;}
  if (validate_required(br_contact,"Please Enter Branch Contact No!")==false)
  {br_contact.focus();return false;}
 
  }
}
</script>