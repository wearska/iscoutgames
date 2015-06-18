(function(init) {
    'use strict';
    // The global jQuery object is passed as a parameter
    init(window.jQuery, window, document);

}(function($, window, document) {
    'use strict';
    // The $ is now locally scoped 

    // Listen for the jQuery ready event on the document
    $(function() {


        var href = ($(location).attr('href') + ''),
            origin = ($(location).attr('origin') + '/iscoutgames/'),
            viewName = href.replace(origin, "");
        (viewName == '') ? viewName = 'home': viewName = viewName;
        var $activeTab = $('#' + viewName + '');
        $activeTab.addClass('active');
        $("ul.nav-list").tabs();

        // The DOM is ready!

    });


    // The rest of code goes here!

}));