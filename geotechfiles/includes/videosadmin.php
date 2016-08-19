<div class="row">
<br/><br/>
</div>

<div class="row" style="margin: 15px;"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-facetime-video"></span> Videos</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" id="bannerRes"></div>
				<div class="row"><br/></div>
				<div class="row" style="margin: 15px;">
					<center><a href="#addVideosCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Videos Category</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#addVideoToCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Video to Category</a></center>
				</div>
				<div class="row" style="margin: 15px;">
						<?php 
						 	if(isset($_GET['edit'])){
						 		$this->editvideosCategory();
						 	}elseif(isset($_GET['view'])){
						 		$this->viewvideosCategory();
						 	}else{
						 		$this->loadvideosCategory();
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
		$this->addvideosCategory();
	}

	if(isset($_POST['toggle'])){
		$this->togglevideosCategory();
	}

	if(isset($_POST['delete'])){
		$this->deletevideosCategory();
	}

	if(isset($_POST['addImageCategoryBtn'])){
		$this->addVideoToCategory();
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