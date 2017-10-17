<?php
	$link = @mysqli_connect("localhost","root","root") or die("LINK ERROR !");
	mysqli_set_charset($link,"UTF8");
	@mysqli_select_db($link,"exam system") or die("SQL ERROR !");
	
	$dataObj = file_get_contents("php://input");
	$dataJson = json_decode($dataObj);
	
	$user = $dataJson->user;
	$psw = $dataJson->psw;
	
	$sql_user = "select user from user where user = {$user} limit 1";
	$obj_user = mysqli_query($link,$sql_user);
	$arr_user = mysqli_fetch_row($obj_user);
	
	if(empty($arr_user)) {
		echo 1;	//账号不存在
		exit();
	}else {
		$sql_psw = "select id,psw from user where psw = {$psw} and user = {$user} limit 1";
		$obj_psw = mysqli_query($link,$sql_psw);
		$arr_psw = mysqli_fetch_row($obj_psw);
		if(!empty($arr_psw)) {
			class ID{
				public $id;
			}
			$object = new ID();
			$arr = array();
			$object -> id = $arr_psw[0];
			$arr[] = $object;
			echo json_encode($arr);	//登录成功，传递用户ID用于进入menu页面
			exit();
		}else {
			echo 2;	//密码错误
			exit();
		}
	}
?>