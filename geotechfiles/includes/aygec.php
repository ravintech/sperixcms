<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row">
<br/><br/>
</div>

<div class="row" style="margin: 15px;">
	<legend><center><span class="glyphicon glyphicon-user"></span> Registered Members (5AYGEC 2016)</center></legend>
</div>


<div class="row" style="margin: 15px;">
				<div class="row" style="margin: 15px;">
					<center><a href="../../print.php?regmembers" target="_blank" class="tooltip-bottom" style="color: #000; font-size: 20px;" title="Print all registration forms"><span class="glyphicon glyphicon-print"></span></a> &nbsp;&nbsp;&nbsp; &nbsp;<button class="btn btn-xs btn-success tooltip-bottom" title="Download Excel(CSV) file" type="submit" name="gencsv" value="gencsv" onclick="window.open('gen.php?aygec')" /><span class="glyphicon glyphicon-download"></span>Download Excel CSV Sheet</button></center>
				</div>
				<div class="row" style="margin: 15px;">
				<table class="table table-bordered table-hover table-responsive" id="transViewTable" style="width: 100%">
				<thead>
					<tr><th><center>No.</center></th><th><center>Title</center></th><th><center>Last Name</center></th><th><center>Other Name(s)</center></th>
					<th><center>Institution</center></th><th><center>Country</center></th><th><center>Auth. Code</center></th><th></th></tr>
				</thead>
				<?php 
					if(isset($_POST['delete'])){
						$this->deleteAygecMember();
					}
				
					$this->genAygecRegMembers();
				
				?>
				</table>
				</div>
</div>
<script type="text/javascript">
	$(function(){

		 $('#transViewTable').DataTable({
                responsive: true
        });
	});
</script>