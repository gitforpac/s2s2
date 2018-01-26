@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
<h1>
Manage Crew
<small>Crew Profiles</small>
</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Manage Crew Profiles</li>
	</ol>
</section>
<section class="content">
<div class="row">
	<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">All Crews Informations</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <button class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#addcrew"><i class="fa fa-user-plus"></i> &nbsp;Add a Crew Member</button>
         @if(empty($crew['crew']))
          <h5>No Crew Members for now - Maybe add?</h5>
        </tr>
        <tr>
          @else
          <th style="width: 20px">#</th>
          <th style="width: 20px">Avatar</th>
          <th>Name</th>
          <th>Position</th>
          <th>Contact Number</th>
          <th>About</th>
          <th>Action</th>
        <tbody id="crewmembers">    
          @foreach($crew['crew'] as $c)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td id="crew-avatar"><img src="/storage/crew_avatars/{{$c->avatar}}" class="pb"></td>
             <td>{{$c->name}}</td>
            <td>
              {{$c->position}}
            </td>
            <td>{{$c->contact_number}}</td>
            <td>{!!$c->about!!}</td>
            <td>
              <button type="button" id="editcrewbtn" class="btn btn-primary mpw" data-id="{{$c->id}}" data-name="{{$c->name}}" data-position="{{$c->position}}" data-contact="{{$c->contact_number}}" data-about="{{$c->about}}"><i class="fa fa-pencil"></i>&nbsp; Edit</button>
              <button type="button" id="removecrewbtn" class="btn btn-danger mpw" data-id="{{$c->id}}"><i class="fa fa-trash"></i>&nbsp; Remove</button>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>              
       </table>
    </div>
    <!-- /.box-body -->
  </div>

  
  <div class="box box-default collapsed-box">
    <div class="box-header with-border bg-navy-active">
      <h3 class="box-title">Previous Members Details</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" style="color:#fff;">Show &nbsp;<i class="fa fa-plus" style="color:#fff;"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <table class="table table-bordered">
        <tbody id="crewmembers">
           @if(empty($crew['cp']))
          <h5>No member has been removed so far</h5>
          @else
          <tr>
          <th style="width: 5px">#</th>
          <th style="width: 25px">Avatar</th>
          <th>Name</th>
          <th>Position</th>
          <th>Contact Number</th>
          <th>About</th>
        </tr>
          @foreach($crew['cp'] as $c)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><img class="pb" src="/storage/crew_avatars/{{$c->avatar}}"></td>
             <td>{{$c->name}}</td>
            <td>
              {{$c->position}}
            </td>
            <td>{{$c->contact_number}}</td>
            <td>{!!$c->about!!}</td>
          </tr>
          @endforeach
          @endif
        </tbody>              
       </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</section>

<div class="modal fade" id="addcrew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
        <h4 class="modal-title">Add a Crew Member</h4>
      </div>
      <div class="modal-body">
        <form id="add-crew-form" method="post" action="/addcm">
          {{ csrf_field() }}
        	<div class="form-group">
              <label>Name</label>
              <input type="text" name="cname" class="form-control" placeholder="Juan Dela Cruz">
            </div>
            <div class="form-group">
              <label>Contact</label>
              <input type="text" name="contact" class="form-control" placeholder="09343243242">
            </div>
            <div class="form-group">
              <label>Position</label>
              <input type="text" name="position" class="form-control" placeholder="Trekking Consultant">
            </div>
            <div class="form-group">
              <label>About</label>
              <textarea name="cabout" class="textarea" placeholder="Information about this Member"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Crew Picture/Avatar</label>
              <input type="file" name="cavatar" id="exampleInputFile">

              <p class="help-block">Upload Crew Picture/Avatar</p>
            </div>
  
        <div class="form-group">
             <button type="submit" class="btn btn-primary">Add This Member</button>
            </div>
            
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<div class="modal fade" id="addcrew">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
      <h4 class="modal-title">Edit Member Profile</h4>
    </div>
    <div class="modal-body">
      <form id="add-crew-form" method="post" action="/addcm">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="cname" class="form-control" placeholder="Juan Dela Cruz">
          </div>
          <div class="form-group">
            <label>Contact</label>
            <input type="text" name="contact" class="form-control" placeholder="09343243242">
          </div>
          <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" placeholder="Trekking Consultant">
          </div>
          <div class="form-group">
            <label>About</label>
            <textarea name="cabout" class="textarea" placeholder="Information about this Member"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Crew Picture/Avatar</label>
            <input type="file" name="cavatar" id="exampleInputFile">

            <p class="help-block">Upload Crew Picture/Avatar</p>
          </div>

      <div class="form-group">
           <button type="submit" class="btn btn-primary">Add This Member</button>
          </div>
          
      </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
</div>

 <!-- MODAL SA EDIT -->

<div class="modal fade modal-md" id="edit-crew">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4>Edit Profile</h4>
           <hr>
      <!-- left column -->
      <div id="edit-crew-wrapper">
      </div>
      <!-- edit form column -->
      
  </div>
</div>
</div>
</div>





@endsection

@section('utils')
<script type="text/javascript">
  
  $('#add-crew-form').ajaxForm({
    success: function(res) {
      if(res.success == true) {
        $('#crewmembers').hide().html(res.content).fadeIn();
        $.notify(" Updated Successfully", "success");
      } else {
        $.notify(" Something Went Wrong", "error");
      }
    }
  });


$(document).on('click', '#removecrewbtn', function(e) {
e.preventDefault();
var id = $(this).data('id');
$.confirm({
    title: 'Remove Member?',
    content: 'Are you sure you want to delete this member?',
    buttons: {
        confirm: {
            btnClass: 'btn-green',
            action: function () {
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });

              
              $.ajax({
                type: "DELETE",
                url: '/removecrewmember/'+id,
                success: function(res) {
                  if(res.success == true) {
                    $('#crewmembers').hide().html(res.content).fadeIn();
                    $.notify(" Updated Successfully", "success");
                  } else {
                    $.notify(" Something Went Wrong", "error");
                  }
                },
                dataType: "json",
              });
        }
        },
        cancel:  {
           btnClass: 'btn-red'
        },     
    }
});
});


$(document).on('click', '#editcrewbtn', function(){
  var self = $(this);
  var id = self.data('id');

  $.get('/getcrewdetails/'+id, function(res){
    $('#edit-crew-wrapper').hide().html(res.content).fadeIn();
  });

  $('#edit-crew').modal('show');

  $('#edit-crew').on('hidden.bs.modal', function () {
    $('#edit-crew-wrapper').html('');
  })
});





</script>
@endsection