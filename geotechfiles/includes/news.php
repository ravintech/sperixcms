<div class="row" style="padding: 0px; margin: 0px; border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px;">
<div class="col-md-1" style="background-color: #C0C0C0">

</div>

<div class="col-md-10" style="background-color: #fff;">
<div class="row" style="border-radius: 10px; -moz-border-radius: 10px;-webkit-border-radius: 10px; margin: 5px;background-color: #000; color: #fff; font-weight: bold; padding: 0px;">
<center><h4><marquee behaviour="scroll" direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">Welcome...GHANA GEOTECHNICAL SOCIETY</marquee></h4></center>
</div>
<div class="row">
<div class="col-md-9">
<!-- first row -->
	<div class="row" style="margin: 5px;">
		<p><a href="?home" style="color: #7a1e21;"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp; <span class="glyphicon glyphicon-forward"></span> &nbsp; <a href="?news" style="color: #7a1e21;"><span class="glyphicon glyphicon-envelope"></span> Latest News/Events</a></p> 
	</div>
	<div class="row" style="margin: 5px;">
	<br/>
	</div>
	
<!-- main news content -->
	<div class="row" style="margin: 5px;">
	<?php $this->loadCurrentNews(); ?>
	</div>
<!-- end of main news content -->


</div>
<div class="col-md-3">
	<div class="row" style="margin: 1px;">
	<div class="panel panel-default well">
	<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
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
		<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
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
		<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
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


<script type="text/javascript">
	$(function(){
		$('#news').addClass('active');
	});
</script>