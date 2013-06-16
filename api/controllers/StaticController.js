/*--------------------- 
	:: Static  
	-> controller 
---------------------*/
var StaticController = {
	index: function(req, res) {
		res.sendfile('public/index.html');
	}
};
module.exports = StaticController;