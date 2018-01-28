@extends('layouts.layout')
@section('content')
<div class="container mhmh">
@if($pagedata['bookings']->isEmpty())
<h5 class="select-adv">Select Your Adventure!</h5>
<a href="/adventures" class="btn-lg bgws text-white">Find Adventure</a>
@else
@foreach($pagedata['bookings'] as $d)
<div class="row">
<div class="col-md-8 col-sm-12">
  <div class="card n612 acw">
	  <h5 class="card-header bsf text-white"><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Booking Confirmed</h5>
	  <div class="card-body">
	    <div class="row">
	    	<div class="col-md-4">
	    		<img src="/storage/cover_images/{{$d->thumb_img}}" style="width: 100%;height: 180px;border-radius: 2px;">
	    	</div>
	    	<div class="col-md-8">
	    		<h5 class="bh">{{$d->name}}</h5>
	    		<p><i class="fa fa-calendar"></i> {{date('M d, Y, D', strtotime($d->date))}}</p>
	    		<p><i class="fa fa-user-o"></i> {{$d->num_guest}} Adventurer(s)</p>
	    		<p><i class="fa fa-ban"></i> &nbsp;<a href="javascript:void(0)" id="cancelbkbtn" data-id="{{$d->id}}">Cancel</a></p>
	    		<p><i class="fa fa-calendar-minus-o"></i> &nbsp;<a href="javascript:void(0)" id="modifybkbtn" data-id="{{$d->id}}" data-pid="{{$d->pid}}" data-count="{{$loop->iteration}}" data-flag="0">Change Schedule</a></p>
	    	</div>
	    </div>
	    <br>
	    <div class="row">
	    	<div class="col-md-12">
	    		<div class="form-loading loader-{{$loop->iteration}} text-center" style="display: none;">
	              <img src="{{ asset('img/loader.svg') }}">
	            </div>
	            <div id="modify-available-schedules-{{$loop->iteration}}">
	            </div>
	    	</div>
	    </div>
	  </div>
	</div>
	</div>
</div>
@endforeach
@endif
<br>
<br>
<hr>
@if($pagedata['prevbookings']->isEmpty())
<h5></h5>
@else
<h5 class="prevbookings">Previous Bookings</h5>
@foreach($pagedata['prevbookings'] as $d)
<div class="row">
<div class="col-md-8 col-sm-12">
  <div class="card n612">
	  <h5 class="card-header bgb text-white">{{$d->name}}</h5>
	  <div class="card-body">
	    <div class="row">
	    	<div class="col-md-4">
	    		<img src="/storage/cover_images/{{$d->thumb_img}}" style="width: 100%;height: 180px;border-radius: 2px;">
	    	</div>
	    	<div class="col-md-8">
	    		<h5 class="bh">{{$d->name}}</h5>
	    		<p><i class="fa fa-calendar"></i> {{date('M d, Y, D', strtotime($d->date))}}</p>
	    		<p><i class="fa fa-user-o"></i> {{$d->num_guest}} Adventurer(s)</p>
	    	</div>
	    </div>
	    <br>
	    <div class="row">
	    	<div class="col-md-12" >
	    		<div class="form-loading text-center" style="display: none;">
	              <img src="{{ asset('img/loader.svg') }}">
	            </div>
	            <div id="modify-available-schedules">
	            </div>
	    	</div>
	    </div>
	  </div>
	</div>
	</div>
</div>
@endforeach
@endif

</div>
@endsection
@section('utils')
<script type="text/javascript" src="/js/mdb.js"></script>
@endsection

