<?php
include "webconfig.php";
$projectid = $_GET['track'];

$q = "
SELECT * FROM pi WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
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
elseif ($cust == "TNB Energy Ventures")
{
	$check_venture = "checked";
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

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Project Initiation Form";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
//$page_nav["pif"]["active"] = true;
include("inc/nav.php");

//title
$q = "
SELECT * FROM project WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$title = $row['title'];
}

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">
	<!-- widget grid -->
		<section id="widget-grid" class="">
		
		<!-- row -->
		<div class="row">
		
		<!-- NEW COL START -->
				<article class="col-sm-12 col-md-12 col-lg-12">
		
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-teal" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
		
						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"
		
						-->
						<header>
							<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
							<h2>Project Initiation Form </h2>
		
						</header>
		
						<!-- widget div-->
						<div>
		
							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->
		
							</div>
							<!-- end widget edit box -->
		
							<!-- widget content -->
							<div class="widget-body no-padding">
		
								<form class="smart-form" method="post" action="process_pi.php" id="pi-form">
								<input type="hidden" name="projectid" value="<?php echo $projectid; ?>">
								
									<header>
										Please fill in this form to continue
									</header>
									
									<fieldset>
										<section>
											<label class="label"><h2>Customer</h2></label>
											<div class="row">
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="cust" value="TNB Generation Division" <?php echo $check_gen; ?>>
														<i></i>TNB Generation Division</label>
													<label class="checkbox">
														<input type="checkbox" name="cust" value="TNB Transmission Division" <?php echo $check_trans; ?>>
														<i></i>TNB Transmission Division</label>
													<label class="checkbox">
														<input type="checkbox" name="cust" value="TNB Distribution Division" <?php echo $check_dist; ?>>
														<i></i>TNB Distribution Division</label>
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="cust" value="TNBR Board" <?php echo $check_board; ?>>
														<i></i>TNBR Board</label>
													<label class="checkbox">
														<input type="checkbox" name="cust" value="TNB Energy Ventures" <?php echo $check_venture; ?>>
														<i></i>TNB Energy Ventures</label>	
													<label class="checkbox">
														<input type="checkbox" name="cust" value="Others" <?php echo $check_others; ?>>
														<i></i>Others</label>
													<label class="input">
														<input type="text" class="input-xs" name="other_cust" id="name" placeholder="Fill in if 'Others'" value="<?php echo $other_cust; ?>">
													</label>
												</div>
											</div>
										</section>
		
										<section>
											<label class="label"><h2>Date of Request</h2></label>
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="date_request" id="requestdate" value="<?php echo $date_request; ?>">
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Customer's Initial Request Section Head/HOR/TE</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="cust_req"><?php echo $cust_req; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Research Element Category</h2></label>
											<div class="row">
												<div class="col col-12">
													<label class="checkbox">
														<input type="checkbox" name="element" value="Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology" <?php echo $check_element1; ?>>
														<i></i>Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology</label>
													<label class="checkbox">
														<input type="checkbox" name="element" value="Design, construction & testing of prototypes & models" <?php echo $check_element2; ?>>
														<i></i>Design, construction & testing of prototypes & models</label>
													<label class="checkbox">
														<input type="checkbox" name="element" value="Search for application of research findings or other knowledge" <?php echo $check_element3; ?>>
														<i></i>Search for application of research findings or other knowledge</label>
														<label class="checkbox">
														<input type="checkbox" name="element" value="Research to devise new methods of testing (excluding routine & standardisation)" <?php echo $check_element4; ?>>
														<i></i>Research to devise new methods of testing (excluding routine & standardisation)</label>
														<label class="checkbox">
														<input type="checkbox" name="element" value="Formulation & design of possible new or improved product or process alternatives" <?php echo $check_element5; ?>>
														<i></i>Formulation & design of possible new or improved product or process alternatives</label>
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Suggested Project Title</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="suggest_title"><?php echo $title; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Fund to Utilise</h2></label>
											<div class="row">
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="fund" value="TNB R&D Fund" <?php echo $fund1; ?>>
														<i></i>TNB R&D Fund</label>
													<label class="checkbox">
														<input type="checkbox" name="fund" value="TNBR Seeding Fund" <?php echo $fund2; ?>>
														<i></i>TNBR Seeding Fund</label>
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="fund" value="TNB Division Research Assignment" <?php echo $fund3; ?>>
														<i></i>TNB Division Research Assignment</label>
													<label class="checkbox">
														<input type="checkbox" name="fund" value="Others" <?php echo $fund4; ?>>
														<i></i>Others</label>
													<label class="input">
														<input type="text" class="input-xs" name="other_fund" id="name" placeholder="Fill in if 'Others'" value="<?php echo $other_fund; ?>">
													</label>
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Technical Review Committee</h2></label>
											<div class="row">
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="commit" value="TNB Generation Technical Committee" <?php echo $commit1; ?>>
														<i></i>TNB Generation Technical Committee</label>
													<label class="checkbox">
														<input type="checkbox" name="commit" value="TNB Transmission Technical Committee" <?php echo $commit2; ?>>
														<i></i>TNB Transmission Technical Committee</label>
													<label class="checkbox">
														<input type="checkbox" name="commit" value="TNB Distribution Technical Committee" <?php echo $commit3; ?>>
														<i></i>TNB Distribution Technical Committee</label>
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="commit" value="TNBR Board" <?php echo $commit4; ?>>
														<i></i>TNBR Board</label>
													<label class="checkbox">
														<input type="checkbox" name="commit" value="Others" <?php echo $commit5; ?>>
														<i></i>Others</label>
													<label class="input">
														<input type="text" class="input-xs" name="other_commit" id="name" placeholder="Fill in if 'Others'" value="<?php echo $other_commit; ?>">
													</label>
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Project Team</h2></label>
											<div class="row">
												<div class="col col-6">
													<label class="label">Project Director</label>
													<label class="select">
													<?php
														echo "<select name=\"pd\">";
														echo "<option value=\"\">Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{															
															if ($row[0] == $pd) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
													<label class="label">Technical Director</label>
													<label class="select">
													<?php
														echo "<select name=\"td\">";
														echo "<option>Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{
																if ($row[0] == $td) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
													<label class="label">Project Leader</label>
													<label class="select">
													<?php
														echo "<select name=\"pl\">";
														echo "<option value=\"\">Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{
																if ($row[0] == $pl) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
													<label class="label">Team Member 1</label>
													<label class="select">
													<?php
														echo "<select name=\"t1\">";
														echo "<option>Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{
																if ($row[0] == $t1) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
												</div>
												<div class="col col-6">
													<label class="label">Team Member 2</label>
													<label class="select">
													<?php
														echo "<select name=\"t2\">";
														echo "<option>Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{
																if ($row[0] == $t2) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
													<label class="label">Team Member 3</label>
													<label class="select">
													<label class="select">
													<?php
														echo "<select name=\"t3\">";
														echo "<option>Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{
																if ($row[0] == $t3) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
													<label class="label">Team Member 4</label>
													<label class="select">
													<?php
														echo "<select name=\"t4\">";
														echo "<option>Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{
																if ($row[0] == $t4) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
													<label class="label">Team Member 5</label>
													<label class="select">
													<?php
														echo "<select name=\"t5\">";
														echo "<option>Choose Name</option>";
														$q ="
														SELECT name 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{
																if ($row[0] == $t5) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[0].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i> </label>
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Is initial funding (BD) needed for this project?</h2></label>
											<div class="row">
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="bd" value="Yes" <?php echo $bd_yes; ?>>
														<i></i>Yes</label>
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="bd" value="No" <?php echo $bd_no; ?>>
														<i></i>No</label>
												</div>
											</div>
										</section>
									</fieldset>
									<?php
									
									$q = "SELECT * FROM project WHERE projectid = '$projectid'";
										$r = mysql_query($q);
										while ($row = mysql_fetch_array($r))
										{	
											$pi_status = $row['pi_status'];
										}
										
										if (strpos($pi_status,'Complete') !== false)
										{
										?>
											<footer>
												<button type="submit" class="btn btn-primary" name="button" value="save">
													Save
												</button>
												<button type="submit" class="btn btn-primary" name="button" value="pdf">
													Generate PDF
												</button>	
											</footer>
										<?php	
										}
										else
										{
										?>
											<footer>
												<button type="submit" class="btn btn-primary" name="button" value="save">
													Save
												</button>
											</footer>
										<?php 
										} ?>
										

								</form>
		
							</div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
				</article>
				<!-- END COL -->
			</div>
			<!-- end row -->
		</section>
		<!-- end widget grid -->
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables-cust.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/ColReorder.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/FixedColumns.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/ColVis.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/ZeroClipboard.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/media/js/TableTools.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/DT_bootstrap.js"></script>
		

<script type="text/javascript">

	$(document).ready(function() {

		/*
		 * BASIC
		 */
		$('#dt_basic').dataTable({
			"sPaginationType" : "bootstrap_full"
		});
		
		$("input:checkbox").click(function () {
			$("[name="+$(this).prop('name')+"]").prop("checked", false);
			$(this).prop("checked", true);
		});

		/* END BASIC */

		/* Add the events etc before DataTables hides a column */
		$("#datatable_fixed_column thead input").keyup(function() {
			oTable.fnFilter(this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $("thead input").index(this)));
		});

		$("#datatable_fixed_column thead input").each(function(i) {
			this.initVal = this.value;
		});
		$("#datatable_fixed_column thead input").focus(function() {
			if (this.className == "search_init") {
				this.className = "";
				this.value = "";
			}
		});
		$("#datatable_fixed_column thead input").blur(function(i) {
			if (this.value == "") {
				this.className = "search_init";
				this.value = this.initVal;
			}
		});		
		

		var oTable = $('#datatable_fixed_column').dataTable({
			"sDom" : "<'dt-top-row'><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			//"sDom" : "t<'row dt-wrapper'<'col-sm-6'i><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'>>",
			"oLanguage" : {
				"sSearch" : "Search all columns:"
			},
			"bSortCellsTop" : true
		});		
		


		/*
		 * COL ORDER
		 */
		$('#datatable_col_reorder').dataTable({
			"sPaginationType" : "bootstrap",
			"sDom" : "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"fnInitComplete" : function(oSettings, json) {
				$('.ColVis_Button').addClass('btn btn-default btn-sm').html('Columns <i class="icon-arrow-down"></i>');
			}
		});
		
		/* END COL ORDER */

		/* TABLE TOOLS */
		$('#datatable_tabletools').dataTable({
			"sDom" : "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"oTableTools" : {
				"aButtons" : ["copy", "print", {
					"sExtends" : "collection",
					"sButtonText" : 'Save <span class="caret" />',
					"aButtons" : ["csv", "xls", "pdf"]
				}],
				"sSwfPath" : "<?php echo ASSETS_URL; ?>/js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
			},
			"fnInitComplete" : function(oSettings, json) {
				$(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('a.btn').each(function() {
					$(this).addClass('btn-sm btn-default');
				});
			}
		});
		
		//Validation
		$( "#pi-form" ).validate({
			rules: {
				pd: { required: true },
				pl: { required: true }
			},
			messages: {
				pd: "* Please choose a project director",
				pl: "* Please choose a project leader"
			}	
		});
		
		
		// START AND FINISH DATE
		$('#requestdate').datepicker({
			dateFormat : 'yy-mm-dd',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});

	/* END TABLE TOOLS */

	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>