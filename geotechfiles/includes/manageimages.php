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
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Manage Images</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" id="bannerRes"></div>
				<div class="row"><br/></div>
				<div class="row" style="margin: 15px;">
					<center><a href="#addImageCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Image Category</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#addPictureImageCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Picture to Category</a></center>
				</div>
				<div class="row" style="margin: 15px;">
						<?php 
						 	if(isset($_GET['edit'])){
						 		$this->editGalleryCategory2();
						 	}elseif(isset($_GET['view'])){
						 		$this->viewGalleryCategory2();
						 	}else{
						 		$this->loadGalleryCategory2();
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
		$this->addGalleryCategory2();
	}

	if(isset($_POST['toggle'])){
		$this->toggleGalleryCategory2();
	}

	if(isset($_POST['delete'])){
		$this->deleteGalleryCategory2();
	}

	if(isset($_POST['addImageCategoryBtn'])){
		$this->addImageToCategory2();
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