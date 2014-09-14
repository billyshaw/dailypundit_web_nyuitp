<?php
		
	// Include database configuration file
	include('config/db_config.php');
		
	// connect to the database
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

	// Check for errors
	$error = "";
	if(isset($_GET["error"]))
	{
		die($_GET["error"]);
	}

	$sql_userprofile = "SELECT 
				user_title
			FROM 
				users
			WHERE 
				hybridauth_provider_name= '{$_SESSION['provider']}' AND hybridauth_provider_uid = '{$_SESSION['provider_id']}'
			LIMIT 1";

	$result_userprofile = mysqli_query($db, $sql_userprofile);
	$row_userprofile = mysqli_fetch_assoc($result_userprofile);
	$user_title = $row_userprofile['user_title'];



?>
