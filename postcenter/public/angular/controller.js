var postcenter = angular.module('postcenter', []);

postcenter.controller('PageListCtrl', function($scope, $http)
{
	$scope.baseURL = $('#baseURL').val();

	$http.get($scope.baseURL+'/pagelist')
	.success(function(response) {
	    $scope.pageList = response;
	    console.log($scope.pageList);
	  }, function(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });

	$scope.selectedIndex = -1;
	$scope.getPostList = function(page_id, $index)
	{
		$scope.selectedIndex = $index;
	}
})