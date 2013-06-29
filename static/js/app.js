app = angular.module("youfolio", []).config(function($routeProvider) {
  $routeProvider.when('/', {
    templateUrl: 'views/home.html', 
    controller: 'HomeController' 
  });

  $routeProvider.otherwise({ redirectTo: '/' });
});


app.controller('HomeController', function($scope) {  
});

var SignupController = function ($scope) {
  $scope.signupBox = {};
  
  $scope.update = function(signup) {
    //$scope.signupBox = angular.copy(signup);
  };

  $scope.isUnchanged = function() {
    //return angular.equals(signup, $scope.master);
  };
};

// var LoginController = function($scope, $location) {
//   $scope.credentials = { username: "", password: "" };

//   $scope.login = function(credentials) {
//     if ($scope.credentials.username !== "ralph") {
//       alert("Username must be ralph!");
//     }
//   };
// };