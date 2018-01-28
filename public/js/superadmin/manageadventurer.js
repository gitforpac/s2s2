// manage accounts


$(document).on('click','#view-p',function(){
  var id = $(this).data('id');

  $.get('/superadmin/getadvaccount/'+id,function(res){
    $('#editname').val(res.name);
    $('#editusername').val(res.username);
    $('#editemail').val(res.email);
    $('#edit-account').modal('show');
    $('#edit-adv-account-form').attr('action','/superadmin/editadvaccount/'+id)
  });

});

$(document).on('click','a#rcab',function(e) {
e.preventDefault();
var id = $(this).data('id');
$.confirm({
    title: 'Deactivate Account',
    content: 'Deactivate this account?',
    buttons: {
        confirm: {
            btnClass: 'btn-green',
            action: function () {
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              type: "DELETE",
              url: '/superadmin/removeadvaccount/'+id,
              data: {_token : _token },
              success: function(response) {
              		if(response.success == true) {
		                	location.reload();
		                } else {
		                	$.alert({
		                		title: 'Encountered an error!',
							    content: 'There was an error deleting',
							    type: 'red',
							    typeAnimated: true,
		                	})
		                }
              },
              error: function() {
              		$.alert({
	            		title: 'Encountered an error!',
					    content: 'There was an error deactivating',
					    type: 'red',
					    typeAnimated: true,
	            	})
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