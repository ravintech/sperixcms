<!--view glyphicons -->
<div id="viewglyphicons" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-the"></span> View Glyphicons</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
				
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


<!--add submenu -->
<div id="addSubMenu" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-the"></span> Add SubMenu</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?menu" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-info-sign"></span> Title:</label>
							<input type="text" name="title" class="form-control" id="title" placeholder="Title" required autofocus/>
						</div>
						<div class="form-group">
							<label for="article"><span class="glyphicon glyphicon-envelope"></span> Article:</label>
							<select name="article" id="article" class="form-control"/>
									<option value=" ">None</option>
									<?php 
										$app->genLinks();
									?>
							</select>
						</div>
						<div class="form-group">
							<label for="parent"><span class="glyphicon glyphicon-envelope"></span> Parent Menu:</label>
							<select name="parent" id="parent" class="form-control" required/>
									<?php 
										$app->genMenuIds();
									?>
							</select>
						</div>
						<div class="form-group">
							<label for="glyphicon"><span class="glyphicon glyphicon-flash"></span> Glyphicon:</label>
							<select name="glyphicon" id="glyphicon" class="form-control"/>
									<?php 
										$app->genGlyphicon();
									?>
							</select>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addSubMenuBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add SubMenu</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!--add menu -->
<div id="addMenu" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-th"></span> Add Menu</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?menu" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-info-sign"></span> Title:</label>
							<input type="text" name="title" class="form-control" id="title" placeholder="Title" required autofocus/>
						</div>
						<div class="form-group">
							<label for="article"><span class="glyphicon glyphicon-envelope"></span> Article:</label>
							<select name="article" id="article" class="form-control"/>
									<option value=" ">None</option>
									<?php 
										$app->genLinks();
									?>
							</select>
						</div>
						<div class="form-group">
							<label for="glyphicon"><span class="glyphicon glyphicon-flash"></span> Glyphicon:</label>
							<select name="glyphicon" id="glyphicon" class="form-control"/>
									<?php 
										$app->genGlyphicon();
									?>
							</select>
						</div>
						
						<div class="form-group">
							<center><button type="submit" name="addMainMenuBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Menu</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add file to download category -->
<div id="addFileDownloadCategory" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Add File to Downloads Category</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?downloads" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="category"><span class="glyphicon glyphicon-flash"></span> Category:</label>
							<select name="category" id="category" class="form-control"  required>
									<?php 
										$app->gendownloadsCategory();
									?>
							</select>
						</div>
						<div class="form-group">
							<label for="image"><span class="glyphicon glyphicon-open"></span> File:</label>
							<input type="file" name="bannerImg" id="image" accept="application/*" class="form-control" required/>
						</div>
						<div class="form-group">
							<label for="description"><span class="glyphicon glyphicon-comment"></span> Description:</label>
							<textarea id="description" name="description" class="form-control editfield"></textarea>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addImageCategoryBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Download to Category</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add downloads category -->
<div id="addDownloadsCategory" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-downloads"></span> Add Downloads Category</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?downloads" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="category"><span class="glyphicon glyphicon-flash"></span> Category:</label>
							<input type="text" id="category" name="category" class="form-control" placeholder="Category" required/>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addCategoryBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Category</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


<!-- add video category -->
<div id="addVideosCategory" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-facetime-video"></span> Add Video Category</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?videos" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="category"><span class="glyphicon glyphicon-flash"></span> Category:</label>
							<input type="text" id="category" name="category" class="form-control" placeholder="Category" required/>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addCategoryBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Category</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add video to  category -->
<div id="addVideoToCategory" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-facetime-video"></span> Add Video to Category</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?videos" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="category"><span class="glyphicon glyphicon-flash"></span> Category:</label>
							<select name="category" id="category" class="form-control"  required>
									<?php 
									$app->genVideosCategory();
									?>
							</select>
						</div>
						<div class="form-group">
							<label for="image"><span class="glyphicon glyphicon-upload"></span> Video source:</label>
							<textarea id="image" name="bannerImg" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="description"><span class="glyphicon glyphicon-comment"></span> Description:</label>
							<textarea id="description" name="description" class="form-control editfield"></textarea>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addImageCategoryBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Video to Category</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add picture to gallery category -->
