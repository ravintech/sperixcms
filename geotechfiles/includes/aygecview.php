<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row" style="margin: 15px;">
<center><img src="../../banners/aygec2016.png" style="width: 70px; height: 70px;"></center>
</div>

<!-- main form registration for 5aygec -->
<div class="row" style="margin: 15px;">
<div class="row well">
	<?php 
		if(isset($_POST['registerMember'])){
			$memberData=$this->getaygecMember();
		}
	?>
	<div class="row" style="margin: 15px;">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="title">Title:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[1]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="lastName">Last Name:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[2]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="otherNames">Other Name(s):</label>
					<input type="text" class="form-control" value="<?php echo $memberData[3]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
		</div><!-- end of first row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="institution">Institutional Affiliation:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[4]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="position">Position:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[5]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
		</div><!-- end of second row -->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea class="form-control" id="address" name="address" placeholder="Address" style="background-color: #fff;" readonly required><?php echo $memberData[6]; ?></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="city">City:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[7]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="country">Country:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[8]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
		</div><!-- end of third row -->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="mobileNo">Phone Number:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[9]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="emailAddress">Email Address:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[10]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				<label for="cemailAddress">Email Address:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[10]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
		</div>
	</div><!-- end of first main row -->

	<div class="row well" style="margin: 15px;">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="travelDetail">Travel Details(Accra-Kumasi):</label>
					<input type="text" class="form-control" value="<?php echo $memberData[11]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="accDetail">Accommodation Details:</label>
					<input type="text" class="form-control" value="<?php echo $memberData[12]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					
				</div>
			</div>
		</div><!-- end of first row -->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="tour">Post Conference Tour?</label>
					<input type="text" class="form-control" value="<?php echo $memberData[13]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="presenting">Presenting?</label>
					<input type="text" class="form-control" value="<?php echo $memberData[14]; ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="category">Category of registration:</label>
					<input type="text" class="form-control" value="<?php echo ucwords($memberData[15]); ?>" style="background-color: #fff;" readonly>
				</div>
			</div>
		</div><!-- end of second row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="need">Any Special Need:</label>
					<textarea class="form-control" placeholder="Any Special Need" id="need" name="need" style="background-color: #fff;" readonly><?php 
							echo $memberData[16];
						?>
					</textarea>
				</div>
			</div>
			<div class="col-md-6">

			</div>
		</div>
	</div><!-- end of second main row -->

</div>
</div>
<!-- end of form registration -->


<!-- modal for hotels -->
<div id="hotels" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<!-- end of hotels modal -->


<?php 
$datam=$this->getNewsLinks2();
$data2=$datam;
$myD=date('Y');
echo "<script type=\"text/javascript\">
	$(function(){
		$('#mregister').html('<span class=\"glyphicon glyphicon-pencil\"></span> AYGEC ".$myD." REGISTRATION');
		$('#spotlightHeading').html('<span class=\"glyphicon glyphicon-envelope\"> </span><b> Latest News/Events</b>');
		$('#spotlightBody').html(' " . $data2 . " '); 
	}); 
	</script>";
?>

<script type="text/javascript">
	$.get('file/countries.txt',function(data){
			var lines = data.split('\n');
			var x='';
			$.each(lines, function(n , elem){
				x+='<option value=\''+elem+'\'>'+elem+'</option>';
			});
			$('#country').html(x);
		});
</script>