<div class="row" style="padding: 0px; margin: 0px; border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px;">
<div class="col-md-1" style="background-color: #C0C0C0">

</div>

<div class="col-md-10" style="background-color: #fff;">
<div class="row" style="border-radius: 10px; -moz-border-radius: 10px;-webkit-border-radius: 10px; margin: 5px;background-color: #000; color: #fff; font-weight: bold; padding: 0px;">
<center><h4><marquee behaviour="scroll" direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">Welcome...GHANA GEOTECHNICAL SOCIETY</marquee></h4></center>
</div>
<div class="row">
<div class="col-md-9">
<?php include "carousel.php"; ?>
</div>
<div class="col-md-3">
<div class="panel panel-default well">
<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
<span class="glyphicon glyphicon-th"> </span><b> In The Spotlight</b>
</div>
<div class="panel-body">
<?php  
	$this->loadSpotlight();
?>
</div>
</div>
</div>
</div>


<div class="row">

<!-- main content -->
<div class="col-md-9">
<div class="row" style="margin: 15px;">
	<?php 
		$this->loadBriefContent();
	?>
</div>
</div>

<div class="col-md-3">
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

</div><!-- end of main content + events calender-->

<!-- news + announcement -->
<div class="row" style="margin: 5px;">
<div class="col-md-4">
<div class="panel panel-default well">
<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
<span class="glyphicon glyphicon-comment"> </span><b> Featured News</b>
</div>
<div class="panel-body">
<?php 
	$this->previewFeaturedNews();
?>
</div>
</div>
</div>

<div class="col-md-4">
<div class="panel panel-default well">
<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
<span class="glyphicon glyphicon-comment"> </span><b> News & Happenings</b>
</div>
<div class="panel-body">
<?php 
	$this->previewHappenings();
?>
</div>
</div>
</div>

<div class="col-md-4">
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
</div>
<!-- end of news and announcements -->


<div class="row" style="margin: 5px;"><br/></div>

<!-- latest photos + around the world -->
<div class="row" style="margin: 5px;">
<div class="col-md-6">
<div class="panel panel-default well">
<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
<span class="glyphicon glyphicon-picture"> </span><b> Latest Photos</b>
</div>
<div class="panel-body">
<?php 
 $this->previewLatestPhotos(); 
?>
</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-default well">
<div class="panel-heading" style="background-color: #7a1e21; color: #fff">
<span class="glyphicon glyphicon-globe"> </span><b> Around the world</b>
</div>
<div class="panel-body">
<?php 
 $this->previewWorld(); 
?>
</div>
</div>
</div>
</div>
<!-- end of latest photos + around the world -->


</div>
<div class="col-md-1" style="background-color: #C0C0C0">

</div>

</div>


<script type="text/javascript">
	$(function(){
		$('#home').addClass('active');
	});
</script>