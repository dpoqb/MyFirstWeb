<?php
include "check_admin_cookies.php";
?>
<?php
    include "connc.admin.php";
    if($_GET['action'] == 'insert'){
        $ver_title = trim($_POST['article_title']);
        $sql = "SELECT * FROM article_title_view WHERE article_title LIKE '{$ver_title}'";
        $result=$link->query($sql);
        if($result) {
            if ($result->rowCount() > 0) {
                echo "<script>alert(\"该论文标题已经存在\")</script>";
                die();
            }
        }
    }
    else if($_GET['action'] == 'update'){
        $ver_title = trim($_POST['article_title']);
        $ID = $_POST['id'];
        $sql = "SELECT * FROM article_title_view WHERE id != {$ID} AND article_title LIKE '{$ver_title}'";
        $result=$link->query($sql);
        if($result) {
            if ($result->rowCount() > 0) {
                echo "<script>alert(\"该论文标题已经存在\")</script>";
                die();
            }
        }
    }
    else if(($_GET["action"] == "admin_update") || ($_GET["action"] == "insert_admin")) {
        $admin_password = $_POST['password'];
        $admin_confirm_password = $_POST['confirm_password'];
        if ($admin_password != $admin_confirm_password) {
            echo "<script>alert('两次输入密码不一致')</script>";
            die();
        }
        //验证用户名是否存在
        $ver_username = trim($_POST['username']);
        $ID = $_POST['id'];
        if($_GET["action"] == "insert_admin"){
            $sql = "SELECT * FROM get_admin_name_view WHERE username LIKE '{$ver_username}'";
        }else {
            $sql = "SELECT * FROM get_admin_name_view WHERE id != {$ID} AND username LIKE '{$ver_username}'";
        }
        $result=$link->query($sql);
        if($result) {
            if ($result->rowCount() > 0) {
                echo "<script>alert(\"用户名已经存在\")</script>";
                die();
            }
        }
    }
    else if(($_GET["action"] == "user_update") || ($_GET["action"] == "insert_user")){
        //邮箱正则表达式
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
        $user_password = $_POST['password'];
        $user_confirm_password = $_POST['confirm_password'];
        $email = $_POST['E-mail'];
        if ($user_password != $user_confirm_password) {
            echo "<script>alert('两次输入密码不一致')</script>";
            die();
        }
        if(!(preg_match("{$pattern}", "{$email}"))){
            echo "<script>alert('请输入正确的邮箱格式')</script>";
            die();
        }
        //验证用户名是否存在
        $ver_username = trim($_POST['username']);
        $ID = $_POST['id'];
        if($_GET["action"] == "insert_user"){
            $sql = "SELECT * FROM get_username_view WHERE username LIKE '{$ver_username}'";
        }else {
            $sql = "SELECT * FROM get_username_view WHERE id != {$ID} AND username LIKE '{$ver_username}'";
        }
        $result=$link->query($sql);
        if($result) {
            if ($result->rowCount() > 0) {
                echo "<script>alert(\"用户名已经存在\")</script>";
                die();
            }
        }
    }
    mysqli_close($link);
?>
