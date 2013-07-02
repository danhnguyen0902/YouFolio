app = angular.module("youfolio", ['ui.bootstrap']).config(function ($routeProvider, $dialogProvider, $locationProvider) {
    $routeProvider.when('/', {
        templateUrl: 'pages/home.html',
        controller: 'HomeController'
    });
    $routeProvider.when('/portfolio', {
        templateUrl: 'pages/portfolio.html',
        controller: 'PortfolioController'
    });
    $routeProvider.when('/jobs', {
        templateUrl: 'pages/jobs.html',
        controller: 'JobsController'
    });
    $routeProvider.when('/gallery', {
        templateUrl: 'pages/gallery.html',
        controller: 'GalleryController'
    });
    $routeProvider.when('/help', {
        templateUrl: 'pages/help.html',
        controller: 'HelpController'
    });
    $routeProvider.otherwise({ redirectTo: '/' });
});



