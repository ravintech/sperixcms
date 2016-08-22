<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<?php
	if(!isset($_SESSION['aygecmember'])){
		echo "<script>	
			window.location.assign('?register&aygec2016');
			</script>";
	}else{
		//getting data
		$data=$this->getMemberDetails($_SESSION['aygecmember']);
	}
?>
<div class="row" style="margin: 15px;">
<center><img src="banners/aygec2016.png" style="width: 70px; height: 70px;"></center>
</div>




<!-- main form registration for 5aygec -->
<div class="row" style="margin: 15px;">
<form method="post" action="#" class="form" id="aygecform">
	<?php 
		if(isset($_POST['registerMember'])){
			$this->updateaygecMember();
		}
	?> 
	<div class="row well" style="margin: 15px;">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="title">Title:</label>
					<select name="title" id="title" class="form-control" autofocus required>
						<option value="<?php echo $data[1]; ?>" selected><?php echo $data[1]; ?></option>
						<?php $this->getTitles(); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="lastName">Last Name:</label>
					<input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name" value="<?php echo $data[2]; ?>" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="otherNames">Other Name(s):</label>
					<input type="text" id="otherNames" name="otherNames" class="form-control" placeholder="Other Name(s)" value="<?php echo $data[3]; ?>" required/>
				</div>
			</div>
		</div><!-- end of first row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nationalsociety">National Society affiliated:</label>
					<input list="societies" id="nationalsociety" name="nationalsociety" class="form-control" placeholder="National Society Affiliated" value="<?php echo $data[4]; ?>" required/>
					<datalist id="societies">
						<option value="Ghana Geotechnical Society">Ghana Geotechnical Society</option>
					</datalist>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="institution">Institution/Company Name:</label>
					<input type="text" id="institution" name="institution" class="form-control" placeholder="Institution/Company Name" value="<?php echo $data[5]; ?>" required/>
				</div>
			</div>
		</div><!-- end of second row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="category">Category:</label>
			<select name="category" id="category" class="form-control" onclick="loadQualification(this.value)" required>
						<?php 
							if($data[6]=="corporate"){
								echo "<option value=\"corporate\" id=\"coporate\" selected>Corporate(Researcher/Practitioner)</option>";
								echo "<option value=\"student\" id=\"student\">Student</option>";
							}else{
								echo "<option value=\"student\" id=\"student\" selected>Student</option>";
								echo "<option value=\"corporate\" id=\"coporate\">Corporate(Researcher/Practitioner)</option>";
							}
						?>
			</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="qualification">Academic Qualification:</label>
					<select name="qualification" id="qualification" class="form-control" required>
						<?php 
							echo "<option value='".$data[7]."' selected>".$data[7]."</option>";
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea class="form-control" id="address" name="address" placeholder="Address" required><?php echo $data[8]; ?>
					</textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="city">City:</label>
					<input type="text" id="city" name="city" placeholder="City" class="form-control" required value="<?php echo $data[9]; ?>"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="country">Country:</label>
					<select id="country" name="country" placeholder="Country" onclick="checkContry(this.value)" class="form-control" required>
						<option value="<?php echo $data[10]; ?>"><?php echo $data[10];?></option>
					</select>
				</div>
			</div>
		</div><!-- end of third row -->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="mobileNo">Phone Number:</label>
					<input type="text" id="mobileNo" name="mobileNo" placeholder="Phone Number" class="form-control" required value="<?php echo $data[11]; ?>"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="emailAddress">Email Address:</label>
					<input type="email" id="emailAddress" name="emailAddress" placeholder="Email Address" class="form-control" required value="<?php echo $data[12]; ?>"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				<label for="cemailAddress">Email Address:</label>
					<input type="email" id="cemailAddress" name="cemailAddress" placeholder="Confirm Email Address" class="form-control" required value="<?php echo $data[12]; ?>"/>
				</div>
			</div>
		</div>
	</div><!-- end of first main row -->

	<div class="row well" style="margin: 15px;">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="travelDetail">Travel Details(Accra-Kumasi):</label>
					<select name="travelDetails" id="travelDetails" class="form-control" required>
							<option value="<?php echo $data[13]; ?>" selected><?php if($data[13]==null){
								echo "None";
								}else{
									echo $data[13];
									} ?></option>
						<!--  -->
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="arrivaltime">Arrival Time:</label>
					<input type="text" name="arrivaltime" id="arrivaltime"  class="form-control dateBirth" placeholder="Arrival Time" value="<?php echo $data[14]; ?>"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="departuretime">Departure Time:</label>
					<input type="text" name="departuretime" id="departuretime" class="form-control dateBirth" placeholder="Departure Time" value="<?php echo $data[15]; ?>"/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="accDetail">Accommodation Details:</label>
					<select name="accDetail" id="accDetail" class="form-control" required>
					<option value="<?php echo $data[16]; ?>"><?php echo $data[16]; ?></option>
					<option value="Self Accommodation">Self Accommodation</option>
					<?php $this->listHostels(); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<center><a href="#hotels" data-toggle="modal" class="btn btn-info btn-xs" style="margin-top: 25px; border-radius: 20px; -webkit-border-radius: 20px; -moz-border-radius: 20px;"><span class="glyphicon glyphicon-eye-open"></span> View Hotels</a></center>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="presenting">Presenting?</label>
					<select name="presenting" id="presenting" name="presenting" class="form-control" required placeholder="Presenting">
						<?php
							if($data[17]=="Yes"){
								echo "<option value=\"Yes\" selected>Yes</option>";
								echo "<option value=\"No\">No</option>";
							}else{
								echo "<option value=\"Yes\">Yes</option>";
								echo "<option value=\"No\" selected>No</option>";
							}	
						?>
					</select>
				</div>
			</div>
		</div><!-- end of first row -->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="tour">Post Conference Tour 1(Free):</label>
					<select name="tour" id="tour" class="form-control" required>
						<?php
							if($data[18]=="1"){
								echo "<option value=\"1\" selected>Yes</option>";
								echo "<option value=\"0\">No</option>";
							}else{
								echo "<option value=\"1\">Yes</option>";
								echo "<option value=\"0\" selected>No</option>";
							}	
						?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="tour2">Post Conference Tour 2:</label>
					<select name="tour2" id="tour2" class="form-control" required>
						<?php
							if($data[19]=="1"){
								echo "<option value=\"1\" selected>Yes</option>";
								echo "<option value=\"0\">No</option>";
							}else{
								echo "<option value=\"1\">Yes</option>";
								echo "<option value=\"0\" selected>No</option>";
							}	
						?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<!-- <label for="category">Category of registration:</label>
					<select name="category" id="category" class="form-control" required>
						<option value="corporate">Corporate</option>
						<option value="student">Student</option>
					</select> -->
					<center><a href="#tours" data-toggle="modal" class="btn btn-info btn-xs" style="margin-top: 25px; border-radius: 20px; -webkit-border-radius: 20px; -moz-border-radius: 20px;"><span class="glyphicon glyphicon-eye-open"></span> View Tour Details</a></center>
				</div>
			</div>
		</div><!-- end of second row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="need">Any Special Need:</label>
					<textarea class="form-control" placeholder="Any Special Need" id="need" name="need"><?php echo $data[20]; ?></textarea>
				</div>
			</div>
			<div class="col-md-6">

			</div>
		</div>
	</div><!-- end of second main row -->

	<div class="row" style="margin: 15px;">
		<center><button type="submit" name="registerMember" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span> Update Details</button></center>
	</div>
