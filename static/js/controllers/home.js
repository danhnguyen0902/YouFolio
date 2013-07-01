function HomeController($scope, $dialog) {  

    // var LoginController = function($scope, $location) {
    //   $scope.credentials = { username: "", password: "" };

    //   $scope.login = function(credentials) {
    //     if ($scope.credentials.username !== "ralph") {
    //       alert("Username must be ralph!");
    //     }
    //   };
    // };    
};

function IntroCarouselController ($scope) {
    $scope.introInterval = 7000;
    $scope.slides = [
        {css: 'firstItem'},
        {css: 'secondItem'},
        {css: 'thirdItem'}
    ];
};

function SignUpController ($scope) {
    $scope.open = function () {
        $scope.shouldBeOpen = true;
    };
    $scope.close = function () {
        $scope.shouldBeOpen = false;
    };
    $scope.opts = {
        backdropFade: true,
        dialogFade: true
    };
};