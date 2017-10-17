app.controller("loginCtrl", function($scope, $http) {
	$scope.userLogin = {};
	$scope.login = function() {
		if($scope.userLogin.user.length < 6 || $scope.userLogin.user.length > 16) {
			alert("账号为6-16位字符！");
		} else if($scope.userLogin.psw.length < 6 || $scope.userLogin.psw.length > 16) {
			alert("密码为6-16位字符！");
		} else {
			$http({
				method: "POST",
				url: "./php/login.php",
				data: $scope.userLogin
			}).then(function success(response) {
				if(Array.isArray(response.data)) {
					alert("登录成功！");
					location.href = "#/menu/" + response.data[0].id;
				} else {
					if(response.data == 1) {
						alert("对不起，您的账号不存在，请重新输入");
						location.href = "#/login";
					} else {
						alert("对不起，您的密码有误，请重新输入");
						location.href = "#/login";
					}
				}
			}, function() {
				alert("$http error !");
			});
		}
	};
});

app.controller("menuCtrl", function($scope, $http, $routeParams) {
	$scope.id = $routeParams.id;
	if($scope.id == "") {
		alert("对不起，请先登录您的账号才能进入该系统！");
		location.href = "#/login";
	}
	$scope.title = "分类";
	$scope.name = "科目";
	$scope.show = function(title, name) {
		$scope.title = title;
		$scope.name = name;
		/*console.log("./data/questions_" + $scope.name + ".json");
		$http({
			method: "POST",
			url: "./data/questions_" + $scope.name + ".json"
		}).then(function success(response) {
			$rootScope.Questions = response.data;
		});*/
	}
	$http({
		method: "POST",
		url: "./php/menu.php",
		data: {
			"id": $scope.id
		}
	}).then(function success(response) {
		$scope.user = response.data[0];
	});
	$http({
		method: "POST",
		url: "./data/menu.json"
	}).then(function success(response) {
		$scope.menus = response.data;
		console.log($scope.menus);
	});
});

app.controller("insertCtrl", function($scope, $http, $routeParams) {
	//	$scope.questions = $rootScope.Questions;
	//	$scope.questions = "123123";
	$scope.title = $routeParams.title;
	$http({
		method: "POST",
		url: "./data/questions_" + $scope.title + ".json"
	}).then(function success(response) {
		$scope.questions = response.data;
	});
});