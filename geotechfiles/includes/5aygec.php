<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row" style="margin: 15px;">
<center><img src="banners/aygec2016.png" style="width: 70px; height: 70px;"></center>
</div>


<div class="row" style="margin: 15px;">
<br/>
<center><a href="#editaygec" data-toggle="modal" class="btn btn-xs btn-warning" style="broder-radius: 20px; -webkit-border-radius: 20px; -moz-border-radius: 20px;"><span class="glyphicon glyphicon-pencil"></span> Edit Details</a></center><br/>
</div>

<!-- main form registration for 5aygec -->
<div class="row" style="margin: 15px;">
<form method="post" action="#" class="form" id="aygecform">
	<div class="row well" style="margin: 15px;">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="title">Title:</label>
					<select name="title" id="title" class="form-control" autofocus required>
						<?php $this->getTitles(); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="lastName">Last Name:</label>
					<input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="otherNames">Other Name(s):</label>
					<input type="text" id="otherNames" name="otherNames" class="form-control" placeholder="Other Name(s)" required/>
				</div>
			</div>
		</div><!-- end of first row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nationalsociety">National Society affiliated:</label>
					<input list="societies" id="nationalsociety" name="nationalsociety" class="form-control" placeholder="National Society Affiliated" required/>
					<datalist id="societies">
						<option value="Ghana Geotechnical Society">Ghana Geotechnical Society</option>
					</datalist>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="institution">Institution/Company Name:</label>
					<input type="text" id="institution" name="institution" class="form-control" placeholder="Institution/Company Name" required/>
				</div>
			</div>
		</div><!-- end of second row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="category">Category:</label>
			<select name="category" id="category" class="form-control" onclick="loadQualification(this.value)" required>
						<option value="corporate" id="coporate">Corporate(Researcher/Practitioner)</option>
						<option value="student" id="student">Student</option>
			</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="qualification">Academic Qualification:</label>
					<select name="qualification" id="qualification" class="form-control" required>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea class="form-control" id="address" name="address" placeholder="Address" required></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="city">City:</label>
					<input type="text" id="city" name="city" placeholder="City" class="form-control" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="country">Country:</label>
					<select id="country" name="country" placeholder="Country" onclick="checkContry(this.value)" class="form-control" required>
					</select>
				</div>
			</div>
		</div><!-- end of third row -->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="mobileNo">Phone Number:</label>
					<input type="text" id="mobileNo" name="mobileNo" placeholder="Phone Number" class="form-control" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="emailAddress">Email Address:</label>
					<input type="email" id="emailAddress" name="emailAddress" placeholder="Email Address" class="form-control" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				<label for="cemailAddress">Email Address:</label>
					<input type="email" id="cemailAddress" name="cemailAddress" placeholder="Confirm Email Address" class="form-control" required/>
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
						<option value=" ">None</option>
						<option value="Bus">Bus</option>
						<option value="Air">Air</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="arrivaltime">Arrival Time:</label>
					<input type="text" name="arrivaltime" id="arrivaltime"  class="form-control dateBirth" placeholder="Arrival Time"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="departuretime">Departure Time:</label>
					<input type="text" name="departuretime" id="departuretime" class="form-control dateBirth" placeholder="Departure Time"/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="accDetail">Accommodation Details:</label>
					<select name="accDetail" id="accDetail" class="form-control" required>
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
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
			</div>
		</div><!-- end of first row -->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="tour">Post Conference Tour 1(Free):</label>
					<select name="tour" id="tour" class="form-control" required>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="tour2">Post Conference Tour 2:</label>
					<select name="tour2" id="tour2" class="form-control" required>
						<option value="1">Yes</option>
						<option value="0">No</option>
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
					<textarea class="form-control" placeholder="Any Special Need" id="need" name="need"></textarea>
				</div>
			</div>
			<div class="col-md-6">

			</div>
		</div>
	</div><!-- end of second main row -->

	<div class="row" style="margin: 15px;">
		<center><button type="submit" name="registerMember" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus"></span> Submit</button></center>
	</div>
</form>
</div>
<!-- end of form registration -->


<?php 
		if(isset($_POST['registerMember'])){
			$this->addaygecMember();
		}
?> 

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

	$.get('file/countries.txt',function(data){
			var lines = data.split('\n');
			var x='';
			$.each(lines, function(n , elem){
				x+='<option value=\''+elem+'\'>'+elem+'</option>';
			});
			$('#country').html(x);
		});
$('#qualification').html('<option value=\'BSc\'>BSc</option><option value=\'MSc\'>MSc</option><option value=\'MPhil\'>MPhil</option><option value=\'PhD\'>PhD</option><option value=\'Prof\'>Prof</option>');
	
</script>

