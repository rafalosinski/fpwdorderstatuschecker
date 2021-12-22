jQuery(document).ready(function($) {
    jQuery("#fpwdorderstatuscheker-order-form").submit(function(e){
        e.preventDefault();

        let $id = jQuery('[name="fpwdorderstatuscheker-order-number"]').val();
        let $email = jQuery('[name="fpwdorderstatuscheker-order-email"]').val();

        jQuery.ajax({
            url: fpwdorderstatuschekerAjaxScript,
            type: 'post',
            data: {
                action: 'fpwdorderstatuschecker_check_by_ajax',
                order_id: $id,
                order_email: $email
            },
            success: function (response) {
                if ( Object.keys(response).length >= 1 ) {
                    response = JSON.parse(response);
                    jQuery('#fpwdorderstatuscheker-status').html(response.status);
                } else {
                    jQuery('#fpwdorderstatuscheker-status').html("Error. Order ID or email address is invalid. Please check again.");
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
});