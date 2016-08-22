<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row">
<br/><br/><br/>
</div>



<div class="row" style="margin: 15px;">
	<center><legend><span class="glyphicon glyphicon-user"></span> GGS Registered Members</legend></center>
</div>

<div class="row">
	<center><button class="btn btn-xs btn-success tooltip-bottom" title="Download Excel(CSV) file" type="submit" name="gencsv" value="gencsv" onclick="window.open('gen.php?ggsmembers')" /><span class="glyphicon glyphicon-download"></span>Download Excel CSV Sheet</button></center>
</div>

<div class="row" style="margin: 15px;">
				<table class="table table-bordered table-stripped table-hover" id="transViewTable">
				<thead>
					<tr><th><center>No.</center></th><th><center>Full Name</center></th><th><center>Mobile Number</center></th><th><center>Email Address</center></th><th></th></tr>
				</thead>
				<?php
					if(isset($_POST['deleteggsmember'])){
						$this->deleteggsmember($_POST['deleteggsmember']);
					}else{ 
						$this->genGGSRegMembers(); 
					}
				?>
				</table>
</div>
<script type="text/javascript">
	$(function(){

		 $('#transViewTable').DataTable({
                responsive: true
        });
	});
</script>