(function(init) {
    'use strict';
    // The global jQuery object is passed as a parameter
    init(window.jQuery, window, document);

}(function($, window, document) {
    'use strict';
    // The $ is now locally scoped

    // Listen for the jQuery ready event on the document
    $(function() {
        var $document = $(document),
            $window = $(window),
            $body = $("body"),
            $appBarWrapper = $("div#app-bar-wrapper"),
            $appBarMain = $appBarWrapper.find("#app-bar-main"),
            $appBarExt = $appBarWrapper.find("#app-bar-extension"),
            $appViewTitle = $appBarExt.find(".app-view-title"),
            $appNav = $("div.app-navigation"),
            $newAppNav = $appNav.clone(),
            i = 1;

        $appNav.addClass("app-bar-nav");
        $newAppNav.addClass("app-bar-nav");
        $newAppNav.appendTo($appNav.parent());
        $appNav.remove();

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

        function updateNav() {
            var $appBarWrapper = $("div#app-bar-wrapper"),
                $appBarMain = $appBarWrapper.find("#app-bar-main"),
                $appBarExt = $appBarWrapper.find("#app-bar-extension"),
                $appViewTitle = $appBarExt.find(".app-view-title"),
                appBarWrapperOffset = $appBarWrapper.outerHeight() - $appBarMain.outerHeight(),
                perc = ($(window).scrollTop() / appBarWrapperOffset * 3) - 1;
            if ($(window).scrollTop() > appBarWrapperOffset) {
                $appBarMain.addClass("raised");
            } else {
                $appBarMain.removeClass("raised");
                if (perc >= -1) {
                    while (perc > 0) {
                        perc = 0;
                    }
                    perc = Math.abs(perc);
                    $appViewTitle.css("opacity", perc);

                }
            }
        }

        init();

        $(window).on("popstate", function(e) {
            if (e.originalEvent.state !== null) {
                var href = ($(location).attr('href') + ''),
                    origin = ($(location).attr('origin') + '/iscoutgames/'),
                    viewName = href.replace(origin, "");
                href = viewName;
                loadView(href);
            }
        });

        $(document).on("click", "#gamelink", function() {
            var $element = $(this),
                href = $(this).attr("#gamelink");
            if (href.indexOf(document.domain) > -1 || href.indexOf(':') === -1) {
                window.location.hash = href;
                history.pushState({}, '', href);
                $mainView.load(href + " #view>*", ajaxLoad);
            }
        });
        $window.on("scroll", updateNav);

    });

    // The rest of code goes here!

}));
