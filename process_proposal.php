<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$background = mysql_real_escape_string($_POST['background']);
$just_element = mysql_real_escape_string($_POST['just_element']);
$cust_require = mysql_real_escape_string($_POST['cust_require']);
$project_impact = mysql_real_escape_string($_POST['project_impact']);
$methodology = mysql_real_escape_string( $_POST['methodology']);
$scope = mysql_real_escape_string($_POST['scope']);
$deliverables = mysql_real_escape_string($_POST['deliverables']);
$critical_path = mysql_real_escape_string($_POST['critical_path']);
$milestones = mysql_real_escape_string($_POST['milestones']);
$human_resource = mysql_real_escape_string($_POST['human_resource']);
$facilities = mysql_real_escape_string($_POST['facilities']);
$statutory = mysql_real_escape_string($_POST['statutory']);
$reference = mysql_real_escape_string($_POST['reference']);
$justification_element = mysql_real_escape_string($_POST['justification_element']);
$date_proposal = date('Y-m-d');

$s0 = $_POST['s0'];
$s1 = $_POST['s1'];
$s2 = $_POST['s2'];
$r0 = $_POST['r0'];
$r1 = $_POST['r1'];
$r2 = $_POST['r2'];
$c0 = $_POST['c0'];
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$t0 = $_POST['t0'];
$t1 = $_POST['t1'];
$t2 = $_POST['t2'];
$m0 = $_POST['m0'];
$m1 = $_POST['m1'];
$m2 = $_POST['m2'];
$e0 = $_POST['e0'];
$e1 = $_POST['e1'];
$e2 = $_POST['e2'];
$d0 = $_POST['d0'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$i0 = $_POST['i0'];
$i1 = $_POST['i1'];
$i2 = $_POST['i2'];


$target_schedule = "upload/schedule/";
$target_schedule = $target_schedule . basename( $_FILES['file_schedule']['name']); 

move_uploaded_file($_FILES['file_schedule']['tmp_name'], $target_schedule);

$target_costing = "upload/costing/";
$target_costing= $target_costing . basename( $_FILES['file_costing']['name']); 

move_uploaded_file($_FILES['file_costing']['tmp_name'], $target_costing);

$target_organisation = "upload/organisation/";
$target_organisation = $target_organisation . basename( $_FILES['file_organisation']['name']); 

move_uploaded_file($_FILES['file_organisation']['tmp_name'], $target_organisation);

$target_proposal = "upload/proposal/";
$target_proposal = $target_proposal . basename( $_FILES['file_proposal']['name']); 

move_uploaded_file($_FILES['file_proposal']['tmp_name'], $target_proposal);

if 
(($background != "") && ($cust_require != "") && ($methodology != "") && ($critical_path != "") && ($human_resource != "")  && ($facilities != "") && ($statutory != "")) 
{
	$completion_status = "<font color=\"74E059\"><strong>Complete</strong></font>";
}
else
{
	$completion_status = "<font color=\"FF0000\"><strong>Incomplete</strong></font>";
}

$s = "SELECT * FROM proposal WHERE projectid = '$projectid'";
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
		INSERT INTO proposal
		SET 
		projectid = '$projectid', 
		background = '$background',
		just_element = '$just_element',
		cust_require = '$cust_require',
		project_impact = '$project_impact',
		methodology = '$methodology',
		scope = '$scope',
		deliverables = '$deliverables',
		critical_path = '$critical_path',
		milestones = '$milestones',
		human_resource = '$human_resource', 
		facilities = '$facilities', 
		statutory = '$statutory',
		reference = '$reference',
		target_schedule = '$target_schedule',
		target_costing = '$target_costing',
		target_organisation = '$target_organisation',
		date_proposal = '$date_proposal',
		target_proposal = '$target_proposal',
		justification_element = '$justification_element'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
		
		$qcost0 = "
		INSERT INTO costing0
		SET 
		projectid = '$projectid', 
		salary = '$s0',
		research_material = '$r0',
		consultancy = '$c0',
		seminar = '$t0',
		travelling = '$m0',
		equipment = '$e0',
		direct_oh = '$d0',
		indirect_oh = '$i0'
		";

		if (!mysql_query($qcost0,$link))
		{
			die('Error: ' . mysql_error());
		}
		
		$qcost1 = "
		INSERT INTO costing1
		SET 
		projectid = '$projectid', 
		salary = '$s0',
		research_material = '$r1',
		consultancy = '$c1',
		seminar = '$t1',
		travelling = '$m1',
		equipment = '$e1',
		direct_oh = '$d1',
		indirect_oh = '$i1'
		";

		if (!mysql_query($qcost1,$link))
		{
			die('Error: ' . mysql_error());
		}
		
		$qcost2 = "
		INSERT INTO costing2
		SET 
		projectid = '$projectid', 
		salary = '$s2',
		research_material = '$r2',
		consultancy = '$c2',
		seminar = '$t2',
		travelling = '$m2',
		equipment = '$e2',
		direct_oh = '$d2',
		indirect_oh = '$i2'
		";

		if (!mysql_query($qcost2,$link))
		{
			die('Error: ' . mysql_error());
		}
	}
	else
	{
		$q = "
		UPDATE proposal 
		SET 
		background = '$background',
		just_element = '$just_element',
		cust_require = '$cust_require',
		project_impact = '$project_impact',
		methodology = '$methodology',
		scope = '$scope',
		deliverables = '$deliverables',
		critical_path = '$critical_path',
		milestones = '$milestones',
		human_resource = '$human_resource', 
		facilities = '$facilities', 
		statutory = '$statutory',
		reference = '$reference',
		target_schedule = '$target_schedule',
		target_costing = '$target_costing',
		target_organisation = '$target_organisation',
		date_proposal = '$date_proposal',
		target_proposal = '$target_proposal',
		justification_element = '$justification_element'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
		
		$qcost0 = "
		UPDATE costing0
		SET 
		salary = '$s0',
		research_material = '$r0',
		consultancy = '$c0',
		seminar = '$t0',
		travelling = '$m0',
		equipment = '$e0',
		direct_oh = '$d0',
		indirect_oh = '$i0'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($qcost0,$link))
		{
			die('Error: ' . mysql_error());
		}
		
		$qcost1 = "
		UPDATE costing1
		SET 
		salary = '$s0',
		research_material = '$r1',
		consultancy = '$c1',
		seminar = '$t1',
		travelling = '$m1',
		equipment = '$e1',
		direct_oh = '$d1',
		indirect_oh = '$i1'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($qcost1,$link))
		{
			die('Error: ' . mysql_error());
		}
		
		$qcost2 = "
		UPDATE costing2
		SET 
		salary = '$s2',
		research_material = '$r2',
		consultancy = '$c2',
		seminar = '$t2',
		travelling = '$m2',
		equipment = '$e2',
		direct_oh = '$d2',
		indirect_oh = '$i2'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($qcost2,$link))
		{
			die('Error: ' . mysql_error());
		}
	}	

	$q2 = "
	UPDATE project
	SET 
	proposal_status = '$completion_status'
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
SELECT * FROM proposal WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$background = $row['background'];
	$just_element = $row['just_element'];
	$objectives = $row['objectives'];
	$cust_require = $row['cust_require'];
	$project_impact = $row['project_impact'];
	$methodology = $row['methodology'];
	$scope = $row['scope'];
	$deliverables = $row['deliverables'];
	$critical_path = $row['critical_path'];
	$milestones = $row['milestones'];
	$human_resource = $row['human_resource']; 
	$facilities = $row['facilities']; 
	$statutory = $row['statutory'];
	$reference = $row['reference'];
	$target_schedule = $row['target_schedule'];
	$target_costing = $row['target_costing'];
	$target_organisation = $row['target_organisation'];
	$target_proposal = $row['target_proposal'];
	$justification_element = $row['justification_element'];
}

