<?php
require('WriteHTML.php');
//require('functions.php');
	mysql_connect('localhost','root','.?');
	mysql_select_db('geotech');
	$dollar=8.5;
if(isset($_GET['register']) && isset($_SESSION['aygecmember'])){
	$pdf=new PDF_HTML();

	$pdf->AliasNbPages();
	$pdf->SetAutoPageBreak(true, 15);

	$pdf->AddPage();
	$pdf->Image('banners/aygec2016.png',18,13,33);
	$pdf->SetFont('Arial','B','13');
	$pdf->WriteHTML('<para><h1>5TH AFRICAN YOUNG GEOTECHNICAL ENGINEERING CONFERENCE (GHANA)</h1></para>');
	$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
	$pdf->SetTextColor(122,30,33);
	$pdf->WriteHTML('------------------------------------------------------------------------------------------------------------');
	
	$query="select * from aygecmembers where ecode='{$_SESSION['aygecmember']}'";

	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

	//################AUTHENTICATION CODE##############//
	$pdf->SetFont('Arial','','12');
	$pdf->SetTextColor(0,0,0);
	$pdf->WriteHTML('<br><br><b>Authentication Code: </b>'.$result[22]);
	$pdf->Ln();
/*	$pdf->WriteHTML('<br><br><b>Encryption Code: </b>'.md5('geotech').md5($result[22]));
	$pdf->Ln();*/

	//##################..PERSONAL DETAILS..###########################
	$pdf->SetFont('Arial','B','13'); 
	$pdf->WriteHTML('<br><br>');
	$pdf->SetTextColor(0,0,0);
	$pdf->WriteHTML('<h1><u><b>REGISTRATION DETAILS</b></u></h1>');
	$pdf->Ln();
	$pdf->Ln();
	//generating full details...
	$pdf->SetFont('Arial','',12);


	$pdf->WriteHTML('<b>Full Name: </b> '.$result[1]. ' '.$result[2].', '.$result[3]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Affiliated National Society: </b> '.$result[4]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Institution/Company Name: </b>' .$result[5]);
	$pdf->Ln();
	//getting category
	if($result[10]=='Ghana' && $result[6]=='student'){
		$category="Ghanaian Student Delegate";
		$regSign="Ghc ";
		$regFee=300;
	}elseif($result[10]=='Ghana' && $result[6]=='corporate'){
		$category="Ghanaian Corporate Delegate";
		$regSign="Ghc ";
		$regFee=550; 
	}elseif($result[10]!='Ghana' && $result[6]=='student'){
		$category="International Student Delegate";
		$regSign="$";
		$regFee=150;
	}elseif($result[10]!='Ghana' && $result[6]=='corporate'){
		$category="International Corporate Delegate";
		$regSign="$";
		$regFee=275;
	}
	$pdf->WriteHTML('<b>Category: </b> '.$category);
	$pdf->Ln();
	/*$query="select name from qualifications where id=$result[7]";
	$myres=mysql_query($query);
	$myres=mysql_fetch_row($myres);*/

	$pdf->WriteHTML('<b>Qualification: </b>' .$result[7]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Address: </b> '.$result[8]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>City: </b> '.$result[9]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Country: </b>'.$result[10]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Mobile Number: </b>'.$result[11]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Email Address: </b>'.$result[12]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Travel Medium: </b>'.$result[13]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Arrival Time: </b>'.$result[14]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Departure Time: </b>'.$result[15]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Accommodation(Hotel): </b>'.$result[16]);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Presenting? </b>'.$result[17]);
	$pdf->Ln();
	$tour2="No";
	$tour1="No";
	if(intval($result[18])==1){
		$tour1="Yes";
	}
	if(intval($result[19])==1){
		$tour2="Yes";	
	}

	//Number of nights
	$aDay=new DateTime($result[14]);
	$dDay=new DateTime($result[15]);
	$nights=$dDay->diff($aDay)->format("%a");

	//getting hotel amount
	$hotelQ="select currency,night from hotels where name='{$result[16]}'";
	$hotelRes=mysql_query($hotelQ);
	$hotelRes=mysql_fetch_row($hotelRes);
	$hotelFee=0;
	if($regSign=="$"){
		//dollar 
		if($hotelRes[0]=="$"){
			//load dollar amount
			$hotelFee=$hotelRes[1];
		}else{
			//convert to dollars
			$hotelFee=intval($hotelRes[1])/3.85;
		}
	}else{
		//dollar 
		if($hotelRes[0]=="$"){
			//convert to cedis
			$hotelFee=intval($hotelRes[1])*3.85;
		}else{
			//load cedis amount
			$hotelFee=$hotelRes[1];
		}
	}

	$hotelFeeT=intval($nights)*$hotelFee;

	$pdf->WriteHTML('<b>Participating in Tour 1? </b>'.$tour1);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Participating in Tour 2? </b>'.$tour2);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Special Need: </b>'.$result[20]);
	$pdf->Ln();
	$pdf->Ln();

	//generating post conference fee;
	$pcfee=0;
	if($regSign=="$" and $tour2=="Yes"){
		$pcfee+=180;
	}else{
		if($tour2=="Yes"){
			$pcfee+=360;	
		}
	}

	//Generating Expenditure
	$pdf->SetFont('Arial','','13');
	$pdf->WriteHTML('<h1><u><b>EXPENDITURE</b></u></h1>');
	$pdf->Ln();
	$pdf->SetFont('Arial','','12');
	$expenditure="<TABLE>
	<TR>
	<TD><b>FEE</b></TD>
	<TD><b>AMOUNT</b></TD>
	</TR>
	<TR><TD>Conference Fee</TD><TD>".$regSign.$regFee."</TD></TR>
	<TR><TD>Post Conference Tour 2 Fee</TD><TD>".$regSign.$pcfee."</TD></TR>
	<TR><TD>Hotel Fees</TD><TD>".$regSign.$hotelFeeT."</TD></TR>
	</TABLE>";
	$pdf->WriteHTML2($expenditure);
	$pdf->Ln();

	//generating total amount;
	$totalamount=intval($regFee)+intval($pcfee)+intval($hotelFeeT);

	$pdf->WriteHTML('<b>Total Amount: </b> '.$regSign.$totalamount);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	//contact us
	$pdf->SetFont('Arial','B','13');
	$pdf->WriteHTML('<h1><u><b>CONTACT US</b></u></h1>');
	$pdf->Ln();
	$pdf->SetFont('Arial','','12');
	$contact="Ghana Geotechnical Society<br>c/o Ghana Institute of Engineers<br>P.O.Box AN 702<br>Accra North<br>Email: <a href='mailto:5aygec16@gmail.com' style='text-decoration: none;'>5aygec16@gmail.com</a><br>";
	$pdf->WriteHTML($contact);

	//pdf file name
	$pdf->Output('Registration_Details','I'); 
