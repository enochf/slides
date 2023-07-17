var autoMode = true;
var curProgram = 0;
var curSection = 'undergraduate';

$(document).ready(function() {

    var myKey = jQuery.Event("keydown");
    // e.which = 39; // right arrow key
    $(document).trigger(myKey);

    $(document).keydown(function(myKey) {
        // console.log(myKey.which);
        if (myKey.which == 39) {

            var slideTime = 5000;
            
            if ($('.slide.active').length == 0) {
                var current = $('#id_blank');
                var next = $('#id_0'); 
            } else {
                var current = $('.slide.active');
                var next = current.next();
            }

            var next_id = next.attr('id').replace('id_', '');
            var program = parseInt($('#id_' + next_id + ' .program_num').text());

            // accessibility timing
            if (next_id == 294805) {
                slideTime = 28500;
                $('.accessibility_notice').show();
            } else {
                $('.accessibility_notice').hide();
            }
            
            if (program > curProgram) {
                var slideTime = 8000;
                if (program == 1) {
                    $('sidebar').fadeIn('fast');
                }
                $('#program' + curProgram).removeClass('active').addClass('complete');
                $('#program' + program).addClass('active');
                curProgram = program;
            }

            current.fadeOut('fast').removeClass('active');
            next.fadeIn('fast').addClass('active');

            // play audio on slide
            if (program != 18) {
                $('#audio_' + next_id).get(0).play();
            }

            // remove undergraduate list and add graduate list
            if (program == 18) {
                curProgram = 19;
                curSection = 'graduate';
                $('sidebar').fadeOut('fast', function() {
                    $('#undergraduate').hide();
                    $('#graduate').show();
                });
                return;
            } else if (program == 20) {
                $('sidebar').fadeIn('fast');
            }

            // automatic advancing
            if (autoMode == true) {
                var t = setTimeout(function() {
                    var key = jQuery.Event("keydown");
                    // myKey.which = 39; // # Some key code value
                    $(document).trigger(myKey);
                }, slideTime);
            }

        } else if (myKey.which == 32) {
            var timeouts = window.setTimeout(function() {}, 0);
            while (timeouts--) {
                window.clearTimeout(timeouts); // will do nothing if no timeout with id is present
            }
        } else if (myKey.which == 192) {
            if (autoMode == true) {
                autoMode = false;
            } else {
                autoMode = true;
            }
        }
    });

});