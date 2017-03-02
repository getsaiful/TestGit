 <?php
  require_once("admin/connection.php");
  $button=$_GET['button'];
  switch($button){
    case 'button_one':
	  // echo "select button_one from countclick where date='".date('Y-m-d')."'";
	   $query=mysql_query("select button_one from countclick where date='".date('Y-m-d')."'");
	    $n=mysql_num_rows($query);
	   if($n<=0){
		    echo $ins="insert into countclick (date,button_one) value('".date('Y-m-d')."','1')";
		   $qry=mysql_query($ins);
		}else{
		  echo $updt="update countclick set button_one=button_one+1 where date='".date('Y-m-d')."'";
		   $qry=mysql_query($updt); 
		  
	   }
	  break;
	  case 'button_two':
	   $query=mysql_query("select button_two from countclick where date='".date('Y-m-d')."'");
	   $n=mysql_num_rows($query);
	   if($n<=0){
		   echo $ins="insert into countclick (date,button_two) value('".date('Y-m-d')."','1')";
		   $qry=mysql_query($ins);
		}else{
		  echo $updt="update countclick set button_two=button_two+1 where date='".date('Y-m-d')."'";
		   $qry=mysql_query($updt); 
		   
	   }
	  break;
	  case 'button_three':
	   $query=mysql_query("select button_three from countclick where date='".date('Y-m-d')."'");
	   $n=mysql_num_rows($query);
	   if($n<=0){
		   $ins="insert into countclick (date,button_three) value('".date('Y-m-d')."','1')";
		   $qry=mysql_query($ins);
		}else{
		  $updt="update countclick set button_three=button_three+1 where date='".date('Y-m-d')."'";
		   $qry=mysql_query($updt); 
		   
	   }
	  break;
	  case 'button_four':
	   $query=mysql_query("select button_four from countclick where date='".date('Y-m-d')."'");
	   $n=mysql_num_rows($query);
	   if($n<=0){
		   $ins="insert into countclick (date,button_four) value('".date('Y-m-d')."','1')";
		   $qry=mysql_query($ins);
		}else{
		  $updt="update countclick set button_four=button_four+1 where date='".date('Y-m-d')."'";
		   $qry=mysql_query($updt); 
		   
	   }
	  break;
	  case 'button_five':
	   $query=mysql_query("select button_five from countclick where date='".date('Y-m-d')."'");
	   $n=mysql_num_rows($query);
	   if($n<=0){
		   $ins="insert into countclick (date,button_five) value('".date('Y-m-d')."','1')";
		   $qry=mysql_query($ins);
		}else{
		  $updt="update countclick set button_five=button_five+1 where date='".date('Y-m-d')."'";
		   $qry=mysql_query($updt); 
		   
	   }
	  break;
	  case 'button_six':
	   $query=mysql_query("select button_six from countclick where date='".date('Y-m-d')."'");
	   $n=mysql_num_rows($query);
	   if($n<=0){
		   $ins="insert into countclick (date,button_six) value('".date('Y-m-d')."','1')";
		   $qry=mysql_query($ins);
		}else{
		  $updt="update countclick set button_six=button_six+1 where date='".date('Y-m-d')."'";
		   $qry=mysql_query($updt); 
		   
	   }
	  break;
	  
  }
  
  
 ?>