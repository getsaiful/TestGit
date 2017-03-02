 <?php
   require_once("top.php");
 ?>
<div class="middle" id="container">
 <a href="index.php"> 
                 <div class="home_gallery" >
                  &nbsp;
                 </div> 
              </a>
            
              <a href="banglaacademi.php"> 
                 <div class="prev_gallery" >
                  &nbsp;
                 </div> 
              </a>


<div class="bottombox6">
<style type="text/css">

.stepcarousel{
	padding-top:20px;
position: relative; /*leave this value alone*/
border: 0px solid #414141;
overflow: scroll; /*leave this value alone*/
width: 818px; /*Width of Carousel Viewer itself*/
height: 600px; /*Height should enough to fit largest content's height*/
}

.stepcarousel .belt{
position: absolute; /*leave this value alone*/
left: 0;
top: 0;
}

.stepcarousel .panel{
	height: 600px;
float: center; /*leave this value alone*/
overflow: hidden; /*clip content that go outside dimensions of holding panel DIV*/
margin: 0px; /*margin around each panel*/
width: 818px; /*Width of each panel holding each content. If removed, widths should be individually defined on each content DIV then. */
}
</style>
<?php
 require_once("admin/connection.php");

$cat = $_GET['cat'];
if($cat) {
	$sql = "select * from gallery where category = '$cat' order by id desc";
}
else
{
	$sql = "select * from gallery order by id desc";
}

$qu= mysql_query($sql);

?>


<div id="mygallery" class="stepcarousel">
<div class="belt">

<?php
if(mysql_num_rows($qu) > 0) {
	while($row = mysql_fetch_array($qu)) {
		?>
<div class="panel" style="text-align:center;">
<img src="admin/gallery/<?php echo $row['photo'] ; ?>" height="600"  />

</div>

<?php
	}
}
else
{
echo '<div style="width:350px; text-align:center;">There are no photo for gallery<?div>';	
}
?>
</div>
</div>
</div>
</div>
 <?php
   require_once("bottom.php");
 ?>