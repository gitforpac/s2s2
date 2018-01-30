
class Client {

	getUserInfo(id) 
	{
		$('div#edit-profile-body').hide();
		$('div.form-loading').show();
		setTimeout(
			function() {
				axios.get('/adventurer/'+id).then(function(response){
					
					if(response.status===200) {
						$('div#edit-profile-body').show();
						$('div.form-loading').hide();
				    	var userdata = response.data;
						var name = userdata.user_fullname;
						var sname = name.split(' ');
						if (response.birthdate != null) {
							var birthdate = userdata.birthdate;
							$('#user_birthdate_month').val(bdate[0]);
							$('#user_birthdate_day').val(bdate[1]);
							$('#user_birthdate_year').val(bdate[2]);
						}		
						$('#user_email').val(userdata.email)
						$('#user_first_name').val(sname[0]);
						$('#user_last_name').val(sname[1]);
						$('#user_profile_address').val(userdata.address);
						$('#user_profile_info_about').val(userdata.userabout);
						$('#phone_number').val(userdata.phone);
					}			
				});
			}, 600
		);
	}

	editProfile(id) 
	{
		$('#user-profile-form').submit(function(event){

			Snackbar.show({ showAction: false,text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size: 16px;color:#fff !important;"></i> Creating Updating Profile', pos: 'bottom-right',duration:15000 });

			$('#edit-submit').prop('disabled', true);
		    event.preventDefault();

		    var userdata = {
		          'name' : $('#user-profile-form').find('input[name="user[first_name]"]').val() + ' ' + $('#user-profile-form').find('input[name="user[last_name]"]').val(),

		          'gender' : $('#user_sex').find(':selected').text(),

		          'birthdate' : $('#user_birthdate_month').find(':selected').text() + ' ' + $('#user_birthdate_day').find(':selected').val() + ' ' + $('#user_birthdate_year').find(':selected').val(),

		          'email' : $('#user_email').val(),

		          'phone' : $('#phone_number').val(),

		          'address' : $('#user_profile_address').val(),

		          'describe' : $('#user_profile_info_about').val()

		          }

		    axios.put('/adventurer/'+id, userdata).then(function(response){
		    	if(response.status===200 && response.statusText === "OK") {
		    		Snackbar.show({ showAction: false,text: '<i class="fa fa-check-circle" style="font-size: 16px;color:#8bd395 !important;"></i> Profile updated', pos: 'bottom-right' });
		    		location.reload();
		    		$('.message-status').fadeOut(6000);
		    		$('#edit-submit').prop('disabled', false);
		    		$('#loading').hide();
		    	}
		    }).catch(error => {
		    	Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem updating profile', pos: 'bottom-right',duration:5000 });
		    	$('#edit-submit').prop('disabled', false);
		    	$('#loading').hide();
		    });
		});
	}

	changePassword(id) 
	{
		$('#user-changepassword').submit(function(event){
			event.preventDefault(event)
			Snackbar.show({ showAction: false,text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size: 16px;color:#fff !important;"></i> Changing Password...', pos: 'bottom-right',duration:15000 });
			var userdata = {
				'oldpassword' : $(this).find('#old_password').val(),
				'newpassword' : $(this).find('#new_password').val()
			}

			axios.post('/updatepassword/'+id,userdata).then(function(response){
				var res = response.data;
				
				// if success flash success message
				if (res.changepassword == true) {
					Snackbar.show({ showAction: false,text: '<i class="fa fa-check-circle" style="font-size: 16px;color:#8bd395 !important;"></i> Password Changed', pos: 'bottom-right' });
					$('#user-changepassword').each(function() {
						this.reset()
					});
				} else {
					Snackbar.show({ showAction: false,text: '<i class="fa fa-exclamation-triangle" style="font-size: 16px;color:#fff !important;"></i> There was a problem changing password', pos: 'bottom-right',duration:15000 });
				}

				//else flash error message
			});
		});
	}



	writeComment(pid,user,name,avatar)
	{
		$('#commentbtn').click(function(){	
			if($('textarea[name=comment]').val()) {
				$('#commentbtn').prop('disabled',true);
				var comment = {
					'comment' : $('textarea[name=comment]').val()
				}
				axios.post('/writecomment/'+pid+'/'+user,comment).then(function(response){				
					if(response.status===200 && response.statusText === "OK") {
			    		$('#commentbtn').prop('disabled', false);
			    		var t = new Template();
			    		var putcomment = t.putComment(comment['comment'],name,avatar);
			    		$('#comment-box').before(putcomment);
			    		$('textarea[name=comment]').val('')
			    	}
				});
			} else {
				return false;
			}
			
		})
	}

	changeAvatar()
	{
	

		$('#avatarform').ajaxForm({
			success: function() {
				alert('qweqwe');
			}
		});
	}

}






class Packages {

	getPackages() {

		axios.get('/loadpackages')
          .then(function(response) {
            //initialize data
            var packages = response.data;
            var cebu = {lat: 10.2085, lng: 123.7573};
            var mapoptions = {
              zoom: 10,
              center: cebu
            };

            var gm = new google.maps.Map(document.getElementById('maps'), mapoptions);

            if(packages.length == null || packages.length == undefined ) {
                packages = new Array(packages);
            }
            if(packages.length !== 0 || packages !== "") {
            packages.map(function(p){
                var marker = new google.maps.Marker({
                  position: {lat: p.latitude, lng: p.longitude},
                  map: gm,
                  icon: 'img/m2.png',
                });

                var mcontent = '<div class="map-content">';
                mcontent += '<a href="/adventure/'+p.pid+'"><img src="/storage/cover_images/'+p.thumb_img+'"></a>';
                mcontent += '<a href="/adventure/'+p.pid+'"><h3 class="c-header">'+p.name+'</h3></a>';
                mcontent += '<h3 class="c-price">₱'+p.price_per+' per person</h3>';
                mcontent += '<span class="c-rate">12 Review(s)</span>'
                mcontent += '</div>';

                var infoBubble = new InfoBubble({
                  maxWidth: 265,
                  content: mcontent,
                  padding: 0,
                  borderRadius: 2,
                  arrowSize: 5,
                  borderWidth: 0,
                  disableAutoPan: false,
                  disableAnimation: false,
                  hideCloseButton: false,
                  arrowPosition: 30,
                  arrowStyle: 1,
                  minHeight: 290,
                  autopanMargin: 54,
                  closeSrc: '/img/cancel.png',
                });
                marker.addListener('click',function(){
                    if (!infoBubble.isOpen()) {
                        infoBubble.open(gm, marker);
                      }
                })


            }) 
        } 

      })

	}



}




// output html to dom navbarborder fixed-top

class Template {

	loadPackagesTemplate(data) {
		var output = '<div class="package-container"><a href="/adventure/'+data.id+'"><div class="package">';
			output += '<div class="card card-inverse"><span class="difficulty text-center">'+data.difficulty+'</span>';
			output += '<img class="card-img" src="'+data.thumb_img+'">';
			output += '<div class="card-img-overlay"><h4 class="card-title">';
			output += data.name +'<span>₱'+data.price;
			output += '</span></h4><small>'+data.location+'</small></div></div></div></a></div>';

			return output;
	}

	putComment(comment,user,avatar)
	{
		var output = '<div class="comment-wrapper animated fadeIn"><div class="commentor">';
			output += ' <img src="/storage/user_avatars/'+avatar+'">';
			output += '<div class="review-s1">';
			output += '<h3 style="">'+user+'</h3></div>';
			output += '</div><div class="comment">';
			output += comment;
			output += '</div></div>';
			return output;
	}

	mapContent()
	{
		
	    var mcontent = '<div class="map-content">';
	    mcontent += '<img src="/storage/cover_images/'+p.thumb_img+'">';
	    mcontent += '<h3 class="c-header">'+p.name+'</h3>'
	    mcontent += '<h3 class="c-price">$'+p.price+' per person</h3>'
	    mcontent += '<span class="c-rate"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="rev">41 review(s)</i></span>'
	    mcontent += '</div>';
	}
}