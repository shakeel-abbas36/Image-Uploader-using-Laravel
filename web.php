<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FormController;
use App\Http\Middleware\CheckMiddleWare;
use App\Http\Middleware\CountryCheck;
use App\Http\Middleware\ShakeelData;
use App\Http\Controllers\DbController;
use App\Http\Controllers\AgainDbController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\DifferentRoutes;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PersonalDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('formuser','form')->middleware([ShakeelData::class]);
// Route::get('locals',[AboutController::class,'local']);
Route::post('UserName', [FormController::class,'forform']);
Route::view('forms','form');
Route::view('home','home');
// Route::view('home','home')->middleware('check1');

Route::view('abouts','abouts')->middleware('check1');
    Route::view('contact','contact')->middleware('check2');
    Route::view('comrade','comrade')->middleware([CountryCheck::class]);
    ;
    // Route::view('home','home')->middleware(CheckMiddleWare::class);
    Route::view('home','home')->middleware([CheckMiddleWare::class,CountryCheck::class]);

// Route::middleware('check1')->group(function(){
//     Route::view('abouts','abouts');
//     Route::view('contact','contact');
//     Route::view('comrade','comrade');
//     Route::view('home','home');
// });
Route::get('users',[DbController::class,'users']);
Route::get('person',[AgainDbController::class,'person']);
Route::get('students',[StudentController::class,'getstudent']);
Route::get('teachers',[TeacherController::class,'teachers']);
Route::get('system',[SystemController::class,'queries']);

// Route::get('get',[DifferentRoutes::class,'get']);
// Route::post('get',[DifferentRoutes::class,'post']);
// Route::put('get',[DifferentRoutes::class,'put']);
// Route::delete('get',[DifferentRoutes::class,'delete']);
// Route::any('get',[DifferentRoutes::class,'any']);
   Route::match(['get','post'],'get',[DifferentRoutes::class,'group1']);
   Route::match(['put','delete'],'get', [DifferentRoutes::class,'group2']);


    Route::view('routes','routes');
    // Route::get('routes/{lang}',function($lang){
    //     App::setLocale($lang);
    //     return view('routes');
    // });

    Route::view('login','login');
    Route::view('profile','profile');
    Route::post('login',[LoginController::class,'login']);
    Route::get('logout',[LoginController::class,'logout']);
    Route::view('upload','upload');
    Route::post('upload',[UploadController::class,'upload']);
    Route::view('local','localization');
    Route::view('abouts','abouts')->middleware('check1');
    // Route::get('about/{lang}',function($lang){
    //     App::setLocale($lang);
    //     return view('abouts')->middleware('check1');
    // });
    

    Route::middleware('setlang')->group(function(){
      
         Route::get('setlang/{lang}',function($lang){
            // dd($lang);
        session()->put('lang',$lang);
             return redirect('local');
    });
    });
     Route::post('college',[CollegeController::class,'col']);
     Route::get('list',[CollegeController::class,'list']);
     Route::get('delete/{id}',[CollegeController::class,'delete']);
     Route::get('edit/{id}',[CollegeController::class,'edit']);
     Route::put('edit-college/{id}',[CollegeController::class,'editCollege']);
     Route::get('search',[CollegeController::class,'search']);
     Route::post('delete-multi',[CollegeController::class,'deleteMultiple']);
     Route::view('college','college');

     Route::view('note','note');
     Route::post('save-note',[NoteController::class,'note']);
     Route::get('list-note',[NoteController::class,'listnote']);
     Route::get('delete/{id}',[NoteController::class,'delete']);

     Route::view('uploads','uploadimages');
     Route::post('upload',[ImageController::class,'upload']);
     Route::get('list',[ImageController::class,'list']);

    //  Route::view('personaldata','personaldata');
    //  Route::get('personals',[PersonalDataController::class,'PersonalData']);
   
    