<?php
include "check_cookies.php";
?>
<?php /**file:add.inc.php 添加新的文献数据*/?>
<html>
<head>
    <title>资源数据库</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <div class="col-md-10">

        <form enctype="multipart/form-data" action="front_web.php?action=list" method="POST" class="form-horizontal" role="form">
            <fieldset>
                <legend>搜索论文</legend>
                <div class="form-group">
                    <label for="article_title" class="col-md-2 control-label">论文标题：</label>
                        <div class="input-group col-md-8">
                            <span class="input-group-addon"><input type="checkbox" aria-label="Other" id="check_title" name="checkbox" onclick="allowInput()"></span>
                            <input type="text" name="article_title" autofocus required id="article_title" placeholder="请输入论文标题" class="form-control allowInput">
                        </div>
                </div>
                <div class="form-group">
                <label for="first_author_name" class="col-md-2 control-label">第一作者：</label>
                    <div class="input-group col-md-8">
                        <span class="input-group-addon"><input type="checkbox" aria-label="Other" id="check_name1" name="checkbox" onclick="allowInput()"></span>
                        <input type="text"name="first_author_name" autofocus required id="first_author_name" placeholder="请输入论文第一作者" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                <label for="second_author_name" class="col-md-2 control-label">第二作者：</label>
                    <div class="input-group col-md-8">
                        <span class="input-group-addon"><input type="checkbox" aria-label="Other" id="check_name2" name="checkbox" onclick="allowInput()"></span>
                        <input type="text" name="second_author_name" autofocus required id="second_author_name" placeholder="请输入论文第二作者" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                <label for="periodical" class="col-md-2 control-label">期刊名称：</label>
                    <div class="input-group col-md-8">
                        <span class="input-group-addon"><input type="checkbox" aria-label="Other" id="check_peri" name="checkbox" onclick="allowInput()"></span>
                        <input type="text" name="periodical" autofocus required id="periodical" placeholder="请输入期刊名称" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="key_words" class="col-md-2 control-label">关键词：</label>
                    <div class="input-group col-md-8">
                        <span class="input-group-addon"><input type="checkbox" aria-label="Other" id="check_key" name="checkbox" onclick="allowInput()"></span>
                        <input type="text" name="key_words" autofocus required id="key_words" placeholder="请用空格分隔" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="add" class="col-md-2 control-label"></label>
                <div class="input-group col-md-8">
                    <input class="form-control button btn-default" type="submit" name="add" id="add-submit" value="搜索">
                </div>
                </div>
                </fieldset>
        </form>
    </div>
<script>
    function allowInput() {
        var box1 = document.getElementById("check_title");
        var box2 = document.getElementById("check_name1");
        var box3 = document.getElementById("check_name2");
        var box4 = document.getElementById("check_peri");
        var box5 = document.getElementById("check_key");
        if (box1.checked == false) {
            document.getElementById("article_title").disabled = false;
        } else {
            document.getElementById("article_title").disabled = true;
        }
        if (box2.checked == false) {
            document.getElementById("first_author_name").disabled = false;
        } else {
            document.getElementById("first_author_name").disabled = true;
        }
        if (box3.checked == false) {
            document.getElementById("second_author_name").disabled = false;
        } else {
            document.getElementById("second_author_name").disabled = true;
        }
        if (box4.checked == false) {
            document.getElementById("periodical").disabled = false;
        } else {
            document.getElementById("periodical").disabled = true;
        }
        if (box5.checked == false) {
            document.getElementById("key_words").disabled = false;
        } else {
            document.getElementById("key_words").disabled = true;
        }
    }
</script>
</body>
</html>
