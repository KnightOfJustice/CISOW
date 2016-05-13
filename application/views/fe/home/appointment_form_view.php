<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-title" style = "margin-left : 30px;">
                <!--<div><img src="<?=base_url()?>img/logo.png" width="170px"/></div>-->
                <h4 class="modal-title" id="gridSystemModalLabel">Form Appointment</h4>
            </div>
        </div>
        <div class="modal-body">
            <div class="popup_body" class = "row" class="form-group">
                <form id="appointment_form_ajax" class = "appointment_form_value" name = "appointment" class="form-horizontal" method="post" class = "row">
                    <div class = "row">
                        <div id = 'success_ajax_appointment' class="text-center"> </div>
                    </div>
                    <div class = "row"><!--Personal Information-->
                        <div class = "col-xs-12 col-lg-6 col-md-6 col-sm-12">
                            <fieldset class = "fieldset_custom">
                                <legend class = "fieldset_custom">Personal Information</legend>
                                <div id = 'name-group' class = "field-input">
                                    <label for="appointment_name"></label>
                                    <input type="text" class="form-control" id="appointment_name" name ="appointment_name" placeholder="Name">
                                </div>
                                <div id = 'email_address-group' class = "field-input">
                                    <label for="appointment_email_address"></label>
                                    <input type="email" class="form-control" id="appointment_email_address" name ="appointment_email_address" placeholder="Email address">
                                </div>
                                <div id = 'phone_number-group' class = "field-input">
                                    <label for="appointment_phone_number"></label>
                                    <input type="number" class="form-control" id="appointment_phone_number" name ="appointment_phone_number" placeholder="Phone Number">
                                </div>
                                <div id = 'company_brand_name-group' class = "field-input">
                                    <label for="appointment_company_brand_name"></label>
                                    <input type="text" class="form-control" id="appointment_company_brand_name" name ="appointment_company_brand_name" placeholder="Company / Brand Name">
                                </div>
                            </fieldset>
                        </div>
                        <div class = "col-xs-12 col-lg-6 col-md-6 col-sm-12">
                            <fieldset class = "fieldset_custom">
                                <legend class = "fieldset_custom">Meeting Information</legend>
                                <div id = "meeting_date-group" >
                                    <div class = "col-lg-12 input-group date">
                                        <input type="text" class="form-control" id = "meeting_date" name = "meeting_date" placeholder = "Meeting Date">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id = 'location-group' class = "field-input">
                                    <label for="appointment_location"></label>
                                    <textarea class="form-control" rows="5" id="appointment_location" name = "appointment_location" placeholder="Meeting Location"></textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div><!-- /Personal Information-->

                    <div class = "row"><!-- Service Information-->
                        <div class = "col-xs-12 col-lg-12 col-md-12 col-sm-12" class = "row">
                            <fieldset class = "fieldset_custom">
                                <legend class = "fieldset_custom">Services Information</legend>

                                <div id = 'services_needs-group' class = "row field-input">
                                    <div class = "col-xs-12 col-lg-3 col-md-3 col-sm-12" class="radio-inline"> <label> <input id = "services_application" type="radio" name="services_need" value="application" checked> Application </label> </div>
                                    <div class = "col-xs-12 col-lg-3 col-md-3 col-sm-12" class="radio-inline"> <label> <input id = "services_multimedia" type="radio" name="services_need" value="multimedia"> Multimedia </label> </div>
                                    <div class = "col-xs-12 col-lg-3 col-md-3 col-sm-12" class="radio-inline"> <label> <input id = "services_support" type="radio" name="services_need" value="support"> Support </label> </div>
                                </div
                                <div id = 'describe_project-group' class = "row field-input">
                                    <textarea class="form-control" rows="4" id="appointment_describe_project" name = "appointment_describe_project" placeholder="Describe Your Project"></textarea>
                                </div>

                            </fieldset>
                        </div>
                    </div><!-- /Service Information-->

                    <div class ="variable_form"><!-- Button Make Appointment-->
                        <div id="input" class="text-center">
                            <!-- <button class="button_mod" type="submit">Create Appointment</button> -->
                            <button class="button_mod btn btn-lg" id="send-appointment-btn" type="submit">Kirim</button>
                        </div>
                    </div><!-- /Button Make Appointment-->
                </form>
            </div><!--/Popup_body -->
        </div><!--/Modal_body -->
    </div><!--/Modal Content -->
