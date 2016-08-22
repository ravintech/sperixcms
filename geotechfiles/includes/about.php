<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row" style="padding: 0px; margin: 0px; border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px;">
<div class="col-md-1" style="background-color: #C0C0C0">

</div>

<div class="col-md-10" style="background-color: #fff;">
<?php include "marquee.php"; ?>
<div class="row">
<div class="col-md-9">
<!-- first row -->
	<div class="row" style="margin: 5px;">
		<p><a href="?home" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp; <span class="glyphicon glyphicon-forward"></span> &nbsp; <a href="?about" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-info-sign"></span> About <?php echo $configData[3]; ?></a></p> 
	</div>

	<div class="row" style="margin: 5px;">
		<center><legend><h3><span class="glyphicon glyphicon-info-sign"></span> About <?php echo $configData[3];?></</h3></legend></center>
	</div>

	<div class="row" style="margin: 5px;">
	<?php 
		$this->previewAboutGGS();
	?>
	</div>
</div>
<div class="col-md-3">
	<div class="row" style="margin: 1px;">
	<div class="panel panel-default well">
	<div class="panel-heading" style="background-color: <?php echo $theme[2]; ?>; color: #fff" id="spotlightHeading">
	<span class="glyphicon glyphicon-th"> </span><b> In The Spotlight</b>
	</div>
	<div class="panel-body" id="spotlightBody">
	<?php 
		$this->loadSpotlight();
	?>
	</div>
	</div>	
	</div>

	<div class="row" style="margin: 1px;">
		<div class="panel panel-default well">
		<div class="panel-heading" style="background-color: <?php echo $theme[2]; ?>; color: #fff">
		<span class="glyphicon glyphicon-bell"> </span><b> Announcements</b>
		</div>
		<div class="panel-body">
		<?php 
		$this->loadAnnouncements(); 
		?>
		</div>
		</div>
	</div>

	<div class="row" style="margin: 1px;">
		<div class="panel panel-default well">
		<div class="panel-heading" style="background-color: <?php echo $theme[2]; ?>; color: #fff">
		<span class="glyphicon glyphicon-calendar"> </span><b> Events Calendar</b>
		</div>
		<div class="panel-body">
		<?php 
		 $this->loadCalendar(); 
		?>
		</div>
		</div>
	</div>
</div>
</div>


</div>
<div class="col-md-1" style="background-color: #C0C0C0">

</div>

</div>
<?php 
$datam=$this->getNewsLinks2();
$data2=$datam;
$myD=date('Y');
echo "<script type=\"text/javascript\">
	$(function(){
		$('#mregister').html('<span class=\"glyphicon glyphicon-pencil\"></span> AYGEC ".$myD." REGISTRATION');
		$('#spotlightHeading').html('<span class=\"glyphicon glyphicon-envelope\"> </span><b> Latest News/Events</b>');
		$('#spotlightBody').html(' " . $data2 . " '); 
	}); 
	</script>";
?>
<script type="text/javascript">
	$(function(){
		$('#home').removeClass('active');
		$('#about').addClass('active');
	});
</script>