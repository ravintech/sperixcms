<div class="row">
<br/><br/>
</div>

<div class="row" style="margin: 15px;"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-download"></span> Downloads</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" id="bannerRes"></div>
				<div class="row"><br/></div>
				<div class="row" style="margin: 15px;">
					<center><a href="#addDownloadsCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Downloads Category</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#addFileDownloadCategory" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Downloads to Category</a></center>
				</div>
				<div class="row" style="margin: 15px;">
						<?php 
						 	if(isset($_GET['edit'])){
						 		$this->editdownloadsCategory();
						 	}elseif(isset($_GET['view'])){
						 		$this->viewdownloadsCategory();
						 	}else{
						 		$this->loaddownloadsCategory();
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
		$this->adddownloadsCategory();
	}

	if(isset($_POST['toggle'])){
		$this->toggledownloadsCategory();
	}

	if(isset($_POST['delete'])){
		$this->deletedownloadsCategory();
	}

	if(isset($_POST['addImageCategoryBtn'])){
		$this->addFileToCategory();
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