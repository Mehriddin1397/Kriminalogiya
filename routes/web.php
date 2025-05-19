<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\PageController::class,'main'])->name('main');
Route::get('/contact',[\App\Http\Controllers\PageController::class,'contact'])->name('contact');


Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

Route::get('/verify-code', [\App\Http\Controllers\AuthController::class, 'showVerifyForm'])->name('verify.code.form');
Route::post('/verify-code', [\App\Http\Controllers\AuthController::class, 'verifyCode'])->name('verify.code');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [\App\Http\Controllers\AuthController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');




Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\PageController::class,'dashboard'])->name('dashboard');
    Route::resource('academia',\App\Http\Controllers\AcademiaController::class);
    Route::resource('bibliophilia',\App\Http\Controllers\BibliophiliaController::class);
    Route::resource('crimes',\App\Http\Controllers\CrimesController::class);
    Route::resource('institut',\App\Http\Controllers\InstitutController::class);
    Route::resource('journal',\App\Http\Controllers\JournalController::class);
    Route::resource('news',\App\Http\Controllers\NewsController::class);
    Route::resource('rahbariyat',\App\Http\Controllers\RahbariyatController::class);
    Route::resource('research',\App\Http\Controllers\ResearchController::class);
    Route::resource('scholars',\App\Http\Controllers\ScholarsController::class);
    Route::resource('contact',\App\Http\Controllers\ContactController::class);
    Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    Route::resource('partner',\App\Http\Controllers\PartnerController::class);
    Route::resource('expertise',\App\Http\Controllers\ExpertiseController::class);
    Route::resource('articles',\App\Http\Controllers\ArticlesController::class);


//    Route::get('/admin/projects/search', [\App\Http\Controllers\ProjectController::class, 'search'])->name('projects.search');
//
//    Route::get('/projects/{id}/file/{type}', [\App\Http\Controllers\PageController::class, 'showFile'])->name('projects.file');



});

Route::get('locale/{lang}', [\App\Http\Controllers\LocaleController::class, 'setLocale'])->name('setLocale');

Route::get('test',[\App\Http\Controllers\PageController::class,'test'])->name('test');


//Sahifalar

Route::get('categoryId/{id}',[\App\Http\Controllers\PageController::class,'categoryId'])->name('categoryId');
Route::get('category/show',[\App\Http\Controllers\PageController::class,'show'])->name('show');
Route::get('test',[\App\Http\Controllers\PageController::class,'test'])->name('test');
Route::get('boss',[\App\Http\Controllers\PageController::class,'boss'])->name('boss');

//search routes
Route::get('search',[\App\Http\Controllers\PageController::class,'search'])->name('search');
Route::get('article_show/{id}',[\App\Http\Controllers\SearchController::class,'article_show'])->name('article_show');
Route::get('scholar_show/{id}',[\App\Http\Controllers\SearchController::class,'scholar_show'])->name('scholar_show');
Route::get('research_show/{id}',[\App\Http\Controllers\SearchController::class,'research_show'])->name('research_show');
Route::get('bibliophilia_show/{id}',[\App\Http\Controllers\SearchController::class,'bibliophilia_show'])->name('bibliophilia_show');
Route::get('news_show/{id}',[\App\Http\Controllers\SearchController::class,'news_show'])->name('news_show');
Route::get('journal_show/{id}',[\App\Http\Controllers\SearchController::class,'journal_show'])->name('journal_show');
Route::get('crimes_show/{id}',[\App\Http\Controllers\SearchController::class,'crimes_show'])->name('crimes_show');
Route::get('academia_show/{id}',[\App\Http\Controllers\SearchController::class,'academia_show'])->name('academia_show');

Route::get('hujjat',[\App\Http\Controllers\PageController::class,'hujjat'])->name('hujjat');

//Google search
Route::get('/sitemap.xml', function (){
    $sitemap = \Spatie\Sitemap\Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/boss'))
        ->add(Url::create('/categoryId/8'));
});




