<?php

	session_start();

	// Include database credentials
	include("config/db_config.php");
	
	// Connect to the database
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mymysqli_connect_error());

	// Store answer if submit button is pressed
	if(isset($_POST['submit'])) {

		$question_id = $_GET['question_id'];

		// Find topic_id of given question
		$sql_findtopic = "SELECT topic_id FROM questions WHERE question_id = '{$question_id}'";
		$result_findtopic = mysqli_query($db, $sql_findtopic) or die('Query failed: ' . mysqli_error($db));
		$row_findtopic = mysqli_fetch_assoc($result_findtopic);
		$current_topicid = $row_findtopic['topic_id'];

			
		// Empty error array
		$error = array();

		// Check for a question
		if(empty($_POST['answer']))
		{
			$error['answer'] = 'An answer is required.';
		} 

		// If there are no errors
		if(sizeof($error) == 0)
		{
			// Insert a record into the database
			$sql_insertanswer = "INSERT INTO answers (
				answer_id,
				question_id, 
				answer, 					
				submit_date,
				poster_firstname, 
				poster_lastname, 
				poster_id,
				poster_headline,
				topic_id
				) VALUES (
				null,
				'{$question_id}', 
				'{$_POST['answer']}', 
				NOW(), 
				'{$_SESSION['firstname']}',
				'{$_SESSION['lastname']}',
				'{$_SESSION['provider_id']}',
				'{$_SESSION['usertitle']}',
				'{$current_topicid}'
				)";
			
			mysqli_query($db, $sql_insertanswer);

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



	


