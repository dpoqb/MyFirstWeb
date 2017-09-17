<?php /**file:add.inc.php 添加新的文献数据*/?>
<html>
<head>
    <title>资源数据库</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-datetimepicker.min.css" media="screen">
</head>
<body>
    <div class="col-md-10">

        <form enctype="multipart/form-data" action="index.php?action=insert" method="POST" class="form-horizontal" role="form">
            <fieldset>
                <legend>添加论文</legend>
                <div class="form-group">
                    <label for="article_title" class="col-md-2 control-label">论文标题：</label>
                    <div class="input-group col-md-8">
                    <input type="text" name="article_title" autofocus required id="article_title" placeholder="请输入论文标题" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                <label for="first_author_name" class="col-md-2 control-label">第一作者：</label>
                    <div class="input-group col-md-8">
                    <input type="text" name="first_author_name" autofocus required id="first_author_name" placeholder="请输入论文第一作者" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                <label for="second_author_name" class="col-md-2 control-label">第二作者：</label>
                    <div class="input-group col-md-8">
                    <input type="text" name="second_author_name" autofocus required id="second_author_name" placeholder="请输入论文第二作者" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                <label for="periodical" class="col-md-2 control-label">期刊名称：</label>
                    <div class="input-group col-md-8">
                    <input type="text" name="periodical" autofocus required id="periodical" placeholder="请输入期刊名称" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="abstract" class="col-md-2 control-label">摘要：</label>
                    <div class="input-group col-md-8">
                    <textarea class="form-control" name="abstract" id="abstract" rows="5" placeholder="摘要内容" required ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="key_words" class="col-md-2 control-label">关键词：</label>
                    <div class="input-group col-md-8">
                    <input type="text" name="key_words" autofocus required id="key_words" placeholder="请用空格分隔" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="dtp_input2" class="col-md-2 control-label">发表时间:</label>
                    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" name="ptime" type="text" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
                <div class="form-group">
                    <label for="pdf" class="col-md-2 control-label"></label>
                    <div class="input-group col-md-8">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                        <input type="file" name="pdf" id="file-up" value="上传文件">
                    </div>
                </div>
                <div class="form-group">
                    <label for="add" class="col-md-2 control-label"></label>
                <div class="input-group col-md-8">
                    <input class="form-control button btn-default" type="submit" name="add" id="add-submit" value="添加"
                           onclick="return confirm('你确定要添加此数据吗？')">
                </div>
                </div>
                </fieldset>
        </form>
    </div>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });
    </script>
</body>
</html>