<div id="addPictureGalleryCategory" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Add Image to Gallery Category</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?gallery" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="category"><span class="glyphicon glyphicon-flash"></span> Category:</label>
							<select name="category" id="category" class="form-control"  required>
									<?php 
									$app->genGalleryCategory();
									?>
							</select>
						</div>
						<div class="form-group">
							<label for="image"><span class="glyphicon glyphicon-picture"></span> Image:</label>
							<input type="file" name="bannerImg" id="image" accept="image/*" class="form-control" onchange="showMyImage1(this,'galleryPicd')" required/>
							<center><img src=" " class="img-thumbnail" id="galleryPicd"/></center>
						</div>
						<div class="form-group">
							<label for="description"><span class="glyphicon glyphicon-comment"></span> Description:</label>
							<textarea id="description" name="description" class="form-control editfield"></textarea>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addImageCategoryBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Image to Category</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add gallery category -->
<div id="addGalleryCategory" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Add Gallery Category</center></h3>
			</div>
			<div class="modal-body">
				<div class="row well" style="margin: 15px;">
					<form method="post" action="?gallery" class="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="category"><span class="glyphicon glyphicon-flash"></span> Category:</label>
							<input type="text" id="category" name="category" class="form-control" placeholder="Category" required/>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addCategoryBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Category</button></center>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add news -->
<div id="addNews" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-pencil"></span> Latest News/Events</h3>
			</div>
			<div class="modal-body">
			<div class="row" style="margin: 15px;">
				<div class="col-md-12">
				<form method="post" action="?news" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Title</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title" required/>
						</div>
						<div class="form-group">
							<label for="bannerImg"><span class="glyphicon glyphicon-open"></span> Load Image</label>
							<input type="file" id="bannerImg" name="bannerImg" accept="image/*" placeholder="Upload banner" onchange="showMyImage1(this,'displaynews')" class="form-control"/><br/>
							<center><img src=" " class="img-thumbnail" id="displaynews"/></center>
						</div>
						<div class="form-group">
							<label for="articles"><span class="glyphicon glyphicon-pencil"></span> Choose Article</label>
							<select class="form-control" id="articles" name="articles" onchange="loadNewsContent(this.value)">
								<option value="0">None</option>
								<?php 
										$app->genLinks2();
								?>
							</select>
						</div>
						<div class="form-group" id="encd">
							<label for="briefmessage"><span class="glyphicon glyphicon-info-sign"></span> Message</label>
							<textarea  class="form-control" style="color: #000;" type="text" id="briefmessagenews" name="briefmessage"></textarea>
						</div>
						<div class="form-group">
							<label for="link"><span class="glyphicon glyphicon-link"></span> Link</label>
							<select class="form-control" id="link" name="link" disabled>
								<option value=" ">None</option>
							</select>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="uploadBannerBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Add Content</button></center>
					</div>
				</form>
				</div>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add article -->
<div id="addArticles" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-pencil"></span> Articles</h3>
			</div>
			<div class="modal-body">
			<div class="row" style="margin: 15px;">
				<div class="col-md-12">
				<form method="post" action="?articles" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Title</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title" required/>
						</div>
						<div class="form-group">
							<label for="bannerImg"><span class="glyphicon glyphicon-open"></span> Load Image</label>
							<input type="file" id="bannerImg" name="bannerImg" accept="image/*" placeholder="Upload banner" onchange="showMyImage1(this,'displaynews22')" class="form-control"/><br/>
							<center><img src=" " class="img-thumbnail" id="displaynews22"/></center>
						</div>
						<div class="form-group">
							<label for="briefmessage1"><span class="glyphicon glyphicon-info-sign"></span> Message</label>
							<textarea  class="form-control" style="color: #000;" type="text" id="briefmessage1" name="briefmessage"></textarea>
						</div>
						<div class="form-group">
							<label for="link"><span class="glyphicon glyphicon-link"></span> Link</label>
							<select class="form-control" id="link" name="link" disabled>
								<option value=" ">None</option>
							</select>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="uploadBannerBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Add Content</button></center>
					</div>
				</form>
				</div>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add calendar -->
