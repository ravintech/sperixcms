<div class="row">
<br/>
</div>

<div class="row">
<br/>
</div>

<div class="row">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header well" style=" background-color: #7a1e21; color: #fff;">
				<h5 style="font-size: 18px; height: 2px;"><center><span class="glyphicon glyphicon-bell"></span> Announcements</center></h5>
			</div>

			<div class="modal-body">

			<div class="row" style="margin: 5px;">
				<center><a href="#addAnnouncements" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add Content</a></center>
			</div>
			<div class="row">
			<br/>
			</div>

			<div class="row" style="margin: 5px;">
			 <?php 
						 	if(isset($_GET['edit'])){
						 		$this->editannouncementsList();
						 	}else{ 
						 		$this->loadannouncementsList();
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
		$this->toggleannouncementsList();
	}

	//add briefcontent
	if(isset($_POST['latestPhotosBtn'])){
		$this->addannouncements();
	}

	//update briefcontent details
	if(isset($_POST['updateBannerBtn'])){
		$this->editannouncements();
	}

	if(isset($_POST['delete'])){
		$this->deleteannouncements();
	}
?>
<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	
</script>