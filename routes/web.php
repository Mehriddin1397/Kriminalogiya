<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\PageController::class,'main'])->name('main');
Route::get('/contact',[\App\Http\Controllers\PageController::class,'contact'])->name('contact');
Route::post('/contact',[\App\Http\Controllers\PageController::class,'sendMessage'])->name('contact.send')->middleware('throttle:6,1');


Route::get('/tez', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login')->middleware('ip.restrict');
Route::post('/tez', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

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
    Route::resource('issues', \App\Http\Controllers\IssueController::class);
    Route::resource('papers', \App\Http\Controllers\PaperController::class);
    Route::resource('resources', \App\Http\Controllers\ResourceController::class);
    Route::resource('explorations', \App\Http\Controllers\ExplorationController::class);
    Route::resource('announcements', \App\Http\Controllers\AnnouncementController::class);
    Route::resource('surveys', \App\Http\Controllers\SurveyController::class);
    Route::resource('videos', \App\Http\Controllers\VideoController::class);
    Route::resource('site-images', \App\Http\Controllers\SiteImageController::class)->only(['index', 'store', 'destroy']);
    Route::resource('memorandum', \App\Http\Controllers\MemorandumController::class);
    Route::resource('international-meeting', \App\Http\Controllers\InternationalMeetingController::class);
    Route::resource('forums', \App\Http\Controllers\ForumController::class);

// download
    Route::get('papers/{id}/download', [\App\Http\Controllers\PaperController::class, 'download'])->name('papers.download');


//    Route::get('/admin/projects/search', [\App\Http\Controllers\ProjectController::class, 'search'])->name('projects.search');
//
//    Route::get('/projects/{id}/file/{type}', [\App\Http\Controllers\PageController::class, 'showFile'])->name('projects.file');



});

Route::get('locale/{lang}', [\App\Http\Controllers\LocaleController::class, 'setLocale'])->name('setLocale');

Route::post('chatbot/ask', [\App\Http\Controllers\ChatbotController::class, 'ask'])
    ->middleware('throttle:20,1')
    ->name('chatbot.ask');

Route::get('test',[\App\Http\Controllers\PageController::class,'test'])->name('test');


//Sahifalar

Route::get('categoryId/{id}',[\App\Http\Controllers\PageController::class,'categoryId'])->name('categoryId');
Route::get('category/show',[\App\Http\Controllers\PageController::class,'show'])->name('show');
Route::get('test',[\App\Http\Controllers\PageController::class,'test'])->name('test');
Route::get('boss',[\App\Http\Controllers\PageController::class,'boss'])->name('boss');
Route::get('/exploration-categories',[\App\Http\Controllers\PageController::class,'explorationCategories'])->name('exploration_categories');

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
Route::get('announcement_show/{id}',[\App\Http\Controllers\SearchController::class,'announcement_show'])->name('announcement_show');
Route::get('elonlar',[\App\Http\Controllers\AnnouncementController::class,'publicIndex'])->name('announcements_public');
Route::get('sorovnomalar',[\App\Http\Controllers\SurveyController::class,'publicIndex'])->name('surveys_public');



