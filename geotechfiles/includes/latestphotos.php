<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row">
<br/><br/>
</div>

<div class="row" style="margin: 15px;"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: <?php echo $theme[2]; ?>;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Latest Photos</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" id="bannerRes"></div>
				<div class="row"><br/></div>
				<div class="row" style="margin: 15px;">
					<center><a href="#addLatestPhotos" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-add"></span> Add Latest Photos</a></center>
				</div>
				<div class="row" style="margin: 15px;">
						<?php 
						 	if(isset($_GET['edit'])){
						 		$this->editphotosList();
						 	}else{ 
						 		$this->loadphotosList();
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
		$this->togglephotosList();
	}

	//add briefcontent
	if(isset($_POST['latestPhotosBtn'])){
		$this->addphotos();
	}

	//update briefcontent details
	if(isset($_POST['updateBannerBtn'])){
		$this->editphotos();
	}

	if(isset($_POST['delete'])){
		$this->deletephotos();
	}
?>
<script type="text/javascript">
function updateView(x){
	var info =x;
	document.getElementById('addFNView').innerHTML=x;
}
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
</script>