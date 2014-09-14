<?php

	session_start();

	// Include database credentials
	include("config/db_config.php");
	
	// Connect to the database
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mymysqli_connect_error());

	// Store question if submit button is pressed
	if(isset($_POST['submit'])) {

		$current_topicid = $_GET['topic'];
			
		// Empty error array
		$error = array();

		// Check for a question
		if(empty($_POST['question']))
		{
			$error['question'] = 'A question is required.';
		} 

		// If there are no errors
		if(sizeof($error) == 0)
		{
			// Insert a record into the database
			$sql_insertquestion = "INSERT INTO questions (
				question_id, 
				topic_id,
				question, 					
				submit_date,
				poster_firstname, 
				poster_lastname, 
				poster_id,
				poster_headline
				) VALUES (
				null, 
				'$current_topicid',
				'{$_POST['question']}', 
				NOW(), 
				'{$_SESSION['firstname']}',
				'{$_SESSION['lastname']}',
				'{$_SESSION['provider_id']}',
				'{$_SESSION['usertitle']}'
				)";
			
			mysqli_query($db, $sql_insertquestion);

			// display confirmation
            header("Location: index.php?topic=$current_topicid#blog");

		} else {

			foreach($error as $value)
			{
				echo "<div class=\"text-danger\">";
				echo $value; 
				echo "</div>";
			}
		}
	}

?>



	


