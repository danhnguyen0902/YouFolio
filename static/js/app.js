/*global angular */

/* @type {angular.Module} */
app = angular.module("youfolio", ['ui.bootstrap']).config(function($routeProvider, $dialogProvider) {
  $routeProvider.when('/welcome', {
    templateUrl: 'welcome.html', 
    controller: 'HomeCtrl' 
  });
  $routeProvider.otherwise({ redirectTo: '/welcome' })

  $dialogProvider.options({ backdropFade: true, dialogFade: true });
});

app.controller('HomeCtrl', function($scope) {
  
});

var SignUpCtrl = function ($scope) {
  $scope.open = function () {
    $scope.shouldBeOpen = true;
  };
  $scope.close = function () {
    $scope.closeMsg = 'I was closed at: ' + new Date();
    $scope.shouldBeOpen = false;
  };  
  $scope.opts = {
    backdropFade: true,
    dialogFade:true, 
  };
};