$(document).ready(function () {
// Variable to hold request
var request;

/*// Bind to the submit event of our form
$("#gameform").submit(function(event){

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea, checkbox");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "/gameform.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        alert("Thank you for submitting a new game");
        window.location.replace('http://188.25.136.1/');
        
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        alert(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

    // Prevent default posting of form
    event.preventDefault();
});*/
    
    $("#mpoptions").children().prop('disabled',true);
    
    $("#mpcheck").change(function(){

   var ischecked=$(this).is(':checked'); 
    if(ischecked)
    {
         $("#mpoptions").children().prop('disabled',false);
    }
    else
    {
        $("#mpoptions").children().prop('disabled',true);
     }

});
});