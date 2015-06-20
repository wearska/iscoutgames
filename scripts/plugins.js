// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());
(function(init) {
    'use strict';
    // The global jQuery object is passed as a parameter
    init(window.jQuery, window, document);

}(function($, window, document) {
    'use strict';
    // The $ is now locally scoped

    // Listen for the jQuery ready event on the document
    $(function() {

        $(document).on('focusin', 'input', updateInputFields);
        // The DOM is ready!
        $.each($('input'), function(){
            var $this = $(this),
                $inputField = $this.closest(".input-field");
            ($(this).val() !== "" || ($(this).attr('placeholder') !== "" && $(this).is("[placeholder]")))? $inputField.addClass("filled") : $inputField.removeClass("filled");
        });
    });

    function updateInputFields() {
        var $this = $(this),
            $inputField = $this.closest(".input-field");
        $inputField.addClass("focused");
        $('div.input-field').not($inputField).removeClass("focused");
        $this.one("focusout", function() {
            $inputField.removeClass("focused");
            ($(this).val() !== "" || ($(this).attr('placeholder') !== "" && $(this).is("[placeholder]")))? $inputField.addClass("filled") : $inputField.removeClass("filled");
        });
    }
    // The rest of code goes here!

}));