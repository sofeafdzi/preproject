<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$cust = mysql_real_escape_string($_POST['cust']);
$other_cust = mysql_real_escape_string($_POST['other_cust']);
$date_request = $_POST['date_request'];
$cust_req = mysql_real_escape_string($_POST['cust_req']);
$element = mysql_real_escape_string($_POST['element']);
$suggest_title = mysql_real_escape_string($_POST['suggest_title']);
$fund = mysql_real_escape_string( $_POST['fund']);
$other_fund = mysql_real_escape_string($_POST['other_fund']);
$commit = mysql_real_escape_string($_POST['commit']);
$other_commit = mysql_real_escape_string($_POST['other_commit']);
$pd = mysql_real_escape_string($_POST['pd']);
$td = mysql_real_escape_string($_POST['td']);
$pl = mysql_real_escape_string($_POST['pl']);
$t1 = mysql_real_escape_string($_POST['t1']);
$t2 = mysql_real_escape_string( $_POST['t2']);
$t3 = mysql_real_escape_string($_POST['t3']);
$t4 = mysql_real_escape_string($_POST['t4']);
$t5 = mysql_real_escape_string($_POST['t5']);
$bd = mysql_real_escape_string($_POST['bd']);
$date_pi = date('Y-m-d');

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
(($suggest_title != "") && ($fund != "") && ($commit != "") && ($pd != "") && ($td != "") && ($pl != "") && ($t1 != "") && ($t2 != "") && ($t3 != "") && ($t4 != "") && ($t5 != "") && ($bd != "") && ($problem_statement != "") && ($scope != "") && ($duration != "") && ($deliverables != "") && ($champ_name != "") && ($champ_design != "") && ($champ_depart != "") && ($champ_tel != "") && ($champ_fax != "") && ($champ_email != "") && ($adoption_level != "") && ($description != "") && ($quantification != "") && ($vc1 != "") && ($vc2 != "") && ($vc3 != "") && ($vc4 != "") && ($vc5 != "")) 
{
	$completion_status = "<font color=\"74E059\"><strong>Complete</strong></font>";
}
else
{
	$completion_status = "<font color=\"FF0000\"><strong>Incomplete</strong></font>";
}

$s = "SELECT * FROM pi WHERE projectid = '$projectid'";
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
		INSERT INTO pi 
		SET 
		projectid = '$projectid', 
		cust = '$cust',
		other_cust = '$other_cust',
		date_request = '$date_request',
		cust_req = '$cust_req',
		element = '$element',
		suggest_title = '$suggest_title',
		fund = '$fund',
		other_fund = '$other_fund',
		commit = '$commit',
		other_commit = '$other_commit', 
		pd = '$pd',
		td = '$td',
		pl = '$pl',
		t1 = '$t1',
		t2 = '$t2',
		t3 = '$t3',
		t4 = '$t4',
		t5 = '$t5',
		bd = '$bd',
		date_pi = '$date_pi'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
		
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
		UPDATE pi 
		SET 
		cust = '$cust',
		other_cust = '$other_cust',
		date_request = '$date_request',
		cust_req = '$cust_req',
		element = '$element',
		suggest_title = '$suggest_title',
		fund = '$fund',
		other_fund = '$other_fund',
		commit = '$commit',
		other_commit = '$other_commit', 
		pd = '$pd',
		td = '$td',
		pl = '$pl',
		t1 = '$t1',
		t2 = '$t2',
		t3 = '$t3',
		t4 = '$t4',
		t5 = '$t5',
		bd = '$bd',
		date_pi = '$date_pi'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
		
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
	title = '$suggest_title',
	pi_status = '$completion_status'
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

$q2 = "
SELECT * FROM pi WHERE projectid = '$projectid'";

