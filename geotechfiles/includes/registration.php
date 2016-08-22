<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row" style="margin: 15px;">
<table class="table">
<legend><center><h4>This form should be completed by Individuals/Students/Firms at the appropriate sections</center></h4></legend>
<form method="post" action="#" class="form">

<!-- login credentials -->
<div class="row" style="margin: 15px;">
<h3 class="btn btn-md" style="background-color: <?php echo $theme[2]; ?>; color: #fff; border-radius: 20px; -moz-border-radius: 20px; -webkit-border-radius: 20px;"><span class="glyphicon glyphicon-log-in"></span> Log In Credentials</h3>
</div>
<div class="row well" style="margin: 15px;">
	<div class="col-md-4">
	<div class="form-group">
	<label for="username">User Name:</label>
	<input type="text" id="username" name="username" class="form-control" placeholder="User Name" required autofocus/>
	</div>
	</div>

	<div class="col-md-4">
	<div class="form-group">
	<label for="password">Password:</label>
	<input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
	</div>
	</div>

	<div class="col-md-4">
	<div class="form-group">
	<label for="password1">Confirm Password:</label>
	<input type="password" id="password1" name="password1" class="form-control" placeholder="Confirm Password" required/>
	</div>
	</div>
</div>
<!-- end of login credentials -->


<div class="row" style="margin: 15px;">
<h3 class="btn btn-md" style="background-color: <?php echo $theme[2]; ?>; color: #fff; border-radius: 20px; -moz-border-radius: 20px; -webkit-border-radius: 20px;"><span class="glyphicon glyphicon-user"></span> Personal/Firm Information</h3>
</div>
<!-- personal/firm information -->
<div class="row well" style="margin: 15px;">
	<div class="col-md-4">
	<div class="form-group">
	<label for="fullname">Full Name:</label>
	<input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" required/>
	</div>

	<div class="form-group">
	<label for="mobileNo">Telephone/Mobile Number:</label>
	<input type="text" id="mobileNo" name="mobileNo" placeholder="Telephone/Mobile Number" class="form-control" required/>
	</div>

	<div class="form-group">
	<label for="nationality">Nationality:</label>
	<select id="nationality" name="nationality" class="form-control" required>
	
	</select>
	</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="membershiptype">Membership Type:</label>
			<select class="form-control" id="membershiptype" name="membershiptype" required>
				<?php $this->loadMembershipType(); ?>
			</select>
		</div>
		<div class="form-group">
			<label for="emailAddress">Email Address:</label>
			<input type="email" id="emailAddress" name="emailAddress" placeholder="Email Address" class="form-control" required/>
		</div>
		<div class="form-group">
			<label for="employerCompany">Employer/Company:</label>
			<input type="text" id="employerCompany" name="employerCompany" placeholder="Employer/Company" class="form-control" required/>
		</div>
	</div> 

	<div class="col-md-4">
		<div class="form-group">
			<label for="postaladdress">Postal Address:</label>
			<textarea class="form-control" id="postaladdress" name="postaladdress" placeholder="Postal Address" required></textarea>
		</div>
		<div class="form-group">
			<label for="gender">Gender:</label>
			<select id="gender" name="gender" class="form-control" required>
			<?php $this->loadGender(); ?>
			</select>
		</div>
		<div class="form-group">
			<label for="employerCompanyAddress">Employer/Company Address:</label>
			<textarea id="employerCompanyAddress" name="employerCompanyAddress" class="form-control" placeholder="Employer/Company Address" required></textarea>
		</div>
	</div>
	
</div><!-- end of personal/firm information -->



