<?php 
$info=$this->getFullDetails($_SESSION['gtadmin'],"admin");
?>
<div class="row">
<br/>
</div>
<div class="row">
	<div class="col-md-8">
	<!-- defining modal for profile view -->
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #7a1e21; color: #fff;">
					<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-user"></span> User Profile</h3></center>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="fullname"><span class="glyphicon glyphicon-user"></span> Full Name:</label>
						<input type="text" class="form-control" value="<?php echo $info[0]; ?>" readonly/>
					</div>
					<div class="form-group">
						<label for="username"><span class="glyphicon glyphicon-user"></span> User Name:</label>
						<input type="text" class="form-control" value="<?php echo $info[1]; ?>" readonly/>
					</div>
					<div class="form-group">
						<label for="email"><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
						<input type="email" class="form-control" value="<?php echo $info[3]; ?>" readonly/>
					</div>
					<div class="form-group">
						<label for="mobilenumber"><span class="glyphicon glyphicon-earphone"></span> Mobile Number:</label>
						<input type="text" class="form-control" value="<?php echo $info[4]; ?>" readonly/>
					</div>
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