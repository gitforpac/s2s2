@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
    <h1>
      Edit Contact Us
    </h1>
    <ol class="breadcrumb">
      <li><a href="/crew/manage"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Contact Us</li>
    </ol>
  </section>
<section class="content">
<div class="row">
<div class="col-sm-8">
	<div class="box-body">
		<form method="post" action="/crew/edit/cui">
		<div class="form-group row">
		  <label for="inputEmail3" class="control-label">Contact Details</label><br>
		    <textarea name="contactus" class="textarea" placeholder="Edit Contact us details"
                          style="margin-right: 10px; width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="">{{$c->contactdetails}}</textarea>
		</div>
		</form>
</div>
</div>
</div>
</section>
@endsection