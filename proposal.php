<?php
include "webconfig.php";
$projectid = $_GET['track'];

$q = "
SELECT * FROM proposal WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$background = $row['background'];
	$just_element = $row['just_element'];
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

$q = "
SELECT * FROM costing0 WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$s0 = $row['salary'];
	$r0 = $row['research_material'];
	$c0 = $row['consultancy'];
	$t0 = $row['seminar'];
	$m0 = $row['travelling'];
	$e0 = $row['equipment'];
	$d0 = $row['direct_oh'];
	$i0 = $row['indirect_oh'];
}

$q = "
SELECT * FROM costing1 WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$s1 = $row['salary'];
	$r1 = $row['research_material'];
	$c1 = $row['consultancy'];
	$t1 = $row['seminar'];
	$m1 = $row['travelling'];
	$e1 = $row['equipment'];
	$d1 = $row['direct_oh'];
	$i1 = $row['indirect_oh'];
}

$q = "
SELECT * FROM costing2 WHERE projectid = '$projectid'";

$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$s2 = $row['salary'];
	$r2 = $row['research_material'];
	$c2 = $row['consultancy'];
	$t2 = $row['seminar'];
	$m2 = $row['travelling'];
	$e2 = $row['equipment'];
	$d2 = $row['direct_oh'];
	$i2 = $row['indirect_oh'];
}

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Project Proposal Form";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
//$page_nav["proposal"]["active"] = true;
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
					<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
							<h2>Project Proposal Form</h2>
		
						</header>
						
						<!-- widget div-->
						<div>
		
							<!-- widget content -->
							<div class="widget-body">
								<ul id="myTab3" class="nav nav-tabs tabs-pull-left bordered">
									<li class="active">
										<a href="#1" data-toggle="tab">Background</a>
									</li>
									<li class="pull-left">
										<a href="#2" data-toggle="tab">Justification of Research Element</a>
									</li>
									<li class="pull-left">
										<a href="#3" data-toggle="tab">Objective</a>
									</li>
									<li class="pull-left">
										<a href="#4" data-toggle="tab">Customer Requirement</a>
									</li>
									<li class="pull-left">
										<a href="#5" data-toggle="tab">Project Impact</a>
									</li>
									<li class="pull-left">
										<a href="#60" data-toggle="tab">Methodology</a>
									</li>
									<li class="pull-left">
										<a href="#70" data-toggle="tab">Scope</a>
									</li>
									<li class="pull-left">
										<a href="#80" data-toggle="tab">Deliverables</a>
									</li>
									<li class="pull-left">
										<a href="#90" data-toggle="tab">Project Schedule</a>
									</li>
									<li class="pull-left">
										<a href="#10" data-toggle="tab">Critical Path Analysis</a>
									</li>
									<li class="pull-left">
										<a href="#11" data-toggle="tab">Milestone</a>
									</li>
									<li class="pull-left">
										<a href="#12" data-toggle="tab">Human Resource</a>
									</li>
									<li class="pull-left">
										<a href="#130" data-toggle="tab">Facilities</a>
									</li>
									<li class="pull-left">
										<a href="#145" data-toggle="tab">Costing</a>
									</li>
									<li class="pull-left">
										<a href="#158" data-toggle="tab">Statutory and Regulatory Requirements</a>
									</li>
									<li class="pull-left">
										<a href="#164" data-toggle="tab">Project Organisation</a>
									</li>
									<li class="pull-left">
										<a href="#179" data-toggle="tab">References</a>
									</li>
									<li class="pull-left">
										<a href="#188" data-toggle="tab">Document Upload</a>
									</li>
									<li class="pull-left">
										<a href="#192" data-toggle="tab">Summary (PDF)</a>
									</li>
								</ul>
								
								<form enctype="multipart/form-data"  class="smart-form" method="post" action="process_proposal.php">
								<input type="hidden" name="projectid" value="<?php echo $projectid; ?>">
								<br>
								<div id="myTabContent3" class="tab-content padding-2">
									<div class="tab-pane fade in active" id="1">
										<p>
											<label class="textarea textarea-resizable"><textarea rows="20" class="custom-scroll"name="background"><?php echo $background; ?></textarea></label>
											<div class="note">
												<strong>Note:</strong> General outline and background of the project. Define the problem statement. State earlier situation that lead to the proposed project. Indicate if the project is new, modified or extended. Describe related projects to assist in assessing the research rationale and the potential for success. Report the findings of technology scanning carried out.
											</div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
										<p>	
									<div class="tab-pane fade in" id="2">
											<div class="note">
												<strong>Note:</strong> Include this table in the proposal and tick (v) where applicable and with proper justification and explanation.<br>
												The justification shall falls into either one or more of the following criteria:
											</div>
											<div class="row">
												<div class="col col-12">
													<label class="checkbox">
														<input type="checkbox" name="just_element" value="Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology" <?php echo $check_e1; ?>>
														<i></i>Experimental or other work aimed at the discovery of new knowledge or advancement of existing technology</label>
													<label class="checkbox">
														<input type="checkbox" name="just_element" value="Design, construction & testing of prototypes & models" <?php echo $check_e2; ?>>
														<i></i>Design, construction & testing of prototypes & models</label>
													<label class="checkbox">
														<input type="checkbox" name="just_element"  value="Search for application of research findings or other knowledge"  <?php echo $check_e3; ?>>
														<i></i>Search for application of research findings or other knowledge</label>
													<label class="checkbox">
														<input type="checkbox" name="just_element"  value="Research to devise new methods of testing (excluding routine & standardisation)"  <?php echo $check_e4; ?>>
														<i></i>Research to devise new methods of testing (excluding routine & standardisation)</label>
													<label class="checkbox">
														<input type="checkbox" name="just_element" value="Formulation & design of possible new or improved product or process alternatives"  <?php echo $check_e5; ?>>
														<i></i>Formulation & design of possible new or improved product or process alternatives</label>
												</div>
											</div>
											<br>
											<div class="note">
												<strong>Note:</strong> Please state the justification based of your choice above.
											</div>
											<br>
											<label class="textarea textarea-resizable"><textarea rows="15" class="custom-scroll"name="justification_element"><?php echo $justification_element; ?></textarea></label>
											<br>	
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in" id="3">
									<div class="content_wrapper">
											<div class="form_style">
											Objective
											<label class="textarea textarea-resizable">
												<textarea name="objective" id="objectiveText" cols="45" rows="5"></textarea>
												</label>
												<br>
												<input type="hidden" name="projectid" id="projectidText" value="<?php echo $projectid; ?>">
												<button id="ObjectiveFormSubmit">Add Objective</button>
											</div>
											<br><br><br>

											<?php
											include "webconfig.php";
											$r = mysql_query("SELECT * FROM objective WHERE projectid = '$projectid'");
											?>
											<table id="objective_tabletools" class="table table-striped table-hover">
												<thead>
													<tr>
														<th>No.</th>
														<th>Objective</th>
														<th>Action</th>
													</tr>
												</thead>
											<tbody id="responds_objective">
																															
											<?php
											while($row = mysql_fetch_array($r))
											{
											$id = $row['id'];
											$objective = $row['objective'];
											$noobjective++;

											?>
											<tr id="<?php echo $id; ?>">
												<td width=3%><?php echo $noobjective; ?></td>
												<td width=87%><?php echo $objective; ?></td>
												<td width=10%><a href="#" class="delete_objective" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
											  </tr>
											<?php
											  }
											?>
											</tbody>
											</table>
											</div>
											<div class="note">
													<strong>Note:</strong> Define the specific objectives of the project.
											</div>
											<p>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in" id="4">
										<p>	
											<label class="textarea textarea-resizable">
											<textarea rows="15" name="cust_require"><?php echo $cust_require; ?></textarea>
											</label>
											<div class="note">
												<strong>Note:</strong> List the requirements of the Customer in term of scope and deliverables.
											</div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="5">
									<div class="content_wrapper">
											<div class="form_style">
											Project Impact
											<label class="textarea textarea-resizable">
												<textarea name="project_impact" id="projectimpactText" cols="45" rows="5"></textarea>
												</label>
												<br>
												<input type="hidden" name="projectid" id="projectidText" value="<?php echo $projectid; ?>">
												<button id="ProjectImpactFormSubmit">Add Project Impact</button>
											</div>
											<br><br><br>

											<?php
											include "webconfig.php";
											$r = mysql_query("SELECT * FROM project_impact WHERE projectid = '$projectid'");
											?>
											<table id="projectimpact_tabletools" class="table table-striped table-hover">
												<thead>
													<tr>
														<th>No.</th>
														<th>Project Impact</th>
														<th>Action</th>
													</tr>
												</thead>
											<tbody id="responds_projectimpact">
																															
											<?php
											while($row = mysql_fetch_array($r))
											{
											$id = $row['id'];
											$project_impact = $row['project_impact'];
											$noimpact++;

											?>
											<tr id="<?php echo $id; ?>">
												<td width=3%><?php echo $noimpact; ?></td>
												<td width=87%><?php echo $project_impact; ?></td>
												<td width=10%><a href="#" class="delete_projectimpact" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
											  </tr>
											<?php
											  }
											?>
											</tbody>
											</table>
											</div>
											<div class="note">
												<strong>Note:</strong> Explain how the project would impact the Customer’s business performance.
											</div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="60">
										<p>	
											<label class="textarea textarea-resizable">
											<textarea rows="15" name="methodology"><?php echo $methodology; ?></textarea>
											</label>
											<div class="note">
												<strong>Note:</strong> 
												Describe the approach to implement the project. Describe the techniques (experimental or computational) that will be utilised to implement the project. Identify the equipment, facilities and infrastructure which are required for the project.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="70">
										<p>	
											<label class="textarea textarea-resizable">
											<textarea rows="15" name="scope"><?php echo $scope; ?></textarea>
											</label>
											<div class="note">
												<strong>Note:</strong> 
												List the scope of work or main activities in the project.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="80">
									<div class="content_wrapper">
											<div class="form_style">
											Deliverables
											<label class="textarea textarea-resizable">
												<textarea name="deliverables" id="deliverablesText" cols="45" rows="5"></textarea>
												</label>
												<br>
												<input type="hidden" name="projectid" id="projectidText" value="<?php echo $projectid; ?>">
												<button id="DeliverablesFormSubmit">Add Deliverables</button>
											</div>
											<br><br><br>

											<?php
											include "webconfig.php";
											$r = mysql_query("SELECT * FROM deliverables WHERE projectid = '$projectid'");
											?>
											<table id="deliverables_tabletools" class="table table-striped table-hover">
												<thead>
													<tr>
														<th>No.</th>
														<th>Deliverables</th>
														<th>Action</th>
													</tr>
												</thead>
											<tbody id="responds_deliverables">
																															
											<?php
											while($row = mysql_fetch_array($r))
											{
											$id = $row['id'];
											$deliverables = $row['deliverables'];
											$nodeliverables++;

											?>
											<tr id="<?php echo $id; ?>">
												<td width=3%><?php echo $nodeliverables; ?></td>
												<td width=87%><?php echo $deliverables; ?></td>
												<td width=10%><a href="#" class="delete_deliverables" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
											  </tr>
											<?php
											  }
											?>
											</tbody>
											</table>
											</div>
											<div class="note">
												<strong>Note:</strong> 
												The description of the end product to be accomplished as specified by the Customer requirements.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="90">
										<p>	
											<div class="note">
												<strong>Note:</strong> 
												To table the breakdown of each project activities in sufficient detail and show the relationship between all activities and time of implementation in the form of a Gantt Chart. The Gantt Chart shall include the following items:-
												<br><br>
												* Title of the project<br>
												* Gantt Chart revision number<br>
												* Date<br>
												* All activities shall be properly numbered (eg. Activity ID No.)<br>
												* Project activities presented in sufficient detail to cover the whole project duration<br>
												* A Planned Output column for each activity. (eg. Activity: Literature Survey; Planned Output: Literature Report)<br>
												* Details of planned training<br>
												* Details of testing and commissioning<br>
												* Hand-over date<br>
											 </div>
											<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
											<div class="input input-file">
												<span class="button"><input type="file" id="file" name="file_schedule" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Upload Project Schedule" readonly="">
											</div>	
											<a href="<?php echo $target_schedule; ?>">Save/View Uploaded Form</a>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="10">
										<p>	
											<label class="textarea textarea-resizable">
											<textarea rows="15" name="critical_path"><?php echo $critical_path; ?></textarea>
											</label>
											<div class="note">
												<strong>Note:</strong> 
												Conduct a critical path analysis on the list of activities.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="11">							
										<div class="content_wrapper">
											<div class="form_style">
											Deadline
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="date_milestone" id="datemilestoneText" value="<?php echo $date_milestone; ?>">
											</label>
											<br>
											Milestone
											<label class="textarea textarea-resizable">
												<textarea name="milestone" id="milestoneText" cols="45" rows="5"></textarea>
												</label>
												<br>
												<input type="hidden" name="projectid" id="projectidText" value="<?php echo $projectid; ?>">
												<button id="MilestoneFormSubmit">Add Milestone</button>
											</div>
											<br><br><br>

											<?php
											include "webconfig.php";
											$r = mysql_query("SELECT * FROM milestone WHERE projectid = '$projectid'");
											?>
											<table id="milestone_tabletools" class="table table-striped table-hover">
												<thead>
													<tr>
														<th>No.</th>
														<th>Deadline</th>
														<th>Milestone</th>
														<th>Action</th>
													</tr>
												</thead>
											<tbody id="responds">
																															
											<?php
											while($row = mysql_fetch_array($r))
											{
											$id = $row['id'];
											$date_milestone = $row['date_milestone'];
											$milestone = $row['milestone'];
											$nomilestone++;

											?>
											<tr id="<?php echo $id; ?>">
												<td width=3%><?php echo $nomilestone; ?></td>
												<td width=10%><?php echo $date_milestone; ?></td>
												<td width=77%><?php echo $milestone; ?></td>
												<td width=10%><a href="#" class="delete" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
											  </tr>
											<?php
											  }
											?>
											</tbody>
											</table>
											</div>
											<div class="note">
												<strong>Note:</strong> 
												List down the milestones of the project.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="12">
										<p>	
											<label class="textarea textarea-resizable">
											<textarea rows="15" name="human_resource"><?php echo $human_resource; ?></textarea>
											</label>
											<div class="note">
												<strong>Note:</strong> 
												List out the project team members and the corresponding planned scope and duration of work.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="130">
										<p>	
											<label class="textarea textarea-resizable">
											<textarea rows="15" name="facilities"><?php echo $facilities; ?></textarea>
											</label>
											<div class="note">
												<strong>Note:</strong> 
												To list down the facilities for example equipment, material, laboratory etc., as needed for the project.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="145">
										<p>	
											<div class="note">
												<strong>Note:</strong> 
												Please refer to Project Costing Software for detailed calculation method.
											 </div>
											<div class="input input-file">
											<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
												<span class="button"><input type="file" id="file" name="file_costing" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Upload Project Costing" readonly="">
											</div>	
											<a href="<?php echo $target_costing; ?>">Save/View Uploaded Form</a>
											<br><br>
											
											<div class="note">
												<strong>Note:</strong> 
												The cost (in RM) for the performance of the above mentioned R&D project in accordance to the objectives of the project, its related scope of works and agreed deliverables as stated in the project proposal, is hereby summarised as follows:-				
											 </div>
											 
											 
											 
											<div class="costing">
											<table id="activity_table" class="table table-striped table-hover">
											 <tr align="center">
												<th width="30%">Description</th>
												<th width="20%">Financial Year Cost (RM)</th>
												<th width="20%">&nbsp;</th>
												<th width="20%">&nbsp;</th>
												<th width="10%">&nbsp;</th>
											</tr>
											 <tr align="center">
												<td>&nbsp;</td>
												<td>Year 1</td>
												<td>Year 2</td>
												<td>Year 3</td>
												<td>Total</td>
											</tr>
											<tr>
												<td>1. Salary</td>
												<td><input type="text" class="txtfld" name="s0" value="<?php echo $s0; ?>"></td>
												<td><input type="text" class="txtfld" name="s1" value="<?php echo $s1; ?>"></td>
												<td><input type="text" class="txtfld" name="s2" value="<?php echo $s2; ?>"></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>2. Research Material</td>
												<td><input type="text" class="txtfld" name="r0" value="<?php echo $r0; ?>"></td>
												<td><input type="text" class="txtfld" name="r1" value="<?php echo $r1; ?>"></td>
												<td><input type="text" class="txtfld" name="r2" value="<?php echo $r2; ?>"></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>3. Specialised Services & Consultancy</td>
												<td><input type="text" class="txtfld" name="c0" value="<?php echo $c0; ?>"></td>
												<td><input type="text" class="txtfld" name="c1" value="<?php echo $c1; ?>"></td>
												<td><input type="text" class="txtfld" name="c2" value="<?php echo $c2; ?>"></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>4. Seminar & Training</td>
												<td><input type="text" class="txtfld" name="t0" value="<?php echo $t0; ?>"></td>
												<td><input type="text" class="txtfld" name="t1" value="<?php echo $t1; ?>"></td>
												<td><input type="text" class="txtfld" name="t2" value="<?php echo $t2; ?>"></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>5. Travelling & Miscellaneous</td>
												<td><input type="text" class="txtfld" name="m0" value="<?php echo $m0; ?>"></td>
												<td><input type="text" class="txtfld" name="m1" value="<?php echo $m1; ?>"></td>
												<td><input type="text" class="txtfld" name="m2" value="<?php echo $m2; ?>"></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>6. Research Equipment</td>
												<td><input type="text" class="txtfld" name="e0" value="<?php echo $e0; ?>"></td>
												<td><input type="text" class="txtfld" name="e1" value="<?php echo $e1; ?>"></td>
												<td><input type="text" class="txtfld" name="e2" value="<?php echo $e2; ?>"></td>
												<td>&nbsp;</td>
											</tr>	
											<tr>
												<td>7. Direct Overhead</td>
												<td><input type="text" class="txtfld" name="d0" value="<?php echo $d0; ?>"></td>
												<td><input type="text" class="txtfld" name="d1" value="<?php echo $d1; ?>"></td>
												<td><input type="text" class="txtfld" name="d2" value="<?php echo $d2; ?>"></td>
												<td>&nbsp;</td>
											</tr>	
											<tr>
												<td>8. Indirect Overhead</td>
												<td><input type="text" class="txtfld" name="i0" value="<?php echo $i0; ?>"></td>
												<td><input type="text" class="txtfld" name="i1" value="<?php echo $i1; ?>"></td>
												<td><input type="text" class="txtfld" name="i2" value="<?php echo $i2; ?>"></td>
												<td>&nbsp;</td>
											</tr>	
											<?php 
											$total0 = $s0 + $r0 + $c0 + $t0 + $m0 + $e0 + $d0 + $i0;
											$total1 = $s1 + $r1 + $c1 + $t1 + $m1 + $e1 + $d1 + $i1;
											$total2 = $s2 + $r2 + $c2 + $t2 + $m2 + $e2 + $d2 + $i2;
											$total = $total0 + $total1 + $total2;
											?>
											<tr>
												<td>TOTAL (WITHOUT GST)</td>
												<td><?php echo $total0; ?></td>
												<td><?php echo $total1; ?></td>
												<td><?php echo $total2; ?></td>
												<td><?php echo $total; ?></td>
											</tr>
											</table>
											</div>
											
											

											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="158">
										<p>	
											<label class="textarea textarea-resizable">
											<textarea rows="15" name="statutory"><?php echo $statutory; ?></textarea>
											</label>
											<div class="note">
												<strong>Note:</strong> 
												Any statutory and regulatory requirement, standard and guidelines shall be identified where applicable to the project. All documents listed here shall be registered and controlled through the Document Control Centre.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="164">
										<p>	
										<div class="note">
												<strong>Note:</strong> 
												To indicate the project organisation structure including the names of the project team members, roles and responsibilities, authorisation, monitoring and control, and line of communication. Refer to Guideline on Project Organisation Structure. 
											 </div>
											<div class="input input-file">
											<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
												<span class="button"><input type="file" id="file" name="file_organisation" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Upload Project Organisation" readonly="">
											</div>
											<a href="<?php echo $target_organisation; ?>">Save/View Uploaded Form</a>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="179">
									<div class="content_wrapper">
											<div class="form_style">
											Reference
											<label class="textarea textarea-resizable">
												<textarea name="references" id="referencesText" cols="45" rows="5"></textarea>
												</label>
												<br>
												<input type="hidden" name="projectid" id="projectidText" value="<?php echo $projectid; ?>">
												<button id="ReferencesFormSubmit">Add Reference</button>
											</div>
											<br><br><br>

											<?php
											include "webconfig.php";
											$r = mysql_query("SELECT * FROM reference WHERE projectid = '$projectid'");
											?>
											<table id="references_tabletools" class="table table-striped table-hover">
												<thead>
													<tr>
														<th>No.</th>
														<th>References</th>
														<th>Action</th>
													</tr>
												</thead>
											<tbody id="responds_references">
																															
											<?php
											while($row = mysql_fetch_array($r))
											{
											$id = $row['id'];
											$references = $row['reference'];
											$no_ref++;

											?>
											<tr id="<?php echo $id; ?>">
												<td width=3%><?php echo $no_ref; ?></td>
												<td width=87%><?php echo $references; ?></td>
												<td width=10%><a href="#" class="delete_references" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
											  </tr>
											<?php
											  }
											?>
											</tbody>
											</table>
											</div>
											<div class="note">
												<strong>Note:</strong> 
												To identify any references (e.g. books, literature etc.) relevant to the project. 
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="188">
										<p>	
										<div class="note">
												<strong>Note:</strong> 
												Upload full proposal (.doc, .docx) here.
											 </div>
											<div class="input input-file">
											<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
												<span class="button"><input type="file" id="file" name="file_proposal" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Full Proposal Upload" readonly="">
											</div>
											<a href="<?php echo $target_proposal; ?>">Save/View Uploaded Form</a>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="save"> Save</button>
										</p>
									</div>
									<div class="tab-pane fade in " id="192">
										<p>	
										<div class="note">
												<strong>Note:</strong> 
												Cick button to generate PDF proposal summary.
											 </div>
											<br>
											<button type="submit" class="btn btn-primary" name="button" value="pdf"> Generate PDF</button>
										</p>
									</div>
								</div>
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
<script src="<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/ckeditor.js"></script>		

