<div class="row" style="padding: 0px; margin: 0px; border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px;">
<div class="col-md-1" style="background-color: #C0C0C0">

</div>

<div class="col-md-10" style="background-color: #fff;">
<div class="row" style="border-radius: 10px; -moz-border-radius: 10px;-webkit-border-radius: 10px; margin: 5px;background-color: #000; color: #fff; font-weight: bold; padding: 0px;">
<center><h4><marquee behaviour="scroll" direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">Welcome...GHANA GEOTECHNICAL SOCIETY</marquee></h4></center>
</div>
<div class="row">
<div class="col-md-9">
<!-- main content -->
	<div class="row" style="margin: 5px;">
		<p><a href="?home" style="color: #7a1e21;"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp; <span class="glyphicon glyphicon-forward"></span> &nbsp; <a href="?about" style="color: #7a1e21;"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></p> 
	</div>

	<div class="row" style="margin: 5px;">
		<center><legend><h3><span class="glyphicon glyphicon-earphone"></span> Contact Us</</h3></legend></center>
	</div>

	<div class="row" style="margin: 5px;">
	<?php 
		$this->previewContactGGS();
	?>
	</div>
<!-- end of main content -->
</div>
<div class="col-md-3">
<div class="row" style="margin: 1px;">
	<div class="panel panel-default well">
	<div class="panel-heading" style="background-color: #7a1e21; color: #fff" id="spotlightHeading">
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
		$('#contact').addClass('active');
	});
</script>