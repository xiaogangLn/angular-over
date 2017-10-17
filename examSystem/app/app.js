var app = angular.module("exam", ["ngRoute"]);

app.config(["$routeProvider", function($routeProvider) {
	$routeProvider.when("/login", {
		templateUrl: "login.html",
		controller:"loginCtrl"
	}).when("/menu/:id", {
		templateUrl: "menu.html",
		controller:"menuCtrl"
	}).when("/insert/:title", {
		templateUrl: "insert.html",
		controller:"insertCtrl"
	}).when("/comein", {
		templateUrl: "comein.html"
	}).otherwise({
		redirectTo: "/login"
	});
}]);