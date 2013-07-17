function CompaniesController($scope) {
    $scope.companyName = "NJI New Media";
    $scope.companyCity = "Alexandria";
    $scope.companyState = "VA";
    $scope.companyYear = 2009;
    $scope.employeeNumber = 27;
    $scope.bio = "Hello we are a company! Work for us!";
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