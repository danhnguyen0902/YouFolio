app = angular.module("youfolio", []).config(function($routeProvider) {
  $routeProvider.when('/', {
    templateUrl: 'welcome.html', 
    controller: 'HomeCtrl' 
  });
  $routeProvider.otherwise({ redirectTo: '/' })
});

app.controller('HomeCtrl', function($scope) {  
});

var SignupController = function ($scope) {
  $scope.signupBox = {};
  
  $scope.update = function(signup) {
    $scope.signupBox = angular.copy(signup);
  }

  $scope.isUnchanged = function(signup) {
    return angular.equals(signup, $scope.master);
  }
};