<div id="addCalendar" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-pencil"></span> Brief Content</center></h3>
			</div>
			<div class="modal-body">
			<div class="row" style="margin: 15px;">
				<div class="col-md-12">
				<form method="post" action="?calendar" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Topic</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title" required/>
						</div>
						<div class="form-group">
							<label for="date"><span class="glyphicon glyphicon-calendar"></span> Date</label>
							<input type="date" class="form-control" id="date" placeholder="mm/dd/yyyy" name="date"/>
						</div>
						<div class="form-group">
							<label for="link"><span class="glyphicon glyphicon-link"></span> Link</label>
							<select class="form-control" id="link" name="link">
								<option value=" ">None</option>
							</select>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="uploadBannerBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Add Content</button></center>
					</div>
				</form>
				</div>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add announcements -->
<div id="addAnnouncements" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-bell"></span> Announcements</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 30px;">
				<form method="post" action="?announcements" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Title</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title"  required/>
						</div>
						<div class="form-group">
							<label for="briefmessage"><span class="glyphicon glyphicon-info-sign"></span> Message</label>
							<textarea  class="form-control editfield" style="color: #000;" type="text" id="briefmessage2" name="briefmessage"></textarea>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="latestPhotosBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload Details</button>&nbsp;&nbsp;&nbsp;<a href="?announcements" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Close</a></center>
					</div>
				</form>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add spotlight -->
<div id="addspotlight" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-th"></span> Spotlight</center></h3>
			</div>
			<div class="modal-body">
			<div class="row" style="margin: 15px;">
				<div class="col-md-12">
				<form method="post" action="?spotlight" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Title</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title" required/>
						</div>
						<div class="form-group">
							<label for="bannerImg"><span class="glyphicon glyphicon-open"></span> Load Image</label>
							<input type="file" id="bannerImg" name="bannerImg" accept="image/*" placeholder="Upload banner" onchange="showMyImage1(this,'displayPicd')" class="form-control"/><br/>
							<center><img src=" " class="img-thumbnail" id="displayPicd"/></center>
						</div>
						<div class="form-group">
							<label for="briefmessage"><span class="glyphicon glyphicon-info-sign"></span> Message</label>
							<textarea  class="form-control" style="color: #000;" type="text" id="briefmessage" name="briefmessage"></textarea>
						</div>
						<div class="form-group">
							<label for="link"><span class="glyphicon glyphicon-link"></span> Link</label>
							<select class="form-control" id="link" name="link">
								<option value=" ">None</option>
							</select>
						</div>
						<div class="form-group">
							<label for="linkMsg"><span class="glyphicon glyphicon-link"></span> Link Message</label>
							<input type="text" id="linkMsg" name="linkMsg" class="form-control" placeholder="Link Message"/>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="uploadBannerBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Add Content</button></center>
					</div>
				</form>
				</div>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<!-- end of spotlight -->


<!-- add contact us -->
<div id="addContactUs" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-earphone"></span> Contact GGS</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 30px;">
				<form method="post" action="?contact" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Title</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title"  required/>
						</div>
						<div class="form-group">
							<label for="briefmessage"><span class="glyphicon glyphicon-info-sign"></span> Message</label>
							<textarea  class="form-control editfield" style="color: #000;" type="text" id="briefmessage2" name="briefmessage"></textarea>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="latestPhotosBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload Details</button>&nbsp;&nbsp;&nbsp;<a href="?contact" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Close</a></center>
					</div>
				</form>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add about us -->
