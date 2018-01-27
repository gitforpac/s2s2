@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
    <h1>
      Change Password
      <small>Account Security</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/crew/manage"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Change Password</li>
    </ol>
  </section>
<section class="content">
<div class="row" style="margin-top: 15px;">
<div class="col-sm-6">
	 <div class="panel panel-info">
      <div class="panel-heading">Change Password</div>
      <div class="panel-body">
      	<form id="crew-changepassword">
	        <div class="form-group row">
	          <label for="staticEmail" class="col-sm-2 col-form-label">Old&nbsp;Password:</label>
	          <div class="col-sm-10">
	            <input type="text" class="form-control fs" id="old_password" placeholder="Old Password">
	          </div>
	        </div>
	        <div class="form-group row">
	          <label for="inputPassword" class="col-sm-2 col-form-label">New&nbsp;Password:</label>
	          <div class="col-sm-10">
	            <input type="password" class="form-control fs" id="new_password" placeholder="New Password">
	          </div>
	        </div>
	          <button type="submit" class="btn btn-danger" style="float: right">Change Password</button>        
	            @if ($errors->has('email'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
	      </form>
      </div>
    </div>
</div>
</div>
</section>
@endsection
@section('utils')
<script type="text/javascript">
$('#crew-changepassword').submit(function(event){
		var id = {{Auth::guard('admin')->id()}};
		event.preventDefault(event)
		//Snackbar.show({ showAction: false,text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size: 16px;color:#fff !important;"></i> Changing Password...', pos: 'bottom-right',duration:15000 });
		var userdata = {
			'oldpassword' : $(this).find('#old_password').val(),
			'newpassword' : $(this).find('#new_password').val()
		}

		$.ajaxSetup({
	      headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	    });

	    $.ajax({
	      type: "POST",
	      url: '/crew/updatepassword/'+id,
	      data: userdata,
	      success: function(res) {
	      	if (res.changepassword == true) {
				//Snackbar.show({ showAction: false,text: '<i class="fa fa-check-circle" style="font-size: 16px;color:#8bd395 !important;"></i> Password Changed', pos: 'bottom-right' });
				$('#crew-changepassword').each(function() {
					this.reset()
				});
				$.notify(" Password Updated Successfully", "success");
			} else {
				$.notify(" Something Went Wrong", "error");
				//Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem changing password', pos: 'bottom-right',duration:15000 });
			}
	        	
	      },
	      dataType: "json",
	    });

	});
</script>
@endsection