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
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Gallery</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" id="bannerRes"></div>
				<div class="row"><br/></div>
				<div class="row" style="margin: 15px;">
					<center><a href="#addGalleryCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Gallery Category</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#addPictureGalleryCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Picture to Category</a></center>
				</div>
				<div class="row" style="margin: 15px;">
						<?php 
						 	if(isset($_GET['edit'])){
						 		$this->editGalleryCategory();
						 	}elseif(isset($_GET['view'])){
						 		$this->viewGalleryCategory();
						 	}else{
						 		$this->loadGalleryCategory();
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
	if(isset($_POST['addCategoryBtn'])){
		$this->addGalleryCategory();
	}

	if(isset($_POST['toggle'])){
		$this->toggleGalleryCategory();
	}

	if(isset($_POST['delete'])){
		$this->deleteGalleryCategory();
	}

	if(isset($_POST['addImageCategoryBtn'])){
		$this->addImageToCategory();
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