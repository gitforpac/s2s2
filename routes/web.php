<?php

//////////////////////////////////////
//////////                ////////////
//////////   FOR AUTH     ////////////
//////////                ////////////
//////////////////////////////////////

Route::group(['prefix' => 'superadmin'], function () {
  Route::get('/login', 'SuperadminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'SuperadminAuth\LoginController@login');
  Route::post('/logout', 'SuperadminAuth\LoginController@logout')->name('logout');

  // Route::get('/register', 'SuperadminAuth\RegisterController@showRegistrationForm')->name('register');
  // Route::post('/register', 'SuperadminAuth\RegisterController@register');

  Route::post('/password/email', 'SuperadminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'SuperadminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'SuperadminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'SuperadminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  //Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  //Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();


//////////////////////////////////////////
//////////                ////////////////
//////////     CREW       ///////////////
//////////                ///////////////
/////////////////////////////////////////

Route::group(['middleware' => ['admin']], function () {
    Route::get('/crew/dashboard', 'ManagersController@dashboard');
    Route::get('/crew/manage', 'ManagersController@manage');
    Route::post('/addpackage', 'ManagersController@addpackage');
    Route::post('/additem/{pid}','ManagersController@addIncluded');
    Route::post('/deleteitem/{iid}/{pid}','ManagersController@deleteIncluded');
    Route::get('/editpkg/{pid}', 'ManagersController@update');
    Route::post('/addschedule/{pid}','ManagersController@addSchedule');
    Route::post('/deleteschedule/{sid}/{pid}','ManagersController@deleteSchedule');
    Route::post('/upload/{pid}','ManagersController@upload');
    Route::post('/deletephoto/{pid}','ManagersController@deletePhoto');
    Route::post('/addvideo/{pid}','ManagersController@addVideo');
    Route::post('/deletevideo/{id}','ManagersController@deleteVideo');
    Route::post('/updatedetails/{pid}', 'ManagersController@updatepackage');  
    Route::get('/getbookings/{pid}','ManagersController@packageBookings');
    Route::delete('/deletepackage/{pid}', 'ManagersController@deletepackage');
    Route::post('/updateitinerary/{pid}','ManagersController@updateItinerary');
    Route::post('/addcontent/{pid}','ManagersController@addContent');
    Route::post('/deletecontent/{pid}','ManagersController@deleteContent');
    Route::post('/addadventuretype','ManagersController@addadventureType');
    Route::get('/bookings','ManagersController@loadPackagesBookings');
    Route::post('/notifications/get','ManagersController@getNotifications');
    Route::post('/notifications/read/{id}','ManagersController@markAsRead');
    Route::get('/notifications/get/{id}','ManagersController@getUserNotifs');
    Route::get('/upcomings','ManagersController@getUpcomings');
    Route::get('/manage-my-crew','ManagersController@manageCrew');
    Route::post('/addcm','ManagersController@addCrew');
    Route::get('/getgraphdata','ManagersController@getPackageData');
    Route::get('/history', 'ManagersController@bookingsHistory');
    // - manage crew routes
    Route::get('/crew/add', 'ManagersController@addview');
    Route::delete('/removecrewmember/{id}', 'ManagersController@removeCrew');
    Route::get('/getcrewdetails/{id}', 'ManagersController@crewDetails');
    Route::post('/editcrewprofile/{id}', 'ManagersController@editCrewProfile');
    // - contact us
    Route::get('/crew/edit/contactusinfo', 'ManagersController@editcontactusView');
    Route::post('/crew/edit/cui', 'ManagersController@editcontactus');
    Route::view('/crew/changepassword', 'wsadmin.changepassword');
    Route::post('/crew/updatepassword/{id}', 'ManagersController@changePassword');
    // unknown routes

    Route::post('/addpackage_prices', 'ManagersController@added');
    Route::post('/addprice/{id}', 'ManagersController@addprice');
    Route::post('/removeprice/{id}/{pid}', 'ManagersController@removeprice');
    Route::post('/editprice/{id}/{pid}', 'ManagersController@editprice');
    Route::post('/gpd/{id}/{pid}', 'ManagersController@gpd');

    Route::view('/upload', 'crew.upload');
    Route::post('/up/{pid}', 'ManagersController@upload');
    Route::get('/updatepackage/{pid}', 'ManagersController@update');
});

//////////////////////////////////////////
//////////                ////////////////
//////////  ADVENTURER    ///////////////
//////////                ///////////////
/////////////////////////////////////////

Route::group(['middleware' => ['user']], function () {
    Route::resource('adventurer','AdventurerController');
    Route::view('/dashboard', 'Adventurer.dashboard',['title' => 'Dashboard']);
    Route::view('/trips', 'Adventurer.trips',['title' => 'Trips']);
    Route::view('/changepassword', 'Adventurer.changepassword', ['title' => 'Change Password']);

    Route::view('/user-reviews', 'Adventurer.reviews', ['title' => 'Reviews']);
    Route::post('/updatepassword/{id}', 'AdventurerController@changePassword');
    Route::post('/writecomment/{pid}/{uid}', 'AdventurerController@comment');
    Route::get('/myadventures/', 'AdventurerController@showUserBookings');
    Route::get('/schedules/{id}/{bid}', 'AdventurerController@showPackageSchedules');
    Route::post('/changeschedule/{bid}/{sid}', 'AdventurerController@changebookingSchedule');
    Route::post('/cancelbooking/{bid}', 'BookingsController@cancelBooking');
    Route::post('/changeavatar','AdventurerController@updateAvatar');

    //booking
    Route::get('/book/review/{pid}', 'BookingsController@review')->name('book');
    Route::post('/book/confirm/{pid}', 'BookingsController@confirm');
    Route::post('/book/{pid}', 'BookingsController@book');
    Route::post('/paymentg/{id}', 'BookingsController@getPrices');
    Route::get('/asd', 'BookingsController@checkCC');


});

//////////////////////////////////////////
//////////                ////////////////
//////////  PUBLIC PAGES  ///////////////
//////////                ///////////////
/////////////////////////////////////////

Route::get('/', function() {

 $p = DB::table('packages')
        ->leftJoin('prices', 'packages.id', '=', 'prices.package_id')
        ->selectRaw('* , packages.id as pid')
        ->where('prices.is_display','=',1)
        ->whereNull('packages.deleted_at')
        ->get();

  return view('homepage')->with('data',$p);

})->name('index');

Route::get('/user/{id}','AdventurerController@showProfile');
Route::get('/about-us', 'PagesController@aboutus');
Route::get('/contact-us', 'PagesController@contactus')->name('contactus'); 
Route::view('/theteam', 'pages.theteam')->name('theteam');
// PACKAGES
Route::get('/adventures/{adv_type?}','PackagesController@index')->name('adventures');
Route::get('/loadpackages','PackagesController@loadpackages');
Route::get('/adventure/{pid}', 'PackagesController@loadPackage')->name('adventure'); 



//////////////////////////////////////////
//////////                ////////////////
//////////  SUPERADMIN    ///////////////
//////////                ///////////////
/////////////////////////////////////////

Route::group(['prefix' => 'superadmin'], function () { // 'middleware' => ['superadmin']
    Route::get('/manageadventurer', 'SuperAdminController@ManageAdventurer');
    Route::get('/managecrew', 'SuperAdminController@ManageCrew');
    Route::get('/manageadmin', 'SuperAdminController@ManageAdmin');
    Route::post('/deleteuser/{id}','SuperAdminController@deleteAccAdventurer');
    Route::delete('/removecrewaccount/{id}','SuperAdminController@deleteAccCrew');
    Route::post('/deleteadmin/{id}','SuperAdminController@deleteAccAdmin');
    Route::post('/addmanager','SuperAdminController@addCrewManager');
    Route::post('/addadventurer','SuperAdminController@addAccountUser');
    Route::post('/addadmin','SuperAdminController@addAccountAdmin');
    Route::get('/editadventurer/{id}', 'SuperAdminController@EditAdventurer');

    
    Route::get('/editcrew/{id}', 'SuperAdminController@EditCrew');
    Route::get('/getcrewaccount/{id}', 'SuperAdminController@getcrewaccount');
    Route::post('/editcrewaccount/{id}', 'SuperAdminController@editcrewaccount');
    //sa crew
    Route::view('/dashboard', 'superadmin.dashboard',['title' => 'Dashboard']);
    Route::get('/manage', 'SuperAdminController@manage');
    // Route::view('/add', 'superadmin.addpackage');
    // Route::post('/addpackage', 'SuperAdminController@addpackage');
    // Route::post('/additem/{pid}','SuperAdminController@addIncluded');
    // Route::post('/deleteitem/{iid}','SuperAdminController@deleteIncluded');
    // Route::get('/editpkg/{pid}', 'SuperAdminController@update');
    // Route::post('/addschedule/{pid}','SuperAdminController@addSchedule');
    // Route::post('/deleteschedule/{sid}','SuperAdminController@deleteSchedule');
    // Route::post('/upload/{pid}','SuperAdminController@upload');
    // Route::post('/deletephoto/{pid}','SuperAdminController@deletePhoto');
    // Route::post('/addvideo/{pid}','SuperAdminController@addVideo');
    // Route::post('/deletevideo/{id}','SuperAdminController@deleteVideo');
    // Route::post('/updatedetails/{pid}', 'SuperAdminController@updatepackage');  
    // Route::get('/getbookings/{pid}','SuperAdminController@packageBookings');
    // Route::delete('/deletepackage/{pid}', 'SuperAdminController@deletepackage');
    // Route::post('/updateitinerary/{pid}','SuperAdminController@updateItinerary');
    // Route::post('/addcontent/{pid}','SuperAdminController@addContent');
    // Route::post('/deletecontent/{pid}','SuperAdminController@deleteContent');
    // Route::post('/addadventuretype','SuperAdminController@addadventureType');
    // Route::get('/manage-my-crew','SuperAdminController@manageCrew');

});