<div id="addAboutUs" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-info-sign"></span> About GGS</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 30px;">
				<form method="post" action="?about" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Title</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title"  required/>
						</div>
						<div class="form-group">
							<label for="briefmessage"><span class="glyphicon glyphicon-info-sign"></span> Message</label>
							<textarea  class="form-control editfield" style="color: #000;" type="text" id="briefmessage2" name="briefmessage"></textarea>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="latestPhotosBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload Details</button>&nbsp;&nbsp;&nbsp;<a href="?about" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Close</a></center>
					</div>
				</form>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add around the world -->
<div id="addATW" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-globe"></span> Around the world</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;" id="">
						<div class="row well">
						<form method="post" class="form" action="?world" enctype="multipart/form-data">
							<div class="form-group">
								<label for="title">Title:</label>
								<input type="text" id="title" name="title" class="form-control" placeholder="Title" required/>
							</div>
							<div class="form-group">
								<label for="banerImg">Video Source: </label>
								<textarea class="form-control" id="bannerImg" name="bannerImg" required></textarea>
							</div>
							<div class="form-group">
								<label for="briefmessage">Message:</label>
								<textarea class="form-control editfield" id="briefmessage1" name="briefmessage" required></textarea>
							</div>
							<div class="form-group">
								<label for="link">Link:</label>
								<select class="form-control" name="link" id="link">
									<option value=" ">None</option>
								</select>
							</div>
							<div class="form-group">
								<center><button type="submit" name="latestPhotosBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload Details</button></center>
							</div>
						</form>
						</div>
					</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- add latest photos -->
<div id="addLatestPhotos" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Latest Photos</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;" id="">
					<div class="col-md-6">
						<div class="row well">
						<form method="post" class="form" action="?photos" enctype="multipart/form-data">
							<div class="form-group">
								<label for="title">Title:</label>
								<input type="text" id="title" name="title" class="form-control" placeholder="Title" required/>
							</div>
							<div class="form-group">
								<label for="banerImg">Image: </label>
								<input type="file" id="bannerImg" name="bannerImg" accept="image/*" class="form-control" onchange="showMyImage1(this,'lpimage')" required/>
							</div>
							<div class="form-group">
								<label for="briefmessage">Message:</label>
								<textarea class="form-control editfield" id="briefmessage" name="briefmessage" required></textarea>
							</div>
							<div class="form-group">
								<label for="link">Link:</label>
								<select class="form-control" name="link" id="link">
									<option value=" ">None</option>
								</select>
							</div>
							<div class="form-group">
								<center><button type="submit" name="latestPhotosBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload Details</button></center>
							</div>
						</form>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<center><img src=" " class="img-thumbnail" id="lpimage" /></center>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


<!-- add happening news -->
<div id="addHappeningNews" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
			<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-comment"></span> News/Happenings</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;">
					<form method="post" action="?happenings" class="form">
						<div class="form-group">
							<label for="topic">Topic:</label>
							<input type="text" name="topic" id="topic" class="form-control" placeholder="Topic"/ required>
						</div>
						<div class="form-group">
							<label for="source">Source:</label>
							<textarea class="form-control" name="source" id="source" required></textarea>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addFNBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> Add News/Happenings</button></center>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- add featured news -->
<div id="addFeaturedNews" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
			<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-comment"></span> Featured News</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;">
					<form method="post" action="?featurednews" class="form">
						<div class="form-group">
							<label for="topic">Topic:</label>
							<input type="text" name="topic" id="topic" class="form-control" placeholder="Topic"/ required>
						</div>
						<div class="form-group">
							<label for="source">Source:</label>
							<textarea class="form-control" name="source" id="source" required></textarea>
						</div>
						<div class="form-group">
							<center><button type="submit" name="addFNBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Featured News</button></center>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!--add banners -->
