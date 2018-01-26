@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
    <h1>
      Add Package
      <small>create package</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/crew/manage"><i class="fa fa-dashboard"></i> Home</a></li>>
      <li class="active">Add Package</li>
    </ol>
  </section>
<section class="content">
<div class="row">
<div class="page home-page">
  <div class="container">
    <form class="form-horizontal" id="basic-details" method="post" action="/addpackage"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group row">
            <label class="col-sm-2">Package Name</label>
            <div class="col-md-8">
              <input name="package_name" type="text" placeholder="Name of Adventure" class="form-control form-control-success"required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2">Location</label>
            <div class="col-md-8">
               <input name="package_location" type="text" id="us2-address" class="form-control" required/>
            </div>
          </div>

          <div class="form-group row" style="margin-top: 20px;">
               <label class="col-sm-2">Duration</label>
               <div class="col-md-4">
                  <select class="form-control" id="package_durnum" name="package_durnum" required="">
                    <@for($i=1;$i<=32;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="col-md-4">
                  <select class="form-control" id="package_dur" name="package_dur" required="">
                    <option value="Hours">Hours</option>
                    <option value="Days">Days</option>
                    <option value="Months">Months</option>
                  </select>
                </div>
            </div>

            <div class="form-group row" style="margin-top: 20px;">
               <label class="col-sm-2">Adventure Type</label>
               <div class="col-md-8">
                  <select class="form-control" id="package_type" name="package_type" required="">
                    @foreach($adv_type as $at)
                    <option value="{{$at->type}}">{{$at->type}}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="form-group row" style="margin-top: 20px;">
               <label class="col-sm-2">Max Adventurers</label>
               <div class="col-md-8">
                  <select class="form-control" id="package_limit" name="package_limit" required="">
                    <option disabled selected>Number of Max Adventurers for this package</option>
                    <@for($i=1;$i<=32;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                  <br>
                  <div class="form-group row pricesdiv">
                  </div>
                </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-2">Difficulty</label>
            <div class="col-md-6">
               <label class="form-check-label" style="margin-right: 20px;">
          <input class="form-check-input" type="radio" name="package_difficulty" id="df1" value="easy" checked>
          Easy
        </label>
               <label class="form-check-label" style="margin-right: 20px;">
          <input class="form-check-input" type="radio" name="package_difficulty" id="df2" value="medium">
          Medium
        </label>
              <label class="form-check-label" style="margin-right: 20px;">
          <input class="form-check-input" type="radio" name="package_difficulty" id="df3" value="hard">
          Hard
        </label>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2">Introduction</label>
            <div class="col-md-8">
              <textarea name="package_dsc" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>
            </div>
          </div> 

          <div class="form-group row">
            <label class="col-sm-2">Itinerary</label>
            <div class="col-md-10" style="padding-left: 12px;">
              <textarea name="package_itinerary" class="textarea" placeholder="Write awesome Introduction for the package"
                style="margin-right: 10px; width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2">Cover Photo</label>
              <input type="file" name="package_image" style="padding-left: 12px;" />
          </div>   
          <div class="form-group row">
            <label class="col-sm-2">Map Location</label>
            <input type="hidden" name="latitude" id="lat">
            <input type="hidden" name="longitude" id="lng">
            <div class="col-sm-6" id="amap">     
            </div>
          </div>
          <div class="form-group row">       
              <input type="submit" name="submit" value="Create" class="btn btn-primary" style="float:right;margin-right: 180px;">
            </div>
          </div>
        </form>
  </div>
  
</div>
</div>
</section>
@endsection

@section('utils')
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf7Sp7l4TuDL-x1MCdF3cCB6vHuc29dU&callback=initMap"
  type="text/javascript"></script>
<script>
function initMap(){

  var options = {
    zoom : 8,
    center:{lat: 10.3157, lng: 123.8854}
  }

  var map = new google.maps.Map(document.getElementById('amap'), options);

marker = null;

google.maps.event.addListener(map,'click',function(event){
  if(marker) {
   marker.setMap(null);
   marker = null;
   marker = addMarker({coords: event.latLng});
  }else {
    marker = addMarker({coords: event.latLng});

  }

  $('input[name="latitude"]').val(event.latLng.lat());
  $('input[name="longitude"]').val(event.latLng.lng());
  console.log('lat '+event.latLng.lat()+' lng:' + event.latLng.lng());
})



  function addMarker(props){
    var marker = new google.maps.Marker({
    position:props.coords,
    map:map,
    });
    return marker;
    
  } 
}

$('#package_limit').change(function() {
        var prices = '<label class="col-sm-12">Prices per Person</label><div class="col-md-8">';

        for(var i=1; i<=$(this).val(); i ++) {
          prices += '<div class="input-group"><span class="input-group-addon">₱</span><input type="text" class="form-control" required name="price_for_' + i + '" placeholder="Price for ' + i + ' (per person)"> </div><br>';
        }
        prices += '</div>';
        $('.pricesdiv').html(prices);
    })
</script>
@endsection