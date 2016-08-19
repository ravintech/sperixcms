<div class="row">
<br/>
</div>
<div class="row">
<!-- change password -->
	<div class="col-md-8">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #7a1e21;">
					<h3 style="color: #fff; font-size: 15px;" class="panel-title"><center><span class="glyphicon glyphicon-lock"></span> Change Account Password</center></h3>
				</div>

				<div class="modal-body">
					<div class="row" id="chpwdRes">
						<?php 
						if(isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['newpass1'])){ 
							$result=$this->updatePass($_SESSION['gtmember'],$_POST['oldpass'],$_POST['newpass'],'gssmembership');
							if($result==1){
								unset($_SESSION['gtmember']);
								echo "<script>
									$('#chpwdRes').html('<center><span class=\'alert alert-success\' role=\'alert\'> Password Updated successfully!!!</span></center>').fadeOut(5000);
									window.location.assign('?logout');
									</script>";
							}else{
								echo "<br/><script>
									$('#chpwdRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'> Password Update failed..Try again!!</span></center>').fadeOut(5000);
									</script><br/>";
							}
							}
						?>
					</div>
					<form method="post" action="#" class="form" id="changpwdForm">
						<div class="form-group">
						<label for="oldpass"><span class="glyphicon glyphicon-lock"></span> Old Password:</label>
						<input type="password" id="oldpass" name="oldpass" placeholder="Old Password" class="form-control" autofocus required>
						</div>
						<div class="form-group">
						<label for="newpass"><span class="glyphicon glyphicon-lock"></span> New Password:</label>
						<input type="password" id="newpass" name="newpass" placeholder="New Password" class="form-control" required>
						</div>
						<div class="form-group">
						<label for="newpass1"><span class="glyphicon glyphicon-lock"></span> Confirm New Password:</label>
						<input type="password" id="newpass1" name="newpass1" placeholder="Confirm New Password" class="form-control" required>
						</div>
						<center><button type="submit" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span> Update Password</button></center>
					</form>
				</div>

				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>

	<!-- chat -->
	<div class="col-md-4">
	<?php include "livechat.php"; ?>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#changpwdForm').bootstrapValidator({
			message: 'This is not valid',
			feedbackIcons:{
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields:{
				oldpass:{
					validators:{
						notEmpty:{
							message: 'Old Password can\'t be empty'
						},
						stringLength:{
							min: 5,
							max: 20,
							message: 'Invalid Password length'
						}
					}
				},
				newpass:{
					valiators:{
						notEmpty:{
							message: 'New Password can\'t be empty'
						},
						stringLength:{
							min: 5,
							max: 20,
							message: 'Invalid Password length'
						},
						identical:{
							field: 'newpass1',
							message: 'Passwords dont\'t match'
						}
					}
				},
				newpass1:{
					validators:{
						notEmpty:{
							message: 'Confirm New Password can\'t be empty'
						},
						stringLength:{
							min: 5,
							max: 20,
							message: 'Invalid Password length'
						},
						identical:{
							field: 'newpass',
							message: 'Passwords don\'t match'
						}
					}
				}
			}
		});
	});
</script>