<div class="row" style="margin: 15px;">
<h3 class="btn btn-md" style="background-color: <?php echo $theme[2]; ?>; color: #fff; border-radius: 20px; -moz-border-radius: 20px; -webkit-border-radius: 20px;"><span class="glyphicon glyphicon-education"></span> Educational Background</h3>
</div>
<!-- educational background -->
<div class="row well" style="margin: 15px;">
	<div class="col-md-4">
		<div class="form-group">
			<label for="university1">University 1:</label>
			<input type="text" id="university1" name="university1" class="form-control" placeholder="University 1"/>
		</div>
		<div class="form-group">
			<label for="university2">University 2:</label>
			<input type="text" id="university2" name="university2" class="form-control" placeholder="University 2"/>
		</div>
		<div class="form-group">
			<label for="university3">University 3:</label>
			<input type="text" id="university3" name="university3" class="form-control" placeholder="University 3"/>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="year1">Year of Completion:</label>
			<input type="number" min='1800' max='<?php echo date('Y'); ?>' id="year1" name="year1" class="form-control" placeholder="Year of Completion"/>
		</div>
		<div class="form-group">
			<label for="year2">Year of Completion:</label>
			<input type="number" min='1800' max='<?php echo date('Y'); ?>' id="year2" name="year2" class="form-control" placeholder="Year of Completion"/>
		</div>
		<div class="form-group">
			<label for="year3">Year of Completion:</label>
			<input type="number" min='1800' max='<?php echo date('Y'); ?>' id="year3" name="year3" class="form-control" placeholder="Year of Completion"/>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="qualify1">Academic Qualification:</label>
			<select class="form-control" id="qualify1" name="qualify1" placeholder="Academic Qualification">
				<option value=" ">None</option>
				<?php $this->genQualifications(); ?>
			</select>
		</div>
		<div class="form-group">
			<label for="qualify2">Academic Qualification:</label>
			<select class="form-control" id="qualify2" name="qualify2" placeholder="Academic Qualification">
				<option value=" ">None</option>
				<?php $this->genQualifications(); ?>
			</select>
		</div>
		<div class="form-group">
			<label for="qualify3">Academic Qualification:</label>
			<select class="form-control" id="qualify3" name="qualify3" placeholder="Academic Qualification">
				<option value=" ">None</option>
				<?php $this->genQualifications(); ?>
			</select>
		</div>
	</div>
</div><!-- end of educational background -->




<div class="row" style="margin: 15px;">
<h3 class="btn btn-md" style="background-color: <?php echo $theme[2]; ?>; color: #fff; border-radius: 20px; -moz-border-radius: 20px; -webkit-border-radius: 20px;"><span class="glyphicon glyphicon-wrench"></span> Professional Information</h3>
</div>
<!-- professional Information -->
<div class="row well" style="margin: 15px;">
	<div class="col-md-4">
		<div class="form-group">
			<label for="workplace">Workplace:</label>
			<input type="text" id="workplace" name="workplace" class="form-control" placeholder="Work Place"/>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="ghiemember">GhIE Membership:</label>
			<select id="ghiemember" name="ghiemember" class="form-control" placeholder="GhIE Membership">
				<option value="1">Yes</option>
				<option value="0">No</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="ghieno">GhIE No.:</label>
			<input type="text" id="ghieno" name="ghieno" class="form-control" placeholder="GhIE No."/>
		</div>
	</div>
</div><!-- end of professional information -->

<div class="row" style="margin: 15px;"><br/></div>

<div class="row" style="margin: 15px;">
	<center><button type="submit" class="btn btn-sm btn-success" name="addGGSMember" style="border-radius: 15px; -moz-border-radius: 15px; -webkit-border-radius: 15px;"><span class="glyphicon glyphicon-plus"></span> Submit Details</button></center>
</div>

</form>
</table>
</div>
<?php
	if(isset($_POST['addGGSMember'])){
		$this->addGGSMember();
	}
?>
<script type="text/javascript">
	$(function(){
		$.get('file/nationality.txt',function(data){
			var lines = data.split('\n');
			var x='';
			$.each(lines, function(n , elem){
				x+='<option value=\''+elem+'\'>'+elem+'</option>';
			});
			$('#nationality').html(x);
		});
	});
</script>