<!-- validation script -->
<script type="text/javascript">
	$(function(){
		$('#aygecform').bootstrapValidator({
  message: 'This is not valid',
  feedbackIcons:{
    valid: 'glyphicon glyphicon-ok',
    invalid: 'glyphicon glyphicon-remove',
    validating: 'glyphicon glyphicon-refresh'
  },
  fields:{
   	/*title,lastName,otherNames,nationalsociety,institution,category,qualification,address,city,country,mobileNo,emailAddress,cemailAddress,travelDetails,arrivaltime,departuretime,accDetail,presenting,tour,tour2,need*/
   	title:{
   		validators:{
   			notEmpty:{
   				message: 'Title can\'t be empty'
   			},
   			stringLength:{
   				min: 1,
   				max: 5,
   				message: 'Invalid input length'
   			},
   			regexp:{
   				regexp: /^[a-zA-Z]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	lastName:{
   		validators:{
   			notEmpty:{
   				message: 'Last Name can\'t be empty'
   			},
   			stringLength:{
   				min: 5,
   				max: 20,
   				message: 'Invalid input length'
   			},
   			regexp:{
   				regexp: /^[a-zA-Z\_\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	otherNames:{
   		validators:{
   			notEmpty:{
   				message: 'Other Name(s) can\'t be empty'
   			},
   			stringLength:{
   				min: 5,
   				max: 50,
   				message: 'Invalid input length'
   			},
   			regexp:{
   				regexp: /^[a-zA-Z\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	nationalsociety:{
   		validators:{
   			notEmpty:{
   				message: 'National Society can\'t be empty'
   			},
   			stringLength:{
   				min: 5,
   				max: 100,
   				message: 'Invalid input length'
   			},
   			regexp:{
   				regexp: /^[a-zA-Z\-\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	institution:{
   		validators:{
   			notEmpty:{
   				message: 'Insitution can\'t be empty'
   			},
   			stringLength:{
   				min: 5,
   				max: 100,
   				message: 'Invalid input length'
   			},
   			regexp:{
   				regexp: /^[a-zA-Z\-\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	category:{
   		validators:{
   			notEmpty:{
   				message: 'Category can\'t be empty'
   			}
   		}
   	},
   	qualification:{
   		validators:{
   			notEmpty:{
   				message: 'Qualification can\'t be empty'
   			}
   		}
   	},
   	address:{
   		validators:{
   			notEmpty:{
   				message: 'Address can\'t be empty'
   			},
   			stringLength:{
   				min: 5,
   				max: 100,
   				message: 'Invalid input length'
   			},
   			regexp:{
   				regexp: /^[a-zA-Z\-\_\n\ \.]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	city:{
   		validators:{
   			notEmpty:{
   				message: 'City can\'t be empty'
   			},
   			regexp:{
   				regexp: /^[a-zA-Z\_\-\ \&]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	country:{
   		validators:{
	   		notEmpty:{
	   				message: 'Country can\'t be empty'
	   			},
	   			regexp:{
	   				regexp: /^[a-zA-Z\&\ ]+$/,
	   				message: 'Invalid input'
	   			}
   		}
   	},
   	mobileNo:{
   		validators:{
	   		notEmpty:{
	   			message: 'Mobile Number can\'t be empty'
	   		},
	   		regexp:{
	   			regexp: /^[\+0-9]+$/,
	   			message: 'Invalid input'
	   		}
	   	}
   	},
   	emailAddress:{
   		validators:{
	   		notEmpty:{
	   			message: 'Email Address can\'t be empty'
	   		},
	   		email:{
	   			message: 'Invalid email address'
	   		},
	   		identical:{
	   			field: 'cemailAddress',
	   			message: 'Email addresses don\'t match'
	   		}
	   	}
   	},
   	cemailAddress:{
   		validators:{ 
	   		notEmpty:{
	   			message: 'Email Address can\'t be empty'
	   		},
	   		email:{
	   			message: 'Invalid email address'
	   		},
	   		identical:{
	   			field: 'emailAddress',
	   			message: 'Email addresses don\'t match'
	   		}
	   	}	
   	},
   	travelDetails:{
   		validators:{
   			regexp:{
   				regexp: /^[a-zA-Z\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	arrivaltime:{
   		validators:{
   			regexp:{
   				regexp: /^[0-9\:\-\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	departuretime:{
   		validators:{
   			regexp:{
   				regexp: /^[0-9\:\-\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	accDetail:{
   		validators:{
   			regexp:{
   				regexp: /^[a-zA-Z\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	presenting:{
   		validators:{
   			regexp:{
   				regexp: /^[a-zA-Z]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	tour:{
   		validators:{
   			regexp:{
   				regexp: /^[a-zA-Z0-9]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	tour2:{
   		validators:{
   			regexp:{
   				regexp: /^[a-zA-Z0-9]+$/,
   				message: 'Invalid input'
   			}
   		}
   	},
   	need:{
   		validators:{
   			regexp:{
   				regexp: /^[a-zA-Z\-\_\ ]+$/,
   				message: 'Invalid input'
   			}
   		}
   	}
  }
});
	});
</script>