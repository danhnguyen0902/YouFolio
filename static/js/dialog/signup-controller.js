app.controller('SignUpController', ['$scope','dialog', '$http', function($scope, dialog) {
    $scope.form = [];
    $scope.WelcomeMessage = "Get Started Now!";
    $scope.SubmitText = "Let's Go!";
    var signUpUrl = 'http://localhost:5000/user/create'

    $scope.signUp = function(form) {
        console.log('Sign Up Requested: ' + 
                'First = ' + form.firstName +
                ', Last = ' + form.lastName +
                ', Email = ' + form.emailAddress +
                ', Password = ' + form.inputPassword +
                ', AgreedToTerms = ' + form.agreeToTerms);
        $http({
            method: 'POST',
            url: signUpUrl,
            data: JSON.parse(form), 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data, status, headers, config) {
            console.log(data);
            $scope.data = data;
        }).error(function(data, status, headers, config) {
            console.log('Error: ' + status + ' Data: ' + data);
            $scope.status = status;
        });
        dialog.close();
    };

    $scope.close = function () {
        dialog.close();
    };
}]);

app.directive('passwordValidate', function() {
    return {
        require: 'ngModel',
        link: function(scope, elm, attrs, ctrl) {
            ctrl.$parsers.unshift(function(viewValue) {
                scope.pwdValidLength = (viewValue && viewValue.length >= 8 ? 'valid' : undefined);
                scope.pwdHasLetter = (viewValue && /[A-z]/.test(viewValue)) ? 'valid' : undefined;
                scope.pwdHasNumber = (viewValue && /\d/.test(viewValue)) ? 'valid' : undefined;
                if(scope.pwdValidLength && scope.pwdHasLetter && scope.pwdHasNumber) {
                    ctrl.$setValidity('pwd', true);
                    return viewValue;
                } else {
                    ctrl.$setValidity('pwd', false);                    
                    return undefined;
                }
            });
        }
    };
});