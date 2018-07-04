<?php
include "webconfig.php";
$projectid = $_GET['track'];

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


//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Customer Information and Requirement Form";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
//$page_nav["cir"]["active"] = true;
include("inc/nav.php");

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
							<h2>Customer Information and Requirement Form</h2>
		
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
		
								<form class="smart-form" method="post" action="process_cir.php">
								<input type="hidden" name="projectid" value="<?php echo $projectid; ?>">
								
									<header>
										Please fill in this form to continue
									</header>
									
									<fieldset>
										<section>
											<label class="label"><h2>Problem Statement</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="problem_statement"><?php echo $problem_statement; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Scope and Boundary of Project</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="scope"><?php echo $scope; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Expected Duration of Project</h2></label>
											<label class="input">
												<input type="text" name="duration" value="<?php echo $duration; ?>">
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Deliverables</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="deliverables"><?php echo $deliverables; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Customer/Potential End User</h2></label>
											<div class="row">
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="cust" value="Corporate Services" <?php echo $check_corporate; ?>>
														<i></i>Corporate Services</label>
													<label class="checkbox">
														<input type="checkbox" name="cust" value="Distribution" <?php echo $check_dist; ?>>
														<i></i>Distribution</label>
													<label class="checkbox">
														<input type="checkbox" name="cust" value="TNB Energy Ventures" <?php echo $check_venture; ?>>
														<i></i>TNB Energy Ventures</label>	
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="cust" value="Generation" <?php echo $check_gen; ?>>
														<i></i>Generation</label>
													<label class="checkbox">
														<input type="checkbox" name="cust" value="SESB" <?php echo $check_sesb; ?>>
														<i></i>SESB</label>
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="cust" value="Transmission" <?php echo $check_trans; ?>>
														<i></i>Transmission</label>
													<label class="checkbox">
														<input type="checkbox" name="cust" value="Others" <?php echo $check_othercust; ?>>
														<i></i>Others</label>
													<label class="input">
														<input type="text" class="input-xs" name="other_cust" id="name" placeholder="Fill in if 'Others'" value="<?php echo $other_cust; ?>">
													</label>
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Champion</h2></label>
											<div class="row">
												<div class="col col-6">
													<label class="label">Name</label>
													<label class="input">
														<input type="text" name="champ_name" value="<?php echo $champ_name; ?>">
													</label>
													<label class="label">Designation</label>
													<label class="input">
														<input type="text" name="champ_design" value="<?php echo $champ_design; ?>">
													</label>
													<label class="label">Department/Section</label>
													<label class="input">
														<input type="text" name="champ_depart" value="<?php echo $champ_depart; ?>">
													</label>												
												</div>
												<div class="col col-6">
													<label class="label">Telephone No.</label>
													<label class="input">
														<input type="text" name="champ_tel" value="<?php echo $champ_tel; ?>">
													</label>
													<label class="label">Fax No.</label>
													<label class="input">
														<input type="text" name="champ_fax" value="<?php echo $champ_fax; ?>">
													</label>
													<label class="label">Email</label>
													<label class="input">
														<input type="text" name="champ_email" value="<?php echo $champ_email; ?>">
													</label>
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Preferred Mode of Communication</h2></label>
											<div class="row">
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="mode_comm" value="Meeting" <?php echo $check_meeting; ?>>
														<i></i>Meeting</label>	
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="mode_comm"  value="Letter" <?php echo $check_letter; ?>>
														<i></i>Letter</label>	
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="mode_comm"  value="Fax" <?php echo $check_fax; ?>>
														<i></i>Fax</label>	
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="mode_comm"  value="Email" <?php echo $check_email; ?>>
														<i></i>Email</label>	
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="mode_comm"  value="SMS" <?php echo $check_sms; ?>>
														<i></i>SMS</label>	
												</div>
												<div class="col col-4">
													<label class="checkbox">
														<input type="checkbox" name="mode_comm"  value="Telephone" <?php echo $check_tel; ?>>
														<i></i>Telephone</label>	
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Reporting</h2></label>
											<div class="row">
												<div class="col col-12">
													<label class="checkbox">
														<input type="checkbox" name="reporting"  value="Technical Report" <?php echo $check_tech; ?>>
														<i></i>Technical Report</label>
													<label class="checkbox">
														<input type="checkbox" name="reporting"  value="Progress Report" <?php echo $check_progress; ?>>
														<i></i>Progress Report</label>
													<label class="checkbox">
														<input type="checkbox" name="reporting"  value="Final Report" <?php echo $check_final; ?>>
														<i></i>Final Report</label>
														<label class="checkbox">
														<input type="checkbox" name="reporting"  value="Others" <?php echo $check_otherreport; ?>>
														<i></i>Others</label>
													<label class="input">
														<input type="text" class="input-xs" name="name" id="name" placeholder="Fill in if 'Others'" value="<?php echo $other_report;?>">
													</label>
												</div>
											</div>
										</section>
									</fieldset>
		
									<?php
									$q = "SELECT * FROM project WHERE projectid = '$projectid'";
										$r = mysql_query($q);
										while ($row = mysql_fetch_array($r))
										{	
											$cir_status = $row['cir_status'];
										}
										
										if (strpos($cir_status,'Complete') !== false)
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
		
		// START AND FINISH DATE
		$('#requestdate').datepicker({
			dateFormat : 'dd.mm.yy',
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