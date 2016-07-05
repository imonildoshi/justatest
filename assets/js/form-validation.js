var FormValidation = function () {

    // basic validation
    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    from: {                        
                        required: true,
                        email: true
                    },
                    to: {
                        required: true,
                        email: true
                    },
                    subject: {                        
                        required: true                        
                    }                   
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {                     
                    $.ajax({
                     url:"index.php/email/sendmail",
                     method:"POST",
                     data: { to: $('#to').val() , 
                             from: $('#from').val(), 
                             fromname: $('#fromname').val(), 
                             subject: $('#subject').val(), 
                             body: CKEDITOR.instances['mybody'].getData(), 
                             'g-recaptcha-response': grecaptcha.getResponse() 
                            } ,
                     success: function(result){
                        var res = $.parseJSON(result);                         
                        if(res.status == 'captchaerror')
                        {
                             $.notific8("Please Recheck the captcha", {
                              life: 3000,
                              heading: 'Notification !!!',
                              theme: 'smoke',
                              //sticky: true,
                              horizontalEdge: 'bottom',
                              verticalEdge: 'right',
                              //zindex: 1500
                            });
                            setTimeout(function(){
                                location.reload();
                             }, 3000);    
                        } else if(res.status == 'success') {    
                             $.notific8('Email is sent successfully.', {
                              life: 5000,
                              heading: 'Notification !!!',
                              theme: 'smoke',
                              //sticky: true,
                              horizontalEdge: 'bottom',
                              verticalEdge: 'right',
                              //zindex: 1500
                            });
                        }
                     }   
                    });                    
                    error1.hide();
                }
            });


    }

  
    return {
        //main function to initiate the module
        init: function () { 
            handleValidation1();          
        }

    };

}();