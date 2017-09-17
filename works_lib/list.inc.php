<?php
		/** file: list.inc.php 图书列表显示脚本，包括搜索加分页的功能 */
		
		/* 判断用户是通过表单POST提交，还是使用URL的GET提交,都将内容交给$ser处理 */
		$ser = !empty($_POST) ? $_POST : $_GET;                    
		
        $where = array();            								 //声明WHERE从句的查询条件变量
        $param = "";               									 //声明分页参数的组合变量
		$title = "";                 								 //声明本页的标题变量
		/* 处理用户搜索文献名称 */
        if(!empty($ser["article_title"])) {
            $where[] = "article_title like '%{$ser["article_title"]}%'";
			$param .= "&article_title={$ser["article_title"]}";
			$title .= ' +论文标题包含:"'.$ser["article_title"].'" ';
        }
		/* */
        if(!empty($ser["first_author_name"])) {
            $where[] = "first_author_name like '%{$ser["first_author_name"]}%'";
			$param .= "&first_author_name={$ser["first_author_name"]}";
			$title .= ' +第一作者包含:"'.$ser["first_author_name"].'" ';
        }
		/*  */
        if(!empty($ser["second_author_name"])) {
            $where[] = "second_author_name like '%{$ser["second_author_name"]}%'";
			$param .= "&second_author_name={$ser["second_author_name"]}";
			$title .= ' +第二作者包含:"'.$ser["second_author_name"].'" ';
        }
		/*  */
		if(!empty($ser["periodical"])) {
            $where[] = "periodical like '{$ser["periodical"]}'";
			$param .= "&periodical={$ser["periodical"]}";
			$title .= ' +期刊名称包含："'.$ser["periodical"].'" ';
        }
        if(!empty($ser["key_words"])) {
        $where[] = "key_words like '{$ser["key_words"]}'";
        $param .= "&key_words={$ser["key_words"]}";
        $title .= ' +关键词中包含："'.$ser["key_words"].'" ';
        }
		/* 处理是否有搜索的情况 */
        if(!empty($where)){
            $where = "WHERE ".implode(" and ", $where);
			$title = "搜索：".$title;
        }else {
			$where = "";
			$title = "全部论文";
		}
		echo '<div class=\'col-md-10\'><fieldset><legend>'.$title.'</legend></fieldset></div>';
?>
<!--php里面可以不使用html\body标签而直接使用里面的元素，但是包含它们的父文件里要含html\body-->
<div class="col-md-10">
<table class="table table-striped table-hover">
	<thead>
    <tr>
		<th>ID</th>
        <th>论文标题</th>
        <th>第一作者</th>
        <th>第二作者</th>
        <th>期刊名称</th>
        <th>发表时间</th>
        <th>PDF文件</th>
        <th>操作</th>
    </tr>
    </thead>
	<?php
		include "connc.php";                              	//包含数据库连接文件，连接数据库
		include "page.class.php";                               //包含分页类文件，加数据分页功能
		
		$sql = "SELECT count(*) FROM literatures {$where}";           //按条件获取数据表记录总数
		$result = $link->query($sql);
		list($total) = $result->fetch(PDO::FETCH_BOTH);
		
		$page = new Page($total, 10, $param);                   //创建分页类对象
		/* 编写查询语句，使用$where组合查询条件， 使用$page->limit获取LIMIT从句,限制数据条数 */
		$sql = "SELECT id, article_title, first_author_name, second_author_name, periodical, ptime, pdf FROM literatures 
                {$where} ORDER BY id DESC {$page->limit}";
		/* 执行查询的SQL语句 */
		$result = $link->query($sql);
		/*处理结果集，打印数据记录 */
		if($result) {
			$i = 0;
			/* 循环数据，将数据表每行数据对应的列转为变量 */
			while(list($id, $article_title, $first_author_name, $second_author_name, $periodical, $ptime, $pdf) = $result->fetch(PDO::FETCH_BOTH)) {
				if($i++%2==0)
					echo '<tr>';
				else 
					echo '<tr>';
				echo '<td>'.$id.'</td>';
				echo '<td>'.$article_title.'</td>';
				echo '<td>'.$first_author_name.'</td>';
				echo '<td>'.$second_author_name.'</td>';
                echo '<td>'.$periodical.'</td>';
                echo '<td>'.$ptime.'</td>';
                echo "<td><a href='../../pdf_uploads/$pdf'>$pdf</a></td>";
                echo '<td><a href="index.php?action=mod&id='.$id.'"><span class="glyphicon glyphicon-edit" title="修改"></span></a>
                         | <a onclick="return confirm(\'你确定要删除——《'.$article_title.'》吗?\')" href="index.php?action=del&id='.$id.'&pdf='.$pdf.'">
                         <span class="glyphicon glyphicon-trash" title="删除"></span></a> | <a href="index.php?action=watch&id='.$id.'"><span class="glyphicon glyphicon-zoom-in" title="查看"></span></a></td>';
				echo '</tr>';
			}
			echo '<tr><td colspan="6">'.$page->fpage().'</td></tr>';
		}else {
            echo '<tr><td colspan="6" align="center">没有文献被找到......</td></tr>';
        }

		mysqli_free_result($result);                            //释放结果集
		mysqli_close($link);                                    //关闭数据库连接
	?>
</table>
</div>