function portfolioController($scope) {
	$scope.row1 = [{
		"image": "img/content.png",
		"title": "Row 1",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, {
		"image": "img/content.png",
		"title": "Row 1",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, {
		"image": "img/content.png",
		"title": "Row 1",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, ];
	$scope.row2 = [{
		"image": "img/content.png",
		"title": "Row 2",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, {
		"image": "img/content.png",
		"title": "Row 2",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, {
		"image": "img/content.png",
		"title": "Row 2",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, ];
	$scope.row3 = [{
		"image": "img/content.png",
		"title": "Row 3",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, {
		"image": "img/content.png",
		"title": "Row 3",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, {
		"image": "img/content.png",
		"title": "Row 3",
		"date": "16 June 2013",
		"tags": "tag1, tag2",
	}, ];
	$scope.fname = "Drew";
	$scope.lname = "Ellis";
	$scope.occupation = "Graphic Designer";
	$scope.city = "Alexandria";
	$scope.state = "VA";
	$scope.phone = "(867)-555-5309";
	$scope.email = "email@website.com";
	$scope.skype = "skypeusername";
}

function jobsController($scope) {
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

}