 $(document).ready(function(){

        $('.send_message').click(function(e){
            // Stop form submission & check the validation
            e.preventDefault();
            var _this = $(this);
            
            //search the indicated form

            submitform = _this.data("formname");

            theform = $("#"+submitform);

            // Variable declaration
            var error = false;
            var emailwrap = '#'+submitform + '_email';
            var success = '#'+submitform + '_mail_success';
            var fail = '#'+submitform + '_mail_fail';

            $(success).fadeOut(500);
            $(fail).fadeOut(500);

            var emailfield = $(emailwrap + ' input:first'); 

            var email = emailfield.val();

            var subject = $('#exampleInputSubject').val();
            var message = $('#exampleInputMessage').val();
            
         	
            if(email.length == 0 || email.indexOf('@') == '-1'){
                var error = true;
                // $('#email_error').fadeIn(500);
                $(emailfield).addClass("validation");
                $(emailfield).focus();
                
            }else{
                $(emailfield).removeClass("validation");
            }
            
            // If there is no validation error, next to process the mail function
            if(error == false){
               // Disable submit button just after the form processed 1st time successfully.
                
                _this.attr({'disabled' : true });
                _this.val('Sending...');

				/* Post Ajax function of jQuery to get all the data from the submission of the form as soon as the form sends the values to email.php*/
                $.post("php/email.php", theform.serialize(),function(result){
                    //Check the result set from email.php file.
                    if(result == 'sent'){
                        //If the email is sent successfully, remove the submit button
                         
                        _this.attr({'disabled' : false });
                        _this.val('Form sent'); 
                        //Display the success message
                        $(success).fadeIn(500);
                    }else{
                        //Display the error message
                        $(fail).fadeIn(500);
                        // Enable the submit button again
                        _this.attr({'disabled' : false });
                        _this.val('Send The Message'); 
                    }
                });
            }
        });    
    });