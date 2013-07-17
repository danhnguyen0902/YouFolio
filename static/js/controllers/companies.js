function CompaniesController($scope) {
    $scope.companyName = "NJI New Media";
    $scope.companyCity = "Alexandria";
    $scope.companyState = "VA";
    $scope.companyYear = 2009;
    $scope.employeeNumber = 27;
    $scope.bio = "We are an award-winning interactive agency that specializes in website design, web development, User Experience (UX) design multimedia production and online communications strategy in the Washington, D.C. area.";
    $scope.companyImage = "img/drew.jpeg";
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

    $scope.companyTwitter = "http://www.twitter.com/robbiecore";
    $scope.companyFacebook = "http://www.facebook.com/robertwilliamwagner";
    $scope.companyURL = "njimedia.com";
};