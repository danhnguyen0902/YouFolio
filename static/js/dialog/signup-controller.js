app.controller('SignUpController', ['$scope','dialog', function($scope, dialog) {
    $scope.form = [];
    $scope.WelcomeMessage = "Get Started Now!";
    $scope.SubmitText = "Let's Go!";

    $scope.signUp = function(form) {
        console.log('Sign Up Form: FirstName = ' + form.firstName);
        console.log('Sign Up Form: LastName = ' + form.lastName);
        console.log('Sign Up Form: EmailName = ' + form.emailAddress);
    };

    $scope.close = function () {
        dialog.close();
    };
}]);