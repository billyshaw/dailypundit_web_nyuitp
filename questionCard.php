<?php

    include('smarty/libs/Smarty.class.php');
    // connect to database
    include('config/db_config.php');
    
    $db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

    class questionCard {

        // Construct variables
        public $question_id;
        public $question;
        public $date;
        public $answer_count;

        public function __construct($question_id, $question, $date, $answer_count) {

            // Assign variables
            $this->question_id = $question_id;
            $this->question = $question;
            $this->date = $date;
            $this->answer_count = $answer_count;

        }

        public function echo_template() {

            // Connect to database
            include('config/db_config.php');
            $db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

            // Initialize Smarty
            $tpl = new Smarty;
            $tpl->template_dir = getcwd() . '/templates/';
            $tpl->compile_dir  = getcwd() . '/templates_c/';

            $tpl->assign('question', $this->question);
            $tpl->assign('date', $this->date);
            $tpl->assign('question_id', $this->question_id);
            $tpl->assign('answer_count', $this->answer_count);

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
                                    question_id = '$this->question_id'
                                ORDER BY 
                                    submit_date DESC
                                LIMIT 2
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
            $tpl->assign('true', $read_more);


            $tpl->display('question-card.tpl');

        }


    }



?>

