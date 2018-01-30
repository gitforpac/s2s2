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
      <div class="panel-heading">Update Profile</div>
      <div class="panel-body">
         <form id="crew-updateprofile" method="post" action="/crew/updateprofile" enctype="multipart/form-data">
          {{csrf_field()}}
        <div class="av-wrap">
          <img src="/storage/crew_avatars/{{$user->avatar}}" class="text-center av" id="u-avatar">
          <div class="col cb text-white user-u-b">
              <input type="file" name="avatar" class="form-control"><i class="fa fa-camera" aria-hidden="true"></i> &nbsp;Upload
            </div>
        </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="editname" class="form-control fs" value="{{$user->name}}" required="">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="editemail" class="form-control fs"  value="{{$user->email}}" required="">
            </div>
          </div>
            <button type="submit" class="btn btn-danger" style="float: right">Update Profile</button>        
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
$('input[name="user-avatar"]').change(function(){
    readURL(this);
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#u-avatar').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$('#crew-updateprofile').ajaxForm({
  success: function(res) {
    if(res.success == true) {
     $.notify(" Profile udated", "success");
    } else {
      $.notify(" There was an error updating profile", "error");
    }
  }
})
</script>
@endsection