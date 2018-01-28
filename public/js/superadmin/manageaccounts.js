

// manage accounts

$('#add-crew-account').ajaxForm({
success: function(res) {
  console.log(res);
}
});

$(document).on('click','#view-p',function(){
  var id = $(this).data('id');

  $.get('/superadmin/getcrewaccount/'+id,function(res){
    $('#editname').val(res.name);
    $('#editusername').val(res.username);
    $('#editemail').val(res.email);
    $('#edit-account').modal('show');
    $('#edit-crew-account-form').attr('action','/superadmin/editcrewaccount/'+id)
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
              url: '/superadmin/removecrewaccount/'+id,
              data: {_token : _token },
              success: function(response) {
              		if(response.success == true) {
		                	$.notify(" Updated Successfully", "success");
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



