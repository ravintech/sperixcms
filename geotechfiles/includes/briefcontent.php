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
				<h5 style="font-size: 18px; height: 2px;"><center><span class="glyphicon glyphicon-info-sign"></span> BRIEF CONTENT</center></h5>
			</div>

			<div class="modal-body">
			<div class="row" id="bannerRes" style="margin: 15px;"></div>
			<div class="row"><br/><br/></div>
			<div class="row" style="margin: 5px;"  id="addContentV">
				<center><a href="#addContent" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add Content</a></center>
			</div>
			<div class="row">
			<br/>
			</div>

			<div class="row" style="margin: 5px;">
			 <?php 
			 	if(isset($_GET['edit'])){
			 		$this->editBriefContentList();
			 	}else{ 
			 		$this->loadBriefContentList();
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
		$this->toggleBriefContentList();
	}

	//add briefcontent
	if(isset($_POST['uploadBannerBtn'])){
		$this->addBriefContent();
	}

	//update briefcontent details
	if(isset($_POST['updateBannerBtn'])){
		$this->editBriefContent();
	}

	if(isset($_POST['delete'])){
		$this->deleteBriefContent();
	}
?>

<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	
</script>