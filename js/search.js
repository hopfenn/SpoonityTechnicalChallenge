var app = angular.module('liveSearch',[]);

app.controller('liveSearchController', function($scope, $http){
    $scope.url = "./phpScripts/searchResults.php";//searchResults.php calls search function
	$scope.search = function() {
		$http.post($scope.url, { "data" : $scope.searchString}).success(function(data, status) {
			$scope.status = status;
			$scope.results = data; 
			if ($scope.searchString == ""){
                $scope.results = $scope.initial;
            }
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});
	};

});