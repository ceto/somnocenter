/* ---------------------------------------------
 Contact form
 --------------------------------------------- */
jQuery(document).ready(function(){
    var aszf = 0;
    jQuery('input[name=message_aszf]').click(function() {
        if (jQuery('input[name=message_aszf]').is(':checked') == true) {
            aszf=1;
            jQuery('input[name=message_aszf]').parent().css('border', 'none');
        }  else {
            aszf=0;
        }
    });  

    jQuery("#contact_regdl_form #submit_btn").click(function(){

        //get input field values
        var user_name = jQuery('input[name=name]').val();
        var user_email = jQuery('input[name=email]').val();
        var user_code = jQuery('input[name=code]').val();
        var user_msg = jQuery('textarea[name=msg]').val();
        var user_dlfile = jQuery('input[name=dlfile]').val();
        var user_dlfilename = jQuery('input[name=dlfilename]').val();
        var user_int = jQuery('input[name=int]').val();
        var user_addr = jQuery('input[name=addr]').val();
        var user_Newsletter = jQuery('input[name=message_newsletter]:checked').val();

      

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        if (user_name === "") {
            jQuery('input[name=name]').css('border-color', '#e6533e');
            proceed = false;
        }
        if (user_email === "") {
            jQuery('input[name=email]').css('border-color', '#e6533e');
            proceed = false;
        }
        if (user_int === "") {
            jQuery('input[name=int]').css('border-color', '#e6533e');
            proceed = false;
        }
        if (user_addr === "") {
            jQuery('input[name=addr]').css('border-color', '#e6533e');
            proceed = false;
        }

        if (user_code === "") {
            jQuery('input[name=code]').css('border-color', '#e6533e');
            proceed = false;
        }

        if (aszf == 0) {
            jQuery('input[name=message_aszf]').parent().css('border', '1px solid #e6533e');
            proceed = false;
        }

        //everything looks good! proceed...
        if (proceed) {
            //data to be sent to server
            post_data = {
                'userName': user_name,
                'userEmail': user_email,
                'userCode': user_code,
                'userMsg': user_msg,
                'userDlfile': user_dlfile,
                'userDlfilename': user_dlfilename,
                'userInt': user_int,
                'userAddr': user_addr,
                'userAszf': aszf
            };

            //Ajax post data to server

            jQuery.post(jQuery('#contact_regdl_form').attr('action'), post_data, function(response){

                //load json data from server and output message
                if (response.type === 'error') {
                    output = '<div class="error">' + response.text + '</div>';
                }
                else {

                    output = '<div class="success">' + response.text + '</div>';

                    //reset values in all input fields
                    jQuery('#contact_regdl_form input[type="text"]').val('');
                    jQuery('#contact_regdl_form input[type="email"]').val('');
                    jQuery('#contact_regdl_form input[type="tel"]').val('');
                    jQuery('#contact_regdl_form textarea').val('');
                }

                jQuery("#result").hide().html(output).slideDown();
            }, 'json');

        }

        return false;
    });

    //reset previously set border colors and hide all message on .keyup()
    jQuery("#contact_regdl_form input, #contact_regdl_form textarea").keyup(function(){
        jQuery("#contact_regdl_form input, #contact_regdl_form textarea").css('border-color', '');
        jQuery("#result").slideUp();
    });

});
