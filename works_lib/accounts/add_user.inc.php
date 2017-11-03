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

        <form enctype="multipart/form-data" action="index.php?action=insert_user" method="POST" class="form-horizontal" role="form">
            <fieldset>
                <legend>添加用户</legend>
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
                    <label for="search_team" class="col-md-3 control-label">研究队伍：</label>
                    <div class="input-group col-md-5">
                        <select name="search_team" autofocus required id="search_team" class="form-control">
                            <option><a href="">研究生组</a></option>
                            <option><a href="">爬虫组</a></option>
                            <option><a href="">聚类组</a></option>
                            <option><a href="">微信组</a></option>
                            <option><a href="">仿真组</a></option>
                            <option><a href="">网站组</a></option>
                            <option><a href="">spss</a></option>
                            <option><a href="">微博调研</a></option>
                            <option><a href="">指标体系</a></option>
                            <option><a href="">其他</a></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_role" class="col-md-3 control-label">职业：</label>
                    <div class="input-group col-md-5">
                        <select name="user_role" autofocus required id="user_role" class="form-control">
                            <option><a href="">学生</a></option>
                            <option><a href="">老师</a></option>
                            <option><a href="">其他</a></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="E-mail" class="col-md-3 control-label">邮箱：</label>
                    <div class="input-group col-md-5">
                        <input type="text" name="E-mail" autofocus required id="E-mail" placeholder="请输入用户邮箱" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_user" class="col-md-3 control-label"></label>
                <div class="input-group col-md-5">
                    <input class="form-control button btn-default" type="submit" name="add_user" id="add-submit" value="添加"
                           onclick="return confirm('你确定要添加此用户吗？')">
                </div>
                </div>
                </fieldset>
        </form>
    </div>
</body>
</html>
