<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
	<div class="row" style="margin: 15px;"><hr/></div>
	<div class="row" style="margin: 15px;">
			<center>
		<form method="post" action="#" class="form">
			<div class="row" style="margin: 15px;">
				<div class="col-md-10">
					<div class="form-group input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-search"></span>
						</span>
						<input type="text" name="search" class="form-control" placeholder="Search ..." required/>
					</div>
				</div>
				<div class="col-md-2">
					<center><button type="submit" class="btn btn-xs btn-primary" style="background-color: <?php echo $theme[2]; ?>; color: #fff;border-radius: 25px; -webkit-border-radius: 25px; -moz-border-radius: 25px; margin-top: 5px;"><span class="glyphicon glyphicon-search"></span> Search</button></center>
				</div>
			</div>
		</form>
			</center>
	</div>

	<div class="row" style="margin: 15px;"><hr/ style='height: 5px;'></div>
	
<!-- main search result -->
	<div class="row" style="margin: 5px;">
	<?php $this->loadSearchResult2(); ?>
	</div>
<!-- end of search result -->