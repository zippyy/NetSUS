<?php

include "inc/config.php";
include "inc/auth.php";
include "inc/functions.php";

$title = "Date/Time";

include "inc/header.php";

//Save the date/time settings if the SaveDateTime
if (isset($_POST['SaveDateTime'])) {
	if (isset($_POST['timezone'])) {
        	$tz = $_POST['timezone'];
	        setTimeZone($tz);
	}

	if (isset($_POST['timeserver'])) {
		$ts = $_POST['timeserver'];
		setTimeServer($ts);
	}
	echo "<div class=\"alert alert-success alert-margin-top\">Configuration saved.</div>";
}

?>

<h2>Date/Time</h2>

<ul class="nav nav-tabs"></ul>

<div id="form-wrapper">

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

			<form action="dateTime.php" method="post" name="DateTimeSettings" id="DateTimeSettings">
				<input type="hidden" name="userAction" value="DateTime">

				<span class="label label-default">Current Time</span>
				<span class="description">Current time on the NetBoot/SUS/LDAP Proxy server</span>
				<span><?php print getLocalTime();?></span>
				<br>

				<span class="label label-default">Current Time Zone</span>
				<span class="description">Current time zone on the NetBoot/SUS/LDAP Proxy server</span>
				<span><?php echo getSystemTimeZoneMenu();?></span>
				<br>

				<span class="label label-default">Network Time Server</span>
				<span class="description">Server to use to synchronize the date/time (e.g. "pool.ntp.org")</span>
				<input type="text" name="timeserver" id="timeserver" class="form-control" value="<?php echo getCurrentTimeServer();?>" />

				<br>

				<input type="submit" class="btn btn-sm btn-primary" value="Save" name="SaveDateTime"/>

			</form>

		</div><!-- /.col -->
	</div><!-- /.row -->

	<br>

	<ul class="nav nav-tabs"></ul>

	<br>

	<input type="button" id="back-button" name="action" class="btn btn-sm btn-primary" value="Back" onclick="document.location.href='settings.php'">

</div><!-- /#form-wrapper -->


<?php include "inc/footer.php"; ?>