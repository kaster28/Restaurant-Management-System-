$.validator.setDefaults({
    submitHandler: function() {
    	if(password_test()){
      form.submit();
  }
    }
});
$().ready(function() {

  $("#signupForm").validate({
	    rules: {
	      username: {
	        required: true,
	        minlength: 3
	      },
	      password: {
	        required: true,
	        minlength: 6,
	        maxlength: 12
	      },
	      confirm_password: {
	        required: true,
	        minlength: 6,
	        maxlength: 12,
	        equalTo: "#password"
	      },
	      email: {
	        required: true,
	        email: true
	      },
	      id: {
	        required: true,
	        minlength: 6
	      },
	        Phone_Num: {
	        required: true,
	        minlength: 9,
	        maxlength: 15,
	        number:true
	      },
	      Card_Num: {
	        required: true,
	        number:true
	        //creditcard: true
	      },
	    },
	    messages: {
	      username: {
	        required: "</br>*Can't be empty",
	        minlength: "</br>*At least 3 characters in length"
	      },
	       id: {
	        required: "</br>*Can't be empty",
	        minlength: "</br>*At least 6 characters in length"
	      },
	      password: {
	        required: "</br>*Can't be empty",
	        minlength: "</br>*At least 6 characters in length",
	        maxlength: "</br>*Can't be more than 12 characters"
	      },
	      confirm_password: {
	        required: "</br>*Can't be empty",
	        minlength: "</br>*At least 6 characters in length",
	        maxlength: "</br>*Can't be more than 12 characters",
	        equalTo: "</br>*Not the same password"
	      },
	      Phone_Num: {
	        required: "</br>*Can't be empty",
	        minlength: "</br>*At least 9 characters in length",
	        maxlength: "</br>*Can't be more than 15 characters",
	        number: "</br>*Incorrect phone number"
	      },
	      Card_Num: {
	        required: "</br>*Can't be empty",
	        number: "</br>*Incorrect credit card number",
	       // creditcard: "*Please enter a vaild card number"
	      },
	      email: "</br>*Please enter a vaild Email",
	    }
	});
});

function password_test(){    
       var password = document.getElementById('password').value;    
       if (password.match(/\d/) && password.match(/[~!#$]/) && password.match(/[a-zA-Z]/)||password==""){  
       	$("#error").hide();
           return true;  
           }  
       else{  
           $("#error").addClass('error').show().html("</br>*Need special characters");  
           return false;  
           }    
       }    