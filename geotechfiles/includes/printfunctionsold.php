<?php
require "../geotechFiles/includes/pdf/config/tcpdf_config.php";
require "../geotechFiles/includes/pdf/tcpdf.php";
//require "includes/dbconfig.php";

if(isset($_GET['register'])){
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('GGS');
$pdf->SetAuthor('Ghana Geotechnical Society');

$pdf->SetTitle('AYGEC 2016 Registration');
$pdf->SetSubject('Registration Slip');
$pdf->SetKeywords('AYGEC 2016, GGS, Registration,Slip');
// set default header data 
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 13, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<br/><center><h4><u>Registration Details</u></h4></center><br/>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '70', '', $html, 0, 1, 0, true, '', true);


$query="select * from aygecmembers where ecode='{$_SESSION['aygecmember']}'";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$row=$result;
	if($row[15]=='cooperate' && $row[8] !='Ghana'){
		$category="International Cooperate Delegate";
		if($row[13]=='Yes'){
			$amount='$395';
		}else{
			$amount='$275';
		}
	}elseif($row[15]=='cooperate' && $row[8]=='Ghana'){
		$category="Ghanaian Cooperate Delegate";
		if($row[13]=='Yes'){
			$amount='GHC 730';
		}else{
			$amount='GHC 550';
		}
	}elseif($row[15]=='student' && $row[8]=='Ghana'){
		$category="Ghanaian Student Delegate";
		if($row[13]=='Yes'){
			$amount='GHC 480';
		}else{
			$amount='GHC 300';
		}
	}elseif($row[15]=='student' && $row[8]!='Ghana'){
		$category="International Student Delegate";
		if($row[13]=='Yes'){
			$amount='$330';
		}else{
			$amount='$150';
		
		}
	}
$fullname=$row[1]." ".strtoupper($row[2]).", ".ucwords($row[3]);
$institution=ucwords($row[4]);
$position=ucwords($row[5]);
$address=ucwords($row[6]);
$data="<table border='1' cellspacing='5' cellpadding='5'>";
$data.="<tr><td><b>Authentication Code: </b> {$result[18]}</td><td><b>Category: </b> {$category}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Registration Fee: </b> {$amount}</td><td><b>Registration Date: </b> {$row[17]}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td>................................................................................</td><td>.................................................................................</td></tr>";
$data.="<tr><td><b>Full Name: </b> {$fullname}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Institution: </b> {$institution}</td><td><b>Position: </b> {$position}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Address: </b> {$row[6]}</td><td><b>City: </b> {$row[7]}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Country: </b> {$row[8]}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Mobile Number: </b> {$row[9]}</td><td><b>Email: </b> {$row[10]}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Travel Details(Accra-Kumasi): </b> {$row[11]}</td><td><b>Accommodation: </b> {$row[12]}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Post Conference Tour: </b> {$row[13]}</td><td><b>Presenting? </b> {$row[14]}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td><b>Special Need: </b> {$row[16]}</td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td></td></tr>";
$data.="<tr><td>................................................................................</td><td>.................................................................................</td></tr>";
$data.="<tr><td>Ghana Geotechnical Society</td></tr>";
$data.="<tr><td>c/o Ghana Institute of Engineeers</td></tr>";
$data.="<tr><td>P.O.Box AN 702</td></tr>";
$data.="<tr><td>Accra North</td></tr>";
$data.="<tr><td>Email: <a href='mailto:5aygec16@gmail.com' style='text-decoration: none;'>5aygec16@gmail.com</a></td></tr>";
$data.="</table>";





$pdf->SetFont('dejavusans', '', 11, '', true);
$pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$pdf->writeHTMLCell(0,0,'','',$data,0,1,0,true,'',true);
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('AYGEC2016_Registration.pdf', 'I');
}else{
	echo "<script>
			close();
			</script>";
}
?>