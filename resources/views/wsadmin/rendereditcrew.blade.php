 <form class="form-horizontal" id="edit-crew-profile" role="form" enctype="multipart/form-data" method="post" action="/editcrewprofile/{{$crew->id}}">
  {{csrf_field()}}
 <div class="col-md-3">
  <div class="text-center">
    <img src="/storage/crew_avatars/{{$crew->avatar}}" class="avatar img-circle img-a" alt="avatar"  id="edit-crew-avatar">
    <h6>Upload a different photo...</h6>
    
    <input name="avatar" id="edit-avatar" type="file" id="edit-avatar" class="form-control" required="">
  </div>
</div>

  

<div class="col-md-9 personal-info">
        
  <h3>Personal info</h3>
    <div class="form-group">
      <label class="col-lg-3 control-label">Name:</label>
      <div class="col-lg-8">
        <input name="name" class="form-control" type="text" id="nameee" value="{{$crew->name}}" required="">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-3 control-label">Position:</label>
      <div class="col-lg-8">
        <input name="position" class="form-control" type="text" id="cposition" value="{{$crew->position}}" required="">
      </div>
    </div>
   
    <div class="form-group">
      <label class="col-lg-3 control-label">Contact:</label>
      <div class="col-lg-8">
        <input name="contact" class="form-control" type="text" id="ccontact" value="{{$crew->contact_number}}" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">About</label>
      <div class="col-lg-8">
        <textarea name="about" id="cabout" class="textarea" placeholder="Information about this Member"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="">{{strip_tags($crew->about)}}</textarea>
      </div>
    </div>


    <div class="form-group">
      <label class="col-md-3 control-label"></label>
      <div class="col-md-8">
        <input type="submit" class="btn btn-primary" id="save-edited-profile" value="Save Changes">
        <span></span>
        <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
  $(document).find('form#edit-crew-profile').ajaxForm({
    success: function(res) {
      if(res.success == true) {
        $.notify(" Updated Successfully", "success");
         $('#crewmembers').hide().html(res.content).fadeIn();
      } else {
        $.notify(" Something Went Wrong", "error");
      }
    }
  })
</script>