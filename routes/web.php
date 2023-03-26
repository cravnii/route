<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{name}/{age}', function($name,$age){
    echo  "welcome  " .$name. " my age is " .$age;
   });

   Route::get('/home' , [Home::class, 'index']);

   Route::get('/' , [Home::class, 'index'])->name('callhome');
   Route::get('/raghad',function(){
    echo "welcome raghad from web file route";
   })->name('callraghad');


Route::get('/raghad/{name}/{age}', function($name,$age){
 return "welcome  " .$name. " age " .$age;
});

Route::get('/raghad/{name}/{age}', function($name,$age){
    return "welcome  " .$name. " age " .$age;
   })->where('age', '.*');

Route::get('/raghad/{name}/{age}', function($name,$age){
    return "welcome  " .$name. " age " .$age;
   })-> where(['age' => '[0-9]+' , 'name' => '[a-z]+']);

   Route::get('/raghad/{name}/{age}', function($name,$age){
    return "welcome  " .$name. " age " .$age;
   })-> whereNumber('age') ->whereAlpha('name');


   Route::get('/raghad/{name}/{age}', function($name,$age){
    return "welcome  " .$name. " age " .$age;
   })-> whereAlphaNumeric('age') ->whereAlphaNumeric('name');


   Route::get('/search/{search}', function($search){
    return $search;
   }) ->where ('search' , '.*');


   Route::get('/raghad', function(){
    echo "welcome raghad";
   });
   

   Route::redirect('/yousef', '/raghad');


   Route::controller(Home::class)->group(function(){
    Route::get('/index','index');
    Route::get('/show','show');
  });

  Route::prefix('admin')->group(function(){
    Route::get('raghad' , function(){
        return "roro 1";
      });
    
      Route::get('yousef' , function(){
        return "yoyo 1";
      });
    
      Route::get('albalawi' , function(){
        return "bobo 1";
      });
  });
  


   Route::middleware(['midd1','midd2'])->group(function(){
     Route::get('/test1', [Home::class, 'index'])->name('callhome');
     Route::get('/test2', [Home::class, 'index'])->name('callhome');
   });





