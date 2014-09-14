<div id="sidebar">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://thedailypundit.com/index.php">
                        <img src="images/logo.png" alt="logo daily pundit" height="110" width:"90">
                    </a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="sscroll" href="http://thedailypundit.com/index.php?topic=1 "><div class="topic-number">1</div>Unrest in Ferguson: America's Military Police Problem</a>
                        </li>
                        <li><a class="sscroll" href="http://thedailypundit.com/index.php?topic=2"><div class="topic-number">2</div>Russian Military Vehicles Enter Ukraine. An Invasion?</a>
                        </li>
                        <li><a class="sscroll" href="http://thedailypundit.com/index.php?topic=3"><div class="topic-number">3</div>Wife Reveals Robin Williams had Parkinson's Disease</a>
                        </li>
                        <li><a class="sscroll" href="http://thedailypundit.com/index.php?topic=4"><div class="topic-number">4</div>World Health Organization: Ebola Crisis Vastly Underestimated</a>
                        </li>
                        <li><a class="sscroll" href="http://thedailypundit.com/index.php?topic=5"><div class="topic-number">5</div>6.0 Earthquake Strikes Napa Valley, California</a>
                        </li>

                    </ul>

                    <ul class="sidebar-footer">
                        <li><div class="hr"><hr></div>
                        <li>
                            <!-- If not signed in, show Facebook login button-->
                            <!-- If signed in, show profile name and picture-->
                           <?php
                                
                                if (!$_SESSION['user_id']) {
                                    echo 
                                    "<div class=\"fb-sign-in\">
                                        <a href=\"login.php?provider=Facebook\">
                                            <img class=\"fb-sign-in\" src=\"images/fb-sign-in.png\" alt=\"fb sign in button\" height=\"45\" width=\"250\">
                                        </a>
                                    </div>";
                                }
                                                       
                                 // User is logged in
                                if ($_SESSION['user_id']) {
                                    // redirect user to homepage if they are not signed in
                                    echo
                                    "<img src=\"{$_SESSION['photo']}\" class=\"prof-pic\"/>";
                                    echo "<div class=\"name\">
                                        {$_SESSION['firstname']}&nbsp
                                    </div>
                                    ";

                                    echo "<a href=\"signout.php\"><div class=\"sign-out-btn\">Sign Out</div></a>";

                                    // User Title. Full code at user_profile.php
                                    if (!$row_userprofile['user_title']) {
                                        $_SESSION[usertitle] = NULL;
                                        echo "
                                           <a href=\"http://thedailypundit.com/edit_profile.php\"><span class=\"glyphicon glyphicon-pencil\"></span></a>"
                                        ;

                                    }
                                    
                                    else {
                                        $_SESSION[usertitle] = $row_userprofile['user_title'];
                                        echo "
                                        <div class=\"subtext\">
                                            {$row_userprofile['user_title']} <a href=\"http://thedailypundit.com/edit_profile.php\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
                                        </div> ";
                                    }
                                }

                            ?>
                        <li>
                    </ul>
                </div>

                <!-- set up the modal to start hidden and fade in and out -->
                <!-- /.navbar-collapse -->
            </nav>
        </div>