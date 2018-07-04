<?php
session_start();	
$log = $_SESSION['log'];
//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Home" => APP_URL
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
if ($log == 1)
{
	$page_nav = array(
			"project" => array(
			"title" => "Project",
			"icon" => "fa-suitcase",
			"icon_badge" => "2",
			"sub" => array(
				"list" => array(
					"title" => "Project List",
					"url" => APP_URL."/project.php"
				),
				"allproject" => array(
					"title" => "All Project",
					"url" => APP_URL."/allproject.php"
				),
				"projectname" => array(
					"title" => "Add New Project",
					"url" => APP_URL."/projectname.php"
				)
			)
		),
		"settings" => array(
			"title" => "Settings",
			"icon" => "fa-pencil-square-o",
			"icon_badge" => "2",
			"sub" => array(
				"access_level" => array(
					"title" => "Access Level",
					"url" => APP_URL."/accesslevel.php"
				),
				"addremoveuser" => array(
					"title" => "Add/Remove User",
					"url" => APP_URL."/addremoveuser.php"
				)
			)
		),
		"manager" => array(
			"title" => "IM/GM Access",
			"url" => APP_URL."/manager.php",
			"icon" => "fa-group"
		),
		"smod" => array(
			"title" => "SMOD Access",
			"url" => APP_URL."/smod.php",
			"icon" => "fa-check-circle"
		),
		"signout" => array(
			"title" => "Sign Out",
			"url" => APP_URL."/index.php",
			"icon" => "fa-sign-out"
		)
	);
}
if ($log == 2)
{
	$page_nav = array(
			"project" => array(
			"title" => "Project",
			"icon" => "fa-suitcase",
			"icon_badge" => "2",
			"sub" => array(
				"list" => array(
					"title" => "Project List",
					"url" => APP_URL."/project.php"
				),
				"projectname" => array(
					"title" => "Add New Project",
					"url" => APP_URL."/projectname.php"
				)
			)
		),
		"manager" => array(
			"title" => "IM/GM Access",
			"url" => APP_URL."/manager.php",
			"icon" => "fa-group"
		),
		"signout" => array(
			"title" => "Sign Out",
			"url" => APP_URL."/index.php",
			"icon" => "fa-sign-out"
		)
	);
}
if ($log == 3)
{	
	$page_nav = array(	
		"smod" => array(
			"title" => "SMOD Access",
			"url" => APP_URL."/smod.php",
			"icon" => "fa-check-circle"
		),
		"signout" => array(
			"title" => "Sign Out",
			"url" => APP_URL."/index.php",
			"icon" => "fa-sign-out"
		)
	);
}
if ($log == 4)
{
	$page_nav = array(
			"project" => array(
			"title" => "Project",
			"icon" => "fa-suitcase",
			"icon_badge" => "2",
			"sub" => array(
				"list" => array(
					"title" => "Project List",
					"url" => APP_URL."/project.php"
				),
				"projectname" => array(
					"title" => "Add New Project",
					"url" => APP_URL."/projectname.php"
				)
			)
		),
		"signout" => array(
			"title" => "Sign Out",
			"url" => APP_URL."/index.php",
			"icon" => "fa-sign-out"
		)
	);
}



//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
?>