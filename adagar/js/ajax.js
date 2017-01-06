jQuery(document).ready(function(){

    if( jQuery("body").hasClass('page-template-tpl-steps') ){
        load_step(1,43);
    }

    jQuery("body").on("click",".next_step", function(e){
        e.preventDefault();
        var next    = jQuery(this).data("next");
        var post_id = jQuery(this).data("postid");
        load_step(next,post_id);
    });

    jQuery(".adagar_contact_form input[type='submit']").click(function(e){
        e.preventDefault();
        jQuery(".form_row").removeClass("error");
        var errors = false;

        jQuery(".adagar_contact_form .req").each(function(){
            if( jQuery(this).val() === '' || jQuery(this).val() === ' ' ){
                errors = true;
                jQuery(this).parents('.form_row').addClass('error');
            }
        });

        if( !validateEmail( jQuery("#email").val() ) ){
            errors = true;
            jQuery("#email").parents('.form_row').addClass('error');
        }

        if(!errors){
            jQuery.ajax({
               type     : "post",
               dataType : "json",
               url      : ajax.ajaxurl,
               data     : {
                   action    : "send_contact_form",
                   full_name : jQuery("#full_name").val(),
                   email     : jQuery("#email").val(),
                   phone     : jQuery("#phone").val(),
                   subject   : jQuery("#subject").val(),
                   message   : jQuery("#message").val()
               },
               success: function(response) {
                   if(response.status == 'done'){
                       jQuery("form.adagar_contact_form").fadeOut(300, function(){
                           jQuery(this).html('<h3 class="green">'+response.message+'</h3>');
                           jQuery(this).fadeIn(600);
                       });
                   }
               }
            });
        }

    });

});

function validateEmail(email) {
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        console.log("Not a valid e-mail address");
        return false;
    }
    return true;
}

function load_step(next,post_id){
    var percent = 20;
    if(next && post_id){
        jQuery.ajax({
           type     : "post",
           dataType : "json",
           url      : ajax.ajaxurl,
           data     : {
               action  : "load_step",
               next    : next,
               post_id : post_id
           },
           success: function(response) {
               if(response.html){
                   jQuery(".steps_ajax").fadeOut(300, function(){
                       if(next == 2){
                           percent = 40;
                       } else if(next == 3) {
                           percent = 60;
                       } else if(next == 4) {
                           percent = 80;
                       } else if(next == 5) {
                           percent = 100;
                       }
                        jQuery(this).html(response.html);
                        jQuery(this).fadeIn(300);
                        jQuery(".progress-wrap.progress").data("progress-percent",percent);
                        moveProgressBar();
                   });
               }
               if(response.redirect && response.redirect !== 0){
                   window.location.assign(response.redirect);
               }
           }
        });
    }
}
