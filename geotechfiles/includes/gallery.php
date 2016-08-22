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
		<p><a href="?home" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp; <span class="glyphicon glyphicon-forward"></span> &nbsp; <a href="?gallery" style="color: <?php echo $theme[2]; ?>;"><span class="glyphicon glyphicon-picture"></span> Gallery</a></p> 
	</div>

	<div class="row" style="margin: 15px;">
		<center><legend><h3><span class="glyphicon glyphicon-picture"></span> Gallery</</h3></legend></center>
	</div>

	<div class="row" style="margin: 15px;">
			<form method="post" action="#" class="form-horizontal">
				<div class="row">
					<div class="col-md-3">
						<label for="category"><span class="glyphicon glyphicon-th"></span> Select Category:</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="category" name="category">
							<?php $this->genGalleryCategory(); ?>
						</select>
					</div>
					<div class="col-md-3">
						<center><button type="submit" class="btn btn-xs btn-success" style="margin-top: 5px;border-radius: 15px; -moz-border-radius: 15px; -webkit-border-radius: 15px;"><span class="glyphicon glyphicon-eye-open"></span> Preview</button>
					</div>
				</div>
			</form>
	</div>

	<div class="row" style="margin: 15px;">
	<hr/>
	</div>

	<div class="row" style="margin: 5px;">
		<!-- adding gallery code -->
		<div id="blueimp-gallery" class="blueimp-gallery">
		    <!-- The container for the modal slides -->
		    <div class="slides"></div>
		    <!-- Controls for the borderless lightbox -->
		    <h3 class="title"></h3>
		    <a class="prev">‹</a>
		    <a class="next">›</a>
		    <a class="close">×</a>
		    <a class="play-pause"></a>
		    <ol class="indicator"></ol>
		    <!-- The modal dialog, which will be used to wrap the lightbox content -->
		    <div class="modal fade">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" aria-hidden="true">&times;</button>
		                    <h4 class="modal-title"></h4>
		                </div>
		                <div class="modal-body next"></div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-default pull-left prev">
		                        <i class="glyphicon glyphicon-chevron-left"></i>
		                        Previous
		                    </button>
		                    <button type="button" class="btn btn-primary next">
		                        Next
		                        <i class="glyphicon glyphicon-chevron-right"></i>
		                    </button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	<!-- end of gallery code -->
	<?php 
		$this->previewGallery();
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
