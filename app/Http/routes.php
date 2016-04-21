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
/*
Wrap all routes in the web middleware to have session state and Cross-Site Request Forgery Protection
 */


Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/home', 'MasterController@showhome');

    Route::get('/howto', 'MasterController@showhotoregister');

    Route::get('/dbtest', [
        'uses'=>'CustomerController@showrestaurant',
        'as'=>'dbtest'
        ]);

	//Home
    Route::get('/', [
        'uses'=>'MasterController@showhome',
        'as'=>'homelink'
        ]);

	//Login pressed

    Route::post('/validcustomerlogin',[
        'uses'=>'CustomerController@validatecustomerlogin',
        'as'=>'validcustomerloginlink'
        ]);

    Route::post('/searchrestaurants',[
        'uses'=>'CustomerController@searchrestaurants',
        'as'=>'searchrestaurants'
        ]);

	//Login pages

    Route::get('/loginCust', [
        'uses'=>'LoginController@showcustomerlogin',
        'as'=>'logincust'
        ]);

    Route::get('/password/reset',[
       'uses'=>'MasterController@passwordreset',
       'as'=>'passwordreset'
       ]);

    Route::get('/register',[
        'uses'=>'RegisterController@register',
        'as'=>'registerlink'
        ]);

    Route::get('/customerregister',[
        'uses'=>'RegisterController@showcustomerregister',
        'as'=>'registercustomer'
        ]);

    Route::get('/restaurantregister',[
        'uses'=>'RegisterController@showrestaurantregister',
        'as'=>'registerrestaurant'
        ]);

    Route::get('/restaurantregisterinfo',[
        'uses'=>'RegisterController@showrestaurantregisterinfo',
        'as'=>'registerrestaurantinfo'
        ]);

    //Error page
    Route::get('/error' ,[
        'uses'=>'MasterController@error',
        'as'=>'error'
        ]);

	//Customer pages
    Route::post('/customerupdateinfo',[
        'uses'=>'CustomerController@updateinfo',
        'as'=>'customerupdateinfo',
        ]);

    Route::get('/customeroverview',[
        'uses'=>'CustomerController@showcustomeroverview',
        'as'=>'customeroverviewlink',
        ]);

    Route::get('/sortfavouties',[
        'uses'=>'CustomerController@sortbyfavourites',
        'as'=>'sortbyfavourites'
        ]);

    Route::get('/sortalphabetically',[
        'uses'=>'CustomerController@sortrestaurantlistalphabetically',
        'as'=>'sortalphabetically'
        ]);

    Route::get('/order/confirmed/{order_id}',[
        'uses'=>'CustomerController@orderconfirmandnotify',
        'as'=>'orderconfirmlink',
        ]);

    Route::get('/menu/{restaurant}',[
        'uses'=>'CustomerController@showcustomermenu',
        'as'=>'customermenuoverviewlink'
        ]);

    Route::get('/options/{item}',[
        'uses'=>'CustomerController@itemOptions',
        'as'=>'menuitemoptions'
        ]);

    Route::get('/customerconfirmation',[
        'uses'=>'CustomerController@showcustomerconfirmation',
        'as'=>'customerconfirmationlink'
        ]);

    Route::get('/submitifconfirmed',[
        'uses'=>'CustomerController@checkConfirmed',
        'as'=>'submitorderlink'
        ]);

    Route::get('/submitnotconfirmed',[
        'uses'=>'CustomerController@notConfirmed',
        'as'=>'notconfirmed'
        ]);

    Route::get('/removeitem/{item}/choice/{choice}',[
        'uses'=>'CustomerController@removeItem',
        'as'=>'removeitemlink'
        ]);

    Route::get('/cpeditaddress',[
        'uses'=>'CustomerController@showcpeditaddress',
        'as'=>'cpeditaddresslink'
        ]);

    Route::get('/cpeditorders',[
        'uses'=>'CustomerController@showcpeditorders',
        'as'=>'showcpeditorderslink'
        ]);

    Route::get('/customerprofile',[
        'uses'=>'CustomerController@showcustomerprofile',
        'as'=>'customerprofilelink'
        ]);

    Route::get('/customerprofileresend',[
       'uses'=>'CustomerController@userprofileresendfunction',
       'as'=>'customerprofileresend'
        ]);

    Route::get('/addtofavourites/{restaurant}',[
        'uses'=>'CustomerController@addcustomerfavourite',
        'as'=>'addtofavourites'
        ]);

    Route::get('/removefromfavourites/{restaurant}',[
        'uses'=>'CustomerController@deletecustomerfavourite',
        'as'=>'removefromfavourites'
        ]);

    Route::post('/feedback/submit',[
        'uses'=>'CustomerController@addfeedback',
        'as'=>'submitfeedback',
        ]);

    Route::get('/feedback/{rest_id}',[

        'uses'=>'CustomerController@showfeedbackpage',
        'as'=>'showfeedback'
        ]);

    Route::post('/cart',[
        'uses'=>'CustomerController@addItem',
        'as'=>'addtocart'
        ]);

    Route::get('/hours/{restaurant}',[
        'uses'=>'CustomerController@restHours',
        'as'=>'restHours'
        ]);

	//Restuarant pages

    Route::get('/toggleshowingreview/{reviewer}',[
        'uses'=>'RestaurantController@toggleshowingreview',
        'as'=>'toggleshowingreview',
        ]);

    Route::get('/deletereview/{reviewer}',[
        'uses'=>'RestaurantController@deletereview',
        'as'=>'deletereview',
        ]);

    Route::get('/viewreviews',[
        'uses'=>'RestaurantController@viewreviews',
        'as'=>'viewreviews',
        ]);


    Route::get('/sethours', 'RestaurantController@showsethours');

    Route::post('/reordercategories',[
        'uses'=>'RestaurantController@savecategoryorder',
        'as'=>'reordercategories',
        ]);

    Route::get('/closerestaurant/{restaurant}',[
        'uses'=>'RestaurantController@closerestaurant',
        'as'=>'closerestaurant',
        ]);

    Route::post('/edititem/{item}',[
        'uses'=>'RestaurantController@edititem',
        'as'=>'edititem',
        ]);

    Route::get('/deletecategory/{category}',[
        'uses'=>'RestaurantController@deletecategory',
        'as'=>'deletecategory',
        ]);

    Route::get('/deleteitem/{item}',[
        'uses'=>'RestaurantController@deleteitem',
        'as'=>'deleteitem',
        ]);

    Route::post('/additem',[
        'uses'=>'RestaurantController@additemtomenu',
        'as'=>'additem',
        ]);

    Route::post('/addcategory',[
        'uses'=>'RestaurantController@addcategory',
        'as'=>'addcategory',
        ]);

    Route::post('/sethours',[
        'uses'=>'RestaurantController@storehours',
        'as'=>'restaurantsethours',
        ]);

    Route::post('/restaurantprofilehours',[
        'uses'=>'RestaurantController@updatehours',
        'as'=>'restaurantupdatehours',
        ]);

    Route::get('/restaurantprofileresend',[
        'uses'=>'RestaurantController@userprofileresendfunction',
       'as'=>'restaurantprofileresend'
       ]);

    Route::post('/restaurantprofilerestrictions',[
        'uses'=>'RestaurantController@updaterestrictions',
        'as'=>'restaurantupdaterestrictions',
    ]);

    Route::post('/restaurantprofile',[
        'uses'=>'RestaurantController@updateinfo',
        'as'=>'restaurantupdateinfo',
        ]);

    Route::get('/restauranthistory',[
        'uses'=>'RestaurantController@showrestauranthistory',
        'as'=>'restauranthistorylink'
        ]);

    Route::get('/restaurantmadmin',[
        'uses'=>'RestaurantController@showrestaurantmadmin',
        'as'=>'restaurantmadminlink'
        ]);

    Route::get('/restaurantmedit',[
        'uses'=>'RestaurantController@showrestaurantmedit',
        'as'=>'restaurantmeditlink'
        ]);

    Route::get('/restaurantmoverview',[
        'uses'=>'RestaurantController@showrestaurantmoverview',
        'as'=>'restaurantmoverviewlink'
        ]);

    Route::get('/restaurantoverview',[
        'uses'=>'RestaurantController@showrestaurantoverview',
        'as'=>'restaurantoverviewlink'
        ]);

    Route::get('/restaurantprofile',[
        'uses'=>'RestaurantController@showrestaurantprofile',
        'as'=>'restaurantprofilelink'
        ]);

    Route::get('/restaurantprofilerestrictions',[
        'uses'=>'RestaurantController@showrestaurantrestrictions',
        'as'=>'restaurantprofilerestrictionslink'
        ]);

    Route::get('/restaurantprofilehours',[
        'uses'=>'RestaurantController@showrestaurantprofilehours',
        'as'=>'restaurantprofilehourslink'
        ]);

    Route::get('/registerconfirm',[
        'uses'=>'RegisterController@showregisterconfirm',
        'as'=>'registerconfirmlink'
        ]);

    Route::get('register/verify/{confirmationCode}', [
      'uses' => 'RegisterController@confirm',
      'as' => 'confirmation_path'
      ]);

    Route::get('/forgotpassword',[
        'uses'=>'AuthController@showforgotpassword',
        'as'=>'forgotpasswordlink'
        ]);

    Route::get('/finishorder/{order}',[
        'uses'=>'RestaurantController@finishorder',
        'as'=>'finishorder'
        ]);

    Route::post('/createorder',[ 
        'uses'=>'CustomerController@createOrder',
        'as'=>'createorder',
        ]);

    Route::get('/orderdetails/{order}',[
        'uses'=>'RestaurantController@showDetails',
        'as'=>'showdetails'
        ]);

    Route::get('/test', function() 
    {
        return view('debugging');
    });

    Route::get('/cancelorder/{order}',[
        'uses'=>'RestaurantController@cancelorder',
        'as'=>'cancelorder'
        ]);

    
});
