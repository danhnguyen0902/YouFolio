app = angular.module("youfolio", ['ui.bootstrap']).config(function($routeProvider, $dialogProvider) {
  $routeProvider.when('/', {
    templateUrl: 'pages/home.html', 
    controller: 'HomeController' 
  });
  $routeProvider.otherwise({ redirectTo: '/' });

  $dialogProvider.options({ backdropFade: true, dialogFade: true });
});

app.controller('HomeController', function($scope) {  
});

var IntroCarouselController = function($scope) {
  $scope.introInterval = 7000;
  $scope.slides = [{css:'firstItem'},{css:'secondItem'},{css:'thirdItem'}];
};

var SignUpController = function ($scope) {
  $scope.open = function () {
    $scope.shouldBeOpen = true;
  };
  $scope.close = function () {
    $scope.shouldBeOpen = false;
  };  
  $scope.opts = {
    backdropFade: true,
    dialogFade:true, 
  };
};