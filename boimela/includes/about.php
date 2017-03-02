<?php
require_once("adminconfig.php");
require_once($mainconn);
require_once("../FCKeditor/fckeditor.php"); 
$query = mysql_query("select * from tbl_about"); 
$fetch_array = mysql_fetch_array($query);
?>
<table width="80%" border="0" class="box_round">
  <?php if($_REQUEST['view'] == 'add_new') { ?>
  
  <form name="about" method="post" action="admincp.php?detail=manage_about" enctype="multipart/form-data">
  <tr>
  	<td style="padding:10px 10px 0 10px; font-size:16px; font-weight:bold">About Us</td>
  </tr>
  <tr><td height="27"  valign="top" style="padding:10px 10px 0 10px;"><hr size="1"></td></tr>
 <tr>
  <td align="left" style="padding:0px 10px 0 10px;"> Photo : &nbsp;&nbsp;&nbsp; <input type="file" name="photo" class="field" size="25"></td>
  </tr>
  <tr>
    <td align="center" style="padding:20px 10px 20px 10px; font-size:16px"><?php
		$oFCKeditor = new FCKeditor('textarea1') ;
		$oFCKeditor->BasePath = '../FCKeditor/';
		$oFCKeditor->Width  = '100%' ;
		$oFCKeditor->Height = '300' ;
		$oFCKeditor->ToolbarSet = 'Default' ;
		$oFCKeditor->Value = $fetch_array['about_msg'];
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
  	<td style="padding:0px 0px 20px 10px;"><input type="submit" name="submit" value="Insert"  /></td>
  </tr>
  </form>
  <?php } 
  	else if($_REQUEST['view'] == 'del') { 
  	
	$query = mysql_query("select * from tbl_about where id = '$_REQUEST[id]'");  
	$fetch_array = mysql_fetch_array($query);
	
	$imguploadpath = "../images/";
	unlink($imguploadpath.$fetch_array['photo']);
	
	$query_del = mysql_query("delete from tbl_about where id = '$_REQUEST[id]'");  
		if($query_del)
		{
			header("Location: admincp.php?detail=about");	
		}
  	 } 	else if($_REQUEST['view'] == 'edit_view') { ?>
  
  	<tr>
    	<td align="left">
        	<table width="100%" border="0">
                <form name="about" method="post" action="admincp.php?detail=manage_about" enctype="multipart/form-data">
                  <tr>
                    <td style="padding:10px 10px 0 10px; font-size:16px; font-weight:bold">About Us</td>
                  </tr>
                  <tr><td height="27"  valign="top" style="padding:10px 10px 0 10px;"><hr size="1"></td></tr>
                  <tr>
                  <td align="left" style="padding:0px 10px 0 10px;"> Photo : &nbsp;&nbsp;&nbsp; <input type="file" name="photo" class="field" size="25">&nbsp; <img src="../images/<?php echo $fetch_array['photo'];  ?>" width="35" height="45"/></td>
                  </tr>
                  <tr>
                    <td align="center" style="padding:20px 10px 20px 10px; font-size:16px"><?php
                        $oFCKeditor = new FCKeditor('textarea1') ;
                        $oFCKeditor->BasePath = '../FCKeditor/';
                        $oFCKeditor->Width  = '100%' ;
                        $oFCKeditor->Height = '300' ;
                        $oFCKeditor->ToolbarSet = 'Default' ;
                        $oFCKeditor->Value = $fetch_array['about_msg'];
                        $oFCKeditor->Create() ;
                        ?></td>
                  </tr>
                  <tr>
                    <td style="padding:0px 0px 20px 10px;"><input type="hidden" name="id" value="<?php echo $fetch_array['id']; ?>" />
                    <input type="submit" name="update" value="Update"  /> &nbsp; <?php  if(isset($msg)){echo $msg;} ?></td>
                  </tr>
                  </form>
            </table>

        </td>
    </tr>
  
  <?php } else { 
  	$query = mysql_query("select * from tbl_about"); 
	$fetch_array = mysql_fetch_array($query);
  	if(!empty($fetch_array))
	{
  ?>
   <tr>
  	<td style="padding:10px 10px 0 10px; font-size:16px; font-weight:bold">About Us</td>
  </tr>
  <tr><td colspan="2" style="padding:10px 10px 0 10px;"><hr size="1"></td></tr>
  
  <tr>
        <td style="padding:20px 0px 20px 10px;"><?php echo substr($fetch_array['about_msg'], 0, 100); ?>...</td>                
        <td align="right" style="padding:0px 10px 0px 0px;"><a href="admincp.php?detail=about&view=edit_view&id=<?php echo $fetch_array['id'];  ?>" class="action">Edit</a> | <a href="admincp.php?detail=about&view=del&id=<?php echo $fetch_array['id'];  ?>" class="action">Delete</a></td>
     </tr>     
  <?php } else { ?> 
  <tr><td style="padding:20px 10px 20px 10px;" align="right"><a href="admincp.php?detail=about&view=add_new">Add New</a></td></tr>
  <tr>
  	<td><hr size="1"></td>
  </tr>
  <tr><td style="padding:20px 10px 20px 10px;" align="center">No contents here.</td> </tr> <?php }} ?>
</table>
