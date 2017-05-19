$(document).ready(function(){

    var url = $('#fill_form').attr('href');

    $('#fill_form').on('click', function(e){
        e.preventDefault();

        $.ajax({
            type : 'GET',
            url : url,
            success : function(data){

                $('#email').attr('value', data.email);
                $('#first_name').attr('value', data.first_name);
                $('#last_name').attr('value', data.last_name);
                $('#street').attr('value', data.street);
                $('#postal_code').attr('value', data.postal_code);
                $('#city').attr('value', data.city);
                $('#country').attr('value', data.country);
                $('#phone_number').attr('value', data.phone_number);
            }
        });
    });

    /**
     * Animate from this page and other stuff
     */

    $('#change_data').on('click', function(e) {
        e.preventDefault();

        // Set enabled to all input in form to make change on it

        $('#email').attr('disabled', false);
        $('#first_name').attr('disabled', false);
        $('#last_name').attr('disabled', false);
        $('#street').attr('disabled', false);
        $('#postal_code').attr('disabled', false);
        $('#city').attr('disabled', false);
        $('#country').attr('disabled', false);
        $('#phone_number').attr('disabled', false);

        $('#inpost_courier').attr('disabled', false);
        $('#inpost_paczkomat').attr('disabled', false);
        $('#ups').attr('disabled', false);
        $('#poczta_polska').attr('disabled', false);

        $('#credit_card').attr('disabled', false);
        $('#usual_transfer').attr('disabled', false);

        $('#fill_form').show();

        $('html, body').animate({
            scrollTop: $('#order_form').offset().top - 100
        }, 800);

        $('#summary_section').fadeOut(2000);
        $('#show_summary').attr('disabled', false);
        $('#main_buttons').fadeOut(2000);

    });

    $('#show_summary').on('click', function (e) {
        e.preventDefault();

        // Retrive current personal data

        $('#email_summary').text($('#email').val());
        $('#first_name_summary').text($('#first_name').val());
        $('#last_name_summary').text($('#last_name').val());
        $('#street_summary').text($('#street').val());
        $('#postal_code_summary').text($('#postal_code').val());
        $('#city_summary').text($('#city').val());
        $('#country_summary').text($('#country').val());
        $('#phone_number_summary').text($('#phone_number').val());

        // Retrive current delivery method

        $('#delivery_method_summary').text($('input[name=delivery_methods]:checked').attr('data-text'));

        // Retrive current payment method

        $('#payment_method_summary').text($('input[name=payment_methods]:checked').attr('data-text'));

        $('#summary_section').fadeIn('4000');

        $('#show_summary').attr('disabled', true);
        $('#main_buttons').fadeIn('4000');

        // Set disabled to all input in form

        $('#email').attr('disabled', true);
        $('#first_name').attr('disabled', true);
        $('#last_name').attr('disabled', true);
        $('#street').attr('disabled', true);
        $('#postal_code').attr('disabled', true);
        $('#city').attr('disabled', true);
        $('#country').attr('disabled', true);
        $('#phone_number').attr('disabled', true);

        $('#inpost_courier').attr('disabled', true);
        $('#inpost_paczkomat').attr('disabled', true);
        $('#ups').attr('disabled', true);
        $('#poczta_polska').attr('disabled', true);

        $('#credit_card').attr('disabled', true);
        $('#usual_transfer').attr('disabled', true);

        $('#fill_form').hide();

    });

    $('#accept_terms').on('change', function () {

        if ($('#accept_terms').prop('checked')){
            $('#place_an_order_btn').attr('disabled', false);
        }
        else{
            $('#place_an_order_btn').attr('disabled', true);
        }

    });

    /*
    After click on place an order btn we need to remove disabled attr from all fields
    to retrive it from the request in controller
     */

    $('#place_an_order_btn').on('click', function () {

        $('#summary_section').hide();
        $('#show_summary').attr('disabled', false);
        $('#main_buttons').hide();

        $('#email').attr('disabled', false);
        $('#first_name').attr('disabled', false);
        $('#last_name').attr('disabled', false);
        $('#street').attr('disabled', false);
        $('#postal_code').attr('disabled', false);
        $('#city').attr('disabled', false);
        $('#country').attr('disabled', false);
        $('#phone_number').attr('disabled', false);

        $('#inpost_courier').attr('disabled', false);
        $('#inpost_paczkomat').attr('disabled', false);
        $('#ups').attr('disabled', false);
        $('#poczta_polska').attr('disabled', false);

        $('#credit_card').attr('disabled', false);
        $('#usual_transfer').attr('disabled', false);
    });
});