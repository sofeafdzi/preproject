<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Project" => APP_URL
);

/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"icon" => "fa-home"
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
$page_nav = array(
	"dashboard" => array(
		"title" => "Dashboard",
		"url" => APP_URL."/mainmenu.php",
		"icon" => "fa-home"
	),
		"list" => array(
		"title" => "Project List",
		"url" => APP_URL."/project.php",
		"icon" => "fa-pencil-square-o",
	),
		"projectname" => array(
		"title" => "Project Name",
		"url" => APP_URL."/projectname.php",
		"icon" => "fa-pencil-square-o",
	),
		"pif" => array(
		"title" => "Project Initiation",
		"url" => APP_URL."/pi.php",
		"icon" => "fa-pencil-square-o",
	),
		"cir" => array(
		"title" => "Cust. Info & Requirement",
		"url" => APP_URL."/cir.php",
		"icon" => "fa-pencil-square-o",
	),
		"pvc" => array(
		"title" => "Value Creation",
		"url" => APP_URL."/pvc.php",
		"icon" => "fa-pencil-square-o",
	),
	"proposal" => array(
		"title" => "Proposal",
		"url" => APP_URL."/proposal.php",
		"icon" => "fa-pencil-square-o",
	),
		"signout" => array(
		"title" => "Sign Out",
		"url" => APP_URL."/index.php",
		"icon" => "fa-sign-out"
	)
);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
?>