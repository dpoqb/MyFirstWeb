<?php
/**
 * Created by PhpStorm.
 * User: songwei
 * Date: 17-10-22
 * Time: 下午6:58
 */
//    file:用户登验证
function clearCookies(){
    setCookie("username", "", time()-3600);
    setCookie("isLogin", "", time()-3600);
}
if($_GET["action"] == 'login'){
//    清除之前设置的cookie
    clearCookies();
    include "connc.admin.php";
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    if($_POST['login_identity'] == '管理员'){
        $sql = "SELECT username, password, realname FROM admin_tb WHERE username='{$username}' AND password='{$password}'";}
    else if($_POST['login_identity'] == '用户'){
        $sql = "SELECT username, password, realname FROM users_tb WHERE username='{$username}' AND password='{$password}'";}
    $result = $link->query($sql);
    $existence = $result->fetch(PDO::FETCH_BOTH);
    if(!(empty($existence))){
        list($u, $p, $n) = $existence;
        if($_POST['login_identity'] == '管理员'){
            setcookie("username","{$n}",time()+60*60*24);
            setcookie("isLogin","1",time()+60*60*24);
            header("Location:index.php");
        }else{
            setcookie("username","{$n}",time()+60*60*24);
            setcookie("isLogin","2",time()+60*60*24);
            header("Location:front_web.php");
        }
    }
    else {
        echo "<script>alert('请输入正确的用户名和密码')</script>";
    }
}
else if($_GET["action"] == 'logout'){
    clearCookies();
}
?>
<!--D3 OMG粒子-->
<html>
<head>
    <title>登录界面</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="text/css" href="../image/icon/logo.png" type="image/x-icon">

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-datetimepicker.min.css" media="screen">
    <!-- html5 shim and respond.js for IE8 support of html5 elements and media queries -->
    <!-- WARNING:Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] -->
    <script type="text/javascript">
        $('#myModal').modal(options);
    </script>
    <style type="text/css">

        body{
            background-color: #888A98;
            background-image: url("../image/portfolio/harpal-singh-396280.jpg");
            background-size: 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>
    <!-- jQuery (necessary for Bootstrap's Javascript plugisn) -->
<body>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- 模态窗口的页眉或顶部 -->
            <div class="modal-header">
                <!-- data-dismiss属性单击按钮时关闭模态窗口 -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- 模态窗口的标题 -->
                <h4 class="modal-title">登录</h4>
            </div>
            <!-- 模态窗口的主要内容 -->
            <div class="modal-body">
                <form enctype="multipart/form-data" action="login.php?action=login" method="POST" class="form-horizontal" role="form">
                    <fieldset>
                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label"></label>
                            <div class="input-group col-md-8">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
                                <select name="login_identity" autofocus required id="login_identity" class="form-control">
                                    <option>用户</option>
                                    <option>管理员</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label"></label>
                            <div class="input-group col-md-8">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="username" autofocus required id="username" placeholder="请输入用户名" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label"></label>
                            <div class="input-group col-md-8">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" name="password" autofocus required id="password" placeholder="请输入登录密码" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login" class="col-md-2 control-label"></label>
                            <div class="input-group col-md-8">
                                <input class="form-control button btn-default" type="submit" name="login" value="登录">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.0/topojson.min.js"></script>
<script src="../js/jquery.js"></script>
<!-- Include all compiled plugins (below),or include in individual files as needed -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // body...
        function show_modal() {
            // body...
            $('#myModal').modal('show');
        }
        window.setTimeout(show_modal,2000);
    });
</script>
</body>
</html>