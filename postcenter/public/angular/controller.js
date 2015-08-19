var postcenter = angular.module('postcenter', ['infinite-scroll']);

postcenter.controller('PageListCtrl', function($scope, $http, Reddit)
{
	$scope.baseURL = $('#baseURL').val();

	$http.get($scope.baseURL+'/pagelist')
	.success(function(response) {
	    $scope.pageList = response;
	  }, function(response) {
		  
	  });

	$scope.selectedIndex = -1;
	
	$scope.getPostList = function(page_id, $index)
	{
		$('#postlist').hide();
		$scope.selectedIndex = $index;
    $scope.reddit = new Reddit(page_id);
    $('#postlist').show();    
  }
  
  $scope.showThread = function(post_id)
  {
    $('#thread').show();
    alert(post_id);
  }

})

// Reddit constructor function to encapsulate HTTP and pagination logic
postcenter.factory('Reddit', function($http) {
  var Reddit = function(page_id) {
    this.postList = [];
    this.busy = false;
    this.after = 0;
    this.baseURL = $('#baseURL').val();
    this.page_id = page_id;
  };

  Reddit.prototype.nextPage = function(postList) {
    if (this.busy) return;
    this.busy = true;
    var url = this.baseURL+"/" + this.page_id + "/getPostlist/"+this.after;

    $http.get(url).success(function(data) 
    {
      for (var i = 0; i < data.length; i++) 
      {
        this.postList.push(data[i]);
      }
      this.after += 1;
      this.busy = false;
      if(data.length < 20)
      {
        this.busy = true;
      }
    }.bind(this));
  };

  return Reddit;
});