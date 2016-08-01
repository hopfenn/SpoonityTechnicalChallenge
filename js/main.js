	function validateRegistration(){

		$("#frmRegister").validate({
			rules: {
				txtFirstName : {
					required: true
				},
				txtLastName : {
					required: true
				},
				txtEmail: {
					required: true,
					validEmail: true
				},
				txtPassword: {
					required: true,
					validPassword: true,
				},
				txtConfirmPassword: {
					required: true
				}
			},
			messages: {
				txtFirstName: "Please enter your first name.",
				txtLastName: "Please enter your last name.",
				txtEmail: {
					required: "Please enter your e-mail address.",
					
				},
				txtPassword: {
					required: "Please choose a password.",
				},
				txtConfirmPassword: "Please confirm your password.",
			}
		});

		var validator = $("#frmRegister").validate();
		$('#frmRegister').validate({
			onsubmit: false
		});
		jQuery.validator.addMethod("validEmail", function(value, element) {
    		return this.optional( element ) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test( value );
		}, 'Please enter a valid email address.');
		jQuery.validator.addMethod("validPassword", function(value, element) {
    		return this.optional( element ) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,16}$/.test( value );
		}, 'Please enter a valid password.');

		
	}//validateRegistration()

	function validateLogin(){
		$("#frmLogin").validate({
			rules: {
				txtEmail : {
					required: true,
					validEmail: true,
				},
				txtPassword: {
					required: true
				},

			},
			messages: {
				txtEmail: {
					required: "Please enter your e-mail address.",	
				},
				txtPassword: "Please enter your password.",
			}
		});

		var validator = $("#frmRegister").validate();
		$('#frmRegister').validate({
			onsubmit: false
		});
		jQuery.validator.addMethod("validEmail", function(value, element) {
    		return this.optional( element ) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test( value );
		}, 'Please enter a valid email address.');
	
	}//validateLogin()
