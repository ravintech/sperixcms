<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row">
<br/>
</div>

<div class="row">
<br/>
</div>

<div class="row">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header well">
				<h5 style="font-size: 18px; height: 2px;"><center><span class="glyphicon glyphicon-info-sign"></span> About <?php echo $configData[3]; ?></center></h5>
			</div>

			<div class="modal-body">

			<div class="row" style="margin: 5px;">
				<center><a href="#addAboutUs" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add Content</a></center>
			</div>
			<div class="row">
			<br/>
			</div>

			<div class="row" style="margin: 5px;">
			 <?php 
						 	if(isset($_GET['edit'])){
						 		$this->editaboutList();
						 	}else{ 
						 		$this->loadaboutList();
						 	}
			 ?>
			 </div>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>



</div>
<?php
	if(isset($_POST['toggle'])){
		$this->toggleaboutList();
	}

	//add briefcontent
	if(isset($_POST['latestPhotosBtn'])){
		$this->addabout();
	}

	//update briefcontent details
	if(isset($_POST['updateBannerBtn'])){
		$this->editabout();
	}

	if(isset($_POST['delete'])){
		$this->deleteabout();
	}
?>
<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	
</script>