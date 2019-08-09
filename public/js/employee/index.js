jQuery(document).ready(function($) {
	$("#create_modal").on('show.bs.modal', function(){
		var employee_id = $("[name=id]").val();
	});

});

var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
	$scope.get = function ($argument = {}) {
		var $form = $("#filter_form");
		var url = "/api/employee";
		var page = 1;
		if($argument != undefined){
			if(($argument["page"] == undefined) || ($argument["page"] == "") || ($argument["page"] == "undefined") || ($argument["page"] == null)){
			}else{
				page = $argument["page"];
			}

		}

		var params = {
			page:page,
			id:$($form).find("[name=id]").val(),
			firstname:$($form).find("[name=firstname]").val(),
			lastname:$($form).find("[name=lastname]").val(),
			address:$($form).find("[name=address]").val(),
			boss:$($form).find("[name=boss]").val(),
			salary:$($form).find("[name=salary]").val(),
			birthday:$($form).find("[name=birthday]").val(),
		};

		params = objectAttributeFilter(params);

		var config = {
				params: params,
				method : 'GET',
				headers : {'Accept' : 'application/json'}
			};

		$http.get(url , config)
			.then(
				function($response) { // 成功
					$scope.model_list = $response.data.data;
					$scope.last_page   = $response.data.last_page;
					$scope.current_page  = $response.data.current_page;

					// Pagination Range
					pages = [];

					for(i=1;i<=$response.data.last_page;i++) {
						pages.push(i);
					}

					$scope.range = pages;

				}, function ($response) { // エラー発生
					console.log("get: error");
					console.log($response);
				}
			);

			pagination(app);
	}

	$scope.loadData = function(page){
		$scope.get({page:page});
	};

	$scope.reset = function(){
		var $form = $("#filter_form");
		$form.trigger("reset");
		$scope.get();
	};

	$scope.store = function () {
		var $form = $("#create_form");
		var url = "/api/employee";
		$form.attr("action", url);

		var params = {
			_method 			: 'POST',
			id  				: $($form).find("[name=id]").val(),
			_token  			: $($form).find("[name=_token]").val(),
			firstname  			: $($form).find("[name=firstname]").val(),
			lastname  			: $($form).find("[name=lastname]").val(),
			address  			: $($form).find("[name=address]").val(),
			boss  				: $($form).find("[name=boss]").val(),
			salary  			: $($form).find("[name=salary]").val(),
			birthday  			: $($form).find("[name=birthday]").val(),
		};

		params = objectAttributeFilter(params);
		$http.post(url, JSON.stringify(params))
			.then(
				function($response) { // 成功
					$scope.get();

					$form.trigger("reset");

				}, function ($response) { // エラー発生
				}
			);

			// pagination(app, $argument);
	}

	$scope.edit = function (id) {
		var url 	= "/api/employee/" + id;

		$http.get(url)
			.then(
				function($response) { // 成功
					var $form = $("#edit_modal");
					$form.find("[name=id]").val($response.data.id);
					$form.find("[name=firstname]").val($response.data.firstname);
					$form.find("[name=lastname]").val($response.data.lastname);
					$form.find("[name=boss]").val($response.data.boss);
					$form.find("[name=address]").val($response.data.address);
					$form.find("[name=birthday]").val($response.data.birthday);
					$form.find("[name=salary]").val($response.data.salary);

				}, function ($response) { // エラー発生
				}
			);

	}

	$scope.update = function () {
		var $form 				= $("#edit_form");
		var id 					= $($form).find("[name=id]").val();
		var url 				= "/api/employee/" + id;
		$form.attr("action", url);

		var params = {
			_method 			: 'PUT',
			_token  			: $($form).find("[name=_token]").val(),
			firstname  			: $($form).find("[name=firstname]").val(),
			lastname  			: $($form).find("[name=lastname]").val(),
			address  			: $($form).find("[name=address]").val(),
			boss  				: $($form).find("[name=boss]").val(),
			salary  			: $($form).find("[name=salary]").val(),
			birthday  			: $($form).find("[name=birthday]").val(),
		};

		params = objectAttributeFilter(params);

		$http.post(url, JSON.stringify(params))
			.then(
				function($response) { // 成功
					$scope.get();

					$form.trigger("reset");

				}, function ($response) { // エラー発生
				}
			);

			pagination(app);
	}

	$scope.deleteModelOpen = function (id) {
		var $form 				= $("#delete_modal");
		$($form).find("[name=id]").val(id);

	}

	$scope.delete = function () {
		var $form 				= $("#delete_modal");
		var id 					= $($form).find("[name=id]").val();
		var url 				= "/api/employee/" + id;
		$form.attr("action", url);

		var params = {
			_method 			: 'DELETE',
			_token  			: $($form).find("[name=_token]").val(),
		};

		params = objectAttributeFilter(params);

		$http.post(url, JSON.stringify(params))
			.then(
				function($response) { // 成功
					$scope.get();

				}, function ($response) { // エラー発生
				}
			);

			pagination(app);
	}

	$scope.get();


});

pagination(app);

function objectAttributeFilter(obj) {
	for (var propName in obj) { 
		if (obj[propName] == "" || obj[propName] == null || obj[propName] == "undefined") {
			delete obj[propName];
		}
	}

	return obj;
}

function pagination(app) {
	app.directive('listPagination', function(){
			template =
					'<div ng-show="last_page > 1">'
					+ 	'<ul class="pagination justify-content-center">'
					+ 		'<li class="page-item" ng-show="1 < current_page"><a class="page-link" href="javascript:void(0)" ng-click="loadData(1)">&laquo;</a></li>'
					+ 		'<li class="page-item" ng-show="1 < current_page"><a class="page-link" href="javascript:void(0)" ng-click="loadData(current_page-1)">&lsaquo;</a></li>'
					+ 		'<li class="page-item" ng-repeat="i in range" ng-class="{active : current_page == i}">'
					+ 		'	<a class="page-link" href="javascript:void(0)" ng-click="loadData(i)">{{i}}</a>'
					+ 		'</li>'
					+ 		'<li class="page-item" ng-show="current_page < last_page"><a class="page-link" href="javascript:void(0)" ng-click="loadData(current_page+1)">&rsaquo;</a></li>'
					+ 		'<li class="page-item" ng-show="current_page < last_page"><a class="page-link" href="javascript:void(0)" ng-click="loadData(last_page)">&raquo;</a></li>'
					+ 	'</ul>'
					+ '</div>'
					;
		return {
			restrict: 'E',
			template: template
			};
	});
}
