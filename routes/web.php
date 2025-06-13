<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\BackViewController;
use App\Http\Controllers\HomepageController;



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
    return view('auth.login');
});

// =================== laravel socialite ===========================//

// Route::get('/google/login',[UserController::class,'loginRedirect'])->name('login.google');

// Route::get('/login/google/callback',[UserController::class,'loginCallback']);

//==================// Location //==================//
Route::get('/location', [LocationController::class, 'index'])->name('location');
Route::get('/get-districts', [LocationController::class, 'getDistricts'])->name('get_districts');
Route::get('/get-upazila', [LocationController::class, 'getUpazilas'])->name('get_upazila');
Route::get('/get-thana', [LocationController::class, 'getThanas'])->name('get_thana');


//____________________// START \\_________________//
Route::middleware([ 'auth:sanctum','verified', config('jetstream.auth_session')])->group(function () {
    Route::get('/dashboard', [BackViewController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/coming_soon', [BackViewController::class, 'coming_soon'])->name('coming_soon')->middleware('auth');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});

Route::middleware([ 'auth:sanctum','verified', config('jetstream.auth_session')])->group(function () {

    // ========================================= home page route ==========================================//

      Route::get('/homepage', [HomepageController::class, 'homepageindex'])->name('homepage');
      Route::post('/store_homepage', [HomepageController::class, 'homepagestore'])->name('store_homepage');
      Route::get('/edit_homepage', [HomepageController::class, 'editHomepage'])->name('edit_homepage');
      Route::post('/update_homepage', [HomepageController::class, 'updateHomepage'])->name('update_homepage');

    // ============================================ about section =====================================================//
         Route::get('/aboutsection', [HomepageController::class, 'aboutsectionindex'])->name('aboutsection');
         Route::post('/store_aboutsection', [HomepageController::class, 'storeAboutsection'])->name('store_aboutsection');
         Route::get('/edit_aboutpage', [HomepageController::class, 'editAboutpage'])->name('edit_aboutpage');
         Route::post('/update_aboutsection', [HomepageController::class, 'updateAboutsection'])->name('update_aboutsection');



    //================================================= Blog route ==========================================//
         Route::get('/blogsection', [HomepageController::class, 'blogsectionindex'])->name('blogsection');
         Route::post('/store_blogsection', [HomepageController::class, 'storeBlogsection'])->name('store_blogsection');
         Route::get('/edit_blogpage', [HomepageController::class, 'editBlogpage'])->name('edit_blogpage');
         Route::post('/update_blogsection', [HomepageController::class, 'updateBlogsection'])->name('update_blogsection');

    //================================================= Education route ==========================================//
         Route::get('/educationsection', [HomepageController::class, 'educationsectionindex'])->name('educationsection');
         Route::post('/store_edusection', [HomepageController::class, 'storeEdusection'])->name('store_edusection');
         Route::get('/edit_edupage', [HomepageController::class, 'editEdupage'])->name('edit_edupage');
         Route::post('/update_edusection', [HomepageController::class, 'updateEdusection'])->name('update_edusection');

    //================================================= personal info route ===================================================//
         Route::get('/personalinfo', [HomepageController::class, 'personalinfoindex'])->name('personalinfo');
         Route::post('/store_personalinfo', [HomepageController::class, 'storePersonalinfo'])->name('store_personalinfo');
         Route::get('/edit_personalpage', [HomepageController::class, 'editPersonalpage'])->name('edit_personalpage');
         Route::post('/update_personalinfo', [HomepageController::class, 'updatePersonalinfo'])->name('update_personalinfo');


    //================================================= protfolio route ===================================================//

         Route::get('/protfolio', [HomepageController::class, 'protfolioindex'])->name('protfolio');
         Route::post('/store_protfoliosection', [HomepageController::class, 'storeProtfoliosection'])->name('store_protfoliosection');
         Route::get('/edit_protfoliopage', [HomepageController::class, 'editProtfoliopage'])->name('edit_protfoliopage');
         Route::post('/update_protfoliosection', [HomepageController::class, 'updateProtfoliosection'])->name('update_protfoliosection');

     //================================================= service route ===================================================//

         Route::get('/service', [HomepageController::class, 'serviceindex'])->name('service');
         Route::post('/store_servicesection', [HomepageController::class, 'storeServicesection'])->name('store_servicesection');
         Route::get('/edit_servicepage', [HomepageController::class, 'editServicepage'])->name('edit_servicepage');
         Route::post('/update_servicesection', [HomepageController::class, 'updateServicesection'])->name('update_servicesection');

          //================================================= service route ===================================================//

         Route::get('/skill', [HomepageController::class, 'skillindex'])->name('skill');
         Route::post('/store_skillsection', [HomepageController::class, 'storeSkillsection'])->name('store_skillsection');
         Route::get('/edit_skillepage', [HomepageController::class, 'editSkillepage'])->name('edit_skillepage');
         Route::post('/update_skillsection', [HomepageController::class, 'updateSkillsection'])->name('update_skillsection');


        //================================================= testimonia route ===================================================//

         Route::get('/testimonia', [HomepageController::class, 'testimoniaindex'])->name('testimonia');
         Route::post('/store_testimoniumsection', [HomepageController::class, 'storeTestimoniumsection'])->name('store_testimoniumsection');
         Route::get('/edit_testimoniumpage', [HomepageController::class, 'editTestimoniumpage'])->name('edit_testimoniumpage');
         Route::post('/update_testimoniumsection', [HomepageController::class, 'updateTestimoniumsection'])->name('update_testimoniumsection');

        //================================================= testimonia route ===================================================//

         Route::get('/exprience', [HomepageController::class, 'exprienceindex'])->name('exprience');
         Route::post('/store_expriencesection', [HomepageController::class, 'storeExpriencesection'])->name('store_expriencesection');
         Route::get('/edit_workingpage', [HomepageController::class, 'editWorkingpage'])->name('edit_workingpage');
         Route::post('/update_expriencesection', [HomepageController::class, 'updateExpriencesection'])->name('update_expriencesection');

        //================================================= testimonia route ===================================================//

         Route::get('/project', [HomepageController::class, 'projectindex'])->name('project');
         Route::post('/store_projectsection', [HomepageController::class, 'storeProjectsection'])->name('store_projectsection');
         Route::get('/edit_projectpage', [HomepageController::class, 'editProjectpage'])->name('edit_projectpage');
         Route::post('/update_projectsection', [HomepageController::class, 'updateProjectsection'])->name('update_projectsection');




});


//__________________________ TEST AJAX MODEL_____________________________//
use App\Http\Controllers\TodoController;
Route::get('/todos', [TodoController::class, 'index']);
Route::get('todos/{todo}/edit', [TodoController::class, 'edit']);
Route::post('todos/store', [TodoController::class, 'store']);
Route::delete('todos/destroy/{todo}', [TodoController::class, 'destroy']);

// Route::get('get-procedure', function () {$id = 1; $post = DB::select("CALL get_users_by_id(".$id.")");dd($post);});
