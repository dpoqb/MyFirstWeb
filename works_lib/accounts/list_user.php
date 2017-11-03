<?php
/**
 * Created by PhpStorm.
 * User: songwei
 * Date: 17-10-28
 * Time: 下午1:08
 */
include "../check_admin_cookies.php";
//壳添加查找用户功能
$where='';
$param='';
?>

<div class="col-md-10">
    <fieldset>
        <legend>全部用户</legend>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>真实姓名</th>
            <th>研究队伍</th>
            <th>职业</th>
            <th>邮箱</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <?php
        include "connc.admin.php";                              	//包含数据库连接文件，连接数据库
        include "page.class.php";                               //包含分页类文件，加数据分页功能

        $sql = "SELECT count(*) FROM users_tb {$where}";           //按条件获取数据表记录总数
        $result = $link->query($sql);
        list($total) = $result->fetch(PDO::FETCH_BOTH);  //数组中的值赋给list中的变量
        $page = new Page($total, 10, $param);                   //创建分页类对象
        /* 编写查询语句，使用$where组合查询条件， 使用$page->limit获取LIMIT从句,限制数据条数 */
        $sql = "SELECT id, username, password, realname, search_team, role, email, add_time FROM users_tb 
                {$where} ORDER BY id DESC {$page->limit}";
        /* 执行查询的SQL语句 */
        $result = $link->query($sql);
        /*处理结果集，打印数据记录 */
        if($result) {
            $i = 0;
            /* 循环数据，将数据表每行数据对应的列转为变量 */
            while(list($id, $username, $password, $realname, $search_team, $role, $email, $add_time) = $result->fetch(PDO::FETCH_BOTH)) {
                if($i++%2==0)
                    echo '<tr>';
                else
                    echo '<tr>';
                echo '<td>'.$id.'</td>';
                echo '<td>'.$username.'</td>';
                echo '<td>'.$realname.'</td>';
                echo '<td>'.$search_team.'</td>';
                echo '<td>'.$role.'</td>';
                echo '<td>'.$email.'</td>';
                echo '<td>'.$add_time.'</td>';
                echo '<td><a href="index.php?action=user_mod&id='.$id.'"><span class="glyphicon glyphicon-edit" title="修改"></span></a> 
                      <a onclick="return confirm(\'你确定要删除用户——'.$username.'吗?\')" href="index.php?action=del_user&id='.$id.'">
                         <span class="glyphicon glyphicon-trash" title="删除"></span></a></td>';
                echo '</tr>';
            }
            echo '<tr><td colspan="6">'.$page->fpage().'</td></tr>';
        }else {
            echo '<tr><td colspan="6" align="center">该用户没有被找到......</td></tr>';
        }

        mysqli_free_result($result);                            //释放结果集
        mysqli_close($link);                                    //关闭数据库连接
        ?>
    </table>
    </fieldset>
</div>
