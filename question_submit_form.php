<!--QUESTIONS SUBMIT FORM-->
            <section id="about" class="about odd">
                <div class="row">
                    <div class="col-md-12 mg-bt-80">
                        <form id="questionform" method="post" action="question_json.php">
                            <div class="col-sm-6 col-md-8">
                                    <div class="form-group row">
                                            <input name="question" type="text" class="form-control col-md-6"  placeholder="Ask a Question">
                                    </div>
                                    
                            <input name="submit" type="submit" value="Submit Question"class="btn btn-light">
                        </form>
                    </div>-->

                <!-- Question Response. Currently placeholder for question-->
                <div id="questionresponse" style="display: none"></div>

                <!-- QUESTION TABLE BEGINS -->
                <div class="col-md-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Select questions from the database
                                $sql = "SELECT 
                                            question_id, 
                                            question, 
                                            DATE_FORMAT(submit_date, '%M %d, %Y') AS formatteddate
                                        FROM 
                                            questions 
                                        ORDER BY 
                                            submit_date DESC";
                                $result = mysqli_query($db, $sql);
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                                    // Print out questions and number of answers
                                    echo "<tr>";
                                    echo "<td>{$row['question']}</td>";
                                    echo "<td>{$row['formatteddate']}</td>";
                                    echo "</tr>";  
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>