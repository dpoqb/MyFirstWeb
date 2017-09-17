
<?php //file:用于查看论文的基本信息
    include "connc.php";
    /* 通过ID查找指定的一行记录 */
    $sql = "SELECT id, article_title, first_author_name, second_author_name, periodical, abstract ,key_words, ptime, pdf,upload_time FROM 
                literatures WHERE id='{$_GET["id"]}'";
    $result = $link->query($sql);

    if($result) {
        /* 获取需要修改的记录数据 */
        list($id, $article_title, $first_author_name, $second_author_name, $periodical, $abstract ,$key_words, $ptime, $pdf, $upload_time) =
            $result->fetch(PDO::FETCH_BOTH);
    }else {
        die("没有找到需要修改的文献");
    }
    mysqli_free_result($result);           //释放结果集
    mysqli_close($link);
?>
<!-- Portfolio Modals -->
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="modal-body">
                            <blockquote><h4><?php echo $article_title?></h4></blockquote>
                            <hr>
                                <p><b class="text-success">摘要:</b><section style="text-indent:25px "><?php echo $abstract?></section></p>
                            <ul class="list-inline item-details">
                                <li><b class="text-success">第一作者:</b>
                                    <?php echo $first_author_name?>&nbsp;&nbsp;
                                    <b class="text-success">第二作者:</b>
                                    <?php echo $second_author_name?>&nbsp;&nbsp;
                                </li>
                                <li><b class="text-success">发表日期:</b>
                                    <?php echo $ptime?>&nbsp;&nbsp;
                                </li>
                                <li><b class="text-success">期刊:</b>
                                    <?php echo $periodical?>&nbsp;&nbsp;
                                </li>
                                <li><b class="text-success">查看全文:</b>
                                    <?php echo "<td><a href='../../pdf_uploads/$pdf'>
                                    <span class='glyphicon glyphicon-book text-muted'></span></a></td>"?>
                                </li>
                            </ul>
                            <div class="btn-group" role="group" aria-label="Button Group">
                                <button class="btn btn-success" type="button" data-dismiss="modal" onclick="window.history.back()">
                                    <i class="fa fa-times"></i>
                                    返回</button>
                                <button class="btn btn-success" type="button" data-dismiss="modal" onclick="window.location.href='index.php?action=mod&id=<?php echo $id?>'">
                                    <i class="fa fa-times"></i>
                                    修改</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
