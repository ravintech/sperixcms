<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<?php 
$info=$this->getFullDetails($_SESSION['gtmember'],"gssmembership");
?>
<div class="row">
<br/>
</div>
<div class="row">
	<div class="col-md-8">
	<!-- defining modal for profile view -->
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header" style="background-color: <?php echo $theme[2]; ?>; color: #fff;">
					<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-user"></span> Edit User Profile</h3></center>
				</div>

				<div class="modal-body">
				<div class="row" id="profileEditRes">
				<?php
					if(isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['mobileNo'])){
						$this->updateGssProfile($_POST['username'],$_POST['fullname'],$_POST['email'],$_POST['mobileNo']);
					}
				?>
				</div>
				<form method="post" action="#" class="form">
					<div class="form-group">
						<label for="fullname"><span class="glyphicon glyphicon-user"></span> Full Name:</label>
						<input type="text" name="fullname" class="form-control" value="<?php echo $info[3]; ?>" autofocus required/>
					</div>
					<div class="form-group">
						<label for="username"><span class="glyphicon glyphicon-user"></span> User Name:</label>
						<input type="text" name="username" class="form-control" value="<?php echo $info[1]; ?>" readonly/>
					</div>
					<div class="form-group">
						<label for="email"><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
						<input type="email" name="email" class="form-control" value="<?php echo $info[7]; ?>" required/>
					</div>
					<div class="form-group">
						<label for="mobilenumber"><span class="glyphicon glyphicon-earphone"></span> Mobile Number:</label>
						<input type="text" name="mobileNo" class="form-control" value="<?php echo $info[6]; ?>" required/>
					</div>
					<center><button type="submit" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span> Update Profile</button></center>
				</form>

				</div>

				<div class="modal-footer">

				</div>
			</div>
		</div>
	<!--  -->
	</div>

	<div class="col-md-4">
	<?php include "livechat.php"; ?>
	</div>
</div>