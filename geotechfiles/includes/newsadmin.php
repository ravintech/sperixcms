<div class="row">
<br/>
</div>

<div class="row">
<br/>
</div>

<div class="row">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header well" style="background-color: #7a1e21;">
				<h5 style="font-size: 18px; color: #fff; height: 2px;"><center><span class="glyphicon glyphicon-envelope"></span> LATEST NEWS/EVENTS</center></h5>
			</div>

			<div class="modal-body">
			<div class="row" id="bannerRes" style="margin: 15px;"></div>
			<div class="row"><br/></div>
			<div class="row" style="margin: 5px;"  id="addContentV">
				<center><a href="#addNews" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add Content</a></center>
			</div>
			<div class="row">
			<br/>
			</div>

			<div class="row" style="margin: 5px;">
			 <?php 
			 	if(isset($_GET['edit'])){
			 		$this->editnewsList();
			 	}else{ 
			 		$this->loadnewsList();
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
		$this->togglenewsList();
	}

	//add news
	if(isset($_POST['uploadBannerBtn'])){
		$this->addnews();
	}

	//update news details
	if(isset($_POST['updateBannerBtn'])){
		$this->editnews();
	}

	if(isset($_POST['delete'])){
		$this->deletenews();
	}
?>

<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	
</script>