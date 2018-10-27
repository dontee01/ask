<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    $t = (strtotime('2018-09-29 12:06:50') - strtotime('2018-09-29 11:06:50'));
    $t = round($t/60);
	echo $t;
    // return view('test');
});


// Route::get('/', 'UserController@index');

Route::get('/login', 'UserController@login_page');

Route::post('/login', 'UserController@login');

Route::post('/notification-subscribe', 'UserController@email_subscriptions');


Route::get('/register/{ref?}', 'UserController@register_page');

Route::post('/register', 'UserController@register');



Route::get('/forgot', 'UserController@forgot_page');

Route::post('/forgot', 'UserController@forgot');

Route::get('/reset/activate/{token}', 'UserController@reset_page');

Route::post('/reset-update', 'UserController@reset');



Route::get('/logout', 'UserController@logout');




///////////////////// PAGES //////////////////////

Route::get('/', 'PagesController@home');

Route::get('/ask', 'PagesController@ask');

Route::get('/questions', 'PagesController@questions');

Route::get('/question/{number}/{title}', 'PagesController@question_details');

Route::get('/how-to', 'PagesController@how_to');

Route::get('/user/{username}', 'PagesController@user_profile');

Route::get('/profile', 'PagesController@my_profile');


/////////////////////////////////////////////


//Route::get('/account', 'ExploreController@account');

Route::get('/account/verify/{username}', 'UserController@send_verification_email');

Route::get('/account/activate/{token}', 'UserController@verify_email');

Route::get('/account/change-password', 'ExploreController@change_password_page');

Route::post('/account/change-password', 'ExploreController@change_password');


Route::post('/ask', 'ExploreController@ask');

Route::post('/answer/{number}', 'ExploreController@answer');





// //////////////// CONSOLE ////////////////////////////////


Route::group(['prefix' => 'console', 'namespace' => 'Console'], function () {
    Route::post('/channel/add', 'ConsoleController@addChannel');

    Route::get('/statistics', 'ConsoleController@statistics');

    Route::get('/referral-contests', 'ContestController@referral_contests');
    
    Route::get('/referral-contest/display/{id}/{display}', 'ContestController@show_contest');
    
    Route::post('/set-referral-contest', 'ContestController@set_referral_contest');
    
    Route::post('/edit-referral-contest', 'ContestController@edit_referral_contest');
    
    Route::get('/edit-referral-contest/{id}', 'ContestController@edit_referral_contest_page');
    
    Route::get('/referral-contest/results/{id}', 'ContestController@results_referral_contest');

});
////////////////////////////////////////////////////////




// //////////////////////CRON JOB(SCHEDULER)////////////////////////////////

Route::get('/sys/worker-points', 'BotController@worker_process_points');

Route::get('/sys/worker-move', 'BotController@worker_move');

Route::get('/sys/worker-pair', 'BotController@worker_pair');

Route::get('/sys/worker-postponed', 'BotController@worker_process_postponed');

Route::get('/sys/worker-refund', 'BotController@worker_process_refund');

Route::get('/sys/worker-unmatched', 'BotController@worker_process_unmatched');

Route::get('/sys/worker-bookings', 'BotController@worker_process_bookings');
