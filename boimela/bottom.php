<div class="bottom">

<div class="left_bottom" >

</div>
<div class="scroll">

<DIV ID="TICKERR"	STYLE="display:none; color:#000000;  font-size:20px; padding-top:1px; height:44px; vertical-align:middle;  overflow:hidden; width:815px" onmouseover="TICKER_PAUSED=true" onmouseout="TICKER_PAUSED=false" >

	<font style="font-family: 'SolaimanLipiNormal'; font-size:20px'"> 
		 <?php
		 $qy="select * from title order by id asc";
		 $qryy=mysql_query($qy);
		 while($dt=mysql_fetch_array($qryy)){
			 echo $dt['title'].'&nbsp; - &nbsp;';
			 
		 }
		 
		 
		 ?>
         

</font>
</DIV>

<script type="text/javascript" src="webticker_lib.js" language="javascript"></script>
</div>
       
</div>

</div>
</div>

</center>
</body>
</html>