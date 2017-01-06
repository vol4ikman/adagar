jQuery(document).ready(function($){
    // Adagar accessibility
    adagar_accessibility();
    // init desktop menu
    adagar_desktop_menu();
});

jQuery(window).load(function(){
    setTimeout( function(){
        jQuery(".adagar_loader").fadeOut(300);
        moveProgressBar();
    }, 1000 );
});

// Desktop menu
function adagar_desktop_menu(){
    jQuery(".menu_trigger").click(function(e){
        e.preventDefault();
        jQuery(this).toggleClass('open');
        jQuery("body").toggleClass("active_desktop_navigation");
    });
    jQuery(document).keyup(function(e) {
        if (e.keyCode === 27) { // Escape button
            jQuery("body").removeClass("active_desktop_navigation");
            jQuery(".menu_trigger").removeClass('open');
        }
    });
}
//Close desktop menu
function close_desktop_menu(){
    jQuery("body").removeClass("active_desktop_navigation");
}
// Adagar accessibility
function adagar_accessibility(){
    jQuery(".font_size_links a").click(function(e){
        e.preventDefault();
        jQuery(".font_size_links a").removeClass("is_active");
        jQuery("body").removeClass("large_view");
        jQuery(this).addClass("is_active");

        if( jQuery(this).data("fontsize") ){
            var newFontSize = jQuery(this).data("fontsize");
            jQuery("html").css("font-size",newFontSize);
            if( jQuery(this).attr("class") == "font_large is_active" ){
                jQuery("body").addClass("large_view");
            }
        }
    });
    jQuery(".header_accessibility .contrast").click(function(e){
        e.preventDefault();
        jQuery("body").toggleClass("contrast_on");
    });
}
// Animate background banner
function animate_bg_banner(){
    var movementStrength = 25;
    var height = movementStrength / jQuery(window).height();
    var width = movementStrength / jQuery(window).width();
    jQuery(".header_banner_wrapper").mousemove(function(e){
        var pageX = e.pageX - (jQuery(window).width() / 2);
        var pageY = e.pageY - (jQuery(window).height() / 2);
        var newvalueX = width * pageX * -1 - 25;
        var newvalueY = height * pageY * -1 - 50;
        jQuery('.header_banner_wrapper').css("background-position", newvalueX+"px     "+newvalueY+"px");
    });
}

// Progress Bar
function moveProgressBar() {
    var getPercent = (jQuery('.progress-wrap').data('progress-percent') / 100);
    var getProgressWrapWidth = jQuery('.progress-wrap').width();
    var progressTotal = getPercent * getProgressWrapWidth;
    var animationLength = 2500;

    jQuery('.progress-bar').stop().animate({
        left: progressTotal
    }, animationLength);
}
