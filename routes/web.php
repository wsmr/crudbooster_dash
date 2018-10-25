<?php
use Illuminate\Support\Facades\Input;
use App\Table;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function(){
    return view('home');
});

Route::get('http://localhost:8000/resources/views/data.tsv', function(){
    return view('data.tsv');
});


Route::get('table', 'TablesController@index');

Route::get('geochart', 'FootballFansController@geoChart');


Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = Table::where('objective','LIKE','%'.$q.'%')->orWhere('country','LIKE','%'.$q.'%')->orWhere('action_item','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('search')->withDetails($user)->withQuery ( $q );
    else 
        return view ('search')->withMessage('No Details found. Try to search again !');
});