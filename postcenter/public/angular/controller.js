var postcenter = angular.module('postcenter', []);

postcenter.controller('PageListCtrl', function($scope, $http)
{
	$scope.baseURL = $('#baseURL').val();

	$http.get($scope.baseURL+'/pagelist')
	.success(function(response) {
	    $scope.pageList = response;
	    console.log($scope.pageList);
	  }, function(response) {
		  
	  });

	$scope.selectedIndex = -1;
	$scope.getPostList = function(page_id, $index)
	{
		$scope.selectedIndex = $index;
		
		$http.get($scope.baseURL+'/'+page_id+'/getPostlist')
			.success(function(response) {
				$scope.postList = response;;
			}, function(response) {	
							
			});
	}
})