<div id="addBanner" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-picture"></span> Banners</center></h3>
			</div>
			<div class="modal-body">
			<div class="row" style="margin: 15px;">
				<div class="col-md-6">
				<form method="post" action="#" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="bannerImg"><span class="glyphicon glyphicon-open"></span> Load Image</label>
							<input type="file" id="bannerImg" name="bannerImg" accept="image/*" placeholder="Upload banner" onchange="showMyImage(this)" class="form-control" required/>
						</div>
						<div class="form-group">
							<label for="description"><span class="glyphicon glyphicon-info-sign"></span> Description</label>
							<textarea type="text" id="description" name="description" placeholder="Short Info" class="form-control" maxlength="500"></textarea>
						</div>
						<div class="form-group">
							<label for="link"><span class="glyphicon glyphicon-link"></span> Link</label>
							<select class="form-control" id="link" name="link">
								<option value=" ">None</option>
							</select>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="uploadBannerBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload</button></center>
					</div>
				</form>
				</div>
				<div class="col-md-6">
					<center><img src=" " class="img-thumbnail" id="displayPic"/></center>
				</div>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>	


<!-- add briefcontent -->
<div id="addContent" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-pencil"></span> Brief Content</center></h3>
			</div>
			<div class="modal-body">
			<div class="row" style="margin: 15px;">
				<div class="col-md-12">
				<form method="post" action="?content" class="form" enctype="multipart/form-data">
					<div class="row well">
						<div class="form-group">
							<label for="title"><span class="glyphicon glyphicon-edit"></span> Title</label>
							<input type="text" id="title" name="title" class="form-control" placeholder="Title" required/>
						</div>
						<div class="form-group">
							<label for="bannerImg"><span class="glyphicon glyphicon-open"></span> Load Image</label>
							<input type="file" id="bannerImg" name="bannerImg" accept="image/*" placeholder="Upload banner" onchange="showMyImage1(this,'displayPic1')" class="form-control"/><br/>
							<center><img src=" " class="img-thumbnail" id="displayPic1"/></center>
						</div>
						<div class="form-group">
							<label for="briefmessage"><span class="glyphicon glyphicon-info-sign"></span> Message</label>
							<textarea  class="form-control" style="color: #000;" type="text" id="briefmessage" name="briefmessage"></textarea>
						</div>
						<div class="form-group">
							<label for="link"><span class="glyphicon glyphicon-link"></span> Link</label>
							<select class="form-control" id="link" name="link">
								<option value=" ">None</option>
							</select>
						</div>
					</div>
					<div class="row">
						<center><button type="submit" name="uploadBannerBtn" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Add Content</button></center>
					</div>
				</form>
				</div>
			</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<!-- end of briefcontent -->


<!--  edit details for 5aygec-->
<div id="editaygec" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-pencil"></span> Edit Registration Details</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 30px;" id="authRes">
					<legend><center><h5 style="font-weight: bold;">Enter Authentication Code</h5></center></legend>
				</div>
				<div class="row" style="margin: 30px;">
					
					<div class="form-group input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
						</span>
						<input type="text" id="authCode" name="authCode" class="form-control" placeholder="Authentication Code"/>
					</div>
				</div>
				<div class="row" style="margin: 30px;">
					<center><button type="button" class="btn btn-xs btn-primary" id="verifyAuth"><span class="glyphicon glyphicon-send"></span> Verify</button></center>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- tours -->
