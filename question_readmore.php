<?php

    session_start();

    include('user_profile.php');
    include('questions.php');

    require_once('questionCard.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <!-- Sudo Slider Source -->
    <script src="js/lib/jquery.sudoslider.min.js"></script>
    <!-- Mixitup Source -->
    <script src="js/lib/jquery.mixitup.min.js"></script>
    <!-- Back to Top Source -->
    <script src="js/lib/jquery.backtotop.js"></script>
    <!-- Backstretch Source -->
    <script src="js/lib/jquery.backstretch.min.js"></script>
    <!-- CarouFredSel Source -->
    <script src="js/lib/jquery.carouFredSel-6.2.1-packed.js"></script>
    <!-- Mobile Responsive Javascript -->
    <script src="js/lib/jquery.mobileresponsive.js"></script>
     <!-- Google Map Source -->
    <script src="js/lib/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <!-- Main Action Javascript -->
    <script src="js/main.js"></script>
     <!-- Back to Top Source -->
    <script src="js/lib/jquery.backtotop.js"></script>
    
    <!-- PACE Loader -->
    <script src="js/lib/pace.min.js"></script>
    <link href="css/lib/pace.css" rel="stylesheet">
    <!-- END PACE Loader -->

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
    <!-- Zocial CSS -->
    <link href="css/lib/zocial.css" rel="stylesheet">
    <!-- Nivo Lightbox CSS -->
    <link href="css/lib/nivo-lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="css/lib/nivo-themes/default/default.css" type="text/css" />
    <!-- STYLE CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body data-spy="scroll">
    <div id="loader"></div>
    <div id="main-wrapper">
        
        <?php
            include('navbar.php');
        ?>

        <div id="container">
                <div class="row">
                    <div class="col-md-9">
                        <div id="primary" class="row">
                            <div class="col-md-12">

                                <?php

                                    // Connect to database
                                    include('config/db_config.php');
                                    $db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

                                    // Include smarty
                                    require_once('smarty/libs/Smarty.class.php');


                                    // Initialize Smarty
                                    $tpl = new Smarty;
                                    $tpl->template_dir = getcwd() . '/templates/';
                                    $tpl->compile_dir  = getcwd() . '/templates_c/';

                                    
                                    if ($_GET['question_id']) {

                                        $sql_selectquestion = "SELECT
                                                                question, 
                                                                DATE_FORMAT(submit_date,'%M %d, %Y - %H:%i') AS formatted_date, 
                                                                answer_count
                                                            FROM
                                                                questions
                                                            WHERE 
                                                                question_id = '{$_GET['question_id']}'
                                                            LIMIT 1
                                                            ";

                                        $result = mysqli_query($db, $sql_selectquestion) or die('Query failed: ' . mysqli_error($db));
                                        $row_selectquestion = mysqli_fetch_assoc($result);

                                        $tpl->assign('question', $row_selectquestion['question']);
                                        $tpl->assign('date',$row_selectquestion['formatted_date']);
                                        $tpl->assign('question_id', $_GET['question_id']);
                                        $tpl->assign('answer_count', $row_selectquestion['answer_count']);

                                    }
                                    
                                    // Find all answers associated with question_id
                                    $sql_selectanswers = "SELECT
                                                            answer_id,
                                                            answer, 
                                                            poster_firstname, 
                                                            poster_lastname, 
                                                            poster_id, 
                                                            poster_headline, 
                                                            DATE_FORMAT(submit_date,'%M %d, %Y - %H:%i') AS formatted_date
                                                        FROM
                                                            answers
                                                        WHERE
                                                            question_id = '{$_GET['question_id']}'
                                                        ORDER BY 
                                                            submit_date DESC
                                                        ";

                                    $result = mysqli_query($db, $sql_selectanswers) or die('Query failed: ' . mysqli_error($db));


                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                        $items[] = array(
                                            'id' => $row['answer_id'],
                                            'answer' => $row['answer'],
                                            'poster_firstname' => $row['poster_firstname'],
                                            'poster_lastname' => $row['poster_lastname'],
                                            'poster_id' => $row['poster_id'],
                                            'poster_headline' => $row['poster_headline'],
                                            'formatted_date' => $row['formatted_date'],
                                        );

                                    }

                                    // Assign answers to template
                                    $tpl->assign('items', $items);
                                    $tpl->assign('false', $read_more);

                                    $tpl->display('question-card.tpl');

                                ?>


                        </div>
                            <div class="col-md-12">
                                <ul class="pagination">
                                    <li><a href="javascript:;"><i class="fa fa-long-arrow-left"></i></a>
                                    </li>
                                    <li><a href="javascript:;"><i class="fa fa-long-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widgetbar">

                        <div class="row widget">
                            <div class="col-md-12">
                                <form class="search-widget">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search..">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </form>
                            </div>
                        </div>
                        <!-- /widget -->

                        <div class="row widget">
                            <div class="col-md-12">
                                <div class="categories-widget">
                                    <h3 class="widget-title">
                                        Most Commented Questions
                                    </h3>
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /widget -->

                        <!--<div class="row widget">
                            <div class="col-md-12">
                                <div class="popular-post-widget">
                                    <h3 class="widget-title">
                                        Popular Post
                                    </h3>
                                    <ul>
                                        <li>
                                            <a href="javascript:;">Plunker hypanthial unagricultura</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Unstaffed intertransformability</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Tamatave squaller superwrought outsold equanimous</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Submissiveness nasalized flagella</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Ungrizzled lassitude</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->

                    </div>
                </div>
            <!-- END BLOG -->    


            <!-- BEGIN FOOTER -->
            <!--<footer>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <strong>GARIS</strong>&nbsp;2014 Created by <a href="javascript:;">DevelPixel</a>
                        </p>
                    </div>
                </div>
            </footer>-->
            <!-- END FOOTER -->


        </div>
        </div>
    </div>


    <div class="totop" id="backtotop">
        <span>
            <a href="#home" class="first sscroll"><i class="fa fa-angle-up"></i></a>
            <a href="#home" class="hover sscroll"><i class="fa fa-angle-up"></i></a>
        </span>
    </div>

</body>

</html>