</form>
</div>
<!-- end of form registration -->




<?php 
$datam=$this->getNewsLinks2();
$data2=$datam;
$myD=date('Y');
echo "<script type=\"text/javascript\">
	$(function(){
		$('#mregister').html('<span class=\"glyphicon glyphicon-pencil\"></span> AYGEC ".$myD." (EDIT REGISTRATION DETAILS)');
		$('#spotlightHeading').html('<span class=\"glyphicon glyphicon-envelope\"> </span><b> Latest News/Events</b>');
		$('#spotlightBody').html(' " . $data2 . " '); 
	}); 
	</script>";
?>

<script type="text/javascript">


//checking country and disabling fields
function checkContry(x){
	var country=x;
	if(country=='Ghana'){
//travelDetails,arrivaltime,departuretime
		document.getElementById('travelDetails').setAttribute('readonly','');
		document.getElementById('arrivaltime').setAttribute('readonly','');
		document.getElementById('departuretime').setAttribute('readonly','');
	}else{
		document.getElementById('travelDetails').removeAttribute('readonly');
		document.getElementById('arrivaltime').removeAttribute('readonly');
		document.getElementById('departuretime').removeAttribute('readonly');
	}
}


function loadQualification(x){
	var category=x;
	if(category=='corporate'){
			$('#qualification').html('<option value=\'BSc\'>BSc</option><option value=\'MSc\'>MSc</option><option value=\'MPhil\'>MPhil</option><option value=\'PhD\'>PhD</option><option value=\'Prof\'>Prof</option>');
	}else{
		$('#qualification').html('<option value=\'Undergraduate\'>Undergraduate</option><option value=\'MSc Student\'>MSc Student</option><option value=\'MPhil Student\'>MPhil Student</option><option value=\'PhD Candidate\'>PhD Candidate</option>');
	}
}
	var country=$('#country').html();

	$.get('file/countries.txt',function(data){
			var lines = data.split('\n');
			var x='';
			$.each(lines, function(n , elem){
				x+='<option value=\''+elem+'\'>'+elem+'</option>';
			});
			$('#country').html(country+x);
		});
	var q=$('#qualification').html();
$('#qualification').html(q+'<option value=\'BSc\'>BSc</option><option value=\'MSc\'>MSc</option><option value=\'MPhil\'>MPhil</option><option value=\'PhD\'>PhD</option><option value=\'Prof\'>Prof</option>option value=\'Undergraduate\'>Undergraduate</option><option value=\'MSc Student\'>MSc Student</option><option value=\'MPhil Student\'>MPhil Student</option><option value=\'PhD Candidate\'>PhD Candidate</option>');
	

	var countryN=$('#country').val();
	if(countryN=='Ghana'){
//travelDetails,arrivaltime,departuretime
		document.getElementById('travelDetails').setAttribute('readonly','');
		document.getElementById('arrivaltime').setAttribute('readonly','');
		document.getElementById('departuretime').setAttribute('readonly','');
	}else{
		document.getElementById('travelDetails').removeAttribute('readonly');
		document.getElementById('arrivaltime').removeAttribute('readonly');
		document.getElementById('departuretime').removeAttribute('readonly');
	}

	var travel=$('#travelDetails').html();
	$('#travelDetails').html(travel+'<option value=\'Air\'>Air</option><option value=\'Bus\'>Bus</option>');

</script>