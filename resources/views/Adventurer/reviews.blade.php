@extends('layouts.layout')
@section('content')

<div class="container">
  <div class="user-wrapper">
      <div class="edit-nav"> 
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link np active" href="/adventurer/{{Auth::guard('user')->id()}}/edit">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link np" href="/user-reviews">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link np active" href="/changepassword">Change Password</a>
        </li>
      </ul> 
         <a href=""/user/{{Auth::guard('user')->id()}}"" class="btn btn-outline-info vp">View Profile</a>
      </div>  
  <div class="edit-profile">  
    <div class="row card">
    <div class="card-header">
     <strong> Your Reviews </strong>
    </div>


<div class="comments">
  <div class="comment-wrap">
        <div class="photo">
            <div class="avatar" style="background-image: url('img/trebla.jpg')"></div>
        </div>
        <div class="comment-block">
            <strong>Jerwin Rasec was here</strong>
            <p class="comment-text">Wow ahaka this package bai so nindot!</p>
            <div class="bottom-comment">
                <div class="comment-date">Aug 24, 2017</div>
                <ul class="comment-actions">
                    <li class="complain">Edit</li>
                    <li class="reply">Delete</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="comment-wrap">
        <div class="photo">
            <div class="avatar" style="background-image: url('img/trebla.jpg')"></div>
        </div>
        <div class="comment-block">
            <p class="comment-text">11/10 would try again. Makes me shiver down my spine and ask me if im alright.</p>
            <div class="bottom-comment">
                <div class="comment-date">Jan 28, 1961</div>
                <ul class="comment-actions">
                    <li class="complain">Edit</li>
                    <li class="reply">Delete</li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>

      
  </div>    
  </div>
</div>
</div>
@endsection

@section('utils')
<script type="text/javascript">
  $(function() {
    var user = new Client();
    user.getUserInfo({{Auth::guard('user')->id()}});
  })
 
</script>

<script type="text/javascript">
  var user = new Client();
  user.editProfile({{Auth::guard('user')->id()}});
</script>
@endsection