$r2 = mysql_query($q2);
while ($row = mysql_fetch_array($r2))
{	
	$cust = $row['cust'];
	$other_cust = $row['other_cust'];
	$date_request = $row['date_request'];
	$cust_req = $row['cust_req'];
	$element = $row['element'];
	$suggest_title = $row['suggest_title'];
	$fund = $row['fund'];
	$other_fund = $row['other_fund'];
	$commit = $row['commit'];
	$other_commit = $row['other_commit']; 
	$pd = $row['pd'];
	$td = $row['td'];
	$pl = $row['pl'];
	$t1 = $row['t1'];
	$t2 = $row['t2'];
	$t3 = $row['t3'];
	$t4 = $row['t4'];
	$t5 = $row['t5'];
	$bd = $row['bd'];
}

if ($cust == "TNB Generation Division")
{
	$check_gen = "checked";
} 
elseif ($cust == "TNB Transmission Division")
{
	$check_trans = "checked";
} 
elseif ($cust == "TNB Distribution Division")
{
	$check_dist = "checked";
} 
elseif ($cust == "TNBR Board")
{
	$check_board = "checked";
} 
elseif ($cust == "Others")
{
	$check_others = "checked";
} 

//research element checkbox
if ($element == "Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology")
{
	$check_element1 = "checked";
} 
elseif ($element == "Design, construction & testing of prototypes & models")
{
	$check_element2 = "checked";
} 
elseif ($element == "Search for application of research findings or other knowledge")
{
	$check_element3 = "checked";
} 
elseif ($element == "Research to devise new methods of testing (excluding routine & standardisation)")
{
	$check_element4 = "checked";
} 
elseif ($element == "Formulation & design of possible new or improved product or process alternatives")
{
	$check_element5 = "checked";
} 

//fund checkbox
if ($fund == "TNB R&D Fund")
{
	$fund1 = "checked";
} 
elseif ($fund == "TNBR Seeding Fund")
{
	$fund2 = "checked";
} 
elseif ($fund == "TNB Division Research Assignment")
{
	$fund3 = "checked";
} 
elseif ($fund == "Others")
{
	$fund4 = "checked";
} 

//commit checkbox
if ($commit == "TNB Generation Technical Committee")
{
	$commit1 = "checked";
} 
elseif ($commit == "TNB Transmission Technical Committee")
{
	$commit2 = "checked";
} 
elseif ($commit == "TNB Distribution Technical Committee")
{
	$commit3 = "checked";
} 
elseif ($commit == "TNBR Board")
{
	$commit4 = "checked";
} 
elseif ($commit == "Others")
{
	$commit5 = "checked";
} 

