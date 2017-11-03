<?php
include "../front_lib/check_cookies.php";
?>
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
            <style>
                .navbar{
                    -webkit-border-radius: 0;
                    -moz-border-radius: 0;
                    border-radius: 0;
                }
            </style>
            </head>
    <body>
    <div class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#collapseNav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a href="front_web.php" class="navbar-brand"><span class="glyphicon glyphicon-equalizer"></span></a>
                <p class="navbar-text">知识管理与创新研究中心</p>
            </div>
            <div class="collapse navbar-collapse" id="collapseNav">
                <p class="navbar-text navbar-right"><?php echo $_COOKIE['username']?></p>
                <p class="navbar-text navbar-right">Welcome！</p>
                <a href="login.php?action=logout" class="navbar-right navbar-link navbar-right navbar-text">退出</a>
            </div>
        </div>
    </div>
    <div id="menu" class="col-md-2">
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
                <a class="list-group-item small" href="front_web.php?action=list">全部论文</a>
                <a class="list-group-item small" href="front_web.php?action=ser">搜索论文</a>
                <a class="list-group-item small" href="front_web.php?action=chart">查看图表</a>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below),or include in individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- input validator-->

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/freelancer.js"></script>
    </body>
    </html>
    <?php
    if($_GET['action'] == 'watch'){
        include '../front_lib/watch.inc.php';
    }
    else if($_GET["action"] == 'ser'){
        include "../front_lib/ser.inc.php";
    }
    else if($_GET["action"] == 'chart'){
        include "../front_lib/show_chart.inc.php";
    }
    else{
        // 包含list.inc.php获取上传服务器的文件以及文件信息
        include "../front_lib/list.inc.php";
    }
    ?>

