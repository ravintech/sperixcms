<?php 
	if(isset($_POST['updatecategory'])){
		$this->updateCategory('videos','videoslist','videos');
	}
?>
<div class="row" style="margin: 15px;">
	<center>
	<form method="post" action="#" class="form well" style="width: 40%;">
		<center><legend><span class="glyphicon glyphicon-facetime-video"></span> Edit Video Category</legend></center>
		<div class="row" style="margin: 15px;">
			<div class="form-group">
				<label for="oldcategoryname">Old Category Name:</label>
				<input type="text" name="oldcategoryname" id="oldcategoryname" value="<?php echo $this->getCategoryName($_POST['edit'],'videos'); ?>" class="form-control" required readonly/>
			</div>
			<div class="form-group">
				<label for="newcategoryname">New Category Name:</label>
				<input type="text" name="newcategoryname" class="form-control" id="newcategoryname" required/>
			</div>
		</div>
		<div class="row" style="margin: 15px;">
			<div class="col-md-6">
				<center><button type="submit" name="updatecategory" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span> Update Category</button></center>
			</div>
			<div class="col-md-6">
				<center><a href="?videos" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a></center>
			</div>
		</div>
	</form>
	</center>
</div>