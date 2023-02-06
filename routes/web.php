<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;




Route::get('/', function () {
    return view('frontend.index');
});
//Admin All Route
Route::controller(AdminController::class)->group(function(){ 
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'Editprofile')->name('edit.profile');
    Route::post('/store/profile', 'Storeprofile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');

});
// Admin Home Slide  
Route::controller(HomeSliderController::class)->group(function(){  
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    
});
//Admin About Page All Route
Route::controller(AboutController::class)->group(function(){  
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/about/update', 'AboutUpdate')->name('about.update');
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');



 
   
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';