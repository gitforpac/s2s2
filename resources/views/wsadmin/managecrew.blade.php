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
              	 <tr>
                  <th><button class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#addcrew"><i class="fa fa-user-plus"></i> &nbsp;Add a Crew Member</button></th>
                </tr>
                <tr>
                  <th style="width: 5px">#</th>
                  <th>Avatar</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Contact Number</th>
                  <th>About</th>
                </tr>
                @if(empty($crew))
                <h5>No Crews for now - Maybe add?</h5>
                @else
                @foreach($crew as $c)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td></td>
                   <td>{{$c->name}}</td>
                  <td>
                    {{$c->position}}
                  </td>
                  <td>{{$c->contact_number}}</td>
                  <td>{{$c->About}}</td>
                </tr>
                @endforeach
                @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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
@endsection

@section('utils')
<script type="text/javascript">
  
  $('#add-crew-form').ajaxForm({
    success: function(res) {
      console.log(res)
    }
  });
</script>
@endsection