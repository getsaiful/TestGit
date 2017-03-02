<div class="bottombox2">
<?php
 require_once("../admin/connection.php");

$cat = $_GET['cat'];
if($cat) {
	$sql = "select * from gallery where category = '$cat' order by id ";
}
else
{
	$sql = "select * from gallery order by id";
}

$qu= mysql_query($sql);

?>



<style type="text/css">

.stepcarousel{
	padding-top:20px;
position: relative; /*leave this value alone*/
border: 0px solid #414141;
overflow: scroll; /*leave this value alone*/
width: 809px; /*Width of Carousel Viewer itself*/
height: 539px; /*Height should enough to fit largest content's height*/
}

.stepcarousel .belt{
position: absolute; /*leave this value alone*/
left: 0;
top: 0;
}

.stepcarousel .panel{
float: center; /*leave this value alone*/
overflow: hidden; /*clip content that go outside dimensions of holding panel DIV*/
margin: 0px; /*margin around each panel*/
width: 810px; /*Width of each panel holding each content. If removed, widths should be individually defined on each content DIV then. */
}

</style>

<script type="text/javascript" src="css/stepcarousel.js"></script>
<script type="text/javascript" src="css/jquery.min.js"></script>


<script type="text/javascript">

stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:false, moveby:1, pause:3000},
	panelbehavior: {speed:500, wraparound:false, persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['../images/PrevMoOn40x40.jpg', 335, 543], rightnav: ['../images/NextMoOff40x40.jpg', -370, 544]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['ajax', 'path_to_external_file']
})

</script>

<div id="mygallery" class="stepcarousel">
<div class="belt">

<?php
if(mysql_num_rows($qu) > 0) {
	while($row = mysql_fetch_array($qu)) {
		?>
<div class="panel" style="text-align:center;">
<img src="admin/gallery/<?php echo $row['photo'] ; ?>" />
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
