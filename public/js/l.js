


$('form#login-modal-form').submit(function(e){
	e.preventDefault();
	
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
    	type: 'POST',
    	url: '/login',
    	data: {email: $('#email').val(),password:$('#password').val()},
    	success: function(res) {
    		if(res.authenticated == true) {
    			window.location = "/adventures";
    		}
    	},
    	error: function(xhr, textStatus, errorThrown) {
    		$('#email').css('border','1px solid rgb(165, 0, 16)');
    		$('.error-box-login').html('<p class="was-error"><i class="fa fa-exclamation-triangle"></i>&nbsp;Invalid Credentials!</p>');
    	},
    	dataType: 'json'
    });

});






$('#registerform').ajaxForm({
  dataType: 'json',
  beforeSubmit: function() {
    $(this).prop('disabled', true);
    Snackbar.show({ showAction: false,text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size: 16px;color:#fff !important;"></i> Creating Account...', pos: 'bottom-right' });
  },
  success: function(res) {
    Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem creating account...', pos: 'bottom-right' });
    $(this).prop('disabled', false);
    if(res == true) {
      window.location.replace("/dashboard");
    } else {
      if(res.birthdate_year) {      
      $.confirm({
        title: 'Sorry,',
        content: '<div class="text-center"><i class="fa fa-frown-o" aria-hidden="true"></i><br>To sign up, you must be 18 or older.</div>',
        buttons: {
            Confirm: {
                text: 'Ok',
                action: function(){
                    $('#register-form').modal('hide')
                }
            },
        }
        });
        return false;
        }
        if(res.password) {
        $('#registerform input[name="password"]').css('border','1px solid rgb(165, 0, 16)');
        $('.password-error').html('<i class="fa fa-times" style="color:rgb(165, 0, 16)"></i> '+res.password+'<br>');
      } else {
         $('#registerform input[name="password"]').css('border','1px solid rgba(36, 150, 10,0.8)');
         $('.password-error').html('');
      }
      if(res.email) {
        $('#registerform input[name="email"]').css('border','1px solid rgb(165, 0, 16)');
        $('.email-error').html('<i class="fa fa-times" style="color:rgb(165, 0, 16)"></i> '+res.email+'<br>');
      } else {
         $('#registerform input[name="email"]').css('border','1px solid rgba(36, 150, 10,0.8)');
         $('.email-error').html('');
      }
    }
    
  },
  error: function(){
     Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem creating account...', pos: 'bottom-right',duration:1000 });
    $(this).prop('disabled', false);
  },
});




  
