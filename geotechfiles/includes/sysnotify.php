<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<?php 
$info=$this->getFullDetails($_SESSION['gtadmin'],"admin");
?>
<div class="row">
<br/>
</div>
<div class="row">
	<div class="col-md-8">
	<!-- defining modal for profile view -->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: <?php echo $theme[2]; ?>; color: #fff;">
					<center><h3 class="panel-title" style="color: #fff;"><span class="glyphicon glyphicon-bell"></span> System Alerts/Notifications</h3></center>
				</div>

				<div class="modal-body">
					<table class="table table-hover table-bordered" id="transViewTable">
						<thead>
							<tr><th><center>Message</center></th><th><center>Date</center></th></tr>
						</thead>
						<tbody>
							<?php $this->loadSysNotify(); ?>
						</tbody>
					</table>		
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
<script type="text/javascript">
	$(function(){

		 $('#transViewTable').DataTable({
                responsive: true
        });
	});
</script>