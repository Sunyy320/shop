<?php
/**
 * 移除数组中字段名称的前缀
 * @param string $array_data 数据数组
 * @param string $pre 要去掉前缀
 * @return string|multitype:unknown
 */

function removePre($array_data,$pre){
	if(empty($pre) || empty($array_data))
		return $array_data;
	$res = array();
	$len = strlen($pre);
	foreach ($array_data as $key=>$value){
		if(is_numeric($key)){
			$res[$key] = removePre($value, $pre);
		}else{
			$key = substr($key, $len);
			$res[$key] = $value;
		}
	}
	return $res;
}

function uploadImg($array){

	//file_put_contents("d:/mylog.log","upload",FILE_APPEND);

	header("Content-Type:text/html;charset=utf-8");
	$upload = new \Think\Upload();// 实例化上传类
	$upload->maxSize   =     20145728 ;// 设置附件上传大小
	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类
	$upload->rootPath  =     'Public/img/'; // 设置附件上传根目录
	$upload->savePath  =      ''; // 设置附件上传目录
	$upload->autoSub=false;
	// 上传文件
	$info   =   $upload->uploadOne($array);
	$filename = __ROOT__."/Public/img/".$info['savename'];

	//file_put_contents("d:/mylog.log",$filename,FILE_APPEND);

	if(!$info) {// 上传错误提示错误信息
		$filename="error";
		return $filename;
	}else{// 上传成功
		return $filename;
	}
}
?>