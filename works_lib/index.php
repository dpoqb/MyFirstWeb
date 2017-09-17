<?php /**file:index.php程序的主控制文件和各功能入口*/?>
    <html>
        <head>
            <title>资源数据库</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <!-- bootstrap -->
            <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-datetimepicker.min.css" media="screen">
            <!-- html5 shim and respond.js for IE8 support of html5 elements and media queries -->
            <!-- WARNING:Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif] -->

            <!-- jQuery (necessary for Bootstrap's Javascript plugisn) -->
            <!-- javascript触发模态窗口 -->
            <script type="text/javascript">
                $('#myModal_ok').modal(options);
                $('#myModal_wr').modal(options);
            </script>
            </head>
    <body>
    <div id="menu" class="col-md-2">
        <div class="panel list-group" role="tablist" aria-mutiselectable="true">
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#dandyDeets" data-parent="#menu"
               aria-expaneded="false" aria-controls="#dandyDeets">科研项目 <span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
            <div id="dandyDeets" class="collapse submenu">
                <a class="list-group-item small">taxonomy</a>
                <a class="list-group-item small">taxonomy</a>
                <a class="list-group-item small">taxonomy</a>
            </div>

            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#dandyArts" data-parent="#menu"
               aria-expaneded="false" aria-controls="#dandyArts">学术论文 <span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
            <div id="dandyArts" class="collapse submenu">
                <a class="list-group-item small" href="index.php?action=list">全部论文</a>
                <a class="list-group-item small" href="index.php?action=add">添加论文</a>
                <a class="list-group-item small" href="index.php?action=ser">搜索论文</a>
                <a class="list-group-item small" href="index.php?action=chart">查看图表</a>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal_ok">
        <!-- 设置模态窗口的宽度 -->
        <div class="modal-dialog">
            <!-- 定义内容区域 -->
            <div class="modal-content">
                <!-- 模态窗口的页眉或顶部 -->
                <div class="modal-header">
                    <!-- data-dismiss属性单机按钮时关闭模态窗口 -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- 模态窗口的主要内容 -->
                <div class="modal-body">
                    <img src="../image/icon/ok.png" class="col-md-1 pull-left">
                    <p>数据操作成功！</p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">确定</button></div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal_wr">
        <!-- 设置模态窗口的宽度 -->
        <div class="modal-dialog">
            <!-- 定义内容区域 -->
            <div class="modal-content">
                <!-- 模态窗口的页眉或顶部 -->
                <div class="modal-header">
                    <!-- data-dismiss属性单机按钮时关闭模态窗口 -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- 模态窗口的主要内容 -->
                <div class="modal-body">
                    <img src="../image/icon/wrong.png" class="col-md-1 pull-left">
                    <p>数据操作失败！</p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">确定</button></div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below),or include in individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.js"></script>
    </body>
    </html>
    <?php
        include "func.inc.php";
    /* 如果用户的操作是请求添加图书表单action=add，则条件成立 */
    if($_GET["action"] == "add") {
        /* 包含add.inc.php获取用户添加表单 */
        include "add.inc.php";
        /* 如果用户提交添加表单action=insert，则条件成立 */
    } else if ($_GET["action"] == "insert") {
        /*在这里可以加上数据验证*/
        include "verification.inc.php";
        /* 如果返回值$up中的第一个元素是false说明上传失败，报告错误原因并退出程序 */
        $up = upload();
        if (!$up[0]) die($up[1]);

        /* 添加数据需要先连接并选数据库，包含connc.php文件连接数据库 */
        include "connc.php";

        /* 根据用户通过POST提交的数据组合插入数据库的SQL语句 */
        $sql = "INSERT INTO literatures(article_title, first_author_name, second_author_name, periodical, 
                abstract,key_words,ptime,upload_time,pdf)VALUES
                ('{$_POST["article_title"]}', '{$_POST["first_author_name"]}','{$_POST["second_author_name"]}', 
                '{$_POST["periodical"]}','{$_POST["abstract"]}','{$_POST["key_words"]}','{$_POST["ptime"]}',
                 NOW(),'{$up[1]}')";
        /* 执行INSERT语句 */
        $result = $link->query($sql);
        /* 如果INSERT语句执行成功，并对数据表books有行数影响，则插入数据成功 */
        if ($result) {
            echo "<script type=\"text/javascript\">
                $(document).ready(function() {
                    // body...
                function show_modal() {
                    // body...
                $('#myModal_ok').modal('show');
                 }
                 window.setTimeout(show_modal,1);
                 });
                </script>";
        } else {
            echo "<script type=\"text/javascript\">
                $(document).ready(function() {
                    // body...
                function show_modal() {
                    // body...
                $('#myModal_wr').modal('show');
                 }
                 window.setTimeout(show_modal,1);
                 });
                </script>";
        }
        mysqli_close($link);
    }
    else if($_GET["action"] == 'mod'){
        include "mod.inc.php";
    }
    else if($_GET["action"] == 'update'){
        /* 添加数据验证*/
        include "verification.inc.php";
        /* 如果上传新的文件，用新文件替换原来的文件*/
        if($_FILES["pdf"]["error"] == 0){
            delpdf($_POST['pdfname']);
            $up = upload();
            if($up[0]){
                $pdf = $up[1];
            }else{
                die($up[1]);
            }
        }else{
            $pdf = $_POST["pdfname"];
        }
        include "connc.php";
        $sql = "UPDATE literatures SET article_title='{$_POST['article_title']}',first_author_name='{$_POST['first_author_name']}'
                ,second_author_name='{$_POST['second_author_name']}',periodical='{$_POST['periodical']}',abstract='{$_POST['abstract']}',
                key_words='{$_POST['key_words']}',ptime='{$_POST['ptime']}',pdf='{$pdf}',upload_time=NOW() WHERE id= {$_POST['id']}";

    $result = $link->query($sql);
    if($result){
        echo "<script type=\"text/javascript\">
                $(document).ready(function() {
                    // body...
                function show_modal() {
                    // body...
                $('#myModal_ok').modal('show');
                 }
                 window.setTimeout(show_modal,1);
                 });
                </script>";
    }else{
        echo "<script type=\"text/javascript\">
                $(document).ready(function() {
                    // body...
                function show_modal() {
                    // body...
                $('#myModal_wr').modal('show');
                 }
                 window.setTimeout(show_modal,1);
                 });
                </script>";
    }
    mysqli_close($link);
    }
    else if($_GET['action'] == 'watch'){
        include 'watch.inc.php';
    }
    else if($_GET["action"] == 'del'){
        include "connc.php";
        $sql = "DELETE FROM literatures WHERE id = '{$_GET['id']}'";
        $result = $link->query($sql);
        if($result){
           /* 删除文件 */
           delpdf($_GET['pdf']);
           /* 删除后跳转到原来的URL */
           echo '<script>window.location="'.$_SERVER["HTTP_REFERER"].'"</script>';
        }else{
            echo "<script type=\"text/javascript\">
                $(document).ready(function() {
                    // body...
                function show_modal() {
                    // body...
                $('#myModal_wr').modal('show');
                 }
                 window.setTimeout(show_modal,1);
                 });
                </script>";
        }
        mysqli_close($link);
    }
    else if($_GET["action"] == 'ser'){
        include "ser.inc.php";
    }
    else{
        // 包含list.inc.php获取上传服务器的文件以及文件信息
        include "list.inc.php";
    }
    function delDir($directory) {
        if(file_exists($directory)) {
            if($dir_handle=@opendir($directory)) {
                while($filename=readdir($dir_handle)) {
                    if($filename!="." && $filename!="..") {
                        $subFile=$directory."/".$filename;
                        if(is_dir($subFile))
                            delDir($subFile);
                        if(is_file($subFile))
                            unlink($subFile);
                    }
                }
                closedir($dir_handle);
                rmdir($directory);
            }
        }
    }
    ?>

