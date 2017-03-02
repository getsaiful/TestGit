<?php
require_once("adminconfig.php");
require_once($mainconn);
require_once("../FCKeditor/fckeditor.php"); 
$query = mysql_query("select * from tbl_contact"); 
$fetch_array = mysql_fetch_array($query);

if($_POST['submit'])
{
$qry_insert = mysql_query("insert into tbl_contact values('1', '".$_REQUEST['textarea1']."')");
if($qry_insert)
	{
		$msg = 'Insert Successfully!';
	}
	else
	{
		$msg = 'Insert Failed!';	
	}
}
if($_POST['update'])
{
	$qry_update = mysql_query("update tbl_contact set add = '".$_REQUEST['textarea1']."' where id = '1' ");
	if($qry_update)
	{
		$msg = 'Update Successfully!';
	}
	else
	{
		$msg = 'Update Failed!';	
	}
}
?>
<table width="80%" border="0" class="box_round">
  <?php if($_REQUEST['view'] == 'add_new') { ?>
  
  <form name="about" method="post" action="<?php echo $PHP_SELF; ?>">
  <tr>
    <td height="33" style="font-size:16px; font-weight:bold" >Contact Us</td>
  </tr>     
  <tr><td height="27"  valign="top"><hr size="1"></td></tr>
  <tr>
    <td align="center" style="padding:20px 10px 20px 10px; font-size:16px"><?php
		$oFCKeditor = new FCKeditor('textarea1') ;
		$oFCKeditor->BasePath = '../FCKeditor/';
		$oFCKeditor->Width  = '100%' ;
		$oFCKeditor->Height = '300' ;
		$oFCKeditor->ToolbarSet = 'Default' ;
		$oFCKeditor->Value = $fetch_array['add'];
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
  	<td style="padding:0px 0px 20px 10px;"><input type="submit" name="submit" value="Insert"  /></td>
  </tr>
  </form>
  <?php } 
  	else if($_REQUEST['view'] == 'del') { 
  	$query_del = mysql_query("delete from tbl_contact where id = '$_REQUEST[id]'");  
		if($query_del)
		{
			header("Location: admincp.php?detail=contact");	
		}
  	 } 	else if($_REQUEST['view'] == 'edit_view') { ?>
  <tr>
  	<td>
    	<table width="100%" border="0">
          <form name="about" method="post" action="<?php echo $PHP_SELF; ?>">
          <tr>
            <td height="33" style="padding:10px 10px 0 10px;font-size:16px; font-weight:bold" >Contact Us</td>
          </tr>     
          <tr><td height="27"  valign="top" style="padding:10px 10px 0 10px;"><hr size="1"></td></tr>
          <tr>
            <td align="center" style="padding:20px 10px 20px 10px; font-size:16px"><?php
                $oFCKeditor = new FCKeditor('textarea1') ;
                $oFCKeditor->BasePath = '../FCKeditor/';
                $oFCKeditor->Width  = '100%' ;
                $oFCKeditor->Height = '300' ;
                $oFCKeditor->ToolbarSet = 'Default' ;
                $oFCKeditor->Value = $fetch_array['add'];
                $oFCKeditor->Create() ;
                ?></td>
          </tr>
          <tr>
            <td style="padding:0px 0px 20px 10px;">
            <input type="submit" name="update" value="Update"  /> &nbsp; <?php  if(isset($msg)){echo $msg;} ?></td>
          </tr>
  </form>
        </table>

    </td>
  </tr>
  
  <?php } else { 
  	$query = mysql_query("select * from tbl_contact"); 
	$fetch_array = mysql_fetch_array($query);
  	if(!empty($fetch_array))
	{
  ?>
  <tr>
  	<td style="padding:10px 10px 0 10px; font-size:16px; font-weight:bold">Contact Us</td>
  </tr>
  <tr><td colspan="2" style="padding:10px 10px 0 10px;"><hr size="1"></td></tr>
  <tr>
        <td style="padding:20px 0px 20px 10px;"><?php echo substr($fetch_array['add'], 0, 100); ?>...</td>                
        <td align="right" style="padding:0px 10px 0px 0px;"><a href="admincp.php?detail=contact&view=edit_view&id=<?php echo $fetch_array['id'];  ?>" class="action">Edit</a> | <a href="admincp.php?detail=contact&view=del&id=<?php echo $fetch_array['id'];  ?>" class="action">Delete</a></td>
  </tr> 
      
  <?php } else { ?> 
  <tr><td style="padding:10px 10px 0 10px;"><strong>Contact Us</strong></td><td style="padding:20px 10px 20px 10px;" align="right"><a href="admincp.php?detail=contact&view=add_new">Add New</a></td></tr>
  <tr>
  	<td colspan="2"><hr size="1"></td>
  </tr>
  <tr><td colspan="2" style="padding:20px 10px 20px 10px;" align="center">No contents here.</td> </tr> <?php }} ?>
</table>
