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
<!-- main content -->
	<div class="row" style="margin: 5px;">
		<p><a href="?home" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp; <span class="glyphicon glyphicon-forward"></span> &nbsp; <a href="?downloads" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-download"></span> Downloads</a></p> 
	</div>

	<div class="row" style="margin: 5px;">
		<center><legend><h3><span class="glyphicon glyphicon-download"></span> Downloads</</h3></legend></center>
	</div>
	<div class="row" style="margin: 15px;">
			<form method="post" action="#" class="form-horizontal">
				<div class="row">
					<div class="col-md-3">
						<label for="category"><span class="glyphicon glyphicon-th"></span> Select Category:</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="category" name="category">
							<?php $this->gendownloadsCategory(); ?>
						</select>
					</div>
					<div class="col-md-3">
						<center><button type="submit" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-eye-open"></span> Preview</button>
					</div>
				</div>
			</form>
	</div>

	<div class="row" style="margin: 15px;">
	<hr/>
	</div>
	<div class="row" style="margin: 5px;">
	<?php 
		$this->previewDownloads();
	?>
	</div>
<!-- end of main content -->
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
		$('#resources').addClass('active');
	});
</script>