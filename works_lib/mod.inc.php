<?php 
	/** file: mod.inc.php 图书修改表单 */ 
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
	mysqli_close($link);                   //关闭数据库的连接
?>
<div class="col-md-10">

    <form enctype="multipart/form-data" action="index.php?action=update" method="POST" class="form-horizontal" role="form">
        <fieldset>
            <legend>修改论文信息</legend>
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <div class="form-group">
                <label for="article_title" class="col-md-2 control-label">论文标题：</label>
                <div class="input-group col-md-8">
                    <input type="text" name="article_title" autofocus required id="article_title" placeholder="请输入论文标题"
                          value="<?php echo $article_title?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="first_author_name" class="col-md-2 control-label">第一作者：</label>
                <div class="input-group col-md-8">
                    <input type="text" name="first_author_name" autofocus required id="first_author_name" placeholder="请输入论文第一作者"
                           value="<?php echo $first_author_name?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="second_author_name" class="col-md-2 control-label">第二作者：</label>
                <div class="input-group col-md-8">
                    <input type="text" name="second_author_name" autofocus required id="second_author_name" placeholder="请输入论文第二作者"
                           value="<?php echo $second_author_name?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="periodical" class="col-md-2 control-label">期刊名称：</label>
                <div class="input-group col-md-8">
                    <input type="text" name="periodical" autofocus required id="periodical" placeholder="请输入期刊名称"
                           value="<?php echo $periodical?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="abstract" class="col-md-2 control-label">摘要：</label>
                <div class="input-group col-md-8">
                    <textarea class="form-control" name="abstract" id="abstract" rows="5" placeholder="摘要内容"
                              required ><?php echo $abstract?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="key_words" class="col-md-2 control-label">关键词：</label>
                <div class="input-group col-md-8">
                    <input type="text" name="key_words" autofocus required id="key_words" placeholder="请用空格分隔"
                           value="<?php echo $key_words?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="dtp_input2" class="col-md-2 control-label">发表时间:</label>
                <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" name="ptime" type="text" readonly value="<?php echo $ptime?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
            <div class="form-group">
                <label for="upload_time" class="col-md-2 control-label">上一次上传时间：</label>
                <div class="input-group col-md-8">
                    <input type="text" name="upload_time" class="form-control" disabled value="<?php echo $upload_time?>">
                </div>
            </div>
            <div class="form-group">
                <label for="pdfname" class="col-md-2 control-label"></label>
                <div class="input-group col-md-8">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                    <?php echo "<td><a href=\"../../pdf_uploads/".$pdf."\"".">".$pdf."</a></td>"?>
                    <br><br>
                    <input type="hidden" name="pdfname" id="file-up" value="<?php echo $pdf?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="pdf" class="col-md-2 control-label">上传新文件：</label>
                <div class="input-group col-md-8">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                    <input type="file" name="pdf" value=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="add" class="col-md-2 control-label"></label>
                <div class="btn-group input-group col-md-8" role="group" aria-label="Button Group">
                    <input class="form-control button btn-default" type="submit" name="add" id="add-submit" value="修改"
                           onclick="return confirm('你确定要对——《<?php echo $article_title?>》进行修改吗？')">
                    <input class="form-control button btn-default" type="button" value="放弃修改"
                           onclick="window.history.back()">
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
