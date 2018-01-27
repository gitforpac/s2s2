


$('form#login-modal-form').submit(function(e){
	e.preventDefault();
	Snackbar.show({ showAction: false,text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size: 16px;color:#fff !important;"></i> Logging In...', pos: 'bottom-right' });
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
          Snackbar.show({ showAction: false,text: '<i class="fa fa-check-circle" style="font-size: 16px;color:#8bd395 !important;"></i> Login success', pos: 'bottom-right' });
    			location.reload(); 
    		} else {
          Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem logging in', pos: 'bottom-right',duration:5000 });
        }
    	},
    	error: function(xhr, textStatus, errorThrown) {
    		$('#email').css('border','1px solid rgb(165, 0, 16)');
    		$('.error-box-login').html('<p class="was-error"><i class="fa fa-exclamation-triangle"></i>&nbsp;Invalid Credentials!</p>');
        Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem logging in', pos: 'bottom-right',duration:5000 });
    	},
    	dataType: 'json'
    });

});






$('#registerform').ajaxForm({
  dataType: 'json',
  beforeSubmit: function() {
    $(this).prop('disabled', true);
    Snackbar.show({ showAction: false,text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size: 16px;color:#fff !important;"></i> Creating Account...', pos: 'bottom-right',duration:15000 });
  },
  success: function(res) {
    $(this).prop('disabled', false);
    if(res == true) {
    Snackbar.show({ showAction: false,text: '<i class="fa fa-check-circle" style="font-size: 16px;color:#8bd395 !important;"></i> Account Created Successfully', pos: 'bottom-right' });
     location.reload(); 
    } else {
      Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem creating account, Be sure to complete all fields', pos: 'bottom-right',duration:5000 });
      if(res.birthdate_year == 'Sorry, To sign up, you must be 18 or older.') {      
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
        if (res.birthdate_year || res.birthdate_month || res.birthdate_day) {
          $('#errorm').html('Please Complete all the fields');
        } else {
          $('#errorm').html(' ');
        }
        if(res.birthdate_month) {
          $('#registerform select[name="birthdate_month"]').css('border','1px solid rgb(165, 0, 16)');
        }else {
          $('#registerform select[name="birthdate_month"]').css('border','1px solid #ced4da');
        }
        if(res.birthdate_day) {
          $('#registerform select[name="birthdate_day"]').css('border','1px solid rgb(165, 0, 16)');
        }else {
          $('#registerform input[name="birthdate_day"]').css('border','1px solid #ced4da');
        }
        if(res.birthdate_year) {
          $('#registerform select[name="birthdate_year"]').css('border','1px solid rgb(165, 0, 16)');
        }else {
          $('#registerform select[name="birthdate_year"]').css('border','1px solid #ced4da');
        }
        if(res.password) {
        $('#registerform select[name="password"]').css('border','1px solid rgb(165, 0, 16)');
        $('.password-error').html('<i class="fa fa-times" style="color:rgb(165, 0, 16)"></i> '+res.password+'<br>');
      } else {
         $('#registerform select[name="password"]').css('border','1px solid #ced4da');
         $('.password-error').html('');
      }
      if(res.email) {
        $('#registerform input[name="email"]').css('border','1px solid rgb(165, 0, 16)');
        $('.email-error').html('<i class="fa fa-times" style="color:rgb(165, 0, 16)"></i> '+res.email+'<br>');
      } else {
         $('#registerform input[name="email"]').css('border','1px solid #ced4da');
         $('.email-error').html('');
      }
    }
    
  },
  error: function(){
     Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem creating account', pos: 'bottom-right',duration:5000 });
    $(this).prop('disabled', false);
  },
});




  