<div id="tours" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-flash"></span> Post Conference Tour Details</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;">
					<p>Please indicate which tour you wish to participate in. <br/><br/>
					<h5><b>Tour 1: Friday 12th August 2016. Time:-14:00-18:00.</b></h5>
					<b>Cost:</b> Free*<br/>
					Kumasi Cultural Museum:-Manhyia<br/>
					Kente Village-Bonwire<br/><br/>

					<h5><b>Tour 2: Saturday 13th August 2016: Time 06:00-16:30</b></h5>

					<!-- Coconut Groove Beach Resort - $120  <br/>
					Elmina Beach Resort - $180<br/><br/>

					Travel to Cape Coast, <br/>
					Tour of Cape Coast Castle, <br/>
					Tour of National Park and Lunch<br/>
					Return to Accra, 16:30<br/><br/>

					<h5><b>Tour 2B: Friday 12thTime 14:00-18:00-Saturday 13th Time 08:00-14:00</b></h5>
					Coconut Groove Beach Resort - $120 <br/> 
					Elmina Beach Resort - $180<br/><br/>

					Travel to Cape Coast, <br/>
					Accommodation in Cape Coast<br/>
					Tour of Cape Coast Castle, <br/>
					Tour of National Park and Lunch<br/>
					Return to Accra: 14:00<br/> -->
					<table class="table table-bordered table-hover">
					<thead>
					<tr><th>Category</th><th>Cost</th></tr>
					</thead>
					<tbody>
					<tr><td><b>Local Participants</b></td><td>GH&cent;360</td></tr>
					<tr><td><b>International Participants</b></td><td>$180</td></tr>
					</tbody>
					</table>
					<p><b>The cost includes</b>:<br/> 
					Transportation to Cape Coast, <br/>
					Accommodation in Cape Coast<br/>
					Tour of Cape Coast Castle, <br/>
					Tour of Kakum National Park and Lunch<br/>
					Return to Accra: 14:00</p>
					</p><br/>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>




