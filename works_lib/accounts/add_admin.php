<?php /**file:add.inc.php 添加新的文献数据*/
    include "../check_admin_cookies.php";
?>
<html>
<head>
    <title>资源数据库</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- bootstrap -->
</head>
<body>
<div class="col-md-10">

    <form enctype="multipart/form-data" action="index.php?action=insert_admin" method="POST" class="form-horizontal" role="form">
        <fieldset>
            <legend>添加管理员</legend>
            <div class="form-group">
                <label for="username" class="col-md-3 control-label">用户名：</label>
                <div class="input-group col-md-5">
                    <input type="text" name="username" autofocus required id="username" placeholder="请输入用户名" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-3 control-label">密码：</label>
                <div class="input-group col-md-5">
                    <input type="password" name="password" autofocus required id="password" placeholder="请输入密码" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-md-3 control-label">确认密码：</label>
                <div class="input-group col-md-5">
                    <input type="password" name="confirm_password" autofocus required id="confirm_password" placeholder="请输入确认密码" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="realname" class="col-md-3 control-label">真实姓名：</label>
                <div class="input-group col-md-5">
                    <input type="text" name="realname" autofocus required id="realname" placeholder="请输入真实姓名" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="add_admin" class="col-md-3 control-label"></label>
                <div class="input-group col-md-5">
                    <input class="form-control button btn-default" type="submit" name="add_admin" id="add-submit" value="添加"
                           onclick="return confirm('你确定要添新的管理员吗？')">
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>
