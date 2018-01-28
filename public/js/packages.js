


  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();
  if(dd<10) {
    dd = '0'+dd
  } 

  if(mm<10) {
    mm = '0'+mm
  } 
  today = mm + '/' + dd + '/' + yyyy;
  $(document).ready(function() {
        $(document).on('click', 'ul.pagination a', function (e) {
          var urlParams = new URLSearchParams(window.location.search);
          var url = urlParams.toString();
          $('.main-packages-wrapper').addClass('disabled-div');
            getPosts($(this).attr('href').split('page=')[1],url);
            e.preventDefault();
        });
    });
    function getPosts(page,url=null) {
        $.ajax({
            url : '?'+url+'&page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.loading').hide();
            $('ul.pagination').hide();
            $('.main-packages-wrapper').removeClass('disabled-div');
            $('.main-packages-wrapper').html(data);          
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

$('[data-toggle="datepicker"]').datepicker({startDate:today});



  var url = '';
  var dateurl = '';
  var difficultyurl = '';
  var adv_typeurl = '';




  $('#adventure-difficulty').change(function (e) {
    e.preventDefault();
    difficultyurl = 'difficulty='+$(this).val();

    
    if(url !== '' && url.indexOf('difficulty') == -1){
      url += '&'+difficultyurl;
    } else if(url !== '' && difficultyurl !== ''){
      var regEx = /(difficulty)=([^#&]*)/g;
      url = url.replace(regEx, difficultyurl); 
    }
    else {
      url = '?'+difficultyurl;
    }

    var stateObj = { page: 1 };
    window.history.pushState(stateObj, "Packages", "adventures"+url);

    $.ajax({
      type:'GET',
      dataType: "json",
      url:'/adventures'+url,
      cache: false,
      success: function (data) {
        $('ul.pagination').hide();
        $('.main-packages-wrapper').removeClass('disabled-div'); 
        $('.main-packages-wrapper').html(data);
      }
  });

  });

  $('#adventure-type').change(function (e) {
    e.preventDefault();
    adv_typeurl = 'type='+$(this).val();

    
    if(url !== '' && url.indexOf('type') == -1){
      url += '&'+adv_typeurl;
    } else if(url !== '' && adv_typeurl !== ''){
      var regEx = /(type)=([^#&]*)/g;
      url = url.replace(regEx, adv_typeurl); 
    }
    else {
      url = '?'+adv_typeurl;
    }

    var stateObj = { page: 2 };
    window.history.pushState(stateObj, "AdventureType", "adventures"+url);
    $('.main-packages-wrapper').addClass('disabled-div');
    $.ajax({
      type:'GET',
      dataType: "json",
      url:'/adventures'+url,
      cache: false,
      success: function (data) {
        $('ul.pagination').hide();
        $('.main-packages-wrapper').removeClass('disabled-div'); 
        $('.main-packages-wrapper').html(data);
      }
  });
  });

  $('#adventure-date').on('input',function (e) {
    e.preventDefault();
    $('[data-toggle="datepicker"]').datepicker('hide');
    dateurl = 'date='+$(this).val();
    
    if(url !== '' && url.indexOf('date') == -1){
      url += '&'+dateurl;
    } else if(url !== '' && dateurl !== ''){
      var regEx = /(date)=([^#&]*)/g;
      url = url.replace(regEx, dateurl); 
    }
    else {
      url = '?'+dateurl;
    }

    var stateObj = { page: 3 };
     window.history.pushtate(stateObj, "AdventureDate", "adventures"+url);
    $('.main-packages-wrapper').addClass('disabled-div');
    $.ajax({
      type:'GET',
      dataType: "json",
      url:'/adventures'+url,
      cache: false,
      success: function (data) {
        $('ul.pagination').hide();
        $('.main-packages-wrapper').removeClass('disabled-div'); 
        $('.main-packages-wrapper').html(data);
      }
  });
  });

window.onpopstate = function() {
      window.history.back();
  }