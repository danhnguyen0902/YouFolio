function GalleryController($scope) {
    $scope.projectsPeopleModel = 'Projects';
    $scope.checkedTagsModel = {
        Fresh: false,
        Popular: false,
        Favorites: false
    };

    $scope.people = [
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

    $scope.projects = [
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
        {
            "image": "img/content.png",
            "title": "Row 2",
            "date": "16 June 2013",
            "tags": "tag1, tag2",
        },
    ];

}