<!-- modal for hotels -->
<div id="hotels" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-flash"></span> Hotels</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin-right: 15px;">
				<div class="col-md-3">
					<button type="button" id="lamerta" class="btn btn-md btn-success" style="background-color: #7a1e21; color: #fff;"><span class="glyphicon glyphicon-plus"></span> Royal Lamerta hotel</button>
				</div>
				<div class="col-md-3">
					<button type="button" id="max" class="btn btn-md btn-success" style="background-color: #7a1e21; color: #fff;"><span class="glyphicon glyphicon-plus"></span> Sir Max hotel</button>
				</div>
				<div class="col-md-3">
					<button type="button" id="villa" class="btn btn-md btn-success" style="background-color: #7a1e21; color: #fff;"><span class="glyphicon glyphicon-plus"></span> Bani Villa hotel</button>
				</div>
				<div class="col-md-3">
					<button type="button" id="brunei" class="btn btn-md btn-success" style="background-color: #7a1e21; color: #fff;"><span class="glyphicon glyphicon-plus"></span> International Students Hostel</button>
				</div>
				</div>
				<div class="row" id="dispInfo" style="margin: 15px;"></div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function(){
        $('#lamerta').click(function(){
        $('#dispInfo').html('<div class=\'row\'><h3><center>Royal Lamerta Hotel</center></h3><div class=\'col-md-8\'><p><center><img class=\'img-thumbnail\' src=\'banners/lamerta.jpg\' /></center></p></div><div class=\'col-md-4\'><p><ul><li>3 Star Hotel</li><li>Twin deluxe</li><li>Plush Executive Rooms and Suite</li><li>400 seat Conference Room</li><li>31 Comfortable Rooms</li><li>Internet Access</li><li>Restaurant</li><li>Gym/Massage Swimming Pool</li><li>Spacious Car Park</li><li>Cocktail/Garden Park</li><li>Space for outdoor acitvities</li><li>Standby Generator</li><li>Live Band</li><li>DSTV</li><li>20 minutes from Conference Center</li><li>$75/night</li></ul></p></div></div><div class=\'row\'><p>The Royal Lamerta hotel has 31 standard twin deluxe, executive rooms and suite. Each room is well equipped with amenities to enrich a guest\'s living experience. Each room has a work desk featuring broadband internet access to help guests stay connected, whilst in the midst of comfort. Plush interiors, satellite TV, mini bar, as well as electronic monitoring system all help to enhance guests comfort levels during their stay. A 24-hour personalized and efficient room service ensures a feeling of pure comfort and luxury. Well crafted fountains provides soothing to the senses.</p><p>For a good workout, there is a state-of-the-art fitness centre with the latest equipment where qualified instructors are at hand to guide guests through their fitness regime. To unwind after a stressful day, guests could just immerse themselves in the comfort of the hotel\'s large outdoor swimming pool. Guests could treat themselves to an exotic collection of tender meats, exquisite salads and tantalizing desserts from the restaurant against the backdrop of the hotel\'s relaxing pool and garden.</p><p>.The hotel\'s experienced and highly trained staff ensures that it provides services of the highest quality and reliability for its cherished guests. Whatever the lure, Royal Lamerta Hotel offers unsurpassed facilities to fulfill your desire of a stylish and exciting gateway. <br/><em><b>Royal Lamerta Hotel, Your World at one place</b></em> </p></div>');
    });

    $('#max').click(function(){
        $('#dispInfo').html('<div class=\'row\'><h3><center>Sir Max Hotel</center></h3><div class=\'col-md-8\'><p><center><img class=\'img-thumbnail\' src=\'banners/sirmax.jpg\' style=\'width: 700px; height: 400px\'/></center></p></div><div class=\'col-md-4\'><p><ul><li>3 Star Hotel</li><li>Rooms</li><li>Restaurant</li><li>Conference Hall/Meeting Room/Banquet Hall</li><li>Coffee Shop</li><li>Souvenir/Gift Shop</li><li>Terrace Bar</li><li>Car Park</li><li>Back-Up Generator</li><li>First Aid Kit</li><li>Wifi/Internet Access</li><li>Swimming Pool</li><li>20 minutes from Conference Center</li><li>$80/night</li></ul></p></div></div><div class=\'row\'><p>Established in 1991, Sir Max Hotel has promoted itself as one of the finest hotel in the region; having been adjudged on several occasions as the Hotel of the Year in the Ashanti Region by the Ghana Tourist Authority. Strategically located in the serene environment of Ahodwo, Kumasi. Sir Max Hotel offers excellent services with each room equipped with all facilities one would need a comfortable stay. Our accommodation, restaurant, bar, conference and swimming pool offer efficient services making sure our guests experience one of the best in hospitality. As it goes on its aim to provide the best service in the hospitality industry, Sir Max Hotel has gained the following awards from Ghana Tourism Authority;</p><p><ol><li>Bronze Award for Hotel of Year - 2008</li><li>Outstanding Service for Tourism Development and Promotion - 2005</li><li>Hotel of the Year - 1997</li><li>Marketing Campaign of the Year - 1997</li><li>Outstanding Tourism Investment - 1994</li></p></div>');
    });

    $('#villa').click(function(){
        $('#dispInfo').html('<div class=\'row\'><h3><center>Bani Villa Hotel</center></h3><p><ul><li>Air conditioned</li><li>Self contained apartment with kitchenette</li><li>Twin Bed</li><li>5 minutes from Conference Center</li><li>GH&cent; 80/night</li></ul></p></div>');
    });

    $('#brunei').click(function(){
        $('#dispInfo').html('<div class=\'row\'><h3><center>International Students Hostel</center></h3><p><ul><li>Self contained rooms</li><li>5 minutes from Conference Center</li><li>GH&cent; 30/night</li></ul></p></div>');
    });

    });
</script>

<!-- end of hotels modal -->



<!--settings -->
<div id="settings" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21; color: #fff;">
				<h3 class="panel-title" style="font-size: 15px; color: #fff;"><center><span class="glyphicon glyphicon-cog"></span> User Settings</center></h3>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<center><a href="?changepwd" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-lock"></span> Change Password</a></center>
					</div>
					<div class="col-md-6">
					<center><a href="?editdetails" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit Profile Details</a></center>
					</div>
				</div>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- home -->
