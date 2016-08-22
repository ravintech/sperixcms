<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row">
<br/>
</div>
<div class="row" style="margin: 15px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: <?php echo $theme[2]; ?>; clor: #fff;">
				<h3 class="panel-title" style="color: #fff;"><center><span class="glyphicon glyphicon-user"></span> GGS Active Members</center></h3>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 15px;">
					
				</div>
				<div class="row" style="margin: 15px;">
				<table class="table table-bordered table-hover" id="transViewTable">
				<thead>
					<tr><th><center>No.</center></th><th><center>Full Name</center></th><th><center>Mobile Number</center></th><th><center>Email Address</center></th><th><center>Status</center></th></tr>
				</thead>
				<?php $this->genGGSActiveMembers(); ?>
				</table>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>	
</div>
<script type="text/javascript">
	$(function(){

		 $('#transViewTable').DataTable({
                responsive: true
        });
	});
</script>