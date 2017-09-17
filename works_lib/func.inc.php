<?php
	/** file: func.inc.php 函数库文件 */

	include "fileupload.class.php";                            //导入文件上传类FileUpload所在文件
	/* 声明一个函数upload()处理图片上传 */
	function upload(){
		$path = "../../pdf_uploads/";                                     //设置文件上传路径
		$up = new FileUpload($path);                           //创建文件上传类对象
		if($up->upload('pdf')) {                               //上传文件
			$filename = $up->getFileName();                    //获取上传后的文件名
			return array(true, $filename);                     //如果成功返回成功状态和文件名称
		} else {
			return array(false, $up->getErrorMsg());           //如果失败返回失败状态和错误消息
		}
	}
    /* 删除上传的文件 */
    function delpdf($filename){
    $path = "../../pdf_uploads/";
    @unlink($path.$filename);                                //删除
}

	
	