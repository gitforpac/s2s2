

$('textarea').wysihtml5();


$('form#add_adv_type').ajaxForm({
success: function(data) {
var title = $('input[name="info_title"]').val();
var body =  $('textarea[name="info_body"]').val();
if(data.success == true) {
$.notify(" Updated Successfully", "success");
$('input[name="adv_typee"]').val('');
} else {
$.notify(" There was an error updating", "error");
}
}
});
$(function(){
$('.notifications').attr('style','width: 300px; top: 50px; right: 0px;')
})
  




