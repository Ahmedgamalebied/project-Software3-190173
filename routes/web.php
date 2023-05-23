<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded /y the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' =>'doctor', 'middleware'=>'guest:doctor'], function(){
    Route::get('getlogin',[DoctorController::class,'showLoginForm'])->name('doctor.login');
    Route::post('login',[DoctorController::class,'login'])->name('doctor.login.submit');
    Route::get('getregister',[DoctorController::class,'register_doctor'])->name('doctor.register');
    Route::post('storeregister',[DoctorController::class,'create_doctor'])->name('doctor.create');




    // Route::get('/',[SubjectController::class,'index'])->name('index');


});

Route::group(['prefix' =>'doctor', 'middleware'=>'auth:doctor'], function(){
    

    Route::get('/',[SubjectController::class,'index'])->name('index.doctor');
    Route::get('logout',[DoctorController::class,'logout'])->name('index.logout');

    Route::get('subject',[DoctorController::class,'subject'])->name('subject.index');


});

Route::get('dashboard',[SubjectController::class,'dashboard'])->name('dashboard');

Route::group(['prefix' =>'student', 'middleware'=>'auth'], function(){
    Route::get('/',[StudentController::class,'index'])->name('index.student');
    Route::get('subject',[StudentController::class,'subject'])->name('student.index');
    Route::get('logout',[StudentController::class,'logout'])->name('student.logout');


});
Route::get('create-subject',[SubjectController::class,'create_subject'])->name('create.subject');
Route::get('create-department',[SubjectController::class,'create_department'])->name('create.department');
Route::post('store-subject',[SubjectController::class,'store_subject'])->name('store.subject');
Route::post('store-department',[DepartmentController::class,'store_department'])->name('store.department');
Route::delete('delete-subject/{id}',[SubjectController::class,'delete_subject'])->name('delete.subject');
Route::get('edit-subject/{id}',[SubjectController::class,'edit_subject'])->name('edit.subject');
Route::post('update-subject/{id}',[SubjectController::class,'update_subject'])->name('update.subject');





// Route::group(['prefix' =>'student', 'middleware'=>'guest:student'], function(){
//     Route::get('getlogin',[StudentController::class,'showLoginForm'])->name('student.login');
//     Route::post('login',[StudentController::class,'login'])->name('student.login.submit');


//     // Route::get('/',[SubjectController::class,'index'])->name('index');


// });
// Route::group(['prefix' =>'student', 'middleware'=>'auth:student'], function(){
    

//     Route::get('/',[SubjectController::class,'index_student'])->name('index.doctor');


// });
















// Route::get('docs',[SubjectController::class,'docs'])->name('docs');


// Route::group(['prefix' =>'student', 'middleware'=>'auth'], function(){
    

//     Route::get('/',[SubjectController::class,'index'])->name('index.student');


// });







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
