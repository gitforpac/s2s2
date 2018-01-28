<div class="detail-wrap">
  <h5>Change your Schedule</h5>
    <table class="table" id="avd">
      <thead class="thead-default">
         @if(sizeof($pagedata['schedules']) > 0)
        <tr>
          <th>Schedule</th>
          <th>Starting Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($pagedata['schedules'] as $s)
        <tr>
          <td scope="row">
            {{ date('M d, Y, D', strtotime($s->date)) }}
          </td>
          <td>₱ {{number_format($pagedata['prices']->last()->price_per)}} per person</td>
          <td>
             @if(Auth::guard('user')->check())
            <button id="mmb-btn" class="book-btn @if($s->schedule_status == 1) booked @endif" @if($s->schedule_status == 0) data-bid="{{$pagedata['cbi']}}" data-sid="{{$s->id}}"  @endif>@if($s->schedule_status == 1) Not availabe: Booked @else Book @endif </button>
              @else                       
              <a  href="javascript:void(0)" class="book-btn" data-toggle="modal" data-target="#login-form">Book</a>
              @endif
          </td>
        </tr>
        @endforeach
        @else
          No Available Dates for now. Check again later
        @endif
      </tbody>
    </table>
</div>
<script type="text/javascript">
  $(document).on('click','#mmb-btn', function(e){
    Snackbar.show({ showAction: false,text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size: 16px;color:#fff !important;"></i> Changing schedule...', pos: 'bottom-right',duration:15000 });
    var bid = $(this).data('bid');
    var sid = $(this).data('sid');
    e.preventDefault();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: '/changeschedule/'+bid+'/'+sid,
      success: function(response) {
        if(response.success == true) {
          Snackbar.show({ showAction: false,text: '<i class="fa fa-check-circle" style="font-size: 16px;color:#8bd395 !important;"></i> Schedule Changed', pos: 'bottom-right' });
          location.reload();
        } else {
          Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem changing schedule', pos: 'bottom-right',duration:5000 });
        }
          
      },
      dataType: "json",
    });

  });
</script>