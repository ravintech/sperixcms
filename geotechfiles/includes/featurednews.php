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
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-comment"></span> Featured News</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;" id="bannerRes"></div>
				<div class="row" style="margin: 15px;">
				<br/>
					<center><a href="#addFeaturedNews" id="addFeaturedNewsb" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add Featured News</a></center>
				</div>
				<div class="row" style="margin: 15px;">
					<?php
						if(isset($_GET['edit'])){
							$this->editFeaturedNews();
						}else{
							$this->loadFeaturedNews();
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
		$this->toogleFN();
	}

	if(isset($_POST['delete'])){
		$this->deleteFeaturedNews();
	}

	if(isset($_POST['addFNBtn'])){
		$this->addFeaturedNews(); 
	}

	if(isset($_POST['updateFNBtn'])){
		$this->updateFeaturedNews();
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