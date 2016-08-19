<div class="row">
<br/>
</div>

<div class="row">
<br/>
</div>

<div class="row" style="margin: 15px;">
	<center><legend><span class="glyphicon glyphicon-picture"></span> BANNERS</legend></center>
</div>

<div class="row" style="margin: 15px;">
			<div class="row" style="margin: 5px;" id="bannerRes"></div>


			<div class="row" style="margin: 5px;" id="addBannerV">
				<center><a href="#addBanner" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add Banner</a></center>
			</div>
			<div class="row">
			<br/>
			</div>

			<div class="row" style="margin: 5px;">
			 <?php
			 	if(isset($_GET['edit'])){
			 		$this->loadEditBanner();
			 	}else{ 
			 		$this->loadBannerList();
			 	}
			 ?>
			 </div>
</div>
<?php 
	if(isset($_POST['uploadBannerBtn'])){
		/*echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?banners');
			</script>";*/
		$this->addBanner();
	}

	if(isset($_POST['toggle'])){
		$this->toggleBanner();
	}

	if(isset($_POST['edit'])){

	}

	if(isset($_POST['delete'])){
		$this->deleteBanner();
	}

	//updating banner information

	if(isset($_POST['updateBannerBtn'])){
		/*echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Added..</span></center><br/><br/>').fadeOut(5000);
			
			</script>";*/
			$this->updateBannerInfo();
	}
?>
<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	
	function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById("displayPic");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
</script> 