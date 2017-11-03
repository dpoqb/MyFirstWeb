<?php
include "check_admin_cookies.php";
?>

    <div class="col-md-10">
        <fieldset><legend>图表</legend></fieldset>
    <section class="panel-group" role="tablist" aria-multiselectable="true" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="moreDandy">
                <h4 class="panel-title"><a href="#moreContent" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="moreContent">各年文献分布图</a></h4>
            </div>
            <div id="moreContent" class="panel-collapse collapse in" role="tabpanel" aria-labellebdy="moreContent">
                <div class="panel-body">
                        <embed src="pychart/every_year_all_article.svg" width="1060" height="600"
                               type="image/svg+xml"
                               pluginspage="http://www.adobe.com/svg/viewer/install/" />

                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="voteDandy">
                <h4 class="panel-title"><a href="#voteContent" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="voteContent">各年发表文献总数</a></h4>
            </div>
            <div id="voteContent" class="panel-collapse collapse in" role="tabpanel" aria-labellebdy="voteContent">
                <div class="panel-body">
                    <embed src="pychart/every_year_article_numbers_.svg" width="1060" height="600"
                           type="image/svg+xml"
                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="picsDandy">
                <h4 class="panel-title"><a href="#picsContent" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="picsContent">期刊发表文献数</a></h4>
            </div>
            <div id="picsContent" class="panel-collapse collapse in" role="tabpanel" aria-labellebdy="picsContent">
                <div class="panel-body">
                    <embed src="pychart/every_periodical_article.svg" width="1060" height="600"
                           type="image/svg+xml"
                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="picsDandy">
                <h4 class="panel-title"><a href="#picsContent" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="picsContent">文献关键词计量</a></h4>
            </div>
            <div id="picsContent" class="panel-collapse collapse in" role="tabpanel" aria-labellebdy="picsContent">
                <div class="panel-body">
                    <embed src="pychart/every_key_word_number.svg" width="1060" height="600"
                           type="image/svg+xml"
                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                </div>
            </div>
        </div>
    </section>
    </div>

