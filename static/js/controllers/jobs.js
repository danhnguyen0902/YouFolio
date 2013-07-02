function JobsController($scope) {
    $scope.jobs = [{
        "title": "Junior Graphic Design/Intern",
        "company": "Google Analytics",
        "date": "12 May 2013",
        "location": "Austin, TX",
    }, {
        "title": "Product Engineer/Specialist",
        "company": "Company Name Goes Here",
        "date": "16 June 2013",
        "location": "The Middle of Nowhere, VA",
    }, {
        "title": "Job",
        "company": "YouFolio",
        "date": "16 June 2013",
        "location": "Everywhere, USA",
    }, ];
};

function JobsAccordion($scope) {
    $scope.oneAtATime = false;

    $scope.groups = [
        {
            title: "Job Type",
            content: ['All Types', 'Design', 'Other'],
            id: "jobType",
        },
        {
            title: "Industry",
            content: ['Item 1', 'Item 2', 'Item 3'],
            id: "industry",
        },
        {
            title: "Company",
            content: ['Item 1', 'Item 2', 'Item 3'],
            id: "company",
        },
    ];

    $scope.items = ['Item 1', 'Item 2', 'Item 3'];

    $scope.addItem = function() {
        var newItemNo = $scope.items.length + 1;
        $scope.items.push('Item ' + newItemNo);
    };
}