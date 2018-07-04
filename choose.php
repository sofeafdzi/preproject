<?php
$projectid = $_GET['projectid'];

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Blank Page";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["project"]["sub"]["list"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		$breadcrumbs["Misc"] = "";
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

						<form id="send-form" class="smart-form" action="send.php" method="POST">
							<input type="hidden" name="projectid" value="<?php echo $projectid; ?>">

									<fieldset>
										<section>
											<div class="row">
												<label class="label col col-2">Submit to</label>
												<div class="col col-10">
													<label class="select">
														<?php
														echo "<select name=\"reviewer\">";
														echo "<option>Choose Name</option>";
														$q ="
														SELECT name, Username 
														FROM staff
														WHERE status = 'Active'
														ORDER BY name";
														$r = mysql_query($q);
														while ($row = mysql_fetch_row($r))
														{															
															if ($row[0] == $reviewer) 
																{
																$selected=" selected";
																}
																else 
																{
																$selected="";
																}
															echo '<option value="'.$row[1].'"'.$selected.'>'.strtoupper($row[0])."</option>";
														}
														echo "</select> ";	
													?>
													 <i></i></label>
												</div>
											</div>
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
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script>

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>