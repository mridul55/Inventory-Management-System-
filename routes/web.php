<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\BlogCategoryController;

// Route::get('/', function () {
//     return view('frontend.index');
// });
// Admin Home Slide  
//Route::middleware(['web'])->group(function () {
    Route::controller(HomeSliderController::class)->group(function(){ 
        Route::get('/', 'HomeMain')->name('home');
        Route::get('/home/slide', 'HomeSlider')->name('home.slide');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider'); 
    });
//}); 
//Admin All Route
Route::middleware(['auth'])->group(function () {
        Route::controller(AdminController::class)->group(function(){ 
            Route::get('/admin/logout', 'destroy')->name('admin.logout');
            Route::get('/admin/profile', 'profile')->name('admin.profile');
            Route::get('/edit/profile', 'Editprofile')->name('edit.profile');
            Route::post('/store/profile', 'Storeprofile')->name('store.profile');
            Route::get('/change/password', 'ChangePassword')->name('change.password');
            Route::post('/update/password', 'UpdatePassword')->name('update.password');
        });      
    //Admin About Page All Route
        Route::controller(AboutController::class)->group(function(){  
            Route::get('/about/page', 'AboutPage')->name('about.page');
            Route::post('/about/update', 'AboutUpdate')->name('about.update');
            Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
            Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
            Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
            Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
            Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
            Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');   
        });   
    //  Portfolio All Route 
        Route::controller(PortfolioController::class)->group(function(){   
            Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
            Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
            Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
            Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
            Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
            Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
            Route::get('/potfolio/details/{id}', 'PortfolioDetails')->name('potfolio.details');
           
        });
    // Blog Category  
        Route::controller(BlogCategoryController::class)->group(function(){   
            Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
            Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
            Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
            Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
            Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
            Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
        });
    // Blog All Route
        Route::controller(BlogController::class)->group(function(){  
            Route::get('/all/blog', 'AllBlog')->name('all.blog');
            Route::get('/add/blog', 'AddBlog')->name('add.blog');
            Route::post('/store/blog', 'StoreBlog')->name('store.blog');
            Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
            Route::post('/update/blog/{id}', 'UpdateBlog')->name('update.blog');
            Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
            Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
            Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');
           
        });
    // Footer All Route 
        Route::controller(FooterController::class)->group(function(){  
            Route::get('/all/footer', 'AllFooter')->name('all.footer');
            Route::post('/update/footer/{id}', 'UpdateFooter')->name('update.footer'); 
        });
    // Contact All route 
        Route::controller(ContactController::class)->group(function(){  
            Route::post('/store/message', 'StoreMessage')->name('store.message');
            Route::get('/contact/message', 'ContactMessage')->name('contact.message');
            Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');   
        });
    //Test Page
        Route::controller(TestController::class)->group(function(){
            Route::get('/all/test','TestPage')->name('all.test');
            Route::get('/add/test','AddTestPage')->name('add.test');
            Route::post('/store/test/page','StorePage')->name('store.test.page');
            Route::get('/edit/test/{id}','EditTestPage')->name('edit.test');
            Route::post('/update/test/page/{id}','updateTestPage')->name('update.test.page');
            Route::get('/delete/test/{id}','DeleteTestPage')->name('delete.test');
        });
});
//FrondEnd Route
        Route::get('/about', [AboutController::class,'HomeAbout'])->name('home.about');
        Route::get('/blog', [BlogController::class,'HomeBlog'])->name('home.blog');
        Route::get('/contact',[ContactController::class,'Contact'] )->name('contact.me');
        Route::get('/portfolio',[PortfolioController::class,'HomePortfolio'] )->name('home.portfolio');


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