<div id="home" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-home"></span> Home</h3></center>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 5px;">
					<div class="col-md-4">
						<a href="?banners" class="btn btn-md btn-default" style="width: 100%; background-color: #c0c0c0; color: #fff;"><span class="glyphicon glyphicon-picture"></span> Banners</a>
					</div>
					<div class="col-md-4">
						<a href="?content" class="btn btn-md btn-primary" style="width: 100%;"><span class="glyphicon glyphicon-info-sign"></span> Brief Content</a>
					</div>
					<div class="col-md-4">
					<a href="?featurednews" class="btn btn-md btn-success" style="width: 100%;"><span class="glyphicon glyphicon-comment"></span> Featured News</a>
					</div>
				</div><!-- end of row -->
				<div class="row" style="margin: 5px;">
					<div class="col-md-4">
					<a href="?happenings" class="btn btn-md btn-info" style="width: 100%;"><span class="glyphicon glyphicon-comment"></span> News/Happenings</a>
					</div>
					<div class="col-md-4">
						<a href="?photos" class="btn btn-md btn-warning" style="width: 100%;"><span class="glyphicon glyphicon-picture"></span> Latest Photos</a>
					</div>
					<div class="col-md-4">
						<a href="?world" class="btn btn-md btn-danger" style="width: 100%;"><span class="glyphicon glyphicon-globe"></span> Around the World</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div><!-- end of home -->


<!-- about us -->
<div id="about" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-info-sign"></span> About Us</h3></center>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div><!-- end of about us -->

<!-- membership -->
<div id="membership" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header" style="background-color: #7a1e21;">
			<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-user"></span> Membership </h3></center>
		</div>
		<div class="modal-body">
			<div class="row" style="margin: 5px;">
				<div class="col-md-6">
					<center><a href="?registeredMembers" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-user"></span> Registered Members</a></center>
				</div>
				<div class="col-md-6">
				<center><a href="?activeMembers" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-user"></span> Active Sessions (Members)</a></center>
				</div>
			</div>
		</div>
		<div class="modal-footer">

		</div>
	</div>
</div>
</div><!-- end of membership -->

<!-- news/Events -->
<div id="news" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-comment"></span> News/Events</h3></center>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div><!-- end of news/events -->


<!-- resources -->
<div id="resources" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-briefcase"></span> Resources</h3></center>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 5px;">
					<div class="col-md-4">
						<a href="?gallery" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-picture"></span> Gallery</a>
					</div>
					<div class="col-md-4">
					<a href="?videos" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-facetime-video"></span> Videos</a>
					</div>
					<div class="col-md-4">
					<a href="?downloads" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-download"></span> Downloads</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div><!-- end of resources -->


<!-- contact us -->
<div id="contact" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #7a1e21;">
				<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-earphone"></span> Contact Us</h3></center>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){

		//editing brief content
		$('#briefmessage').jqte();
		$('#briefmessagenews').jqte();
		$('#briefmessage1').jqte();

		$('#verifyAuth').click(function(){
			//alert('working');
			var authcode=$('#authCode').val();
			$.post('includes/ajax.php',{'authcode':authcode},function(data){
				if(data==1){
					$('#authRes').html('<center><span class=\'alert alert-success alert-sm\' role=\'alert\'>Verification successful...</span></center>').fadeOut(5000);
					window.location.assign('?register&aygec2016edit');
				}else{
					$('#authRes').html('<center><span class=\'alert alert-danger alert-sm\' role=\'alert\'>Authentication failed...</span></center>').fadeOut(5000);
				}
			});
		});
	});
function showMyImage1(fileInput,id) {
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
 //loading news content
 function loadNewsContent(id){
 	var newsid=id;
 	if(id==" "){
 		$('#encd').show();	
 	}else{
 		$('#encd').hide();
 	}
 }
</script>