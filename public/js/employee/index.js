jQuery(document).ready(function($) {
	$("#edit_modal").on('show.bs.modal', function(){
		var employee_id = $("[name=id]").val();
	});

	$(document).on("click", ".btn-submit-modal", function (event) {
		var $form = $(this).parents("form");
		var url = $form.attr("action");

		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: $form,
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});

function loadData($argument) {
console.log("loadData");

	var app = angular.module('myApp', []);
	app.controller('myCtrl', function($scope, $http) {
		$scope.get = function ($argument) {
			var $form = $("#filter_form");
			var url = "/api/employee";
			var params = $form.serialize();
			var config = {
					params: params,
					method : 'GET',
					headers : {'Accept' : 'application/json'}
				};

			$http.get(url , config)
				.then(
					function($response) { // 成功
						$scope.model_list = $response.data.data;
console.log($response.data);
						$scope.last_page   = $response.data.last_page;
						$scope.current_page  = $response.data.current_page;

						// Pagination Range
						pages = [];

						for(i=1;i<=$response.data.last_page;i++) {
							pages.push(i);
						}

						$scope.range = pages;

					}, function ($response) { // エラー発生
						// $scope.myWelcome = $response.statusText;
						console.log("get: error");
						console.log($response);
					}
				);

				// pagination(app, $argument);
		}

		$scope.loadData = function(page, keyword){
			$argument = {page: page, keyword: keyword};
			$scope.get($argument);

		};

		$scope.get();

	  // $http.get("customers.php")
	  // .then(function (response) {$scope.names = response.data.records;});
	});
}

loadData();
