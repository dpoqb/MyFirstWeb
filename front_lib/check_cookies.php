
<?php
/**
 * Created by PhpStorm.
 * User: songwei
 * Date: 17-10-31
 * Time: 下午10:37
 */
    /*如果用户没有通过登录将自动跳到登录界面*/
    if(!(isset($_COOKIE['isLogin']) && $_COOKIE['isLogin'] == '2')){
        echo "File Not Found";
        exit;
    }
?>