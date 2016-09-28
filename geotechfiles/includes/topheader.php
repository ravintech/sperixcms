<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
	$topheader=$this->getTopHeaderConfig();
	$social=$this->getSocialLinks();
?>
<div class="row">
<br/>
</div>


<div class="row">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header well" style=" background-color: <?php echo $theme[2]; ?>; color: #fff;">
				<h5 style="font-size: 18px; height: 2px;"><center><span class="glyphicon glyphicon-link"></span> TOP HEADER LINKS</center></h5>
			</div>

			<div class="modal-body">
			<div class="row" id="bannerRes" style="margin: 15px;"></div>

			<?php 
				if(isset($_POST['updateheader'])){
					$this->updateTopHeader();
				}
			?>
			<div class="row" style="margin: 5px;">
			 	<form method="post" class="form" action="?topheader">
			 		<hr/>
			 		<div class="row" style="margin: 15px;">
						<div class="col-md-4 well">
								<center><legend><span class="glyphicon glyphicon-link"></span> Section 1</legend></center>
								<div class="form-group">
									<label for="link1"><span class="glyphicon glyphicon-link"></span> Link:</label>
									<input list="link1list" name="link1" id="link1" class="form-control" placeholder="Link Address"  value="<?php echo $topheader[0][1]; ?>" required autofocus/>
									<datalist id="link1list">
										<?php $this->genLinks(); ?>
									</datalist>
								</div>
								<div class="form-group">
									<label for="title1"><span class="glyphicon glyphicon-flash"></span> Title:</label>
									<input type="text" name="title1" class="form-control" placeholder="Title" id="title1" value="<?php echo $topheader[0][2]; ?>" required>
								</div>
								<div class="form-group">
									<label for="glyphicon1"><span class="glyphicon glyphicon-th"></span> Glyphicon:</label>
									<select name="glyphicon1" id="glyphicon1" class="form-control" required>
										<option value="<?php echo $topheader[0][3]; ?>" selected><?php echo ucwords($topheader[0][3]); ?></option>
										<?php $this->genGlyphicon(); ?>
									</select>
								</div>
								<div class="form-group">
									<label for="display1"><span class="glyphicon glyphicon-flag"></span> Display:</label>
									<select name="display1" id="display1" class="form-control" required>
										<?php 
												if($topheader[0][4]==1){
													echo "<option value='1' selected>Open in same window</option>";
													echo "<option value='0'>Open in new tab</option>";
												}else{
													echo "<option value='0' selected>Open in new tab</option>";
													echo "<option value='1'>Open in same window</option>";
												}
										?>
									</select>
								</div>
						</div>
						
						<div class="col-md-4 well">
								<center><legend><span class="glyphicon glyphicon-link"></span> Section 2</legend></center>
								<div class="form-group">
									<label for="link2"><span class="glyphicon glyphicon-link"></span> Link:</label>
									<input list="link2list" name="link2" id="link1" class="form-control" placeholder="Link Address" value="<?php echo $topheader[1][1]; ?>" required/>
									<datalist id="link2list">
										<?php $this->genLinks(); ?>
									</datalist>
								</div>
								<div class="form-group">
									<label for="title2"><span class="glyphicon glyphicon-flash"></span> Title:</label>
									<input type="text" name="title2" class="form-control" placeholder="Title" id="title2" value="<?php echo $topheader[1][2]; ?>" required>
								</div>
								<div class="form-group">
									<label for="glyphicon2"><span class="glyphicon glyphicon-th"></span> Glyphicon:</label>
									<select name="glyphicon2" id="glyphicon2" class="form-control" required>
									<option value="<?php echo $topheader[1][3]; ?>" selected><?php echo ucwords($topheader[1][3]); ?></option>
										<?php $this->genGlyphicon(); ?>
									</select>
								</div>
								<div class="form-group">
									<label for="display2"><span class="glyphicon glyphicon-flag"></span> Display:</label>
									<select name="display2" id="display2" class="form-control" required>
										<?php 
												if($topheader[1][4]==1){
													echo "<option value='1' selected>Open in same window</option>";
													echo "<option value='0'>Open in new tab</option>";
												}else{
													echo "<option value='0' selected>Open in new tab</option>";
													echo "<option value='1'>Open in same window</option>";
												}
										?>
									</select>
								</div>
						</div>

						<div class="col-md-4 well">
								<center><legend><span class="glyphicon glyphicon-link"></span> Section 3</legend></center>
								<div class="form-group">
									<label for="link3"><span class="glyphicon glyphicon-link"></span> Link:</label>
									<input list="link3list" name="link3" id="link3" class="form-control" placeholder="Link Address" value="<?php echo $topheader[2][1]; ?>" required/>
									<datalist id="link3list">
										<?php $this->genLinks(); ?>
									</datalist>
								</div>
								<div class="form-group">
									<label for="title3"><span class="glyphicon glyphicon-flash"></span> Title:</label>
									<input type="text" name="title3" value="<?php echo $topheader[2][2]; ?>" class="form-control" placeholder="Title" id="title1" required>
								</div>
								<div class="form-group">
									<label for="glyphicon3"><span class="glyphicon glyphicon-th"></span> Glyphicon:</label>
									<select name="glyphicon3" id="glyphicon3" class="form-control" required>
										<option value="<?php echo $topheader[2][3]; ?>" selected><?php echo ucwords($topheader[2][3]); ?></option>
										<?php $this->genGlyphicon(); ?>
									</select>
								</div>
								<div class="form-group">
									<label for="display3"><span class="glyphicon glyphicon-flag"></span> Display:</label>
									<select name="display3" id="display3" class="form-control" required>
										<?php 
												if($topheader[2][4]==1){
													echo "<option value='1' selected>Open in same window</option>";
													echo "<option value='0'>Open in new tab</option>";
												}else{
													echo "<option value='0' selected>Open in new tab</option>";
													echo "<option value='1'>Open in same window</option>";
												}
										?>
									</select>
								</div>
						</div>
					</div>
					<hr/>
					<div class="row" style="margin: 15px;">
						<div class="col-md-3">
							<label for="facebook"><span class="glyphicon glyphicon-link"></span> Facebook:</label>
							<input type="text" id="facebook" value="<?php echo $social[0][1]; ?>" name="facebook" class="form-control" placeholder="Facebook Link" required/>
						</div>
						<div class="col-md-3">
							<label for="instagram"><span class="glyphicon glyphicon-link"></span> Instagram:</label>
							<input type="text" id="instagram" value="<?php echo $social[1][1]; ?>" name="instagram" class="form-control" placeholder="Instagram Link" required/>
						</div>
						<div class="col-md-3">
							<label for="youtube"><span class="glyphicon glyphicon-link"></span> Youtube:</label>
							<input type="text" id="youtube" value="<?php echo $social[2][1]; ?>" name="youtube" class="form-control" placeholder="Youtube Channel" required/>
						</div>
						<div class="col-md-3">
							<label for="twitter"><span class="glyphicon glyphicon-link"></span> Twitter:</label>
							<input type="text" id="twitter" value="<?php echo $social[3][1]; ?>" name="twitter" class="form-control" placeholder="Twitter Link" required/>
						</div>
					</div>
					<hr/>
					<div class="row" style="margin: 15px;">
						<center><button type="submit" name="updateheader" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span> Update Header Links</button></center>
					</div>
			 	</form>
			 </div>


			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>