app.controller('HomeController', [ '$dialog', '$scope', function($dialog, $scope) { 
    $scope.introInterval = 7000;
    $scope.slides = [
        {css: 'firstItem'},
        {css: 'secondItem'},
        {css: 'thirdItem'}
    ];
    $scope.WelcomeMessage = 'Get Started Now!';

    $scope.openSignUpForm = function() {
        console.log('I got clicked!');
        var dialogOpts = {
                templateUrl: 'partials/dialogs/signup.html',
                controller: 'SignUpController',
                dialogFade: false
            };
        var d = $dialog.dialog(dialogOpts);
        d.open();
    };
}]);