</div><!--/Modal Dialog -->

<!-- Script Ajax Appointment  -->
<script>
    $(function() {
        var div_loading = $("<div>", {id: "fountainG"});
        var div_loading_item1 = $("<div>", {id: "fountainG_1", class: "fountainG"});
        var div_loading_item2 = $("<div>", {id: "fountainG_2", class: "fountainG"});
        var div_loading_item3 = $("<div>", {id: "fountainG_3", class: "fountainG"});
        var div_loading_item4 = $("<div>", {id: "fountainG_4", class: "fountainG"});
        var div_loading_item5 = $("<div>", {id: "fountainG_5", class: "fountainG"});
        var div_loading_item6 = $("<div>", {id: "fountainG_6", class: "fountainG"});
        var div_loading_item7 = $("<div>", {id: "fountainG_7", class: "fountainG"});
        var div_loading_item8 = $("<div>", {id: "fountainG_8", class: "fountainG"});
        div_loading.append(div_loading_item1,div_loading_item2,div_loading_item3,div_loading_item4,div_loading_item5,div_loading_item6,div_loading_item7,div_loading_item8);
        // Get the form.
        var form = $('#appointment_form_ajax');
        // Set up an event listener for the appointment form.
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            // user data
            var name_appointment    = $("#appointment_name").val().trim();
            var email_address       = $("#appointment_email_address").val().trim();
            var phone_number        = $("#appointment_phone_number").val().trim();
            // company data
            var company_brand_name  = $("#appointment_company_brand_name").val().trim();
            // project data
            var services_need       = $('input[name=services_need]:checked').val().trim();
            var describe_project    = $("#appointment_describe_project").val().trim();
            var meeting_date        = $("#meeting_date").val().trim();
            var location            = $("#appointment_location").val().trim();



            console.log(meeting_date);
            if (key_ajax_name == true && key_ajax_email == true && key_ajax_phone_number == true && key_ajax_company_brand_name == true &&
                key_ajax_meeting_date == true && key_ajax_describe_project == true && key_ajax_location == true) {

                $.ajax({
                    type : "POST",
                    url : "<?php echo site_url('Parallax/Send_email_appointment'); ?>",
                    dataType : "json",
                    data : {    name_appointment : name_appointment,
                        email_address : email_address,
                        phone_number : phone_number,
                        company_brand_name : company_brand_name,
                        services_need : services_need,
                        meeting_date : meeting_date,
                        describe_project : describe_project,
                        location : location
                    },
                    beforeSend: function() {
                        $("#send-appointment-btn").attr('disabled','disabled');
                        $("#success_ajax_appointment").addClass("alert alert-info");
                        $("#success_ajax_appointment").append(div_loading);
                    },
                    success : function(result, status, xhr) {
                        $("#send-appointment-btn").removeAttr('disabled');
                        $("#success_ajax_appointment").html("");
                        $("#success_ajax_appointment").removeClass("alert alert-info");
                        $("#success_ajax_appointment").removeClass("alert alert-danger");
                        $("#success_ajax_appointment").addClass("alert alert-success");
                        $("#success_ajax_appointment").html(result.msg);
                        $('#success_ajax_appointment').fadeIn().delay(4000).fadeOut();

                        $('#notification p').html(result.msg);
                        $('#notification').modal('toggle');
                        /*
                         setTimeout(function() {
                         $('#notification').toggleClass('in');
                         setTimeout(function() {
                         $('#notification').modal('toggle');
                         }, 500);
                         }, 4000);
                         */
                        $('#appointment_form_ajax')[0].reset();
                        key_ajax_name = false;
                        key_ajax_email = false;
                        key_ajax_phone_number = false;
                        key_ajax_company_brand_name = false;
                        key_ajax_describe_project = false;
                        key_ajax_meeting_date = false;
                        key_ajax_location = false;

                    },
                    error : function(result, status, xhr){
                        //console.log('error');
                        $("#send-appointment-btn").removeAttr('disabled');
                        $("#success_ajax_appointment").html("");
                        $("#success_ajax_appointment").removeClass("alert alert-info");
                        $("#success_ajax_appointment").removeClass("alert alert-success");
                        $("#success_ajax_appointment").addClass("alert alert-danger");
                        $("#success_ajax_appointment").html('Thankyou for your message, but we are sorry your message wont reach us any time soon. We will fix it as soon as posible');
                        $('#success_ajax_appointment').fadeIn().delay(8000).fadeOut();

                        $('#notification p').html('Sorry your message wont reach us any time soon. We will fix it as soon as posible');
                        //$('#notification p').html(result.responseText);
                        $('#notification').modal('toggle');
                        /*
                         setTimeout(function() {
                         $('#notification').toggleClass('in');
                         setTimeout(function() {
                         $('#notification').modal('toggle');
                         }, 500);
                         }, 4000);
                         */
                        $('#appointment_form_ajax')[0].reset();
                        key_ajax_name = false;
                        key_ajax_email = false;
                        key_ajax_phone_number = false;
                        key_ajax_company_brand_name = false;
                        key_ajax_describe_project = false;
                        key_ajax_meeting_date = false;
                        key_ajax_location = false;
                    }


                });// End Ajax
            }
            else {
                //console.log('tidak masuk ajax');
                end_ajax_name = $("#appointment_name").val();
                $('#show_error_name').remove(); // remove the error text first
                $('#show_error_email_address').remove(); // remove the error text first
                $('#show_error_phone_number').remove(); // remove the error text first
                $('#show_error_company_brand_name').remove(); // remove the error text first
                $('#show_error_describe_project').remove(); // remove the error text first
                $('#show_error_meeting_date').remove(); // remove the error text first
                $('#show_error_location').remove(); // remove the error text first

                // show error if submit button is press
                if (name_appointment == '' && name_appointment.length <= 3) {
                    $('#name-group').addClass('has-error');
                    $('#name-group').append('<div id = "show_error_name" class="help-block">' + 'Please Input Your Name' + '</div>');
                }
                else if (name_appointment.length <= 3) {
                    $('#name-group').addClass('has-error');
                    $('#name-group').append('<div id = "show_error_name" class="help-block">' + 'Kurang Panjang' + '</div>');
                }
                if (email_address == '') {
                    $('#email_address-group').addClass('has-error');
                    $('#email_address-group').append('<div id = "show_error_email_address" class="help-block">' + 'Please Input Your Email Address' + '</div>');
                }
                if (phone_number == '') {
                    $('#phone_number-group').addClass('has-error');
                    $('#phone_number-group').append('<div id = "show_error_phone_number" class="help-block">' + 'Please Input Your Phone Number' + '</div>');
                }
                if (company_brand_name == '') {
                    $('#company_brand_name-group').addClass('has-error');
                    $('#company_brand_name-group').append('<div id = "show_error_company_brand_name" class="help-block">' + 'Please Input Your Company or Brand Name' + '</div>');
                }
                if (describe_project == '') {
                    $('#describe_project-group').addClass('has-error');
                    $('#describe_project-group').append('<div id = "show_error_describe_project" class="help-block">' + 'Please Describe Your Project' + '</div>');
                }
                if (meeting_date == '') {
                    $('#meeting_date-group').addClass('has-error');
                    $('#meeting_date-group').append('<div id = "show_error_meeting_date" class="help-block">' + 'Please Input Your Meeting Date' + '</div>');
                }
                if (location == '') {
                    $('#location-group').addClass('has-error');
                    $('#location-group').append('<div id = "show_error_location" class="help-block">' + 'Please Input Your Meeting Location' + '</div>');
                }
            } // End if else statement
        }); // End Form Submit
    }); // End Function
</script>