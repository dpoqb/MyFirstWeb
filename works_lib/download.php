<?php
include "check_admin_cookies.php";
function forceDownload($filename) {

    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename='.$filename);                //随便一个名字都可以
    readfile($filename);                               //元file的相对地址
}
?>
<?php //file:用于查看论文的基本信息
if($_GET["action"] == "down") {
    include "../front_lib/connc.user.php";
    /* 通过ID查找指定的一行记录 */
    $sql = "SELECT pdf FROM literatures WHERE id='{$_GET["id"]}'";
    $result = $link->query($sql);
    if ($result) {
        /* 获取需要修改的记录数据 */
        list($pdf) = $result->fetch(PDO::FETCH_BOTH);
    } else {
        die("没有找到需要修改的文献");
    }
    echo $pdf;
    //文件下载
//    $path = "../../pdf_uploads/".$pdf;
//    forceDownload($path);
}
    mysqli_free_result($result);           //释放结果集
    mysqli_close($link);
?>
