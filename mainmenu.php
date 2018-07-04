<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Dashboard";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["dashboard"]["active"] = true;
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
					<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
							<h2>Profile</h2>

						</header>

						<!-- widget div-->
						<div>
						<!-- widget edit box -->
						
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body">
								<p>
									My details..
								</p>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Column name</th>
											<th>Column name</th>
											<th>Column name</th>
											<th>Column name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Row 1</td>
											<td>Row 2</td>
											<td>Row 3</td>
											<td>Row 4</td>
										</tr>
										<tr>
											<td>Row 1</td>
											<td>Row 2</td>
											<td>Row 3</td>
											<td>Row 4</td>
										</tr>
										<tr>
											<td>Row 1</td>
											<td>Row 2</td>
											<td>Row 3</td>
											<td>Row 4</td>
										</tr>
										<tr>
											<td>Row 1</td>
											<td>Row 2</td>
											<td>Row 3</td>
											<td>Row 4</td>
										</tr>
										<tr>
											<td>Row 1</td>
											<td>Row 2</td>
											<td>Row 3</td>
											<td>Row 4</td>
										</tr>
										<tr>
											<td>Row 1</td>
											<td>Row 2</td>
											<td>Row 3</td>
											<td>Row 4</td>
										</tr>
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
							<h2>My Project History</h2>
		
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
											<th>ID</th>
											<th>Name</th>
											<th>Phone</th>
											<th>Company</th>
											<th>Zip</th>
											<th>City</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Jennifer</td>
											<td>1-342-463-8341</td>
											<td>Et Rutrum Non Associates</td>
											<td>35728</td>
											<td>Fogo</td>
											<td>03/04/14</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Clark</td>
											<td>1-516-859-1120</td>
											<td>Nam Ac Inc.</td>
											<td>7162</td>
											<td>Machelen</td>
											<td>03/23/13</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Brendan</td>
											<td>1-724-406-2487</td>
											<td>Enim Commodo Limited</td>
											<td>98611</td>
											<td>Norman</td>
											<td>02/13/14</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Warren</td>
											<td>1-412-485-9725</td>
											<td>Odio Etiam Institute</td>
											<td>10312</td>
											<td>Sautin</td>
											<td>01/01/13</td>
										</tr>
										<tr>
											<td>5</td>
											<td>Rajah</td>
											<td>1-849-642-8777</td>
											<td>Neque Ltd</td>
											<td>29131</td>
											<td>Glovertown</td>
											<td>02/16/13</td>
										</tr>
										<tr>
											<td>6</td>
											<td>Demetrius</td>
											<td>1-470-329-9627</td>
											<td>Euismod In Ltd</td>
											<td>1883</td>
											<td>Kapolei</td>
											<td>03/15/13</td>
										</tr>
										<tr>
											<td>7</td>
											<td>Keefe</td>
											<td>1-188-191-2346</td>
											<td>Molestie Industries</td>
											<td>2211BM</td>
											<td>Modena</td>
											<td>07/08/13</td>
										</tr>
										<tr>
											<td>8</td>
											<td>Leila</td>
											<td>1-663-655-8904</td>
											<td>Est LLC</td>
											<td>75286</td>
											<td>Hondelange</td>
											<td>12/09/12</td>
										</tr>
										<tr>
											<td>9</td>
											<td>Fritz</td>
											<td>1-598-234-7837</td>
											<td>Et Ultrices Posuere Institute</td>
											<td>2324</td>
											<td>Monte San Pietrangeli</td>
											<td>12/29/12</td>
										</tr>
										<tr>
											<td>10</td>
											<td>Cassady</td>
											<td>1-212-965-8381</td>
											<td>Vitae Erat Vel Company</td>
											<td>5898</td>
											<td>Huntly</td>
											<td>10/07/13</td>
										</tr>
										<tr>
											<td>11</td>
											<td>Rogan</td>
											<td>1-541-654-9030</td>
											<td>Iaculis Incorporated</td>
											<td>6464JN</td>
											<td>Carson City</td>
											<td>05/30/13</td>
										</tr>
										<tr>
											<td>12</td>
											<td>Candice</td>
											<td>1-153-708-6027</td>
											<td>Pellentesque Company</td>
											<td>8565</td>
											<td>Redruth</td>
											<td>02/25/14</td>
										</tr>
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

	/* END TABLE TOOLS */
	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>