<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$problem_statement = mysql_real_escape_string($_POST['problem_statement']);
$scope = mysql_real_escape_string($_POST['scope']);
$duration = mysql_real_escape_string($_POST['duration']);
$deliverables = mysql_real_escape_string($_POST['deliverables']);
$cust = mysql_real_escape_string($_POST['cust']);
$other_cust = mysql_real_escape_string($_POST['other_cust']);
$champ_name = mysql_real_escape_string($_POST['champ_name']);
$champ_design = mysql_real_escape_string( $_POST['champ_design']);
$champ_depart = mysql_real_escape_string($_POST['champ_depart']);
$champ_tel = mysql_real_escape_string($_POST['champ_tel']);
$champ_fax = mysql_real_escape_string($_POST['champ_fax']);
$champ_email = mysql_real_escape_string($_POST['champ_email']);
$mode_comm = mysql_real_escape_string($_POST['mode_comm']);
$reporting = mysql_real_escape_string($_POST['reporting']);
$date_cir = date('Y-m-d');

if 
(($problem_statement != "") && ($scope != "") && ($duration != "") && ($deliverables != "") && ($cust != "") && ($champ_name != "") && ($champ_design != "") && ($champ_depart != "") && ($champ_tel != "") && ($champ_fax != "") && ($champ_email != "") && ($mode_comm != "") && ($reporting != "")) 
{
	$completion_status = "<font color=\"74E059\"><strong>Complete</strong></font>";
}
else
{
	$completion_status = "<font color=\"FF0000\"><strong>Incomplete</strong></font>";
}

$s = "SELECT * FROM cir WHERE projectid = '$projectid'";
$g = mysql_query($s);
while ($row = mysql_fetch_array($g))
{	
	$mark = $row['projectid'];
}


if($_POST['button'] == 'save')
{
	if ($mark == "")
	{
		$q = "
		INSERT INTO cir
		SET 
		projectid = '$projectid', 
		problem_statement = '$problem_statement',
		scope = '$scope',
		duration = '$duration',
		deliverables = '$deliverables',
		cust = '$cust',
		other_cust = '$other_cust',
		champ_name = '$champ_name',
		champ_design = '$champ_design',
		champ_depart = '$champ_depart',
		champ_tel = '$champ_tel',
		champ_fax = '$champ_fax', 
		champ_email = '$champ_email',
		mode_comm = '$mode_comm',
		reporting = '$reporting',
		date_cir = '$date_cir'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
	}
	else
	{
		$q = "
		UPDATE cir
		SET 
		problem_statement = '$problem_statement',
		scope = '$scope',
		duration = '$duration',
		deliverables = '$deliverables',
		cust = '$cust',
		other_cust = '$other_cust',
		champ_name = '$champ_name',
		champ_design = '$champ_design',
		champ_depart = '$champ_depart',
		champ_tel = '$champ_tel',
		champ_fax = '$champ_fax', 
		champ_email = '$champ_email',
		mode_comm = '$mode_comm',
		reporting = '$reporting',
		date_cir = '$date_cir'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
	}	
	
	$q2 = "
	UPDATE project
	SET 
	cir_status = '$completion_status'
	WHERE
	projectid = '$projectid'
	";

	if (!mysql_query($q2,$link))
	{
		die('Error: ' . mysql_error());
	}

}
elseif($_POST['button'] == 'pdf')
{
$q = "
SELECT * FROM cir WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$projectid = $row['projectid']; 
	$problem_statement = $row['problem_statement'];
	$scope = $row['scope'];
	$duration = $row['duration'];
	$deliverables = $row['deliverables'];
	$cust = $row['cust'];
	$other_cust = $row['other_cust'];
	$champ_name = $row['champ_name'];
	$champ_design = $row['champ_design'];
	$champ_depart = $row['champ_depart'];
	$champ_tel = $row['champ_tel'];
	$champ_fax = $row['champ_fax']; 
	$champ_email = $row['champ_email'];
	$mode_comm = $row['mode_comm'];
	$reporting = $row['reporting'];
	$date_cir = $row['date_cir'];
}

if ($cust == "Corporate Services")
{
	$check_corporate = "checked";
} 
elseif ($cust == "Generation")
{
	$check_gen = "checked";
} 
elseif ($cust == "Transmission")
{
	$check_trans = "checked";
} 
elseif ($cust == "Distribution")
{
	$check_dist = "checked";
} 
elseif ($cust == "SESB")
{
	$check_sesb = "checked";
} 
elseif ($cust == "Others")
{
	$check_othercust= "checked";
} 

//comm checkbox
if ($mode_comm == "Meeting")
{
	$check_meeting = "checked";
} 
elseif ($mode_comm == "Letter")
{
	$check_letter = "checked";
} 
elseif ($mode_comm == "Fax")
{
	$check_fax = "checked";
} 
elseif ($mode_comm == "Email")
{
	$check_email = "checked";
} 
elseif ($mode_comm == "SMS")
{
	$check_sms = "checked";
} 
elseif ($mode_comm == "Telephone")
{
	$check_tel = "checked";
} 

//report checkbox
if ($reporting == "Technical Report")
{
	$check_tech = "checked";
} 
elseif ($reporting == "Progress Report")
{
	$check_progress = "checked";
} 
elseif ($reporting == "Final Report")
{
	$check_final = "checked";
} 
elseif ($reporting == "Others")
{
	$check_otherreport = "checked";
} 

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

	// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 10);

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 9);

//NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td width="425" valign="top" bgcolor="#CCCCCC"><p><strong>Problem Statement    (to be filled up by Researcher)</strong></p></td>
    <td width="55" valign="top" bgcolor="#CCCCCC"><p align="right"><strong>Date :</strong></p></td>
    <td width="144" valign="top" bgcolor="#CCCCCC"><p>$date_cir</p></td>
  </tr>
  <tr>
    <td width="624" colspan="3" valign="top">$problem_statement</td>
  </tr>
  <tr>
    <td width="624" colspan="3" valign="top"  bgcolor="#CCCCCC"><p><strong>Customer Requirement    (to be filled up by Researcher)</strong></p></td>
  </tr>
  <tr>
    <td width="624" colspan="3" valign="top"><p>&nbsp;</p>
      <p>Scope    and boundary of project :</p>
      <p>$scope</p>
      <p>Expected    duration of project :</p>
      <p>$duration</p>
      <p>Expected    deliverables :</p>
      <p>$deliverables</p>
      <p>&nbsp;</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="624" colspan="6" valign="top"><p><strong>Customer / Potential End User: </strong><em>(Please tick)</em><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="624" colspan="6"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="36" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_corporate"></p></td>
    <td width="120" valign="top"><p>Corporate Services</p></td>
    <td width="30" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_gen"></p></td>
    <td width="90" valign="top"><p>Generation</p></td>
    <td width="36" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_trans"></p></td>
    <td width="312" valign="top"><p>Transmission</p></td>
  </tr>
  <tr>
    <td width="36" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_dist"></p></td>
    <td width="120" valign="top"><p>Distribution</p></td>
    <td width="30" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_sesb"></p></td>
    <td width="90" valign="top"><p>SESB</p></td>
    <td width="36" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_othercust"></p></td>
    <td width="312" valign="top"><p>Others : $other_cust</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="253" valign="top"><p><strong><u>CHAMPION</u></strong></p></td>
    <td width="19" valign="top"><p>&nbsp;</p></td>
    <td width="367" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="253"><p><strong>Name</strong></p></td>
    <td width="19"><p><strong>:</strong></p></td>
    <td width="367" valign="top">$champ_name</td>
  </tr>
  <tr>
    <td width="253"><p><strong>Designation</strong></p></td>
    <td width="19"><p><strong>:</strong></p></td>
    <td width="367" valign="top">$champ_design</td>
  </tr>
  <tr>
    <td width="253"><p><strong>Department / Section</strong></p></td>
    <td width="19"><p><strong>:</strong></p></td>
    <td width="367" valign="top">$champ_depart</td>
  </tr>
  <tr>
    <td width="253"><p><strong>Telephone No.</strong></p></td>
    <td width="19"><p><strong>:</strong></p></td>
    <td width="367" valign="top">$champ_tel</td>
  </tr>
  <tr>
    <td width="253"><p><strong>Fax No.</strong></p></td>
    <td width="19"><p><strong>:</strong></p></td>
    <td width="367" valign="top">$champ_fax</td>
  </tr>
  <tr>
    <td width="253"><p><strong>Email</strong></p></td>
    <td width="19"><p><strong>:</strong></p></td>
    <td width="367" valign="top">$champ_email</td>
  </tr>
  <tr>
    <td width="253"><p><strong>Preferred Mode of    Communication</strong></p></td>
    <td width="19"><p><strong>:</strong></p></td>
    <td width="367" valign="top">$mode_comm</td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="624" colspan="3" valign="top" bgcolor="#CCCCCC"><p><strong>REPORTING : </strong></p></td>
  </tr>
  <tr>
    <td width="624" colspan="3" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_tech"></p></td>
    <td width="204" valign="top"><p>Technical    Report</p></td>
    <td width="390" valign="top"><p>Not required /    required every ______ week(s) / month(s)</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_progress"></p></td>
    <td width="204" valign="top"><p>Progress    Report</p></td>
    <td width="390" valign="top"><p>Not required /    required every ______ week(s) / month(s)</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_final"></p></td>
    <td width="204" valign="top"><p>Final    Report</p></td>
    <td width="390" valign="top"><p>Not    required / required every ______ week(s) / month(s)</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_otherreport"></p></td>
    <td width="204" valign="top"><p>Others    : </p></td>
    <td width="390" valign="top"><p>Not    required / required every ______ week(s) / month(s)</p></td>
  </tr>
</table>
<br><br>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="83" rowspan="2" valign="top"><p><strong>Form filled by:</strong></p></td>
    <td width="180" rowspan="2" valign="top"><p><strong>&nbsp;</strong></p>
      <p><strong>&nbsp;</strong></p>
      <p><strong>________________</strong><br>
        <strong>Researcher</strong></p></td>
    <td width="376" colspan="2" bgcolor="#CCCCCC" ><p align="center"><strong>To be    filled up by the Customer Relation Executive</strong></p></td>
  </tr>
  <tr>
    <td width="132"><p><strong>Customer Ref. No.</strong></p></td>
    <td width="244" valign="top"><p>&nbsp;</p></td>
  </tr>
</table>
<p align="center">PLEASE  COMPLETE THE PRE-PROJECT VALUE CREATION FORM!</p>

EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

ob_clean(); //Clear any previous output
//Close and output PDF document
$pdf->Output('Project Initiation Form.pdf', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
}
	


?>
<meta http-equiv="refresh" content="0;url=project.php" />