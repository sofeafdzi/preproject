<?php
include "webconfig.php";
$projectid = $_GET['track'];

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

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Pre-Project Value Creation Form";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
//$page_nav["pvc"]["active"] = true;
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
							<h2>Pre-Project Value Creation Form</h2>
		
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
		
								<form class="smart-form" method="post" action="process_pvc.php">
								<input type="hidden" name="projectid" value="<?php echo $projectid; ?>">
								
									<header>
										Projected Quantification of Value Creation
									</header>
									<?php
									//title
									$q = "
									SELECT * FROM project WHERE projectid = '$projectid'";

									$r = mysql_query($q);
									while ($row = mysql_fetch_array($r))
									{	
										$title = $row['title'];
									}
									?>

									<fieldset>
										<section>
											<label class="label"><h2>Project Title</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="title"><?php echo $title; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Expected Adoption Level</h2></label>
											<label class="select">
												<select name="adoption_level">
													<option>Select Adoption Level</option>
													<option value="Level 1" <?php echo $l1; ?>>Level 1 : Client shows commitment in the adoption of the findings (in part or in full)</option>
													<option value="Level 2" <?php echo $l2; ?>>Level 2 : Adopted or in the process of adoption by client (in part or in full)</option>
													<option value="Level 3" <?php echo $l3; ?>>Level 3 : Adopted selectively within the division</option>
													<option value="Level 4" <?php echo $l4; ?>>Level 4 : Adopted throughout the division</option>
													<option value="Level 5" <?php echo $l5; ?>>Level 5 : Adopted beyond the (client) division</option>
													<option value="Level 6" <?php echo $l6; ?>>Level 6 : Adopted beyond the TNB</option>
												</select>
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Description of Value Creation</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="description"><?php echo $description; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Assumptions Made in Projected Quantification</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="quantification"><?php echo $quantification; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Expected Value Creation Year 1</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="vc1"><?php echo $vc1; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Expected Value Creation Year 2</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="vc2"><?php echo $vc2; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Expected Value Creation Year 3</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="vc3"><?php echo $vc3; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Expected Value Creation Year 4</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="vc4"><?php echo $vc4; ?></textarea> 
											</label>
										</section>
										
										<section>
											<label class="label"><h2>Expected Value Creation Year 5</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="vc5"><?php echo $vc5; ?></textarea> 
											</label>
										</section>
										
									</fieldset>
		
										<?php
									$q = "SELECT * FROM project WHERE projectid = '$projectid'";
										$r = mysql_query($q);
										while ($row = mysql_fetch_array($r))
										{	
											$pvc_status = $row['pvc_status'];
										}
										
										if (strpos($pvc_status,'Complete') !== false)
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
				<!-- row -->
				
					</section>
		<!-- end widget grid -->
				
					<!-- widget grid -->
		<section id="widget-grid" class="">
		<div class="row">
	
		
		
				<article class="col-sm-12 col-md-12 col-lg-12">
		
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-teal" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
							<h2>Guidelines</h2>
		
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
								<form class="smart-form">
	
									<fieldset>
										<section>
											1.	Review the background and problem statement of your project. And identify the potential benefits of the project.<br>
											2.	Describe the benefits that the customer can derive from the adoption of your findings.<br>
											3.	Try to provide a quantifiable estimate based on the benefits description above.<br>
											4.	Write down all the assumptions made in deriving the above estimate.<br>
											5.	You are encouraged to contact the project owner and discuss with him/her on your evaluation.<br>

										</section>
									</fieldset>

								</form>
		
							</div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
					
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-teal" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
							<h2>Example of Value Creation Estimation</h2>
		
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
								<form class="smart-form">
	
									<fieldset>
										<section>
											<u>Title</u>: The Study on Evaluation of Different Types of Three Cores 11kV Cable Joints for Underground Cable for TNB Distribution<br><br>

											<u>Background</u>: TNBD has experienced many supply interruption (tripping) due to cable joint failure. TNBR is asked to evaluate and determine the most suitable type of cable joint to be used to reduce the cable joint failure.
											<br><br>

											<u>Research Outcome</u>: Your project has the potential of providing a recommendation of a particular type of cable joint that could reduce the cable joint failure.
											<br><br>

											<u>Expected Adoption Level</u>: Level 3. TNBD potentially is able to adopt your research findings.
											<br><br>

											<u>Value Creation Description</u>: The adoption of the finding has the potential of improving SAIDI due to a reduction in cable joint failure. The joint technique to be recommended also may result in shorter jointing time compared to the current method.
											<br><br>

											<u>Value Creation estimation</u>:
											Loss of revenue per tripping (kwh x RM0.2 per kwh) = RM XXX<br>
											Cost of repair (workmanship, materials, etc) = RM YYY<br>
											Cost saving due to ease of installation per joint = RM ZZZ (Rate per hour per team x 3 hours) <br>
											Total estimated value creation = (RM XXX + YYY) x no of tripping avoided + (ZZZ) x no of joints implemented<br>
											Write down all assumptions made.
											
										</section>
									</fieldset>

								</form>
		
							</div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
		
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-teal" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
							<h2>Level of Adoption</h2>
		
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
								<form class="smart-form">
	
									<fieldset>
										<section>
											Level 5 : Adopted beyond the (client) division<br>
											Level 4 : Adopted throughout the division<br>
											Level 3 : Adopted selectively within the division<br>
											Level 2 : Adopted or in the process of adoption by client (in part or in full)<br>
											Level 1 : Client shows commitment in the adoption of the findings (in part or in full)
											
										</section>
									</fieldset>

								</form>
		
							</div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
		
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