$(document).ready(function() {
   
    $('div.sousMenu#Eleves').show();

    var tab = $('.item');

    $(tab).each(function() {
        $(this).on("click", function() {
            $(tab).not(this).removeClass("menuItemActive");
            $(this).addClass("menuItemActive");

            var anchor = $(this).attr('href');
            
            $('div.sousMenu:not('+anchor+')').hide();
            
            $(anchor).fadeIn();

        });
    });

    var icon = $('.sousMenu table tr td a');

    $(icon).each(function() {
        $(this).mouseenter(function() {

            var css = $(this).find('img');

                css.css({
                '-webkit-transform':'rotate(360deg)',
                'transform':'rotate(360deg)',
                'transition-duration':'0.5s'
            });
        });

        $(this).mouseleave(function() {

            var css = $(this).find('img');

                css.css({
                '-webkit-transform':'rotate(-360deg)',
                'transform':'rotate(-360deg)',
                'transition-duration':'0.3s'
            });
        });

    });

});