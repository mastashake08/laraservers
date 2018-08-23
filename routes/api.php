<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('check-domain','DomainController@checkDomain');
Route::get('check-prices','DomainController@checkPrice');
Route::middleware('auth:api')->post('buy','DomainController@buy');
Route::middleware('auth:api')->resource('/domain','DomainController');
Route::middleware('auth:api')->resource('/server','ServerController');

Route::middleware('auth:api')->resource('/key','KeyController');
Route::middleware('auth:api')->post('add-email','DomainController@addEmail');
Route::middleware('auth:api')->post('add-record','DomainController@addRecord');
Route::middleware('auth:api')->post('/add-key/{keyId}/{serverId}','KeyController@addKeyToServer');
Route::middleware('auth:api')->post('/update-billing',function(Request $request){
  \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
  $stripeToken = \Stripe\Token::create(array(
  "card" => array(
    "number" => $request->input('card.number'),
    "exp_month" => $request->input('card.month'),
    "exp_year" => $request->input('card.year'),
    "cvc" => $request->input('card.cvv')
  )
));
if($request->user()->subscribed('main')){
  $request->user()->updateCard($stripeToken->id);
}
else{
  $request->user()->newSubscription('main', env('STRIPE_FREE_ID'))->create($stripeToken->id);
}
  return response()->json($request->user()->card_last_four);
});
