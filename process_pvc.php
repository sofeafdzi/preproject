<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$title = mysql_real_escape_string($_POST['title']);
$adoption_level = mysql_real_escape_string($_POST['adoption_level']);
$description = mysql_real_escape_string($_POST['description']);
$quantification = mysql_real_escape_string($_POST['quantification']);
$vc1 = mysql_real_escape_string($_POST['vc1']);
$vc2 = mysql_real_escape_string($_POST['vc2']);
$vc3 = mysql_real_escape_string( $_POST['vc3']);
$vc4 = mysql_real_escape_string($_POST['vc4']);
$vc5 = mysql_real_escape_string($_POST['vc5']);
$date_pvc = date('Y-m-d');

if 
(($title != "") && ($adoption_level != "") && ($description != "") && ($quantification != "") && ($vc1 != "") && ($vc2 != "") && ($vc3 != "") && ($vc4 != "") && ($vc5 != "")) 
{
	$completion_status = "<font color=\"74E059\"><strong>Complete</strong></font>";
}
else
{
	$completion_status = "<font color=\"FF0000\"><strong>Incomplete</strong></font>";
}

$s = "SELECT * FROM pvc WHERE projectid = '$projectid'";
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
		INSERT INTO pvc
		SET 
		projectid = '$projectid', 
		title = '$title',
		adoption_level = '$adoption_level',
		description = '$description',
		quantification = '$quantification',
		vc1 = '$vc1',
		vc2 = '$vc2',
		vc3 = '$vc3',
		vc4 = '$vc4',
		vc5 = '$vc5',
		date_pvc = '$date_pvc'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
	}
	else
	{
		$q = "
		UPDATE pvc
		SET 
		title = '$title',
		adoption_level = '$adoption_level',
		description = '$description',
		quantification = '$quantification',
		vc1 = '$vc1',
		vc2 = '$vc2',
		vc3 = '$vc3',
		vc4 = '$vc4',
		vc5 = '$vc5',
		date_pvc = '$date_pvc'
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
	title = '$title',
	pvc_status = '$completion_status'
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
SELECT * FROM pvc WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$projectid = $row['projectid']; 
	$title = $row['title'];
	$adoption_level = $row['adoption_level'];
	$description = $row['description'];
	$quantification = $row['quantification'];
	$vc1 = $row['vc1'];
	$vc2 = $row['vc2'];
	$vc3 = $row['vc3'];
	$vc4 = $row['vc4'];
	$vc5 = $row['vc5'];
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
    <td width="343" valign="top"><p><strong><u>Projected    Quantification of Value Creation </u></strong></p>
      <p><strong>&nbsp;</strong></p>
      <p><strong>Project Title: </strong></p>
      <p>$title</p>
      <p><strong>Expected Adoption    Level:</strong></p>
      <p>$adoption_level</p>
      <p><strong>Description of Value    Creation:</strong></p>
      <p>$description</p>
      <p><strong>Assumptions Made in Projected    Quantification:</strong></p>
      <p>$quantification</p>
      <p><strong>Expected Value    Creation Year 1:</strong></p>
      <p>$vc1</p>
      <p><strong>Expected Value    Creation Year 2:</strong></p>
      <p>$vc2</p>
      <p><strong>Expected Value    Creation Year 3:</strong></p>
      <p>$vc3</p>
      <p><strong>Expected Value    Creation Year 4:</strong></p>
      <p>$vc4</p>
      <p><strong>Expected Value    Creation Year 5:</strong></p>
      <p>$vc5</p>
      <p><strong><em>Prepared by,</em></strong></p>
      <p><strong>&nbsp;</strong></p>
      <p><strong>Project Leader:</strong></p>
      <p><strong>&nbsp;</strong></p>
      <p><strong>Project Director:</strong></p>
      <p><strong>&nbsp;</strong></p>
      <p><strong>&nbsp;</strong></p></td>
    <td width="295" valign="top"><p><strong><u>Guidelines:</u></strong></p>
      <ol>
        <li>Review the background and problem statement    of your project. And identify the potential benefits of the project.</li>
        <li>Describe the benefits that the customer can    derive from the adoption of your findings.</li>
        <li>Try to provide a quantifiable estimate    based on the benefits description above.</li>
        <li>Write down all the assumptions made in    deriving the above estimate.</li>
        <li>You are encouraged to <u>contact the    project owner</u> and discuss with him/her on your evaluation.</li>
      </ol>
      <p><strong>Example of Value    Creation Estimation:</strong></p>
      <p>Title:    The Study on Evaluation of Different Types of Three Cores 11kV Cable Joints    for Underground Cable for TNB Distribution</p>
      <p><u>Background:</u> TNBD has    experienced many supply interruption (tripping) due to cable joint failure.    TNBR is asked to evaluate and determine the most suitable type of cable joint    to be used to reduce the cable joint failure.</p>
      <p><u>Research Outcome:</u> Your project has    the potential of providing a recommendation of a particular type of cable    joint that could reduce the cable joint failure.</p>
      <p><u>Expected Adoption Level:</u> Level 3. TNBD    potentially is able to adopt your research findings.</p>
      <p><u>Value Creation Description:</u> The adoption of the    finding has the potential of improving SAIDI due to a reduction in cable    joint failure. The joint technique to be recommended also may result in    shorter jointing time compared to the current method.</p>
      <p><u>Value Creation estimation:</u><br>
        Loss    of revenue per tripping (kwh x RM0.2 per kwh) = RM XXX<br>
        Cost    of repair (workmanship, materials, etc) = RM YYY<br>
        Cost    saving due to ease of installation per joint = RM ZZZ (Rate per hour per team    x 3 hours) <br>
        Total    estimated value creation = (RM XXX + YYY) x no of tripping avoided + (ZZZ) x    no of joints implemented<br>
        Write    down all assumptions made.</p>
      <p><strong>Level of Adoption:</strong></p>
      <p>Level    5 : Adopted beyond the (client) division<br>
        Level    4 : Adopted throughout the division<br>
        Level    3 : Adopted selectively within the division<br>
        Level    2 : Adopted or in the process of adoption by client (in part or in full)<br>
        Level    1 : Client shows commitment in the adoption of the findings (in part or in    full)<strong></strong></p></td>
  </tr>
</table>
<p>&nbsp;</p>

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