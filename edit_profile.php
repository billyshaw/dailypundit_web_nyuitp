<?php

    // continue session
    session_start();    

    // include configuration file
    include('config/db_config.php');
        
    // connect to the database
    $db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

    // Check for errors
    $error = "";
    if(isset($_GET["error"]))
    {
        die($_GET["error"]);
    }

    // check for submission
    if(isset($_POST['submit']))
    {
            // empty error array
        $error = array();
        
            // check for a submission
        if(empty($_POST['title']))
        {
            $error[] = 'A title is required';
        }
        // if there are no errors, insert shout into the database.
        // otherwise, display errors.
        if(sizeof($error) == 0)
        {
                // insert title into database
            $sql = "UPDATE 
            users 
            SET 
            user_title ='{$_POST['title']}' 
            WHERE 
            hybridauth_provider_name = '{$_SESSION['provider']}' AND hybridauth_provider_uid = '{$_SESSION['provider_id']}'";

            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $user= $row_userprofile['user_title'];

            
            // display confirmation
            header('Location: index.php'); 

        } else {
            
                // display error message
            foreach($error as $value)
            {
                echo "<div class=\"text-danger\">{$value}</div>";
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">

    <title>The Daily Pundit</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="css/lib/font-awesome.css" rel="stylesheet">
    <!-- STYLE CSS -->
    <link href="css/style.css" rel="stylesheet">


</head>
<body data-spy="scroll">

    <div id="container">

        <h2>Add a personal headline</h2>
        <div class="col-md-6 mg-bt-80">
            <form role="form" id="questionform" method="post" action="edit_profile.php">
                <div class="form-group row">
                        <input name="title" type="text" class="form-control col-md-6">
                </div>
                        <input name="submit" type="submit" value="Submit" class="btn btn-primary" />
            </form>
        </div>  
        </form>
    </div>

</body>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Jquery Source -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
    <!-- Nivo Light Box Source -->
    <script src="js/lib/nivo-lightbox.min.js"></script>
    <!-- Bootstrap Source -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Superslides Source -->
    <script src="js/lib/jquery.superslides.min.js"></script>
    <!-- Smoothscroll Source -->
    <script src="js/lib/smoothscroll.js"></script>
    <script src="js/lib/jquery.sudoslider.min.js"></script>
    <!-- Mobile Responsive Javascript -->
    <script src="js/lib/jquery.mobileresponsive.js"></script>
    <!-- Google Map Source -->
    <script src="js/lib/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <!-- Main Action Javascript -->
    <script src="js/main.js"></script>
    

</body>

</html>
