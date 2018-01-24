@extends('superadmin.adminlayout')
@section('content')
<div class="col-md-12">
<div class="box-header with-border">
  <h2 class="box-title ml-3 text-danger"><i class="fa fa-user-secret"></i> <strong>Admin Accounts</strong></h2>
</div>
<div >
    <div class="col-sm-8">
      <button type="button" class="btn-success shadow-black btn" data-toggle="modal" data-target="#accountmodal">
        <i class="fa fa-plus pr-5"></i> Create Accout</button>
    </div>
  </div>
<div class="box-body col-sm-6">
  <table class="table table-bordered table-striped table-sm text-center">
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Action</th>

    </tr>
    <tr>
       <th scope="row">1</th>
        <td>jerwin12345</td>
        <td>
          <a href="javascript:void(0)" class="btn-sm btn-primary" data-toggle="modal" data-target="#profile"><i class="fa fa-edit"></i>Edit</a>
          <a  onclick="deleteWarning()" class="btn-sm btn-danger"><i class="fa fa-remove"></i>Remove</a>
        </td>
    </tr>
  </table>
</div>
</div>

<div class="modal fade" id="accountmodal">
    <div class="modal-dialog">
      <div class="modal-content" style="background: transparent;">
        <div class="modal-body">
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">
                <form action="/">
                <div>
                  <div class="form-group">
                      <label for="email">Username:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
                  <div class="modal-footer modal-sm">
                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Create Account</button>
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



         <!-- MODAL SA EDIT -->

<div class="modal fade modal-md" id="profile">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h1>Edit Profile</h1>
           <hr>
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="Jerwin">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="Epsinazx">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="jerwin123@gmail.com">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Confirm Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" data-toggle="reset" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
</div>
<hr>
@endsection


@section('utils')


@endsection


