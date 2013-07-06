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

// function PortfolioController($dialog, $scope) {
//     $scope.row1 = [
//         {
//             "image": "img/content.png",
//             "title": "Row 1",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//         {
//             "image": "img/content.png",
//             "title": "Row 1",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//         {
//             "image": "img/content.png",
//             "title": "Row 1",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//     ];
//     $scope.row2 = [
//         {
//             "image": "img/content.png",
//             "title": "Row 2",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//         {
//             "image": "img/content.png",
//             "title": "Row 2",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//         {
//             "image": "img/content.png",
//             "title": "Row 2",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//     ];
//     $scope.row3 = [
//         {
//             "image": "img/content.png",
//             "title": "Row 3",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//         {
//             "image": "img/content.png",
//             "title": "Row 3",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//         {
//             "image": "img/content.png",
//             "title": "Row 3",
//             "date": "16 June 2013",
//             "tags": "tag1, tag2",
//         },
//     ];
//     $scope.fname = "Drew";
//     $scope.lname = "Ellis";
//     $scope.occupation = "Graphic Designer";
//     $scope.city = "Alexandria";
//     $scope.state = "VA";
//     $scope.phone = "(867)-555-5309";
//     $scope.email = "email@website.com";
//     $scope.skype = "skypeusername";

//     $scope.openContentEditor = function(item) {
//         var d = $dialog.dialog({dialogFade: true; resolve: {item: function() { return angular.copy(item); } }});
//         d.open('partials/dialogs/content-detail.html', 'ContentDetailController');
//     };
// };

app.controller('ContentDetailController', ['$scope','dialog', 'item', function($scope, dialog, item) {
    $scope.item = item;
    item.inputTags = [ { name: 'Tag1'}, { name: 'Tag2' }];
    $scope.addTag = function () {        
        if ($scope.newTag.length > 0) {
            item.inputTags.push({name: $scope.newTag });
            $scope.newTag = '';
        }
    }
    $scope.deleteTag = function (key) {
        if (item.inputTags.length > 0) {
            item.inputTags.splice(key, 1);
        }        
    }
    $scope.close = function () {
        dialog.close();
    }
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