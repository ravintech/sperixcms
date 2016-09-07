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
		<p><a href="?home" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp; <span class="glyphicon glyphicon-forward"></span> &nbsp; <a href="?register" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-pencil"></span> Register</a></p> 
	</div>

	<div class="row" style="margin: 5px;">
	<center><h3 style="color: <?php echo $theme[2]; ?>; text-decoration: underline;" id="mregister"><span class="glyphicon glyphicon-pencil"></span> MEMBERSHIP REGISTRATION</h3></center>
	</div>

	<div class="row">
	<?php 
		$this->loadRegistrationView();
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
			$this->loadAnnouncements(); 
		?>
		</div>
		</div>
	</div>

</div>
</div>


<div class="row">

<!-- main content -->
<div class="col-md-9">
<div class="row" style="margin: 15px;">
	
</div>
</div>

<div class="col-md-3">

	
</div>

</div><!-- end of main content + events calender-->



</div>
<div class="col-md-1" style="background-color: #C0C0C0">

</div>

</div>


<script type="text/javascript">
	$(function(){
		$('#membership').addClass('active');
	});
</script>
