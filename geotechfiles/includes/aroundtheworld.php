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
			<div class="modal-header well" style=" background-color: <?php echo $theme[2]; ?>; color: #fff;">
				<h5 style="font-size: 18px; height: 2px;"><center><span class="glyphicon glyphicon-globe"></span> Around the World</center></h5>
			</div>

			<div class="modal-body">

			<div class="row" style="margin: 5px;">
				<center><a href="#addATW" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add Content</a></center>
			</div>
			<div class="row">
			<br/>
			</div>

			<div class="row" style="margin: 5px;">
			 <?php 
						 	if(isset($_GET['edit'])){
						 		$this->editworldList();
						 	}else{ 
						 		$this->loadworldList();
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
		$this->toggleworldList();
	}

	//add briefcontent
	if(isset($_POST['latestPhotosBtn'])){
		$this->addworld();
	}

	//update briefcontent details
	if(isset($_POST['updateBannerBtn'])){
		$this->editworld();
	}

	if(isset($_POST['delete'])){
		$this->deleteworld();
	}
?>
<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	
</script>