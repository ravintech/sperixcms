<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<?php
	/*if(isset($_GET['id'])){
		$this->verifyArticle($_GET['id']);	
	}*/
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
		<p><a href="?home" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp; <span class="glyphicon glyphicon-forward"></span> &nbsp; <a href="#" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-envelope"></span> Articles</a></p> 
	</div>
	<div class="row" style="margin: 5px;">
	<br/>
	</div>
	
<!-- main news content -->
	<div class="row" style="margin: 5px;">
	<?php $this->loadCurrentArticles(); ?>
	</div>
<!-- end of main news content -->


</div>
<div class="col-md-3">
	<div class="row" style="margin: 1px;">
	<div class="panel panel-default well">
	<div class="panel-heading" style="background-color: <?php echo $theme[2]; ?>; color: #fff">
	<span class="glyphicon glyphicon-info-sign"> </span><b> Latest News/Events</b>
	</div>
	<div class="panel-body">
	<?php 
		$this->getNewsLinks();
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
		$('#news').addClass('active');
	});
</script>