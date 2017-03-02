<style>
div,input,p.submit{font-family: 'chitraMj';}
table {
    border-collapse: collapse;
    border-style: hidden;
	
}

table td, table th {
  border: 2px solid black;
}
table tr:first-child th {
  border-top: 0;
}



.table-left{
margin-left:5%;
width:95%;
text-align: left;
border-bottom: 2px solid black;
font-size:20px;
}

.table-right{
margin-right:5%;
width:95%;
font-size:20px;
border-bottom: 2px solid black;

}

.td-up{
	width:150px;
	height:27px;
	text-align: center;
}
.td-down{
  width:800px;
  height:27px;
  padding-left:30px;
}

</style>
<?php require_once("top.php"); ?>


<meta http-equiv="refresh" content="300;url=index.php" />


<?php 

$targetpage = "stallist1.php"; 
 $limit =21;
 $highlimit=42; 
 $qry="select * from stall where status='1' order by id,unit asc";
 $n = mysql_num_rows(mysql_query($qry));
 $stages = 3;
$page = mysql_real_escape_string($_GET['page']);
  if($page){
    $start = ($page - 1) * $highlimit; 
    $start2=$start+$limit;
  }else{
    $start = 0; 
    $start2=$start+$limit;
    } 
  
    // Get page data
    $query1 = $qry. " LIMIT $start, $limit";
  $res = mysql_query($query1);
   
    $limit2 = " LIMIT ".$start.",".$limit;
    $res = mysql_query($qry.$limit2);

    $query2 = $qry. " LIMIT $start2, $limit";
    $res2 = mysql_query($query2);
    
   
    $limit3 = " LIMIT ".$start2.",".$limit;
    $res2 = mysql_query($qry.$limit3);
    $x=mysql_num_rows($res2);
  // Initial page num setup
  if ($page == 0){$page = 1;}
  $prev = $page - 1;  
  $next = $page + 1;              
  $lastpage = ceil($n/$limit);    
  $LastPagem1 = $lastpage - 1;

?>
<div class="middle" id="container">
<div align="right" style="margin-top:-30px; width:1090px;">
<a href="index.php">   <img src="image/Main-Page.png" width="207" height="88" border="0"/></a>
<?php if ($page > 1){?>
<a href="<?php echo $targetpage.'?page='.$prev; ?>"><img src="image/Back.png" width="207" height="88" border="0" /></a>
<?php }if ($page >= 1){ ?>
<a href="<?php echo $targetpage.'?page='.$next;?>"><img src="image/Next.png" width="207" height="88" border="0" /></a>
<?php }?>
      
 
 </div>
<div class="bottombox5" style="margin-top:0px; position:relative;width:100%;margin-left:0px;"> 
<h2 style="margin-left:0%;">স্টলের তালিকা</h2> 

<div class="bottombox5" style="margin-top:0px;border:1px solid black;height:630px; width:100%;margin-left:0px;">
<div style="width:45%;float:left;margin-top:1%;margin-right:5%;">
	  <table class="table-left">
              <tr>
                 <td class="td-up"><b>স্টল নং </b></td>
                 <td class="td-down"><b>স্টল নাম</b></td>
              </tr>
            
               <?php while($data=mysql_fetch_array($res)){ ?>
                <tr>
                 <td class="td-up"><?php echo $data['stall_no'];?> </td>
                 <td class="td-down"><?php echo $data['stall_name'];?></td>
              </tr>


             <?php } ?>   
             </table> 
</div>	

<div style="width:45%;float:left;margin-top:1%;margin-left:5%;">
	<?php if($x>=1) {?>
	 <table class="table-right">

            <tr>
               <td class="td-up"><b>স্টল নং </b></td>
               <td class="td-down"><b>স্টল নাম</b></td>
            </tr>

             <?php while($data2=mysql_fetch_array($res2)){ ?>
                <tr>
                 <td class="td-up"><?php echo $data2['stall_no'];?> </td>
                 <td class="td-down"><?php echo $data2['stall_name'];?></td>
              </tr>


             <?php } ?>
              
            </table> 
   <?php } ?>

</div>


</div>
</div>
</div>
<?php require_once("bottom.php"); ?>

 