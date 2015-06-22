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

        function loadHash(e) {
            //console.log(e);
            console.log("hash");
            var hash = window.location.hash.substr(1);
            if (hash) {
                var url = 'templates/single-game.php?hash=' + hash;
                $mainView.load(url + " #view>*");
            }
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
            if (window.location.hash) {
                $(window).trigger("hashchange");
            } else {
                if (e.originalEvent.state !== null) {
                    console.log("pop");
                    var path = ($(location).attr('pathname').substring(1) + ''),
                        root = 'iscoutgames/',
                        viewName = (root !== '') ? path.replace(root, "") : path;
                    (viewName === '') ? viewName = 'home': viewName = viewName;
                    var $activeTab = $('#' + viewName + '');
                    $appNav.find('.tab').removeClass("active");
                    $activeTab.addClass("active");
                    loadView(viewName);
                }
            }
        });

        $(document).on("click", "[data-view-link]", function() {
            var $element = $(this),
                href = $(this).attr("data-view-link");
            if (href.indexOf(document.domain) > -1 || href.indexOf(':') === -1) {
                //window.location.hash = href;
                history.pushState({}, '', href);
                $mainView.load(href + " #view>*", ajaxLoad);
            }
        });
        $window.on("scroll", updateNav);
        $window.on('hashchange load', loadHash);

    });

    // The rest of code goes here!

}));