<?php

//User Part
    // Route::get('/', function () {
    //     return view('welcome');
    // })->middleware('checkfacebooklogin');//->middleware('auth');// auth คือ ชื่อคราสของ middleware ที่โปรเจคสร้างมาให้แต่ไม่เหมาะสมกับการลอคอินที่กำหนด

    // Route::get('/', function () {
    //     return view('welcome');
    // });//->middleware('checkmecaslogin');

    //Welcome Page
    // Route::get('/', 'Auth\BoxBoxAuthController@loaddatatohome')->middleware('checkboxboxlogin');
    Route::get('/', 'Auth\OpenDistroAuthController@loaddatatohome')->middleware('checkopendistrologin');

    //getstarted page
    Route::get('/getstarted', function () {
        return view('gettingstartedtest');
    })->middleware('checkopendistrologin');

    Route::get('/teststart',function(){
        return view('getstarted');
    });
    
    Route::get('/testgraph',function(){
        return view('userregisdomaingraph');
    });

    //domainregister
    // Route::get('/userregisdomain', function () {
    //     return view('userregisdomain');
    // })->middleware('checkmecaslogin');

    //add server list to userregis domain page 
    Route::get('/userregisdomain', 'Auth\UserRegisterDomainController@serverlist')->middleware('checkopendistrologin');

    //test part register domain post data from form to controller to keep at database for regis domain
    Route::post('/submit','Auth\UserRegisterDomainController@regissubmit');
    //regis domain success
    Route::get('/regissuccess',function(){
    	return view('regisdomainsuccess');
    })->middleware('checkopendistrologin');

    //controller for get data from form to keep data to database for request permission
    Route::post('/keepuserpermissionrequest','Auth\keepuserpermissionrequestController@requestkeep')->name('keepuserpermissionrequest')->middleware('checkopendistrologin');

    //show request permission successful
    Route::get('/requestpermissionsuccessful','Auth\keepuserpermissionrequestController@requestsuccess')->middleware('checkopendistrologin');

    //news
    Route::get('/news', function () {
        return view('news');
    })->middleware('checkopendistrologin');

    Route::get('/alertlogin',function(){
        return view('alertlogin');
    });

    Auth::routes();

    //Facebook part
    // Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
    // Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderFacebookCallback');

    //Login with sso.mecas.space
    // Route::get('login/mecas', 'Auth\MecasAuthController@redirectToProvider');
    // Route::get('login/mecas/callback', 'Auth\MecasAuthController@handleProviderCallback');

    //logout sso.mecas
    //Route::get('/logout','Auth\MecasAuthController@getLogout'); //logout facebook login

    //Login with boxbox sign on
    Route::get('login/boxbox', 'Auth\BoxBoxAuthController@redirectToProvider');
    Route::get('login/boxbox/callback', 'Auth\BoxBoxAuthController@handleProviderCallback');
    //get permission default for first login
    Route::get('login/getfirstpermission', 'Auth\BoxBoxAuthController@userpermissiondefault');
    //logout sso.mecas
    // Route::get('/logout','Auth\BoxBoxAuthController@getLogout'); //logout facebook login
    Route::get('/logout','Auth\OpenDistroAuthController@logout'); //logout facebook login



    Route::get('/permissioncheck',function(){
        return view('permissioncheck');
    });

    //Login with boxbox sign on
    Route::get('login/opendistro', 'Auth\OpenDistroAuthController@redirectToProvider');
    Route::get('login/opendistro/callback', 'Auth\OpenDistroAuthController@handleProviderCallback');

    

    //Delete domain and return quota
    Route::get('/deletedomain/{request_id}','Auth\BoxBoxAuthController@deletedomain')->name('domaindelete');

    //update relayserver in subdomain
    Route::post('/updaterelayservermydomain','Auth\UserRegisterDomainController@updaterelayservermydomain')->name('changerelayserver');

    // refresh reclam token
    Route::get('/updatereclamtoken/{request_id}','Auth\BoxBoxAuthController@renewreclamtoken')->name('updatereclamtoken');
    // refresh reclam token new
    Route::get('/updatereclamtokentest','Auth\BoxBoxAuthController@renewreclamtest')->name('updatereclamtokentest');


    Route::get('/mydomain','Auth\BoxBoxAuthController@mydomain')->middleware('checkopendistrologin','cors');

    //test ajax
    Route::get('/testajax',function(){
        return view('testajax');
    });

    Route::get('/requestpermission','Auth\keepuserpermissionrequestController@showrequestpermissionpage')->middleware('checkopendistrologin');

    // open distro generate token
    Route::get('/opendistro','Auth\OpenDistroAuthController@dataplatformtoken')->middleware('checkopendistrologin');

    // Route::get('/curl','Auth\OpenDistroAuthController@curl');
    Route::post('/curl','Auth\OpenDistroAuthController@curl')->middleware('checkopendistrologin');

    //Delete token
    Route::get('/tokendelete/{request_id}','Auth\OpenDistroAuthController@tokendelete')->name('tokendelete');
    //Delete token
    Route::get('/tokenrevoke/{request_id}','Auth\OpenDistroAuthController@revokedtptoken')->name('tokenrevoke');