//end of register get 
}elseif(isset($_GET['regmembers']) && isset($_SESSION['gtadmin'])){


		##################################REGISTERED MEMBERS#################################
	$pdf=new PDF_HTML();

	$query="select * from aygecmembers";

	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){ 



	$pdf->AliasNbPages();
	$pdf->SetAutoPageBreak(true, 15);

	$pdf->AddPage();
	$pdf->Image('banners/aygec2016.png',18,13,33);
	$pdf->SetFont('Arial','B','13');
	$pdf->WriteHTML('<para><h1>5TH AFRICAN YOUNG GEOTECHNICAL ENGINEERING CONFERENCE (GHANA)</h1></para>');
	$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
	$pdf->SetTextColor(122,30,33);
	$pdf->WriteHTML('------------------------------------------------------------------------------------------------------------');
	
	

	//################AUTHENTICATION CODE##############//
	$pdf->SetFont('Arial','','12');
	$pdf->SetTextColor(0,0,0);
	$pdf->WriteHTML('<br><br><b>Authentication Code: </b>'.$row['eCode']);
	$pdf->Ln();
/*	$pdf->WriteHTML('<br><br><b>Encryption Code: </b>'.md5('geotech').md5($result[22]));
	$pdf->Ln();*/

	//##################..PERSONAL DETAILS..###########################
	$pdf->SetFont('Arial','B','13'); 
	$pdf->WriteHTML('<br><br>');
	$pdf->SetTextColor(0,0,0);
	$pdf->WriteHTML('<h1><u><b>REGISTRATION DETAILS</b></u></h1>');
	$pdf->Ln();
	$pdf->Ln();
	//generating full details...
	$pdf->SetFont('Arial','',12);


	$pdf->WriteHTML('<b>Full Name: </b> '.$row['title']. ' '.$row['lastname'].', '.$row['onames']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Affiliated National Society: </b> '.$row['nationalsociety']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Institution/Company Name: </b>' .$row['institution']);
	$pdf->Ln();
	//getting category
	if($row['country']=='Ghana' && $row['category']=='student'){
		$category="Ghanaian Student Delegate";
		$regSign="Ghc ";
		$regFee=300;
	}elseif($row['country']=='Ghana' && $row['category']=='corporate'){
		$category="Ghanaian Corporate Delegate";
		$regSign="Ghc ";
		$regFee=550; 
	}elseif($row['country']!='Ghana' && $row['category']=='student'){
		$category="International Student Delegate";
		$regSign="$";
		$regFee=150;
	}elseif($row['country']!='Ghana' && $row['category']=='corporate'){
		$category="International Corporate Delegate";
		$regSign="$";
		$regFee=275;
	}
	$pdf->WriteHTML('<b>Category: </b> '.$category);
	$pdf->Ln();
	/*$query="select name from qualifications where id=$result[7]";
	$myres=mysql_query($query);
	$myres=mysql_fetch_row($myres);*/

	$pdf->WriteHTML('<b>Qualification: </b>' .$row['qualification']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Address: </b> '.$row['address']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>City: </b> '.$row['city']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Country: </b>'.$row['country']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Mobile Number: </b>'.$row['mobileNo']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Email Address: </b>'.$row['emailAddr']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Travel Medium: </b>'.$row['travel']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Arrival Time: </b>'.$row['arrivaltime']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Departure Time: </b>'.$row['departuretime']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Accommodation(Hotel): </b>'.$row['accommodation']);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Presenting? </b>'.$row['presenting']);
	$pdf->Ln();
	$tour2="No";
	$tour1="No";
	if(intval($row['tour1'])==1){
		$tour1="Yes";
	}
	if(intval($row['tour2'])==1){
		$tour2="Yes";	
	}

	//Number of nights
	$aDay=new DateTime($row['arrivaltime']);
	$dDay=new DateTime($row['departuretime']);
	$nights=$dDay->diff($aDay)->format("%a");

	//getting hotel amount
	$hotelQ="select currency,night from hotels where name='{$row['accommodation']}'";
	$hotelRes=mysql_query($hotelQ);
	$hotelRes=mysql_fetch_row($hotelRes);
	$hotelFee=0;
	if($regSign=="$"){
		//dollar 
		if($hotelRes[0]=="$"){
			//load dollar amount
			$hotelFee=$hotelRes[1];
		}else{
			//convert to dollars
			$hotelFee=intval($hotelRes[1])/3.85;
		}
	}else{
		//dollar 
		if($hotelRes[0]=="$"){
			//convert to cedis
			$hotelFee=intval($hotelRes[1])*3.85;
		}else{
			//load cedis amount
			$hotelFee=$hotelRes[1];
		}
	}

	$hotelFeeT=intval($nights)*$hotelFee;

	$pdf->WriteHTML('<b>Participating in Tour 1? </b>'.$tour1);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Participating in Tour 2? </b>'.$tour2);
	$pdf->Ln();
	$pdf->WriteHTML('<b>Special Need: </b>'.$row['need']);
	$pdf->Ln();
	$pdf->Ln();

	//generating post conference fee;
	$pcfee=0;
	if($regSign=="$" and $tour2=="Yes"){
		$pcfee+=180;
	}else{
		if($tour2=="Yes"){
			$pcfee+=360;	
		}
	}


	//Generating Expenditure
	$pdf->SetFont('Arial','','13');
	$pdf->WriteHTML('<h1><u><b>EXPENDITURE</b></u></h1>');
	$pdf->Ln();
	$pdf->SetFont('Arial','','12');
	$expenditure="<TABLE>
	<TR>
	<TD><b>FEE</b></TD>
	<TD><b>AMOUNT</b></TD>
	</TR>
	<TR><TD>Conference Fee</TD><TD>".$regSign.$regFee."</TD></TR>
	<TR><TD>Post Conference Tour 2 Fee</TD><TD>".$regSign.$pcfee."</TD></TR>
	<TR><TD>Hotel Fees</TD><TD>".$regSign.$hotelFeeT."</TD></TR>
	</TABLE>";
	$pdf->WriteHTML2($expenditure);
	$pdf->Ln();

	//generating total amount;
	$totalamount=intval($regFee)+intval($pcfee)+intval($hotelFeeT);

	$pdf->WriteHTML('<b>Total Amount: </b> '.$regSign.$totalamount);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	//contact us
	$pdf->SetFont('Arial','B','13');
	$pdf->WriteHTML('<h1><u><b>CONTACT US</b></u></h1>');
	$pdf->Ln();
	$pdf->SetFont('Arial','','12');
	$contact="Ghana Geotechnical Society<br>c/o Ghana Institute of Engineers<br>P.O.Box AN 702<br>Accra North<br>Email: <a href='mailto:5aygec16@gmail.com' style='text-decoration: none;'>5aygec16@gmail.com</a><br>";
	$pdf->WriteHTML($contact);
	}
	//pdf file name
	$pdf->Output('Registration_Details','I'); 
	########################...END OF REGISTERED MEMBERS...##################################
}else{
	echo "<script>close(); </script>";
}

?>
