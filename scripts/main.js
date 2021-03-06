(function(init) {
    'use strict';
    // The global jQuery object is passed as a parameter
    init(window.jQuery, window, document);

}(function($, window, document) {
    'use strict';
    // The $ is now locally scoped

    var $appbar = $('#app-bar-wrapper');

    // Listen for the jQuery ready event on the document
    $(function() {


        var path = ($(location).attr('pathname').substring(1) + ''),
            root = 'iscoutgames/',
            viewName = (root !== '') ? path.replace(root, "") : path ;
            (viewName === '') ? viewName = 'home': viewName = viewName;
        var $activeTab = $('#' + viewName + '');
        //console.log(viewName);
        $activeTab.addClass('active');
        $("ul.nav-list").tabs();

        // The DOM is ready!

        $(".theme-switch").on("click", changeTheme);
        $(".extend-appbar").on("click", extendAppbar);
        $(".extend-special").on("click", specialAppbar);
        $(".color-appbar").on("click", colorAppbar);


    });

    function changeTheme() {
        $("body").toggleClass("light-theme dark-theme");
    };

    function extendAppbar() {
        $appbar.toggleClass("extended");
    };

    function specialAppbar() {
        $appbar.toggleClass("special");
    };

    function colorAppbar() {
        $appbar.toggleClass("colored");
    };


    // The rest of code goes here!

}));
