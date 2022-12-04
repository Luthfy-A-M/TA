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
//TA
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/nonactivated', 'NonactivatedController@index');
Route::post('/checkrequest','ClientController@checkrequest');//checkrequest
//notification
Route::get('/getnotification','NotificationController@getnotification');
Route::get('/getlinknotification/{notification_id}','NotificationController@getlinknotification');
//comment
Route::post('/postcomment/{strategy_id}', 'CommentController@postcomment');
Route::get('/getcomment/{strategy_id}','CommentController@getcomment');

Auth::routes();


Route::group(['middleware' => ['auth', 'checkRole:Client','checkActivate:aktif']], function ()
{
Route::get('/LandingClient', 'ClientController@index'); //Landing
Route::get('/strategylist','ClientController@showstrategylist'); //ViewStrategyCreated
Route::get('/strategy/{strategy_id}/details','ClientController@viewstrategydetails');//DeleteStrategy+SegmentBinded
Route::post('/strategy/{strategy_id}/adddata','ClientController@adddata');//adddatasimultaniously
Route::get('/strategy/{strategy_id}/dashboard','ClientController@viewdashboard');//viewdashboard
Route::post('/strategy/{strategy_id}/concept/{concept_id}/add','ClientController@adddataconcept');//adddataperconcept
Route::post('/strategy/{strategy_id}/data/{data_id}/edit','ClientController@editdata');//editdata
Route::get('/strategy/{strategy_id}/data/{data_id}/delete','ClientController@deletedata');//deletedata

//Wizard
//Strategy
Route::get('/wizard', 'ClientController@wizard');//create(new)Strategypage
Route::post('/wizard', 'ClientController@createstrategy');//CreateNewStrategyfunction(post)
Route::get('/wizard/{strategy_id}/define','ClientController@define');//viewcreatedstrategy(fromStrategyList)
Route::post('/wizard/{strategy_id}/define','ClientController@updatestrategy');//UpdateStrategyfunction(post)
Route::get('/wizard/{strategy_id}/delete','ClientController@deletestrategy');//DeleteStrategy+SegmentBinded

//Segment
Route::get('/wizard/{strategy_id}/segmenting','ClientController@segmenting');//viewSegmentingpage
Route::post('/wizard/{strategy_id}/segmenting','ClientController@createsegment');//createnewsegmentfunction(post)
Route::get('/wizard/segmenting/{segment_id}/delete','ClientController@deletesegment');//deleteSegment
Route::get('/wizard/conceptselecting/{segment_id}','ClientController@segmentconceptselection');//viewconceptselectiongpage
Route::post('/wizard/conceptselecting/{segment_id}','ClientController@segmentconceptselectionpost');//updateOrpostSegmentconceptselection
//conceptImplementation
Route::get('/wizard/conceptimplementation/{segment_id}','ClientController@segmentconceptimplementation');//viewconceptimplementationpage
Route::post('/wizard/conceptimplementation/{segment_id}','ClientController@segmentconceptimplementationcreate');//createconceptimplementation
Route::get('/wizard/conceptimplementation/{strategy_concept_id}/delete','ClientController@segmentconceptimplementationdelete');//deleteconceptimplementationpage
Route::post('/wizard/conceptimplementation/{segment_id}/edit','ClientController@segmentconceptimplementationedit');//createconceptimplementation




});
//data
Route::post('/createdata/{strategy_concept_id}','ClientController@createdata');//createconceptimplementation

Route::group(['middleware' => ['auth', 'checkRole:Facilitator','checkActivate:aktif']], function ()
{       
    Route::get('/LandingFacilitator', 'FacilitatorController@index');
    Route::get('/facilitator/showstrategylist', 'FacilitatorController@showstrategylist');
    Route::get('/facilitator/viewstrategydetails/{strategy_id}', 'FacilitatorController@viewstrategydetails');
    Route::get('/facilitator/strategy/{strategy_id}/dashboard','FacilitatorController@viewdashboard');
});

Route::group(['middleware' => ['auth', 'checkRole:Admin']], function ()
{
    Route::get('/LandingAdmin', 'AdminController@index');
    Route::get('/Admin/Waitinglist', 'AdminController@showwaitinglist');
    Route::get('/Admin/Activelist', 'AdminController@showactivelist');
    Route::get('/Admin/Nonactivelist', 'AdminController@shownonactivelist');
    Route::get('/Admin/{user_id}/activate', 'AdminController@activate');
    Route::get('/Admin/{user_id}/deactivate', 'AdminController@deactivate');
});

