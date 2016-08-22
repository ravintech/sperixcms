<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row">
<br/>
</div>


<div class="row">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header well" style=" background-color: <?php echo $theme[2]; ?>; color: #fff;">
				<h5 style="font-size: 18px; height: 2px;"><center><span class="glyphicon glyphicon-cog"></span> SITE CONFIGURATION</center></h5>
			</div>

			<div class="modal-body">
			<div class="row" id="bannerRes" style="margin: 15px;"></div>

			<div class="row" style="margin: 5px;">
			 	<form method="post" class="form" action="?configuration" enctype="multipart/form-data">
					<!--configuration -->
					<div class="row" style="margin: 5px;">
						<div class="col-md-5 well">
							<div class="form-group">
								<label for="sitename"><span class="glyphicon glyphicon-globe"></span> Site Name:</label>
								<input type="text" id="sitename" name="sitename" class="form-control" placeholder="Site Name eg. SPERIXCMS" value="<?php echo $configData[2]; ?>" required autofocus/>
							</div>
							<div class="form-group">
								<label for="siteshort"><span class="glyphicon glyphicon-globe"></span> Short Name:</label>
								<input type="text" id="siteshort" name="siteshort" value="<?php echo $configData[3]; ?>" class="form-control" placeholder="Short Name eg. FLE" required/>
							</div>
							<div class="form-group">
								<label for="siteurl"><span class="glyphicon glyphicon-link"></span> Site Url:</label>
								<input type="text" id="siteurl" name="siteurl" class="form-control" placeholder="Site Url eg: http://spiderapps.net" value="<?php echo $configData[6]; ?>" required/>
							</div>
							<div class="form-group">
								<label for="marquee"><span class="glyphicon glyphicon-flash"></span> Marquee:</label>
								<input type="text" id="marquee" name="marquee" class="form-control" placeholder="Marquee text scroll" value="<?php echo $configData[1]; ?>" required/>
							</div>
							<div class="form-group">
								<label for="theme"><span class="glyphicon glyphicon-cloud"></span> Theme:</label>
								<select name="theme" id="theme" class="form-control" required>
								<?php 
										$this->genThemeList();
								?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-5 well">
							<div class="form-group">
								<label for="logo"><span class="glyphicon glyphicon-picture"></span> Logo:</label>
								<input type="file" id="logo" name="logo" class="form-control" onchange="showMyConfigImage(this,'logoPic')" placeholder="Logo"/><br/>
								<center><img src="../../banners/<?php echo $configData[4]; ?>" class="img-thumbnail" id="logoPic" style="width: 70px; height: 70px; background-color: <?php echo $theme[2]; ?>;" /></center><br/><br/>
							</div>
							<div class="form-group">
								<label for="favicon"><span class="glyphicon glyphicon-picture"></span> Favicon:</label>
								<input type="file" id="favicon" name="favicon" onchange="showMyConfigImage(this,'faviconPic')" class="form-control" placeholder="favicon"/><br/>
								<center><img src="../../banners/<?php echo $configData[5]; ?>" class="img-thumbnail" id="faviconPic" style="width: 30px; height: 30px;background-color: <?php echo $theme[2]; ?>;" /></center><br/><br/>
							</div>
						</div>
					</div>
					<!--end of configuration-->

					<div class="row" style="margin: 15px;">
						<center><button type="submit" name="updateConfig" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span> Update Site Configuration</button></center>
					</div>
			 	</form>
			 </div>


			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<?php 
	if(isset($_POST['updateConfig'])){
		$this->updateConfigurationData();
	}
?>


<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	function showMyConfigImage(fileInput,id) {
		var id=id;
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById(id);
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