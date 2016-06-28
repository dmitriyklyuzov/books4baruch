$(function(){
	
	$('.login_form').validate({

		// errorClass: "has-error col-lg-12",

		// errorElement: "label",

		// validClass: "col-lg-12",
		
		rules: {
			
			inputEmail:{
				required: true,
				email: true,
				BaruchEmail: true,
				remote: {
						url: "controller/confirmEmail.php",
						data:{
							email: function(){
								return $('#login_form :input[name="inputEmail"]').val();
							},
							need: 'false'
						}
                }
			},

			inputPassword:{
				required: true,
				minlength: 6
			},

			signUpEmail:{
				required: true,
				email: true,
				BaruchEmail: true,
				remote: {
						url: "controller/confirmEmail.php",
						data:{
							email: function(){
								return $('#register_form :input[name="signUpEmail"]').val();
							},
							need: 'true'
						}
                }
			},
			
			firstName:{
				required: true,
				minlength:2

			},
			
			lastName:{
				minlength:2
			},

			inputPassword2:{
				required: true,
				equalTo: "#inputPassword"
			}



		},
		messages: {
			
			inputEmail: {
				required: "What's your Baruch email?",
				BaruchEmail: "Please enter your @cuny.edu email",
				remote: $.validator.format("Looks like you don't have an accout yet. <a href=signup.php?email={0}><u>Sign up</u></a> instead?")
			},

			inputPassword:{
				required: "Please enter your password",
				minlength: "Your password must be at least 6 characters"
			},

			signUpEmail: {
				required: "What's your Baruch email?",
				BaruchEmail: "Please enter your @cuny.edu email",
				remote: $.validator.format("Looks like you have an accout already. <a href=login.php?email={0}><u>Log in</u></a> instead?")
			}
		}

		// errorPlacement: function(error, element) {
  //           error.insertAfter(element);
  //       }

	});
});


	

jQuery.validator.addMethod("BaruchEmail", function(value, element){
	return this.optional(element) || /^.+@cuny.edu$/.test(value);
}, "Only @cuny.edu emails are allowed at this time");








