app = angular.module("youfolio", ['ui.bootstrap'])
    .config(
        ['$routeProvider', '$dialogProvider', function ($routeProvider, $dialogProvider) {
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
    $routeProvider.when('/team', {
        templateUrl: 'pages/team.html',
        controller: 'TeamController'
    });
            $routeProvider.otherwise({ redirectTo: '/' });
            $dialogProvider.options({backdropClick: false, dialogFade: true});
        }]
    );

//FOR DEV BROWSER CACHE CLEARING...FOR FUCK SAKES.
app.run(function($rootScope, $templateCache) {
   $rootScope.$on('$viewContentLoaded', function() {
      $templateCache.removeAll();
   });
});