//research element checkbox
if ($just_element == "Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology")
{
	$check_e1= "checked";
} 
elseif ($just_element == "Design, construction & testing of prototypes & models")
{
	$check_e2 = "checked";
} 
elseif ($just_element == "Search for application of research findings or other knowledge")
{
	$check_e3 = "checked";
} 
elseif ($just_element == "Research to devise new methods of testing (excluding routine & standardisation)")
{
	$check_e4 = "checked";
} 
elseif ($just_element == "Formulation & design of possible new or improved product or process alternatives")
{
	$check_e5 = "checked";
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
<div align="right">
<h1>R &amp; D Project Proposal</h1>
<h5>&nbsp;</h5>
<h5>&nbsp;</h5>
<p>&nbsp;</p>
<h1 align="right"><em>Project Title</em></h1>
<p align="right">&nbsp;</p>
<p>&nbsp;</p>
<h1>TNB RESEARCH SDN BHD</h1>
<p>&nbsp;</p>
</div>
<div align="right">
<table align="left" border="1" cellspacing="0" cellpadding="3">
<tbody>
<tr>
<td valign="top" width="241">
<p>Date</p>
</td>
<td valign="top" width="258">
<p><strong>&nbsp;</strong></p>
</td>
</tr>
<tr>
<td valign="top" width="241">
<p>Release Status</p>
</td>
<td valign="top" width="258">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td valign="top" width="241">
<p>Revision No.</p>
</td>
<td valign="top" width="258">
<p><strong>&nbsp;</strong></p>
</td>
</tr>
<tr>
<td valign="top" width="241">
<p>Prepared by (Project Leader, Signature &amp; Chop)</p>
<p>&nbsp;</p>
</td>
<td valign="top" width="258">
<p align="center"><strong>&nbsp;</strong></p>
</td>
</tr>
<tr>
<td valign="top" width="241">
<p>Checked and Verified by (Project Director, Signature &amp; Chop)</p>
<p>&nbsp;</p>
</td>
<td valign="top" width="258">
<p><strong>&nbsp;</strong></p>
</td>
</tr>
<tr>
<td valign="top" width="241">
<p>Approved by (Managing Director, Signature &amp; Chop)</p>
<p>&nbsp;</p>
</td>
<td valign="top" width="258">
<p><strong>&nbsp;</strong></p>
</td>
</tr>
</tbody>
</table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="right">
<table border="1" cellspacing="0" cellpadding="2">
<tbody>
<tr>
<td valign="top" width="115">
  <p><strong>PD No.</strong></p>
</td>
<td valign="top" width="154">
  <p><strong>&nbsp;</strong>:</p>
</td>
</tr>
<tr>
<td valign="top" width="115">
  <p><strong>Contract No.</strong></p>
</td>
<td valign="top" width="154">
  <p><strong>&nbsp;</strong>:</p>
</td>
</tr>
</tbody>
</table>
</div>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 9);

