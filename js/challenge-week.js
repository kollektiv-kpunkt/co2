jQuery("#submit-form").click(function(e){
    e.preventDefault();
    var checkval = document.getElementById("challenge-form").reportValidity();
    if (checkval == true) {
        var formData = jQuery("#challenge-form").serialize();
        var lang = jQuery('input[name="lang"]').val();
        jQuery.ajax({
            url : "/wp-content/themes/co2/partials/nolang/challenge-week-submit.php",
            type: "POST",
            data : formData,
            success: function(response) {
                console.log(response)
                if (response == 1) {
                    jQuery( "#challenge-week" ).load( "/wp-content/themes/co2/partials/" + lang + "/challenge-week-response.php" );
                } else if (response == 403) {
                    jQuery( "#e403" ).css("display", "block");
                };
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                  console.log(textStatus);
                  console.log(errorThrown);
            }
        });
    }
})