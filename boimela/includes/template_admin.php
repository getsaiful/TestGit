<?php
require_once("antihack.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
<head>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/solidblocksmenu.css" />

<title><?php echo $pagetitle;?></title>
<?php echo $pagemeta;?>
</head>

<body style="overflow:auto">

    <div id="page">
                    <div id="content" class="hed">
                    
          			</div>
                        <br>
					<div id="content" class="content" align="left">
                        <div class="menudiv">
                            <?php require_once($includepath."sub_menu.php");  ?>
                        </div>
                           <div class="mainbody">
						<?php 
							if(!empty($_GET['detail']) && file_exists($includepath.strtolower($_GET['detail']).".php"))
								require_once($includepath.strtolower($_GET['detail']).".php");
							else
								require_once($includepath."admin_content_main.php");
						?>
                        </div>
					</div>
                    <br>
                    <div id="footer" >
                    	&copy; 2011 Ekushe boimela. <a href="http://www.zanala.com" target="_blank" class="footer_link">Developed by ZANALA Bangladesh</a>
                    </div>
				
	</div>
</div>
</body>
</html>