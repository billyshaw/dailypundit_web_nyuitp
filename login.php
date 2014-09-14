<?php
 
	// start or continue session
	session_start(); 
 
	// Include hybridauth library
	require_once('config/hybridauth/Hybrid/Auth.php');


	// Include database configuration file
	include('config/db_config.php');
		
	// connect to the database
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

	// check for errors
	$error = "";
	if(isset($_GET["error"]))
	{
		die($_GET["error"]);
	}
 
	if($_GET['provider'])
	{
		try
		{
			// create an instance for Hybridauth with the configuration file path as parameter
			$hybridauth = new Hybrid_Auth('config/hybridauth/config.php');
 
			// authenticate to Facebook (or other provider)
			$adapter = $hybridauth->authenticate($_GET['provider']);
 
			// get access token
			$access_token = $adapter->getAccessToken();
 
			// get the user profile
			$user_data = $adapter->getUserProfile();
 
			// uncomment the next two lines to get all information
			//print_r($user_data);
			//exit();
 
			// add access token to session variables
			$_SESSION['access_token'] = $access_token['access_token'];
 
			// Add user information to session variables
			$_SESSION['firstname'] = $user_data->firstName;
			$_SESSION['lastname'] = $user_data->lastName;
			$_SESSION['displayname'] = $user_data->displayName;
			$_SESSION['email'] = $user_data->email;
			$_SESSION['website'] = $user_data->webSiteURL;
			$_SESSION['photo'] = $user_data->photoURL;
			$_SESSION['website'] = $user_data->webSiteURL;
			$_SESSION['profile'] = $user_data->profileURL;
			$_SESSION['provider_id'] = $user_data->identifier;
			$_SESSION['provider'] = $_GET['provider'];
 
			// Get user_id from the users table
			$sql = "SELECT 
						user_id
					FROM 
						users 
					WHERE 
						hybridauth_provider_name = '{$_GET['provider']}' AND hybridauth_provider_uid = '{$user_data->identifier}' 
					LIMIT 1";
			
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_assoc($result);


			// If user is found, continue signin
			if (!$row['user_id']) {

				// insert user into the users table
				$sql = "INSERT INTO users (
					user_id, 
					firstname, 
					lastname, 
					email, 
					signupdate, 
					hybridauth_provider_name,
					hybridauth_provider_uid	
					) VALUES (
					null,
					'{$_SESSION['firstname']}',
					'{$_SESSION['lastname']}',
					'{$_SESSION['email']}',
					NOW(),
					'{$_SESSION['provider']}',
					'{$_SESSION['provider_id']}'
					)";
			
				$result = mysqli_query($db, $sql);

				// obtain user_id from table
				$user_id = mysqli_insert_id($db);

				// send a signup e-mail to user
				$message = "Dear {$_POST['firstname']} {$_POST['lastname']},\n";
				$message = $message . "Thank you for signing up!\n";
				mail($_POST['email'], 'Sign up confirmation', $message, "From: hello@thedailypundit.com");

				// append user variables to session
				$_SESSION['user_id'] = $user_id;

				// redirect user to home page
				header('Location: index.php#blog');
				exit();


			}
		
			// If the user is not found, sign up by inserting user into users table and [TO DO: send confirmation email and continue sign in]
			else 
			{

				// append user variables to session
				$_SESSION['user_id'] = $row['user_id'];
			
				// redirect user to home page
				header('Location: index.php');
				exit();
			
			}
		
        } catch(Exception $e) {
 
			// display error 
            switch( $e->getCode() )
            { 
                case 0 : $error = "Unspecified error."; break;
                case 1 : $error = "Hybriauth configuration error."; break;
                case 2 : $error = "Provider not properly configured."; break;
                case 3 : $error = "Unknown or disabled provider."; break;
                case 4 : $error = "Missing provider application credentials."; break;
                case 5 : $error = "Authentification failed. The user has canceled the authentication or the provider refused the connection."; break;
                case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again."; 
                $adapter->logout(); 
                break;
                case 7 : $error = "User not connected to the provider."; 
                $adapter->logout(); 
                break;
            } 
            
            die($e->getMessage());
		}
	}
?>
 