//NON-BREAKING TABLE (nobr="true")

$tbl2 = <<<EOD
<p align="center"><span style="text-decoration: underline;"><h1>Table of Contents</h1></span></p>
<p>&nbsp;</p>
<p>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Background. 3</p>
<p>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Objective. 3</p>
<p>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Requirement 3</p>
<p>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Impact 3</p>
<p>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Methodology. 3</p>
<p>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scope of Work. 3</p>
<p>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deliverables. 3</p>
<p>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Implementation Plan. 4</p>
<p><em>8.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Schedule. 4</em></p>
<p><em>8.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Critical Path Analysis. 4</em></p>
<p><em>8.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Milestones. 4</em></p>
<p>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Resource Plan. 4</p>
<p><em>9.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Human Resource. 4</em></p>
<p><em>9.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Facilities. 4</em></p>
<p>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Costing. 5</p>
<p>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Statutory and Regulatory Requirements. 5</p>
<p>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Organisation. 5</p>
<p>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; References. 5</p>
EOD;

$pdf->writeHTML($tbl2, true, false, false, false, '');

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 9);

//NON-BREAKING TABLE (nobr="true")

$tbl3= <<<EOD
<h1>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Background</h1>
<p>$background</p>
<h1>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Justification of Research Element</h1>
<table border="1" cellspacing="0" cellpadding="2">
<tbody>
<tr>
<td valign="top" width="20">
<p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_e1"></p>
</td>
<td valign="top" width="611">
<p>Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology</p>
</td>
</tr>
<tr>
<td valign="top" width="20">
<p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_e2"></p>
</td>
<td valign="top" width="611">
<p>Design, construction &amp; testing of prototypes &amp; models</p>
</td>
</tr>
<tr>
<td valign="top" width="20">
<p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_e3"></p>
</td>
<td valign="top" width="611">
<p>Search for application of research findings or other knowledge</p>
</td>
</tr>
<tr>
<td valign="top" width="20">
<p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_e4"></p>
</td>
<td valign="top" width="611">
<p>Research to devise new methods of testing (excluding routine &amp; standardisation)</p>
</td>
</tr>
<tr>
<td valign="top" width="20">
<p><input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_e5"></p>
</td>
<td valign="top" width="611">
<p>Formulation &amp; design of possible new or improved product or process alternatives</p>
</td>
</tr>
</tbody>
</table>
<p>$justification_element</p>
EOD;

