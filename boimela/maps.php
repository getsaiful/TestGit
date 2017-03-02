<?php
   require_once("top.php");
 ?>
<div class="middle" id="container-maps" >

			<table  border="0" cellspacing="0" cellpadding="0" width="100%" align="center" >
				
				<tr>
				  <td align="center">
                	<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1180" height="775">
                	  <param name="movie" value="map.swf">
                	  <param name="quality" value="high">
                	  <param name="wmode" value="opaque">
                	  <param name="swfversion" value="8.0.35.0">
                	  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                	  <param name="expressinstall" value="Scripts/expressInstall.swf">
                	  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                	  <!--[if !IE]>-->
                	  <object type="application/x-shockwave-flash" data="map.swf" width="1180" height="775">
                	    <!--<![endif]-->
                	    <param name="quality" value="high">
                	    <param name="wmode" value="opaque">
                	    <param name="swfversion" value="8.0.35.0">
                	    <param name="expressinstall" value="Scripts/expressInstall.swf">
                	    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                	    <div>
                	      <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                	      <p></p>
              	      </div>
                	    <!--[if !IE]>-->
              	    </object>
                	  <!--<![endif]-->
              	  </object></td></tr>
			
			</table>
		
  </div>
 <?php
   require_once("bottom.php");
 ?>

<script type="text/javascript">
function showCurrentPage()
{
	$(".page").fadeOut();
	$("#page-" + curPage).fadeIn();
}
	

	showCurrentPage();
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
</script>