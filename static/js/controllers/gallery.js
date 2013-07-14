function GalleryController($scope) {
    $scope.projectsPeopleModel = 'Projects';
    $scope.checkedTagsModel = {
        Fresh: false,
        Popular: false,
        Favorites: false
    };

    $scope.people = [
        {
            "name": "Wagnasty",
            "image": "img/content.png",
            "title": "Graphic Designer",
            "city": "Fairfax",
            "state": "VA",
            "project1": "img/content.png",
            "project2": "img/content.png",
        },
        {
            "name": "Wagpiece",
            "image": "img/content.png",
            "title": "Web Developer",
            "city": "Blacksburg",
            "state": "VA",
            "project1": "img/content.png",
            "project2": "img/content.png",
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