$pdf->writeHTML($tbl3, true, false, false, false, '');


$q = "SELECT * FROM objective WHERE projectid = '$projectid'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$objective .= "<li type=a>".$row['objective']."</li>";
}

$q = "SELECT * FROM project_impact WHERE projectid = '$projectid'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$project_impact .= "<li type=a>".$row['project_impact']."</li>";
}

$q = "SELECT * FROM deliverables WHERE projectid = '$projectid'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$deliverables .= "<li type=a>".$row['deliverables']."</li>";
}

$q = "SELECT * FROM milestone WHERE projectid = '$projectid'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$milestone .= "<li type=a>".$row['milestone']."</li>";
}

$q = "SELECT * FROM reference WHERE projectid = '$projectid'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$reference .= "<li type=a>".$row['reference']."</li>";
}

$tbl4= <<<EOD
<h1>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Objective</h1>
<p><ul>$objective</ul></p>
<h1>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Requirement</h1>
<p>$cust_require</p>
<h1>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Impact</h1>
<p><ul>$project_impact</ul></p>
<h1>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Methodology</h1>
<p>$methodology</p>
<h1>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scope of Work</h1>
<p>$scope</p>
<h1>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deliverables</h1>
<p><ul>$deliverables</ul></p>
<h1>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Implementation Plan</h1>
<h2>9.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration: underline;">Project Schedule</span></h2>
<p>Please refer Project Schedule file.</p>
<h2>9.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration: underline;">Critical Path Analysis</span></h2>
<p>$critical_path</p>
<h2>9.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration: underline;">Milestones</span></h2>
<p><ul>$milestone</ul></p>
<h1>10&nbsp; Resource Plan</h1>
<p>&nbsp;</p>
<h2>10.1&nbsp;&nbsp; <span style="text-decoration: underline;">Human Resource</span></h2>
<p>$human_resource</p>
<h2>10.2&nbsp;&nbsp; <span style="text-decoration: underline;">Facilities</span></h2>
<p>$facilities</p>
<h1>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Costing</h1>
<p>Please refer to Project Costing Software for detailed calculation method.</p>
<h1>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Statutory and Regulatory Requirements</h1>
<p>$statutory</p>
<h1>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Organisation</h1>
<p>Please refer Project Organisation file.</p>
<h1>14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; References</h1>
<p><ul>$reference</ul></p>
EOD;

$pdf->writeHTML($tbl4, true, false, false, false, '');

ob_clean(); //Clear any previous output
//Close and output PDF document
$pdf->Output('Project Initiation Form.pdf', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
}

	


?>
<meta http-equiv="refresh" content="0;url=proposal.php?track=<?php echo $projectid; ?>" />