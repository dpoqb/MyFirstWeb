<?php
include "../check_admin_cookies.php";
?>
<?php
/** file: mod.inc.php 图书修改表单 */
include "connc.admin.php";
/* 通过ID查找指定的一行记录 */
$sql = "SELECT id, username, password, realname, add_time FROM 
            admin_tb WHERE id='{$_GET["id"]}'";
$result = $link->query($sql);
if($result) {
    /* 获取需要修改的记录数据 */
    list($id, $username, $password, $realname, $add_time) =
        $result->fetch(PDO::FETCH_BOTH);
}else {
    die("没有找到该管理员信息");
}
mysqli_free_result($result);           //释放结果集
mysqli_close($link);                   //关闭数据库的连接
?>
<div class="col-md-10">

    <form enctype="multipart/form-data" action="index.php?action=admin_update" method="POST" class="form-horizontal" role="form" id="myForm">
        <fieldset>
            <legend>修改管理员信息</legend>
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <div class="form-group">
                <label for="username" class="col-md-3 control-label">用户名：</label>
                <div class="input-group col-md-5">
                    <input type="text" name="username" value="<?php echo $username ?>" autofocus required id="username" placeholder="请输入用户名" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-3 control-label">密码：</label>
                <div class="input-group col-md-5">
                    <input type="password" name="password" value="<?php echo $password ?>" autofocus required id="password" placeholder="请输入密码" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="confirm-password" class="col-md-3 control-label">确认密码：</label>
                <div class="input-group col-md-5">
                    <input type="password" name="confirm_password" value="<?php echo $password ?>" autofocus required id="password" placeholder="请输入密码" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="realname" class="col-md-3 control-label">真实姓名：</label>
                <div class="input-group col-md-5">
                    <input type="text" name="realname" value="<?php echo $realname ?>"autofocus required id="realname" placeholder="请输入真实姓名" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="add-time" class="col-md-3 control-label">添加时间：</label>
                <div class="input-group col-md-5">
                    <input disabled type="text" value="<?php echo $add_time ?>"name="add_time" autofocus required class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="add" class="col-md-3 control-label"></label>
                <div class="btn-group input-group col-md-5" role="group" aria-label="Button Group">
                    <input class="form-control button btn-default" type="submit" name="update_user" id="update-submit" value="修改"
                           onclick="insertManager();return confirm('你确定要对该用户信息进行修改吗？')">
                    <input class="form-control button btn-default" type="button" value="放弃修改"
                           onclick="window.history.back()">
                </div>
            </div>
        </fieldset>
    </form>
</div>