Route::get('hujjat',[\App\Http\Controllers\PageController::class,'hujjat'])->name('hujjat');
Route::get('tadqiqot-natijalari-raqamlarda',[\App\Http\Controllers\PageController::class,'researchNumbers'])->name('research_numbers');
Route::get('tadqiqot-loyihalari/tashabbus-asosidagi',[\App\Http\Controllers\PageController::class,'tashabbusProjects'])->name('tashabbus_projects');
Route::get('tadqiqot-loyihalari/buyurtma-asosidagi',[\App\Http\Controllers\PageController::class,'buyurtmaProjects'])->name('buyurtma_projects');
Route::get('tadqiqot-loyihalari/davlat-granti-asosidagi',[\App\Http\Controllers\PageController::class,'davlatGrantiProjects'])->name('davlat_granti_projects');
Route::get('tadqiqot-loyihalari/xalqaro-qoshma',[\App\Http\Controllers\PageController::class,'xalqaroQoshmaProjects'])->name('xalqaro_qoshma_projects');
Route::redirect('institut/tarixi', '/institut/haqida', 301)->name('institute_history');
Route::get('institut/haqida',[\App\Http\Controllers\PageController::class,'instituteAbout'])->name('institute_about');
Route::get('institut/faoliyati-raqamlarda',[\App\Http\Controllers\PageController::class,'instituteStats'])->name('institute_stats');
Route::get('institut/missiya-va-vazifalar',[\App\Http\Controllers\PageController::class,'instituteMission'])->name('institute_mission');
Route::get('institut/rahbar-murojaati',[\App\Http\Controllers\PageController::class,'instituteAddressMessage'])->name('institute_address_message');
Route::get('institut/tarkibi',[\App\Http\Controllers\PageController::class,'institutStructure'])->name('institute_structure');
Route::get('institut/kriminologik-olimlar',[\App\Http\Controllers\PageController::class,'criminologyScholars'])->name('institute_scholars');
Route::get('institut/kriminologik-olimlar/{slug}',[\App\Http\Controllers\PageController::class,'scholarProfile'])->name('scholar_profile');
Route::get('institut/hamkorlarimiz',[\App\Http\Controllers\PageController::class,'localPartners'])->name('local_partners');
Route::get('ilmiy-ishlanmalar/davlat-hisobotlari',[\App\Http\Controllers\PageController::class,'stateReports'])->name('state_reports');
Route::get('institut/kriminologiya-kengashi-azolari',[\App\Http\Controllers\PageController::class,'kriminologiyaKengashiAzolari'])->name('kriminologiya_kengashi_azolari');
Route::get('institut/qoshidagi-kengashlar',[\App\Http\Controllers\PageController::class,'institutKengashlari'])->name('institut_kengashlari');
Route::get('institut/xalqaro-ekspertlar-kengashi',[\App\Http\Controllers\PageController::class,'xalqaroEkspertlarKengashi'])->name('xalqaro_ekspertlar_kengashi_maqsadi');
Route::get('institut/xalqaro-ekspertlar-kengashi-azolari',[\App\Http\Controllers\PageController::class,'xalqaroEkspertlarKengashiAzolari'])->name('xalqaro_ekspertlar_kengashi_azolari');
Route::get('institut/ilmiy-kengash/kiberxavfsizlik',[\App\Http\Controllers\PageController::class,'ilmiyKengashKiber'])->name('ilmiy_kengash_kiber');
Route::get('institut/ilmiy-kengash/{specialty}',[\App\Http\Controllers\PageController::class,'ilmiyKengashSeminar'])->name('ilmiy_kengash_seminar')->where('specialty', '12-00-08|12-00-14|12-00-15');
Route::get('institut/dissertatsiya-mavzulari',[\App\Http\Controllers\PageController::class,'dissertationTopics'])->name('dissertation_topics');
Route::get('tadqiqotlar/mustaqil-izlanuvchilar',[\App\Http\Controllers\PageController::class,'independentResearchers'])->name('independent_researchers');
Route::get('xalqaro-hamkorlik/haqida',[\App\Http\Controllers\PageController::class,'internationalCooperation'])->name('international_cooperation');
Route::get('xalqaro-hamkorlik/hamkorlar',[\App\Http\Controllers\PageController::class,'internationalPartners'])->name('international_partners');
Route::get('xalqaro-hamkorlik/memorandumlar',[\App\Http\Controllers\PageController::class,'memorandums'])->name('memorandums');
Route::get('xalqaro-hamkorlik/tadbirlar',[\App\Http\Controllers\PageController::class,'internationalEvents'])->name('international_events');
Route::get('xalqaro-hamkorlik/uchrashuvlar/{id}',[\App\Http\Controllers\PageController::class,'internationalMeetingShow'])->name('international_meeting_show');
Route::get('xalqaro-hamkorlik/murojaat',[\App\Http\Controllers\PageController::class,'cooperationContact'])->name('cooperation_contact');
Route::get('ilmiy-tadqiqot-nima',[\App\Http\Controllers\PageController::class,'ilmiyTadqiqotNima'])->name('ilmiy_tadqiqot_nima');

//Google search
Route::get('/sitemap.xml', function (){
    $sitemap = \Spatie\Sitemap\Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/boss'))
        ->add(Url::create('/categoryId/8'));
});

Route::prefix('journals')->group(function () {
    Route::get('/', [\App\Http\Controllers\JournalController::class, 'jurnals'])->name('journals_index');
    Route::get('/{journal}', [\App\Http\Controllers\JournalController::class, 'show'])->name('journals_show');
});


Route::get('/gallery', [\App\Http\Controllers\PageController::class, 'gallery'])->name('gallery');
Route::get('mediateka/videotasvirlar', [\App\Http\Controllers\PageController::class, 'videos'])->name('videos_list');
Route::get('mediateka/videotasvirlar/{id}', [\App\Http\Controllers\PageController::class, 'videoShow'])->name('video_show');

Route::get('document/{type}/{id}', [\App\Http\Controllers\PageController::class, 'viewDocument'])->name('document.view');




