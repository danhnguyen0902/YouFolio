app = angular.module("youfolio", ['ui.bootstrap']).config(function($routeProvider, $dialogProvider) {
  $routeProvider.when('/', {
    templateUrl: 'pages/home.html', 
    controller: 'HomeController' 
  });
  $routeProvider.when('/portfolio', {
    templateUrl: 'pages/portfolio.html',
    controller: 'PortfolioController'
  });

  $routeProvider.otherwise({ redirectTo: '/' });
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

// var LoginController = function($scope, $location) {
//   $scope.credentials = { username: "", password: "" };

//   $scope.login = function(credentials) {
//     if ($scope.credentials.username !== "ralph") {
//       alert("Username must be ralph!");
//     }
//   };
// };
