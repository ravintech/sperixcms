<div class="row">
<br/><br/>
</div> 

 
<div class="row" style="margin: 15px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-comment"></span> Featured News</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;" id="bannerRes"></div>
				<div class="row" style="margin: 15px;">
				<br/>
					<center><a href="#addHappeningNews" id="addFeaturedNewsb" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add News/Happenings</a></center>
				</div>
				<div class="row" style="margin: 15px;">
					<?php
						if(isset($_GET['edit'])){
							$this->editFeaturedNews1();
						}else{
							$this->loadFeaturedNews1();
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
		$this->toogleFN1();
	}

	if(isset($_POST['delete'])){
		$this->deleteFeaturedNews1();
	}

	if(isset($_POST['addFNBtn'])){
		$this->addFeaturedNews1(); 
	}

	if(isset($_POST['updateFNBtn'])){
		$this->updateFeaturedNews1();
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