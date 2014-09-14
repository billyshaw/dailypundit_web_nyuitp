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
            <!-- BEGIN HOME -->
            <section id="home" class="home">
                <div id="home-slide" style="height:100%">
                    <ul class="slides-container text-center">
                        
                        <?php

                            // Find requested topic id
                            if ($_GET['topic']) {
                                $current_topicid = $_GET['topic'];
                            } else {
                                $current_topicid = 1; // Set topic 1 as default
                            }

                            if ($current_topicid == 1) {
                                echo "
                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>Unrest in Ferguson: America's Military Police Problem</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>Protests in Ferguson started when the Ferguson Police Department refused to identify the officer involved in questionable shooting of African American teenager, Michael Brown</li>
                                                <li>Ferguson Police Department responded to the protest with a massive use of military weapons including usage of tear gas, military-grade guns and armories</li>
                                                <li>Ferguson also brings attention the issue of inflow of military weapons from Pentagon to police departments all over America, a dangerous trend?</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/ferguson.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>
                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>Unrest in Ferguson: America's Military Police Problem</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>Protests in Ferguson started when the Ferguson Police Department refused to identify the officer involved in questionable shooting of African American teenager, Michael Brown</li>
                                                <li>Ferguson Police Department responded to the protest with a massive use of military weapons including usage of tear gas, military-grade guns and armories</li>
                                                <li>Ferguson also brings attention the issue of inflow of military weapons from Pentagon to police departments all over America, a dangerous trend?</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/ferguson_2.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>
                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>Unrest in Ferguson: America's Military Police Problem</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>Protests in Ferguson started when the Ferguson Police Department refused to identify the officer involved in questionable shooting of African American teenager, Michael Brown</li>
                                                <li>Ferguson Police Department responded to the protest with a massive use of military weapons including usage of tear gas, military-grade guns and armories</li>
                                                <li>Ferguson also brings attention the issue of inflow of military weapons from Pentagon to police departments all over America, a dangerous trend?</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/ferguson_3.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>
                                ";
                            }

                            if ($current_topicid == 2) {
                                echo "
                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>Russian Military Vehicles Enter Ukraine. An Invasion?</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li><i>The Guardian</i> reports that 23 armored Russian military vehicles crossed into Ukrainian territory</li>
                                                <li>This is unlikely to represent a full-scale official Russian invasion, but is evident of active presence of Russian troops inside Ukraine</li>
                                                <li>According to Moscow, the convoy is a goodwill gesture, packed with much-needed aid for the residents of eastern Ukraine.</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/russia_1.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>

                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>Russian Military Vehicles Enter Ukraine. An Invasion?</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li><i>The Guardian</i> reports that 23 armored Russian military vehicles crossed into Ukrainian territory</li>
                                                <li>This is unlikely to represent a full-scale official Russian invasion, but is evident of active presence of Russian troops inside Ukraine</li>
                                                <li>According to Moscow, the convoy is a goodwill gesture, packed with much-needed aid for the residents of eastern Ukraine.</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/russia_2.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>
                                ";
                            }

                            if ($current_topicid == 3) {
                                echo "
                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>Wife Reveals Robin Williams had Parkinson's Disease</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>Robin Williams was sober but was struggling with depression, anxiety and the early stages of Parkinson's disease when he died, his widow said Thursday.</li>
                                                <li>Williams was found dead in his Northern California home Monday from what investigators suspect was a suicide by hanging.</li>
                                                <li>Parkinson's disease causes certain brain cells to die. It is more likely to affect men than women and most often develops after age 50.</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/robin_2.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>

                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>Wife Reveals Robin Williams had Parkinson's Disease</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>Robin Williams was sober but was struggling with depression, anxiety and the early stages of Parkinson's disease when he died, his widow said Thursday.</li>
                                                <li>Williams was found dead in his Northern California home Monday from what investigators suspect was a suicide by hanging.</li>
                                                <li>Parkinson's disease causes certain brain cells to die. It is more likely to affect men than women and most often develops after age 50.</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/robin_1.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>

                                ";
                            }

                            if ($current_topicid == 4) {
                                echo "
                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>World Health Organization: Ebola Crisis Vastly Underestimated</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>Ebola has infected at least 1,975 people in Nigeria, Guinea, Liberia and Sierra Leone since the outbreak began this year. Of those, 1,069 have died, according to the WHO.</li>
                                                <li>The United Nations agency said it's teaming up with the affected countries to gather more on-the-ground intelligence for a coordinated response.</li>
                                                <li>There is growing concern of transmission through air travel as Korean Airlines suspended flights to Kenya</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/ebola_1.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>


                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>World Health Organization: Ebola Crisis Vastly Underestimated</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>Ebola has infected at least 1,975 people in Nigeria, Guinea, Liberia and Sierra Leone since the outbreak began this year. Of those, 1,069 have died, according to the WHO.</li>
                                                <li>The United Nations agency said it's teaming up with the affected countries to gather more on-the-ground intelligence for a coordinated response.</li>
                                                <li>There is growing concern of transmission through air travel as Korean Airlines suspended flights to Kenya</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/ebola_2.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>

                                    

                                ";
                            }

                            if ($current_topicid == 5) {
                                echo "
                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>6.0 Earthquake Shakes Sonoma County, Largest in 25 Years</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>The ripples of destruction left by a powerful earthquake came into sharp focus Wednesday when Napa officials estimated a $300 million hit to homes and businesses in that city alone.</li>
                                                <li>But a decision by the Obama administration on whether federal aid should flow into Napa and nearby Vallejo, where officials have said the earthquake caused more than $5 million in damage, could still be days away as residents and officials continue to assess losses.</li>
                                                <li>120 Injuired, 3 Critically. Fortunuately, no deaths reported.</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/napa_1.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>


                                    <li>
                                        <div class=\"slide-text\">
                                            <h2>6.0 Earthquake Shakes Sonoma County, Largest in 25 Years</h2>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <ul class=\"social-icon\">
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-facebook\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-twitter\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-google-plus\"></i></a>
                                                        </li>
                                                        <li><a href=\"javascript:;\"><i class=\"fa fa-linkedin\"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr style=\"border: 1px solid #cccccc;\" />
                                            <span>
                                                <ul type=\"circle\">
                                                <li>The ripples of destruction left by a powerful earthquake came into sharp focus Wednesday when Napa officials estimated a $300 million hit to homes and businesses in that city alone.</li>
                                                <li>But a decision by the Obama administration on whether federal aid should flow into Napa and nearby Vallejo, where officials have said the earthquake caused more than $5 million in damage, could still be days away as residents and officials continue to assess losses.</li>
                                                <li>120 Injuired, 3 Critically. Fortunuately, no deaths reported.</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div style=\"background-image: url('images/napa_2.jpg');\" class=\"bg-parallax parallaxize\"></div>
                                    </li>

                                    

                                ";
                            }

                        ?>
                            
                    </ul>
                    <nav class="slides-navigation slidez">
                        <a href="javascript:;" class="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="javascript:;" class="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </nav>
                </div>
            </section>

                
            <!-- BEGIN BLOG -->
            <section id="blog" name="blog" class="blog">
                <div class="row">
                    <div class="col-md-9">
                        <div id="primary" class="row">
                            <div class="col-md-12">

                                <?php

                                    // Find requested topic id
                                    if ($_GET['topic']) {
                                        $current_topicid = $_GET['topic'];
                                    } else {
                                        $current_topicid = 1; // Set topic 1 as default
                                    }

                                    echo "
                                            <!-- ASK QUESTION FORM -->
                                            <article class=\"post\">
                                                <form method=\"post\" action=\"questions.php?topic={$current_topicid}\">
                                                    <input name=\"question\" type=\"text\" class=\"form-control\"  placeholder=\"Ask a Question\">
                                                    <input name=\"submit\" type=\"submit\" value=\"Submit Question\"class=\"btn btn-light\">
                                                </form>
                                            </article>
                                            <!-- END ASK QUESTION FORM --> ";

                                ?>

                                

                                <?php
                                    
                                    // Select all questions from the database      
                                    $sql_selectquestions = "SELECT 
                                                                question_id, 
                                                                question, 
                                                                DATE_FORMAT(submit_date,'%M %d, %Y - %H:%i') AS formatted_date 
                                                            FROM questions 
                                                            WHERE topic_id = '{$current_topicid}'
                                                            ORDER BY submit_date DESC 
                                                            LIMIT 5";
                                    
                                    $result = mysqli_query($db, $sql_selectquestions) or die('Query failed: ' . mysqli_error($db));
                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {

                                        // Find number of associated answers by question_id
                                        $sql_answercount = "SELECT
                                                                count('answer_id') AS count
                                                            FROM
                                                                answers
                                                            WHERE
                                                                question_id = '{$row['question_id']}'
                                                            ";

                                        $result_answercount = mysqli_query($db, $sql_answercount) or die('Query failed: ' . mysqli_error($db));
                                        $row_answercount = mysqli_fetch_assoc($result_answercount);

                                        // Store in the database table questions as answer_count
                                        $sql_insertcount = "UPDATE 
                                                                questions
                                                            SET 
                                                                answer_count = '{$row_answercount['count']}'
                                                            WHERE
                                                                question_id = '{$row['question_id']}'
                                                        ";

                                        $result_insertcount = mysqli_query($db, $sql_insertcount) or die('Query failed: ' . mysqli_error($db));
                                        
                                        // Create a new questionCard class transferring question_id, question, date, answer_count
                                        $questionCard = new questionCard(
                                            $row['question_id'],
                                            $row['question'],
                                            $row['formatted_date'],
                                            $row_answercount['count']
                                            );

                                        $questionCard->echo_template();
                                    }

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
                    <!--<div class="col-md-3 widgetbar">

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
                                </form>
                            </div>
                        </div>-->
                        <!-- /widget -->

                        <!--<div class="row widget">
                            <div class="col-md-12">
                                <div class="categories-widget">
                                    <h3 class="widget-title">
                                        Most Commented Questions
                                    </h3>
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                        </div>-->
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
            </section>
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
