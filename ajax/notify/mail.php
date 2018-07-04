<?php
session_start();		
$username = $_SESSION['username'];

include "webconfig.php";
										
$q = "SELECT * FROM project WHERE username = '$username'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{	
	$projectid = $row['projectid'];
	$reviewer = $row['reviewer'];
	$remark = $row['remark'];
	$manager_status = $row['manager_status'];
	

}
?>

<ul class="notification-body">
	<li>
		<span class="unread">
			<a href="javascript:void(0);" class="msg">
				<img src="img/avatars/4.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" />
				<span class="from">System Notification <i class="icon-paperclip"></i></span>
				<time>2014-11-21</time>
				<span class="subject"><?php echo $projectid; ?></span>
				<span class="msg-body">Assalamualaikum, your account are ready to use.</span>
			</a>
		</span>
	</li>
</ul>