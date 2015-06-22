(function(init) {
    'use strict';
    // The global jQuery object is passed as a parameter
    init(window.jQuery, window, document);

}(function($, window, document) {
    'use strict';
    // The $ is now locally scoped

    // Listen for the jQuery ready event on the document
    $(function() {
        var $mainView = $("#view");
        //The DOM is ready!

        function init() {
            // Do this when a page loads.
        };

        function ajaxLoad(html) {
            // Do this after ajax loads.
        };

        function loadView(href) {
            $mainView.load(href + " main>*", ajaxLoad);
        };


        init();

        $(document).on("click", "a", function(e) {
            var $this = $(this),
                href = $this.attr("href"),
                dataSlug = $this.attr("data-slug");
            if (href.indexOf(document.domain) > -1 || href.indexOf(':') === -1) {
                $mainView.load(href + " #view>*", ajaxLoad);
                window.location.hash =  dataSlug;
            }
            e.preventDefault();
        });
});

    // The rest of code goes here!

}));