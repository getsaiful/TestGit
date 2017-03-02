 <?php
 if(empty($_SESSION['uid']) || empty($_SESSION['uname']) )
{
 require_once("uper_part.php");
 ?>   
     <div style="font-size:16px; color:#787878;"  class="fontclass">
        প্রশাসনিক পাতায় আপনাকে স্বাগতম
     
     </div>
 <?php
 require_once("lower_part.php");
 }
		else
		{
			 require_once("index.php");
		}
 ?>          