//bd checkbox
if ($bd == "Yes")
{
	$bd_yes = "checked";
} 
elseif ($bd == "No")
{
	$bd_no = "checked";
} 

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
elseif ($cust == "TNB Energy Ventures")
{
	$check_venture = "checked";
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

if ($adoption_level == "Level 1")
{
	$l1 = "selected";
}
elseif ($adoption_level == "Level 2")
{
	$l2 = "selected";
}
elseif ($adoption_level == "Level 3")
{
	$l3 = "selected";
}
elseif ($adoption_level == "Level 4")
{
	$l4 = "selected";
}
elseif ($adoption_level == "Level 5")
{
	$l5 = "selected";
}
elseif ($adoption_level == "Level 6")
{
	$l6 = "selected";
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

<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="4" valign="top" bgcolor="#CCCCCC"><p><strong>Customer Request:</strong></p></td>
  </tr>
  <tr>
    <td width="624" valign="top"><p>$problem_statement </p></td>
  </tr>
  <tr>
    <td width="624" colspan="4" valign="top" bgcolor="#CCCCCC"><p><strong>Scope and Boundary of Project:</strong></p></td>
  </tr>
  <tr>
    <td width="624" valign="top"><p>$scope </p></td>
  </tr>
  <tr>
    <td width="624" colspan="4" valign="top" bgcolor="#CCCCCC"><p><strong>Expected Duration of Project:</strong></p></td>
  </tr>
  <tr>
    <td width="624" valign="top"><p>$duration </p></td>
  </tr>
  <tr>
    <td width="624" colspan="4" valign="top" bgcolor="#CCCCCC"><p><strong>Expected Deliverables:</strong></p></td>
  </tr>
  <tr>
    <td width="624" valign="top"><p>$deliverables </p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="4" valign="top" bgcolor="#CCCCCC"><p><strong>Research Element Category : </strong></p></td>
  </tr>

  <tr>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox" id="checkbox" checked="$check_gen">
      <label for="checkbox"></label>
    </p></td>
    <td width="276" valign="top"><p>Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology</p></td>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox4" id="checkbox4" checked="$check_dist">
    </p></td>
    <td width="288" valign="top"><p>Design, construction & testing of prototypes & models</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_board">
    </p></td>
    <td width="276" valign="top"><p>Search for application of research findings or other knowledge</p></td>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox5" id="checkbox5" checked="$check_trans">
    </p></td>
    <td width="288" valign="top"><p>Research to devise new methods of testing (excluding routine & standardisation)</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox3" id="checkbox3" checked="$check_dist">
    </p></td>
    <td width="276" valign="top"><p>Formulation & design of possible new or improved product or process alternatives</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="4" valign="top" bgcolor="#CCCCCC"><p><strong>Customer : </strong><em>(Please Tick)</em><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox" id="checkbox" checked="$check_gen">
      <label for="checkbox"></label>
    </p></td>
    <td width="276" valign="top"><p>TNB    Generation Division</p></td>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox4" id="checkbox4" checked="$check_dist">
    </p></td>
    <td width="288" valign="top"><p>TNBR Board</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox2" id="checkbox2" checked="$check_board">
    </p></td>
    <td width="276" valign="top"><p>TNB    Transmission Division</p></td>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox5" id="checkbox5" checked="$check_trans">
    </p></td>
    <td width="288" valign="top"><p>Others:</p></td>
  </tr>
  <tr>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox3" id="checkbox3" checked="$check_dist">
    </p></td>
    <td width="276" valign="top"><p>TNB    Distribution Division</p></td>
  </tr>
</table>
<br>
<table border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td width="396" valign="top" bgcolor="#CCCCCC"><p><strong>Customer&rsquo;s Initial Request Section    Head/HOR/TE</strong></p></td>
    <td width="132" valign="top" bgcolor="#CCCCCC"><p align="right"><strong>Date of Request :</strong></p></td>
    <td width="96" valign="top" bgcolor="#CCCCCC"><p>$date_request</p></td>
  </tr>
  <tr>
    <td width="624" colspan="3" valign="top">$cust_req</td>
  </tr>
</table>
<br>
<table border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td width="624" colspan="2" valign="top" bgcolor="#CCCCCC"><p><strong>Research    Element Category </strong></p></td>
  </tr>
  <tr>
    <td width="36" valign="top"><p>
      <input type="checkbox" name="checkbox17" id="checkbox17" checked="$check_element1">
    </p></td>
    <td width="588" valign="top"><p>Experimental    or other work aimed at the discovery of new knowledge or advancement of    existing technology </p></td>
  </tr>
  <tr>
    <td width="36" valign="top"><p>
      <input type="checkbox" name="checkbox18" id="checkbox18" checked="$check_element2">
    </p></td>
    <td width="588" valign="top"><p>Design,    construction &amp; testing of prototypes &amp; models </p></td>
  </tr>
  <tr>
    <td width="36" valign="top"><p>
      <input type="checkbox" name="checkbox19" id="checkbox19" checked="$check_element3">
    </p></td>
    <td width="588" valign="top"><p>Search for    application of research findings or other knowledge </p></td>
  </tr>
  <tr>
    <td width="36" valign="top"><p>
      <input type="checkbox" name="checkbox20" id="checkbox20" checked="$check_element4">
    </p></td>
    <td width="588" valign="top"><p>Research to devise new methods    of testing (excluding routine &amp; standardisation)</p></td>
  </tr>
  <tr>
    <td width="36" valign="top"><p>
      <input type="checkbox" name="checkbox21" id="checkbox21" checked="$check_element5">
    </p></td>
    <td width="588" valign="top"><p>Formulation &amp; design of    possible new or improved product or process alternatives</p></td>
  </tr>
</table>
<br>
<table border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td width="624" valign="top" bgcolor="#CCCCCC"><p><strong>Review of Customer Request (to be filled up by HOU):</strong></p></td>
  </tr>
  <tr>
    <td width="624"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="624" valign="top"><p><strong>Suggested Project Title:</strong></p></td>
  </tr>
  <tr>
    <td width="624" valign="top"><p>$suggest_title</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="5" valign="top" bgcolor="#CCCCCC"><p><strong>Fund to Utilise: </strong><em>(please tick)</em></p></td>
  </tr>
  <tr>
    <td width="24" valign="top"><p>
      <input type="checkbox" name="checkbox6" id="checkbox6" checked="$fund1">
      <label for="checkbox6"></label>
    </p></td>
    <td width="258" valign="top"><p>TNB    R&amp;D Fund </p></td>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox8" id="checkbox8" checked="$fund3">
      <label for="checkbox8"></label>
    </p></td>
    <td width="312" colspan="2" valign="top"><p>TNB Division    Research Assignment</p></td>
  </tr>
  <tr>
    <td width="24" valign="top"><p>
      <input type="checkbox" name="checkbox7" id="checkbox7" checked="$fund2">
      <label for="checkbox7"></label>
    </p></td>
    <td width="258" valign="top"><p>TNBR    Seeding Fund </p></td>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox9" id="checkbox9" checked="$fund4">
      <label for="checkbox9"></label>
    </p></td>
    <td width="60" valign="top"><p>Others : </p></td>
    <td width="252" valign="top"><p>$other_fund</p></td>
  </tr>
</table>
<br>


EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', '', 9);

//NON-BREAKING TABLE (nobr="true")

$tbl2 = <<<EOD
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="4" valign="top" bgcolor="#CCCCCC"><p><strong>Technical Review Committee: </strong><em>(please    tick)</em><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="24" valign="top"><p>
      <input type="checkbox" name="checkbox10" id="checkbox10" checked="$commit1">
    </p></td>
    <td width="260" valign="top"><p>TNB    Generation Technical Committee</p></td>
    <td width="28" valign="top"><p>
      <input type="checkbox" name="checkbox13" id="checkbox13" checked="$commit4">
    </p></td>
    <td width="312" valign="top"><p>TNBR Board</p></td>
  </tr>
  <tr>
    <td width="24" valign="top"><p>
      <input type="checkbox" name="checkbox11" id="checkbox11" checked="$commit2">
    </p></td>
    <td width="260" valign="top"><p>TNB    Transmission Technical Committee</p></td>
    <td width="28" valign="top"><p>
      <input type="checkbox" name="checkbox14" id="checkbox14" checked="$commit5">
    </p></td>
    <td width="312" valign="top"><p>Others:</p></td>
  </tr>
  <tr>
    <td width="24" valign="top"><p>
      <input type="checkbox" name="checkbox12" id="checkbox12" checked="$commit3">
    </p></td>
    <td width="260" valign="top"><p>TNB    Distribution Technical Committee</p></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="6" valign="top" bgcolor="#CCCCCC"><p><strong>Project Team:</strong></p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Project    Director</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$pd</p></td>
    <td width="108" valign="top"><p>Team    Member 2</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="186" valign="top"><p>$t2</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Technical    Director</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$td</p></td>
    <td width="108" valign="top"><p>Team    Member 3</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="186" valign="top"><p>$t3</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Project    Leader</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$pl</p></td>
    <td width="108" valign="top"><p>Team    Member 4</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="186" valign="top"><p>$t4</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Team    Member 1</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$t1</p></td>
    <td width="108" valign="top"><p>Team    Member 5</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="186" valign="top"><p>$t5</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="5" valign="top" bgcolor="#CCCCCC"><p><strong>Champion:</strong></p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Name</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$champ_name</p></td>
    <td width="108" valign="top"><p>Telephone    Number</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="186" valign="top"><p>$champ_tel</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Designation</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$champ_design</p></td>
    <td width="108" valign="top"><p>Fax    Number</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="186" valign="top"><p>$champ_fax</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Department</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$champ_depart</p></td>
    <td width="108" valign="top"><p>Email</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="186" valign="top"><p>$champ_email</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="5" valign="top" bgcolor="#CCCCCC"><p><strong>Expected Adoption Level:</strong></p></td>
  </tr>
  <tr>
    <td width="180" valign="top"><p>$adoption_level</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="5" valign="top" bgcolor="#CCCCCC"><p><strong>Description of Value Creation:</strong></p></td>
  </tr>
  <tr>
    <td width="624" valign="top"><p>$description</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="5" valign="top" bgcolor="#CCCCCC"><p><strong>Assumptions Made in Projected Quantification:</strong></p></td>
  </tr>
  <tr>
    <td width="624" valign="top"><p>$quantification</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="5" valign="top" bgcolor="#CCCCCC"><p><strong>Expected Value Creation:</strong></p></td>
  </tr>
<tr>
    <td width="114" valign="top"><p>Year     1</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$vc1</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Year     2</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$vc2</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Year     3</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$vc3</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Year     4</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$vc4</p></td>
  </tr>
  <tr>
    <td width="114" valign="top"><p>Year     5</p></td>
    <td width="18" valign="top"><p>:</p></td>
    <td width="180" valign="top"><p>$vc5</p></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" colspan="5" valign="top" bgcolor="#CCCCCC"><p><strong>Is initial funding    (BD) needed for this project?: </strong><em>(please tick)</em></p></td>
  </tr>
  <tr>
    <td width="24" valign="top"><p>
      <input type="checkbox" name="checkbox15" id="checkbox15" checked="$bd_yes">
    </p></td>
    <td width="258" valign="top"><p>Yes </p></td>
    <td width="30" valign="top"><p>
      <input type="checkbox" name="checkbox16" id="checkbox16" checked="$bd_no">
    </p></td>
    <td width="312" colspan="2" valign="top"><p>No</p></td>
  </tr>
</table>
<br><br>
<table border="0" cellspacing="0" cellpadding="0" width="624">
  <tr>
    <td width="208" valign="top"><p>Requested by,</p></td>
    <td width="208" valign="top"><p>Reviewed by,</p></td>
    <td width="208" valign="top"><p>Approved / Not Approved</p></td>
  </tr>
  <tr>
    <td width="208" valign="top"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>_____________________</p></td>
    <td width="208" valign="top"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>_____________________</p></td>
    <td width="208" valign="top"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>_____________________</p></td>
  </tr>
  <tr>
    <td width="208" valign="top"><p><strong>Requestor</strong><br>
      <em>(Signature &amp; Stamp)</em></p>
      <p><em>Date:</em></p></td>
    <td width="208" valign="top"><p><strong>Senior Manager</strong><br>
      <em>(Signature &amp; Stamp)</em></p>
      <p><em>Date:</em></p></td>
    <td width="208" valign="top"><p><strong>General Manager</strong><br>
      <em>(Signature &amp; Stamp)</em></p>
      <p><em>Date:</em></p></td>
  </tr>
</table>
<br><br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="624" valign="top" bgcolor="#CCCCCC"><p><strong><em>To be filled up by the Strategic Planning    Executive (if approved by GM)</em></strong></p></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="216" valign="top"><p><strong>&nbsp;</strong></p>
      <p><strong>Feasibility No. (If    applicable)</strong></p></td>
    <td width="16" valign="top"><p><strong>&nbsp;</strong></p>
      <p><strong>:</strong></p></td>
    <td width="392" valign="top"><p><strong>&nbsp;</strong></p></td>
  </tr>
</table>
EOD;

$pdf->writeHTML($tbl2, true, false, false, false, '');

ob_clean(); //Clear any previous output
//Close and output PDF document
$pdf->Output('Project Initiation Form.pdf', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
}

	


?>
<meta http-equiv="refresh" content="0;url=project.php" />