app.controller('PortfolioController', [ '$dialog', '$scope', function($dialog, $scope) { 
    $scope.row1 = [
        {
            "image": "img/content.png",
            "title": "Example 1",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Example 2",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
        {
            "image": "img/content.png",
            "title": "Example 3",
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

    $scope.openContentEditor = function(item) {
         var dialogOpts = {
                templateUrl: 'partials/dialogs/content-detail.html',
                controller: 'ContentDetailController',
                resolve: { 
                    item: function(){ return angular.copy(item); }
                },
                dialogFade: false
            };
        var d = $dialog.dialog(dialogOpts);
        d.open();
    };
}]);

app.directive('tagInput', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            
            element.bind('keydown', function(e) {
                if (e.which == 9) {
                    e.preventDefault();
                }
            });

            element.bind('keyup', function(e) {
                var key = e.which;
                if (key == 9 || key == 13) {
                    e.preventDefault();
                    scope.$apply(attrs.newTag);
                }
            });
        }
    }
});