<?php
require_once("antihack.php");
require_once("adminconfig.php");
require_once($mainconn);
if($_REQUEST['uploaded'])
{
	require_once("photo_resize.php");
	$res_ID2 = mysql_query("select max(id) from tbl_products");
	while($rowset_ID2 = mysql_fetch_array($res_ID2))
	{
		$ID2 = $rowset_ID2["max(id)"];
		if($ID2 == 0){$ID2 = 0;}
	}
	$ID2++;
	$titleID = $ID2;
	
	$photofile = $rand_name.'.'.$file_ext;
				
	$qry_insert = mysql_query("insert into tbl_products values('".$titleID."', '".$_REQUEST['pro_title']."', '".$photofile."', '2')");
		if($qry_insert)
		{
			header("Location: admincp.php?detail=dinning");	
		}
		else
		{
			$msg = 'Insert Failed!';	
		}
}

if($_POST['update_photo'])
{
		if(!empty($_FILES['uphoto']['name'])){
		require_once("photo_resize.php");	
		$query = mysql_query("select * from tbl_products where id = '$_REQUEST[id]'");  
		$fetch_array = mysql_fetch_array($query);
		
		$imguploadpath = "../products/";		
		unlink($imguploadpath.$fetch_array['photo']);	
	
		$imguploadpath = "../products/";
		$photofile = $rand_name.'.'.$file_ext;

		$qry_update = mysql_query("update tbl_products set title = '".$_REQUEST['pro_title']."', photo = '".$photofile."' where id = '".$_REQUEST['id']."' ");
		}
		
		$qry_update = mysql_query("update tbl_products set title = '".$_REQUEST['pro_title']."' where id = '".$_REQUEST['id']."' ");
		
		if($qry_update)
		{
			header("Location: admincp.php?detail=dinning");	
			exit();
		}
		else
		{
			$msg = 'Update Failed!';	
		}
	
}
?>
<table width="80%" border="0" class="box_round">
  <tr>
    <td align="center" valign="top">
    	<table border="0" align="left" width="100%">
         <tr>
            <td style="padding:10px 10px 0 10px; font-size:16px; font-weight:bold"><p>Dinning Table</p></td>
          </tr>
          <tr>
          	<td>
            	<table width="100%" border="0">
                  <tr>
                    <td align="center">
                   	  <table width="100%" border="0">
                        <tr>
                            <td><hr size="1"></td>
                        </tr>
                        <tr>
                       		<td height="23"  align="right" style="padding-right:15px;">&nbsp;<a href="admincp.php?detail=dinning&view=add_new">Add New Photo</a></td>
                        </tr>                        
					    <?php if($_REQUEST['view'] == 'add_new') {?>
                        <tr>
                          <td>
                    		<table width="100%" border="0">
                                <form name="living" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" onsubmit="return validate_form(this);">
                                <tr>
                                  <td width="18%">Product Name</td>
                                  <td width="82%" align="left"><input type="text" name="pro_title" class="field" size="25"></td>
                                </tr>
                                <tr>
                                  <td>Photo</td>
                                  <td align="left"><input type="file" name="photo" class="field" size="25"></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td align="left"><input type="hidden" name="uploaded" value="1">
                                    <input type="submit" name="submit_product" value="Add" class="button" /></td>
                                  </tr>
                                <tr>
                                    <td></td>
                                    <td align="left"><?php if(isset($msg)){ echo $msg;} ?></td>
                              </tr>
        	            </form>
        	          </table></td>
        	        </tr>
          	      <?php }  else if($_REQUEST['view'] == 'edit_view') {  
				 
				  $query = mysql_query("select * from tbl_products where id = '".$_REQUEST['pro_id']."'");  
				 $fetch_array = mysql_fetch_array($query);
				 ?>
          	      <tr>
          	        <td><table width="100%" border="0">
          	          <form name="news2" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" onsubmit="return validate_form(this);">
          	            <tr>
          	              <td width="18%">Category Name</td>
          	              <td width="82%" align="left"><input type="text" name="pro_title" class="field" size="25" value="<?php echo $fetch_array['title']; ?>"></td>
        	            </tr>
          	            <tr>
          	              <td>Photo</td>
          	              <td align="left"><input type="file" name="uphoto" class="field" size="25">
          	                <img src="../products/<?php echo $fetch_array['photo']; ?>" width="50" height="29" /></td>
        	            </tr>
          	            <tr>
          	              <td>&nbsp;</td>
          	              <td align="left"><input type="hidden" name="id" value="<?php  echo  $fetch_array['id']; ?>" />
          	                <input type="submit" name="update_photo" value="Update" class="button" /></td>
        	              </tr>
          	            <tr>
          	              <td></td>
          	              <td align="left"><?php if(isset($msg)){ echo $msg;} ?></td>
        	              </tr>
        	            </form>
        	          </table></td>
        	        </tr>
          	      <?php } else if($_REQUEST['view'] == 'del') {  
				$query = mysql_query("select * from tbl_products where id = '$_REQUEST[pro_id]'");  
				$fetch_array = mysql_fetch_array($query);
				
				$imguploadpath = "../products/";
				unlink($imguploadpath.$fetch_array['photo']);	
				
				
				$query2 = mysql_query("delete from tbl_products where id = '$_REQUEST[pro_id]'");  
				header("Location: admincp.php?detail=dinning");				
				}
				 
				else{?>
          	      <tr>
          	        <td>
                    	<table width="100%" border="0">
                            <tr>
                            	<td width="25%" height="21" align="left">&nbsp;<strong>Photo </strong></td>
       	        			  	<td width="46%" align="leftr"><strong>Title</strong></td>
                                <td width="29%" align="left"><strong>Action</strong></td>
                            </tr>
                            <tr>
                            	<td colspan="3"><hr size="1"></td>
                            </tr>
                        </table>
                    </td>                    
        	      </tr>
          	     
          	      <?php 
				    $qry = "select * from tbl_products where cat=2";
					$exep=mysql_query($qry);
					$nump=mysql_num_rows($exep);
					
					$count = 15;
					if(empty($_GET['page']))
						$page = 0;
					else
						$page = (intval($_GET['page'])-1);
					$limit = " LIMIT ".($page*$count).",".$count;
					$res2 = mysql_query($qry.$limit);
				 	//$query = mysql_query("select * from tbl_products where cat=2"); 
					while($fetch_array = mysql_fetch_array($res2))
					{
				 ?>
          	      <tr>
          	       	<td>
                    	<table width="100%" border="0">
                          <tr>
                             <td width="25%">&nbsp;<img src="../products/<?php echo $fetch_array['photo']; ?>" width="50" height"29"></td>
                             <td width="46%"><?php echo $fetch_array['title']; ?></td>
                            
                             <td width="29%" align="left"><a href="admincp.php?detail=dinning&view=edit_view&pro_id=<?php echo $fetch_array['id'];  ?>" class="action">Edit</a> | <a href="admincp.php?detail=dinning&view=del&pro_id=<?php echo $fetch_array['id'];  ?>" class="action">Delete</a></td>
                          </tr>
                        </table>
                    </td>                   
        	        </tr>
          	      <?php } ?> 
				    <tr>
                      <td style="padding-left:8px; padding-top:10px; padding-bottom:10px;">
                          <?php 
								require_once("ps_pagination.php");
								$pager = new PS_Pagination($dblink, $qry, 15, 5, 'detail=dinning&n=2&cat=2');
								$rspage = $pager->paginate();
								echo $pager->renderFullNav();								
						  ?>
                      </td>
                  </tr>
		         <?php }  ?>
       	        </table></td>
       	      </tr>
          	</table></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
<script type="text/javascript">
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
  if (validate_required(pro_title,"Please enter Product Name!")==false)
  {pro_title.focus();return false;}
  if (validate_required(photo,"Please upload photo!")==false)
  {photo.focus();return false;}
  
  }
}
</script>
