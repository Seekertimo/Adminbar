;
jQuery(function($) {
    $('body').keydown(function(event) {
        if (event.shiftKey) {
            //naar beneden
            if (event.keyCode === 40) {
                $('#wpadminbar').css({
                    'top': 'auto',
                    'bottom': 0
                });
            }
            // naar boven
            else if (event.keyCode === 38) {
                $('#wpadminbar').css({
                    'top': 0,
                    'bottom': 'auto'
                });
            }
        }
    });
});