//Admin Part
    Route::get('/adminmanagement',function(){
    	return view('adminhome');
    })->middleware('checkopendistrologin');

    // Route::get('/domainmanagement',function(){
    // 	return view('adminmanagedomain');
    // });
    Route::get('/domainmanagement','Auth\adminmanagedomainController@openupdatedomainpage');
    Route::post('/updatedomain','Auth\adminmanagedomainController@updatedomaindata');
    

    //Admin Update/Delete/Edit/Add Relay Server 
    Route::get('/relayservermanagement','Auth\adminloadrelayserverdataController@loadserverlist');
    Route::get('/delete/{server_id}','Auth\adminloadrelayserverdataController@deleteData')->name('delete');

    Route::get('/edit/{server_id}','Auth\adminloadrelayserverdataController@editclickData')->name('edit');
    Route::post('/updatedata','Auth\adminloadrelayserverdataController@editData')->name('/updatedata');
    // Route::get('/edit2',function(){
    //     return view('adminmanagerelayservereditedit');
    // })->name('edit2');

    Route::post('/add','Auth\adminloadrelayserverdataController@addData')->name('add');
    // Route::get('/relayservermanagement',function(){
    // 	return view('adminmanagerelayserver');
    // });


    //Admin accept/reject user request permission 
    Route::get('/admincheckuserrequestpermission','Auth\adminsendstatusrequesttouserController@showData');
    Route::get('/accept/{request_id}','Auth\adminsendstatusrequesttouserController@acceptData')->name('accept');
    Route::get('/reject/{request_id}','Auth\adminsendstatusrequesttouserController@rejectData')->name('reject');
    //Route::get('/admincheckuserrequestpermission','Auth\loaduserrequestpermissionlistController@userrequestlist');
    Route::get('/acceptall','Auth\adminsendstatusrequesttouserController@acceptallData')->name('acceptall');

    Route::get('/getdatachange/{request_id}','Auth\adminsendstatusrequesttouserController@getdatachange')->name('getdatachange');
    Route::post('/change','Auth\adminsendstatusrequesttouserController@updateData')->name('change');






//test Controller to edit update html table data from database
// Route::get('/show','Auth\ControllerTest@showData');
// Route::get('/edit/{request_id}','Auth\ControllerTest@editData')->name('edit');
// Route::get('/update/{request_id}','Auth\ControllerTest@updateData')->name('update');
//Route::post('/update','Auth\Controller@updateData')->name('update');


//test get data name alpermission permission used
Route::get('/getname','Auth\adminsendstatusrequesttouserController@getNamePerallPeruseData');







