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
