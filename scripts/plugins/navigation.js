/*jslint browser: true, devel: true */
(function($, window, document) {
  // The $ is now locally scoped
  $(function() {

    // Functions
    function startFn() {
      "use strict";
      console.log("fetching view");
    }

    function errorFn(xhr, status, strErr) {
      "use strict";
      console.log("There was an error!");
    }

    function successFn(result) {
      "use strict";
      var $view = $(result).filter("#view").children().get(0).innerHTML;
      $("#view").empty();
      $("#view").html($view);
      /*var newUrl = $(result).filter("#view").attr("data-nav-state-slug");
        window.history.pushState("", "", linkURL);*/
      //var newHash = linkURL.replace("views/", "");
      //window.location.hash = newHash;
      console.log(result);
    }

    function getView($element) {
      "use strict";
      var linkURL = $element.attr("data-rel");
      $.ajax({
        // the URL for the request
        url: linkURL,

        // whether this is a POST or GET request
        type: "GET",

        // function to call before we send the AJAX request
        beforeSend: startFn,

        // function to call for success
        success: successFn,

        // function to call on an error
        error: errorFn,

        // code to run regardless of success or failure
        complete: function(xhr, status) {
          //console.log("The request is complete!");
        }
      });
    }

    function updateNav() {
      "use strict";
      var $appBarWrapper = $("div#app-bar-wrapper"),
        $appBar = $appBarWrapper.find("#app-bar"),
        $appBarExt = $appBarWrapper.find("#app-bar"),
        appBarWrapperOffset = $appBarWrapper.outerHeight() - $appBar.outerHeight(),
        perc = ($(window).scrollTop() / appBarWrapperOffset * 3) - 1;
      if ($(window).scrollTop() > appBarWrapperOffset) {
        $appBar.addClass("raised");
      } else {
        $appBar.removeClass("raised");
      }
    }


    // DOM ready!


    //Variables
    var $document = $(document),
      $window = $(window),
      $body = $("body"),
      $appBarWrapper = $("div#app-bar-wrapper"),
      $appBar = $appBarWrapper.find("#app-bar"),
      $appNav = $("div.app-navigation"),
      $newAppNav = $appNav.clone(),
      i = 1;



    // Initial setup
    $("ul.nav-list").tabs();


    // Event delegation
    // $(document).on("click", ".nav-list li", function() {
    //   var $element = $(this);
    //   getView($element);
    // });

    $window.on("scroll", updateNav);
  });

}(jQuery, window, document));
