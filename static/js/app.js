app = angular.module("youfolio", ['ui.bootstrap']).config(function ($routeProvider, $dialogProvider) {
    $routeProvider.when('/', {
        templateUrl: 'pages/home.html',
        controller: 'HomeController'
    });
    $routeProvider.when('/portfolio', {
        templateUrl: 'pages/portfolio.html',
        controller: 'PortfolioController'
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

app.controller('HomeController', function ($scope) {
});

var IntroCarouselController = function ($scope) {
    $scope.introInterval = 7000;
    $scope.slides = [
        {css: 'firstItem'},
        {css: 'secondItem'},
        {css: 'thirdItem'}
    ];
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
        dialogFade: true,
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

app.controller('PortfolioController', function ($scope) {
    $scope.row1 = [
        {
            "image": "img/content.png",
            "title": "Row 1",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Row 1",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Row 1",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
    ];
    $scope.row2 = [
        {
            "image": "img/content.png",
            "title": "Row 2",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Row 2",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Row 2",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
    ];
    $scope.row3 = [
        {
            "image": "img/content.png",
            "title": "Row 3",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Row 3",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Row 3",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
    ];
    $scope.fname = "Drew";
    $scope.lname = "Ellis";
    $scope.occupation = "Graphic Designer";
    $scope.city = "Alexandria";
    $scope.state = "VA";
    $scope.phone = "(867)-555-5309";
    $scope.email = "email@website.com";
    $scope.skype = "skypeusername";
});


app.controller('GalleryController', function ($scope) {
});

app.controller('HelpController', function ($scope) {
});