<script type="text/javascript">

	$(document).ready(function() {
	
		//Add Milestone
		$("#MilestoneFormSubmit").click(function (e) {
				e.preventDefault();
				if($("#milestoneText").val()==='')
				{
					alert("Please enter a milestone");
					return false;
				}
				if($("#datemilestoneText").val()==='')
				{
					alert("Please enter dateline for this milestone");
					return false;
				}
				var myData = $("#milestoneText,#projectidText,#datemilestoneText").serialize(); //build a post data structure
				jQuery.ajax({
				type: "POST",
				url: "action_milestone.php",
				dataType:"text",
				data:myData,
				success:function(response){
					$("#responds").append(response);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError);
				}
				});
		});
		
		//Delete Milestone
		$('table#milestone_tabletools td a.delete').click(function()
		{
			if (confirm("Are you sure you want to delete this row?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();

				$.ajax(
				{
					   type: "POST",
					   url: "delete_milestone.php",
					   data: data,
					   cache: false,
					
					   success: function()
					   {
							parent.fadeOut('slow', function() {$(this).remove();});
					   }
				 });				
			}
		});
		
		//Add Objective
		$("#ObjectiveFormSubmit").click(function (e) {
				e.preventDefault();
				if($("#objectiveText").val()==='')
				{
					alert("Please enter a objective");
					return false;
				}
				var myData = $("#objectiveText,#projectidText").serialize(); //build a post data structure
				jQuery.ajax({
				type: "POST",
				url: "action_objective.php",
				dataType:"text",
				data:myData,
				success:function(response){
					$("#responds_objective").append(response);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError);
				}
				});
		});
		
		//Delete Objective
		$('table#objective_tabletools td a.delete_objective').click(function()
		{
			if (confirm("Are you sure you want to delete this row?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();

				$.ajax(
				{
					   type: "POST",
					   url: "delete_objective.php",
					   data: data,
					   cache: false,
					
					   success: function()
					   {
							parent.fadeOut('slow', function() {$(this).remove();});
					   }
				 });				
			}
		});
		
		//Add Project Impact
		$("#ProjectImpactFormSubmit").click(function (e) {
				e.preventDefault();
				if($("#projectimpactText").val()==='')
				{
					alert("Please enter a project impact");
					return false;
				}
				var myData = $("#projectimpactText,#projectidText").serialize(); //build a post data structure
				jQuery.ajax({
				type: "POST",
				url: "action_projectimpact.php",
				dataType:"text",
				data:myData,
				success:function(response){
					$("#responds_projectimpact").append(response);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError);
				}
				});
		});
		
		//Delete Project Impact
		$('table#projectimpact_tabletools td a.delete_projectimpact').click(function()
		{
			if (confirm("Are you sure you want to delete this row?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();

				$.ajax(
				{
					   type: "POST",
					   url: "delete_projectimpact.php",
					   data: data,
					   cache: false,
					
					   success: function()
					   {
							parent.fadeOut('slow', function() {$(this).remove();});
					   }
				 });				
			}
		});
		
		//Add Deliverables
		$("#DeliverablesFormSubmit").click(function (e) {
				e.preventDefault();
				if($("#deliverablesText").val()==='')
				{
					alert("Please enter a project deliverable");
					return false;
				}
				var myData = $("#deliverablesText,#projectidText").serialize(); //build a post data structure
				jQuery.ajax({
				type: "POST",
				url: "action_deliverables.php",
				dataType:"text",
				data:myData,
				success:function(response){
					$("#responds_deliverables").append(response);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError);
				}
				});
		});
		
		//Delete Deliverables
		$('table#deliverables_tabletools td a.delete_deliverables').click(function()
		{
			if (confirm("Are you sure you want to delete this row?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();

				$.ajax(
				{
					   type: "POST",
					   url: "delete_deliverables.php",
					   data: data,
					   cache: false,
					
					   success: function()
					   {
							parent.fadeOut('slow', function() {$(this).remove();});
					   }
				 });				
			}
		});
		
		//Add References
		$("#ReferencesFormSubmit").click(function (e) {
				e.preventDefault();
				if($("#referencesText").val()==='')
				{
					alert("Please enter a project reference");
					return false;
				}
				var myData = $("#referencesText,#projectidText").serialize(); //build a post data structure
				jQuery.ajax({
				type: "POST",
				url: "action_references.php",
				dataType:"text",
				data:myData,
				success:function(response){
					$("#responds_references").append(response);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError);
				}
				});
		});
		
		//Delete References
		$('table#references_tabletools td a.delete_references').click(function()
		{
			if (confirm("Are you sure you want to delete this row?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();

				$.ajax(
				{
					   type: "POST",
					   url: "delete_references.php",
					   data: data,
					   cache: false,
					
					   success: function()
					   {
							parent.fadeOut('slow', function() {$(this).remove();});
					   }
				 });				
			}
		});

		$('#dt_basic').dataTable({
			"sPaginationType" : "bootstrap_full"
		});
		
		
		 $('.txtfld').bind({
            keyup:function(){ 
         //total calculation
                    $(".costing tr:not(:first, last) td:last-child").text(function () {
                        var totalVal = 0;
                        $(this).prevAll().each(function () {
                            totalVal += parseInt($(this).children('.txtfld').val()) || 0;
                            //totalVal += parseInt( );
                        });
                        return totalVal;
                    });

                    $(".costing tr:last td").text(function (i) {
                        var totalVal = 0;
                        $(this).parent().prevAll().find("td:nth-child(" + (++i) + ")").each(function () {
                            totalVal += parseInt($(this).children('.txtfld').val()) || 0;
                            $(".costing tr:last td:first").text('TOTAL (WITHOUT GST)');
                        });
                        return totalVal;

                    });
					
					var count=0
					for(i=1;i<$('tr').length;i++){
						var trs=parseInt($('tr:eq('+i+')').find('td:last').text())
						count+=trs
					}
					$(".costing tr:last td:last").text(count)
                 
            }
        });

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
		/* Fikirkan kemudian
		$('#objective_tabletools').dataTable({
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
		
		$('#projectimpact_tabletools').dataTable({
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
		
		$('#deliverables_tabletools').dataTable({
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
		
		$('#references_tabletools').dataTable({
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
		*/
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
		$('#datemilestoneText').datepicker({
			dateFormat : 'yy-mm-dd',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});
		
		CKEDITOR.replace( 'background', { height: '400px'} );
		CKEDITOR.replace( 'justification_element', { height: '200px'} );
		CKEDITOR.replace( 'cust_require', { height: '400px'} );
		//CKEDITOR.replace( 'projectimpact', { height: '100px'} );
		CKEDITOR.replace( 'methodology', { height: '400px'} );
		CKEDITOR.replace( 'scope', { height: '400px'} );
		//CKEDITOR.replace( 'deliverables', { height: '100px'} );
		CKEDITOR.replace( 'critical_path', { height: '400px'} );
		//CKEDITOR.replace( 'milestones', { height: '100px'} );
		CKEDITOR.replace( 'human_resource', { height: '400px'} );
		CKEDITOR.replace( 'facilities', { height: '400px'} );
		CKEDITOR.replace( 'statutory', { height: '400px'} );
		//CKEDITOR.replace( 'references', { height: '100px'} );

	/* END TABLE TOOLS */
	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>