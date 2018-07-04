<?php
include "webconfig.php";

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Project";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["smod"]["active"] = true;
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
		
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
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
							<span class="widget-icon"> <i class="fa fa-table"></i> </span>
							<h2>Submission</h2>
		
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
								<div class="widget-body-toolbar">
		
								</div>
								<table id="datatable_tabletools" class="table table-striped table-hover">
									<thead>
										<tr>
											<th>No.</th>
											<th>Contributor</th>
											<th>Date Submitted</th>
											<th>Project Name</th>	
											<th>ID</th>
											<th>PI</th>
											<th>CIR</th>
											<th>PVC</th>
											<th>Proposal</th>
											<th>PIM</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$q = "SELECT * FROM project WHERE manager_status LIKE '%Approved%'";

									$r = mysql_query($q);
									while ($row = mysql_fetch_array($r))
									{	
										$projectid = $row['projectid'];
										$username = $row['username'];
										$title = $row['title'];
										$date_created = $row['date_created'];
										$pi_status = $row['pi_status'];
										$cir_status = $row['cir_status'];
										$pvc_status = $row['pvc_status'];
										$proposal_status = $row['proposal_status'];
										$pim_status = $row['pim_status'];
										$reviewer = $row['reviewer'];
										$date_send = $row['date_send'];
										$manager_status = $row['manager_status'];
										
										$no++;
										
										if
										(
										(strpos($pi_status,'Complete') !== false) &&
										(strpos($cir_status,'Complete') !== false) &&
										(strpos($pvc_status,'Complete') !== false) &&
										(strpos($proposal_status,'Complete') !== false) &&
										(strpos($pim_status,'Complete') !== false)
										)
										{	
											$submission = "<a data-toggle=\"modal\" href=\"#submission\"><font color=\"74E059\"><strong>Ready to Submit</strong></font></a>";
										}
										else
										{	
											$submission = "<font color=\"FF0000\"><strong>Incomplete</strong></font>";
										}
										
										if ($reviewer != '')
										{
											$submission = "<a data-toggle=\"modal\" href=\"#submission\"><font color=\"32A3D3\"><strong>Submitted</strong></font></a>";
										}
										
										if ($manager_status != '')
										{
											$submission = $manager_status;
										}
										
										$q2 ="
										SELECT name 
										FROM staff
										WHERE Username = '$username'";
										$r2 = mysql_query($q2);
										while ($row = mysql_fetch_array($r2))
										{														
											$username = $row['name'];
										}

								
									?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $username; ?></td>
											<td><?php echo $date_send; ?></td>
											<td><?php echo $title; ?></td>
											<td><?php echo $projectid; ?></td>
											<td><a href="pi.php?track=<?php echo $projectid; ?>"><?php echo $pi_status; ?></a></td>
											<td><a href="cir.php?track=<?php echo $projectid; ?>"><?php echo $cir_status; ?></a></td>
											<td><a href="pvc.php?track=<?php echo $projectid; ?>"><?php echo $pvc_status; ?></a></td>
											<td><a href="proposal.php?track=<?php echo $projectid; ?>"><?php echo $proposal_status; ?></a></td>
											<td><a href="pim.php?track=<?php echo $projectid; ?>"><?php echo $pim_status; ?></a></td>
											<td><?php echo $submission; ?></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
				</article>
				<!-- WIDGET END -->
			</div>
			<!-- end row -->
			<div class="note">
			<strong>Legend:</strong><br>
			PI : Product Initiation Form<br>
			CIR : Customer Information and Requirement Form<br>
			PVC : Project Value Creation Form<br>
			PIM : Project Impact Matrix Form
			</div>
		</section>
		<!-- end widget grid -->
	</div>
	
	
	<!-- Modal -->
		<div class="modal fade" id="submission" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body no-padding">

						<form id="send-form" class="smart-form" action="send_manager.php" method="POST">
							<input type="hidden" name="projectid" value="<?php echo $projectid; ?>">

									<fieldset>
										<section>
											<div class="row">
												<label class="label col col-2">Status</label>
												<div class="col col-10">
													<label class="select">
														<?php
														echo "<select name=\"manager_status\">";
														echo "<option>Choose Status</option>";
														$q ="
														SELECT id, status
														FROM status
												        ORDER BY status";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{															
															if ($row[0] == $status) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[1].'"'.$selected.'>'.$row[1]."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i></label>
												</div>
											</div>
										</section>
										
										<section>
											<label class="label"><h2>Remarks (If Applicable)</h2></label>
											<label class="textarea textarea-resizable">
											<textarea rows="3" class="custom-scroll" name="remarks"><?php echo $remarks; ?></textarea> 
											</label>
										</section>
										
									<footer>
										<button type="submit" class="btn btn-primary">
											Submit
										</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">
											Cancel
										</button>

									</footer>
								</form>						
								

					</div>

				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
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

	/* END TABLE TOOLS */
	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>