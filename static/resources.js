/*
 This is where we include all javascript files for the app.
 */
head.js(
    /* External Libraries
     * Location: lib/ (or CDN's..?)
     */     
    "http://code.jquery.com/jquery-1.10.1.min.js",
    "http://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.js",
    "lib/angular-resource.js",    
    "http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.4.0.js",
    /* Main app
     * Location: js/app.js
     */
    "js/app.js",
    /* Controllers
     * Location: js/controllers
     */
    "js/controllers/home.js",
    "js/controllers/gallery.js",
    "js/controllers/help.js",    
    "js/controllers/jobs.js",
    "js/controllers/portfolio.js",
    "js/controllers/team.js",
    "js/controllers/companies.js",
    /* Dialog Controllers
     * Location: js/dialog
     */
    "js/dialog/content-detail-controller.js",
    "js/dialog/signup-controller.js"
);