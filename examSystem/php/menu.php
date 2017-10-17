<?php
	$link = @mysqli_connect("localhost","root","root") or die("LINK ERROR !");
	mysqli_set_charset($link,"UTF8");
	@mysqli_select_db($link,"exam system") or die("SQL ERROR !");
	
	// 接收menu页面传送来的用户id
	$dataObj = file_get_contents("php://input");
	$dataJson = json_decode($dataObj);
	
	$id = $dataJson->id;
	
	// 查询对应用户id的名字与班级
	$sql_user = "select name,class,identity from user where id = {$id} limit 1";
	$obj_user = mysqli_query($link,$sql_user);
	$arr_user = mysqli_fetch_row($obj_user);
	
	// 定义类Name，把查询出来的名字与班级保存在类中发送到menu页面
	class Name{
		public $name;
		public $class;
		public $identity;
	}
	$object = new Name();
	$arr = array();
	$object -> name = $arr_user[0];
	$object -> class = $arr_user[1];
	$object -> identity = $arr_user[2];
	$arr[] = $object;
	echo json_encode($arr);

	// 获取用户的身份id，查找对应菜单
	/* echo "<br/>";
	$identity = $object -> identity;

	echo $identity."<br/>";

	$arr_menus = array();

	$sql_menuTitle = "select id,menu from menu where identity = {$identity}";
	$obj_menuTitle = mysqli_query($link,$sql_menuTitle);
	while ($arr_menuTitle = mysqli_fetch_row($obj_menuTitle)) {
		echo 1;
		echo "<br/>";
		$Title = new JsonObject();
		$Title -> id = $arr_menuTitle[0];
		$Title -> title = $arr_menuTitle[1];

		$withId = $arr_menuTitle[0];
		$sql_menu = "select menu,url from menu where withId = {$withId}";
		$obj_menu = mysqli_query($link,$sql_menu);
		while ($arr_menu = mysqli_fetch_row($obj_menu)) {
			echo 2;
			echo "<br/>";
			$Menu = new JsonObjectChild();
			$Menu -> menu = $arr_menu[0];
			$Menu -> url = $arr_menu[1];
		}

		$Title -> menu = $Menu;
		$arr_menus[] = $Title;
	}

	print_r($arr_menus);

	$jsonString=new JsonObject();
	$jsonString->allmenus=$arr_menus;
	echo json_encode($jsonString); */

?>