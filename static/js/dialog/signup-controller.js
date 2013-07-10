app.controller('SignUpController', ['$scope','dialog', function($scope, dialog) {
    $scope.form = [];
    $scope.WelcomeMessage = "Get Started Now!";

    $scope.signUp = function(form) {

    };

    $scope.close = function () {
        dialog.close();
    };
}]);