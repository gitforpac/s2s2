	$(document).on('click', '#cancelbkbtn', function(e){
		var bkid = $(this).data('id');
		var is = $(this).parent().parent().parent().parent().parent();

		console.log(is)
		e.preventDefault();

		$.confirm({
	    title: 'Cancel Booking',
	    content: 'Are you sure you want to Cancel This Booking?',
	    buttons: {
	        confirm: {
	            btnClass: 'btn-green',
	            action: function () {
	            var _token = $('meta[name="csrf-token"]').attr('content');
	            $.ajax({
	              type: "POST",
	              url: '/cancelbooking/'+bkid,
	              data: {_token : _token },
	              success: function(response) {
	              		if(response.success == true) {
		              			location.reload();
			                } else {
			                	$.alert({
			                		title: 'Encountered an error!',
								    content: 'There was an error cancelling',
								    type: 'red',
								    typeAnimated: true,
			                	})
			                }
	              },
	              error: function() {
	              	alert('Ops, Something Went wrong, Please try again')
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


	$(document).on('click', '#modifybkbtn', function(e){
		var count = $(this).data('count');
		if($(this).data('flag') == 0) {
			$('.loader-'+count).show();
			$(this).data('flag',1);
			var id = $(this).data('pid');
			var bid = $(this).data('id');
			$.get('/schedules/'+id+'/'+bid, function(res) {
					$('.acw').find('#modify-available-schedules-'+count).hide().html(res).slideToggle();
					$('.loader-'+count).hide();
			});
		} else {
			$(this).data('flag',0);

			$('.acw').find('#modify-available-schedules-'+count).slideToggle().html('');

		}
		
	});