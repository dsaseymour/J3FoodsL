<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
    'uses'=>'MasterController@showhome',
    'as'=>'homelink'
    ]);

    Route::get('/register/{user?}',[
    'uses'=>'MasterController@register',
    'as'=>'registerlink'
	]);

    Route::get('/customerlogin',[
    'uses'=>'MasterController@showcustomerlogin',
    'as'=>'customerloginlink'
    ]);

    Route::post('/validcustomerlogin',[
    'uses'=>'AuthController@validatecustomerlogin',
    'as'=>'validcustomerloginlink'
    ]);


    Route::get('/customerregister',[
    'uses'=>'MasterController@showcustomerregister',
    'as'=>'customerregisterlink'
    ]);

    Route::get('/customeroverview',[
    'uses'=>'MasterController@showcustomeroverview',
    'as'=>'customeroverviewlink'
    ]);

    Route::get('/customermenuoverview',[
    'uses'=>'MasterController@showcustomermenuoverview',
    'as'=>'customermenuoverviewlink'
    ]);

    Route::get('/customerconfirmation',[
    'uses'=>'MasterController@showcustomerconfirmation',
    'as'=>'customerconfirmationlink'
    ]);

    Route::get('/cpeditaddress',[
    'uses'=>'MasterController@showcpeditaddress',
    'as'=>'cpeditaddresslink'
    ]);

    Route::get('/cpeditorders',[
    'uses'=>'MasterController@showcpeditorders',
    'as'=>'showcpeditorderslink'
    ]);

    Route::get('/customerprofile',[
    'uses'=>'MasterController@showcustomerprofile',
    'as'=>'customerprofilelink'
    ]);

    Route::get('/restauranthistory',[
    'uses'=>'MasterController@showrestauranthistory',
    'as'=>'restauranthistorylink'
    ]);

        Route::get('/restaurantlogin',[
        'uses'=>'MasterController@showrestaurantlogin',
        'as'=>'restaurantloginlink'
        ]);

        Route::get('/restaurantmadmin',[
        'uses'=>'MasterController@showrestaurantmadmin',
        'as'=>'restaurantmadminlink'
        ]);

        Route::get('/restaurantmedit',[
        'uses'=>'MasterController@showrestaurantmedit',
        'as'=>'restaurantmeditlink'
        ]);

        Route::get('/restaurantmoverview',[
        'uses'=>'MasterController@showrestaurantmoverview',
        'as'=>'restaurantmoverviewlink'
        ]);

        Route::get('/restaurantoverview',[
        'uses'=>'MasterController@showrestaurantoverview',
        'as'=>'restaurantoverviewlink'
        ]);

        Route::get('/restaurantprofile',[
        'uses'=>'MasterController@showrestaurantprofile',
        'as'=>'restaurantprofilelink'
        ]);

        Route::get('/restaurantprofilerestrictions',[
        'uses'=>'MasterController@showrestaurantrestrictions',
        'as'=>'restaurantprofilerestrictionslink'
        ]);

        Route::get('/restaurantprofilehours',[
        'uses'=>'MasterController@showrestaurantprofilehours',
        'as'=>'restaurantprofilehourslink'
        ]);


        Route::get('/restaurantregister',[
        'uses'=>'MasterController@showrestaurantregister',
        'as'=>'restaurantregisterlink'
        ]);


        Route::get('/registerconfirm',[
        'uses'=>'MasterController@showregisterconfirm',
        'as'=>'registerconfirmlink'
        ]);

        Route::get('/forgotpassword',[
        'uses'=>'MasterController@showforgotpassword',
        'as'=>'forgotpasswordlink'
        ]);




//DEBUGGGING
Route::get('/test', function()
{
    return view('restaurantcontent.restaurant-profile-restrictions');
});


//DEBUGGING

	//Route::get('/login/{user}', 'AuthController@login');


});
