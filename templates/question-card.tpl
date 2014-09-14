<!--QUESTIONS SUBMIT FORM-->
<article class="post">
    <div class="blog-comments">
        <div class="blog-comment-content">
            <div class="desc">
                <ul class="media-list">
                    <li class="media">
                        <div class="post-meta">
                            <span class="dates">{$date}</span>
                            <span class="glyphicon glyphicon-heart"></span>
                            <span class="comments-count"><a href="blog-post.html"><i>{$answer_count} Answers</i></a>
                            
                            <ul class="social-icon">
                                <li><a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                                </li>
                             </ul>
                             </span>
                        </div>

                        <div class="letter-q">Q:&nbsp</div><div class="question-text">{$question}</div>
                        <form role="form" method="post" action="answers.php?question_id={$question_id}">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input name="answer" class="form-control" rows="3" type="text" placeholder="What are your thoughts?">
                                </div>
                            </div>
                            <input name="submit" type="submit" value="Post Answer" class="btn btn-light">
                        </form>
                    </li>
                    
                    {foreach key=id item=todolist from=$items}
                    <li class="media">
                        <figure class="pull-left">
                            <a href="javascript:;">
                                <img class="media-object" src="images/logo-square.png" alt="square logo">
                            </a>
                        </figure>
                        <div class="media-body">
                            <div class="comment-meta">
                                <h4 class="media-heading"><a href="javascript:;">{$todolist.poster_firstname} {$todolist.poster_lastname}</a>
                                </h4>
                                <span class="time">
                                    {$todolist.poster_headline}/ {$todolist.formatted_date}
                                </span>
                                <div class="comment-extra pull-right">
                                    <a href="javascript:;"><span class="glyphicon glyphicon-heart"></span></a>
                                </div>
                            </div>
                            <p>
                                {$todolist.answer}
                            </p>
                        </div>
                    </li>
                    {/foreach}

                </ul>

                {if $items}
                <a href="question_readmore.php?question_id={$question_id}"><div class="read-more">Read More +</div></a>
                {/if}
                
            </div>
        </div>
    </div>
</article>