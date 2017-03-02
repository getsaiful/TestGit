<?php
	include "sync.php";
	
	$sync = new SyncronizeDB();
	//masterSet(dbserver,user,password,db,table,index)
	//$sync->masterSet("www.zanalaarchive.com","zanalaar_zanala","Bangladesh","zanalaar_boimela","books","id");
	$sync->masterSet("http://market-edge.net/boimela/","mel_boimela","mel_boimela","mel_boimela","books","id");
	//serverSet(dbserver,user,password,db,table,index)	
	$sync->slaveSet("http://localhost:8012","root","","boimela","books","id");
	//syncronizing the slave table with the master table (at row level)
	$sync->slaveSyncronization()
?>
