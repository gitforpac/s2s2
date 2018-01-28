@extends('layouts.layout')
@section('content')
@section('breadcrumbs')
{{ Breadcrumbs::render('book',$pagedata['package']) }}
@endsection
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="alert ccerror">
				<div class="ce text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> </div> 
				<div class="err2">Error</div>
			</div>
			<div class="detail-wrap">
				<h5 class="pd-h">Adventurers:</h5>
				<span>How many people are coming with you in this adventure?</span><br><br>
				<form method="post" action="/book/{{$pagedata['package']->id}}" id="form-adv-book">
					{{csrf_field()}}
					<div class="form-group">
					  <label class="control-label pd-h" for="selectbasic">Number of Adventurers:</label>
					    <select id="adultguest" name="num_guest" class="form-control col-md-4 cvcv">
					      @for($i=1;$i<=$pagedata['package']->adventurer_limit;$i++)
					      <option value="{{$i}}">{{$i}}</option>
					      @endfor
					    </select>
		
					</div>
					<br>

					<h5 class="pd-h">Payment:</h5>
					<div class="form-group">
						<label class="control-label pd-h" for="cn">Payment Option</label>
							<div class="form-check" style="padding-left: 30px;">
							  <input class="form-check-input" type="radio" name="paymentoption" id="paymentoptionfp" value="Full Payment" checked>
							  <label class="form-check-label" for="exampleRadios1">
							    Full Payment
							  </label>
							</div>
							<div class="form-check" style="padding-left: 30px;">
							  <input class="form-check-input" type="radio" name="paymentoption" id="paymentoptionbf" value="Booking Fee">
							  <label class="form-check-label" for="exampleRadios2">
							   Pay only booking fee
							  </label>
							</div>
					</div>
					<br>					
					<div class="form-group">
						<label class="control-label pd-h" for="cn">Preferred Payment Method</label>
							<select class="form-control col-md-4 cvcv" name="select_payment_method" id="select_payment_method" required>
								<option value="Credit Card" selected>Credit Card</option>
								<option value="Deposit">Deposit</option>
							</select>
					</div>
				
					<br>

					<div class="selected-option">
						<div class="form-group">
							<label class="control-label pd-h" for="cn">Card Information</label>
							<img src="http://i76.imgup.net/accepted_c22e0.png" style="float: right;">
							   <input type="text" name="cardnumber" required="" placeholder="Card Number..." class="form-control cvcv" id="cn">
						</div>
						<div class="form-group row">
							<div class="col-md-4" style="margin-right:1px;padding-right: 0">	
								<input type="text" name="exp" placeholder="Expiry" class="form-control cvcv" id="exp">
							</div>
							<div class="col-md-4" style="margin-left:0;padding-left:0">
								<input type="text" name="cvv" placeholder="CVV" class="form-control cvcv" id="cvv">
							</div>
						</div>
					</div>

					<div class="form-group">
					  <label class="control-label pd-h" for="selectbasic">Request</label>
					    <textarea rows="5" class="form-control cvr" name="request" placeholder="I want chocolates"> </textarea>
					</div>
			  	<input type="hidden" name="schedule" value="{{$pagedata['schedule']->id}}">
			  	<input type="hidden" name="total_payment" value="{{$pagedata['prices']->price_per}}">
			  	<input type="hidden" name="total_paid" value="{{$pagedata['prices']->price_per}}">
			  	<input type="hidden" name="guest" value="1">
			  	
			</div>
			<div class="detail-wrap ch423">
				<div class="payment_option">
					<span class="pd-h p">Payment Method</span>
					<div class="card-body v34">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
					
				</div>
			</div>
			<div class="detail-wrap ch423">
				<div class="payment_option">
					<span class="pd-h p">Cancellation Policy</span>
					<div class="card-body v34">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
					
				</div>
			</div>
			<input type="submit" name="book" id="book-btn" value="Book this Adventure" class="btn bg-sb text-white" style="margin-top: 50px;float: right;margin-right: 40px;"> 
			</form>
	</div>
		<div class="col" style="background-color: #f1f2ef; height: 260px; margin-top: 10px;">
			<div class="detail-wrap">
              	<h3 class="sb-name">{{$pagedata['package']->name}}</h3>
             	<h5 class="loc-header">Talamban </h5> 
              	<br>
              	<h5 class="sd">Date: {{date('M d, Y, D', strtotime($pagedata['schedule']->date))}}</h5>

			             		<span class="adventurers" >Adventurer:</span>


			              		<span class="numag" style="display:inline-block;position: relative !important;top: 1px;left: 3px; font-size: 16px;">x1 <i class="fa fa-users"></i></span>

			              		<div style="font-size: 16px;margin-top: 20px;"><small>20% of Total Payment is the booking fee</small>*<br>
			              		<div style="margin-top:15px;margin-left: -1px" id="tp"><strong>Total Payment: ₱{{number_format($pagedata['prices']->price_per,0)}}.00<span class="sb-currency">PHP</span></strong></div>
			              		</div>			             
			              		<br>
			</div>
			<div class="total">
				<h5 class="tp"> To Pay:</h5>
				<span class="form-loading" style="display: none;min-height: 30px !important;height:30px;padding: 0px!important;margin: 0px !important" >
	              <img src="{{ asset('img/loader-white.svg') }}" style="min-height: 30px !important;height:30px;padding: 0px!important;margin: 0px !important">
	            </span>
              	<h5 class="p-price"> ₱ {{number_format($pagedata['prices']->price_per,0)}}.00<span class="sb-currency">PHP</span></h5> 
          	</div>
		</div>
	</div>
</div>
@endsection

@section('utils')
<script type="text/javascript">
	var price = parseFloat({{$pagedata['package']->price}});
	var adventurercount = 1;
	var pid = '{{$pagedata['package']->id}}';
	var total = $('input[name="total_payment"]').val();
</script>
<script type="text/javascript" src="/js/s1.js"></script>


@endsection
