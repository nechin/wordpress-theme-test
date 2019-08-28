jQuery(document).ready(function($) {
    function show_message(text, error) {
        var color = error ? 'red' : 'darkgreen';
        $('#bet-message').css('color', color).text(text).show();
    }

    function check_bet(bet) {
        var number = parseInt(bet, 10);
        return number >= 100 && number <= 1000;
    }

    // Submit form with AJAX
    $( "#bets-add-form-submit" ).on( "submit", function( event ) {
        $('#bet-message').hide();

        var title = $('#bet-title').val();
        var description = $('#bet-description').val();
        var type = $('#bet-type').val();

        if ( "" === title ) {
            show_message( bet_msg.empty_title, true );
            $('#bet-title').focus();
        }

        if ( "" === description ) {
            show_message( bet_msg.empty_description, true );
            $('#bet-description').focus();
        }

        if ( "" === type ) {
            show_message( bet_msg.empty_type, true );
        }

        $.ajax({
            type: "POST",
            url: bet_msg.ajaxurl,
            data: $("#bets-add-form-submit").serialize(),
            dataType: "json",
            success: function (data) {
                if (data.success === false) {
                    show_message(bet_msg.submit_error, true);
                } else {
                    show_message(bet_msg.submit_success, false);
                    $('#bet-title').val('');
                    $('#bet-description').val('');
                }
            },
            error: function () {
                show_message(bet_msg.submit_error, true);
            }
        });

        return false;
    });

    // Only from 100 to 1000
    $("#bet-value").on("change", function (event) {
        if (check_bet($(this).val()) === true) {
            return true;
        }

        $(this).val('');
    });

    // Submit form with AJAX
    $( "#bet-make" ).on( "click", function( event ) {
        $('#bet-message').hide();

        if ($(this).attr('disabled') === true) {
            return true;
        }

        var bet = $('#bet-value').val();

        if ( "" === bet || check_bet(bet) !== true) {
            show_message( bet_msg.empty_bet, true );
            $('#bet-value').focus();

            return false;
        }

        $.ajax({
            type: "POST",
            url: bet_msg.ajaxurl,
            data: {
                action: 'bet_make_a_bet',
                _wpnonce: $("input[name='_wpnonce']").val(),
                post_id: $('#bet-postid').val(),
                bet: bet
            },
            dataType: "json",
            success: function (data) {
                if (data.success === false) {
                    show_message(bet_msg.submit_error, true);
                } else {
                    show_message(bet_msg.submit_success, false);
                    $('#bet-value').val('');
                    $( "#bet-make" ).attr('disabled', true);
                }
            },
            error: function () {
                show_message(bet_msg.submit_error, true);
            }
        });
    });

});
