<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DestinationCostController;
use App\Http\Controllers\DestinationKeyFactController;
use App\Http\Controllers\DestinationFaqController;
use App\Http\Controllers\DestinationFactController;
use App\Http\Controllers\DestinationCourseController;
use App\Http\Controllers\DestinationVisaController;
use App\Http\Controllers\DestinationReasonController;
use App\Http\Controllers\DestinationHealthController;
use App\Http\Controllers\DestinationJobController;
use App\Http\Controllers\DestinationUniversityController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\EnglishTestController;
use App\Http\Controllers\LanguageTestController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DestinationTestController;
use App\Http\Controllers\DestinationScholarshipController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuestionaireController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BasicPagesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PreviousCourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController; 
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\UserController; 

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





//BasicPagesRoutes
Route::get('/',[BasicPagesController::class, 'index'])->name('index');

// For menu and custom page link
Route::get('/page/{title}',[BasicPagesController::class, 'view']);

Route::get('introduction',[BasicPagesController::class, 'introduction'])->name('introduction');
Route::get('/about',[BasicPagesController::class, 'about'])->name('about');
Route::get('/destination',[BasicPagesController::class, 'destination'])->name('destination');

Route::get('/intro_details/{id}',[BasicPagesController::class, 'intro_details']);
Route::get('message-from-chairman',[BasicPagesController::class, 'chairman'])->name('chairman');
Route::get('our-team',[BasicPagesController::class, 'team'])->name('team');
Route::get('our-pride',[BasicPagesController::class, 'pride'])->name('pride');
// Route::get('/study-destination/{destination}',[BasicPagesController::class, 'destination']);
Route::get('/scholarship',[BasicPagesController::class, 'scholarship'])->name('scholarship');
Route::get('/services',[BasicPagesController::class, 'service'])->name('service');
Route::get('/scholarship-detail/{id}',[BasicPagesController::class, 'scholarship_detail']);
Route::get('allblogs',[BasicPagesController::class, 'allblogs'])->name('allblogs');
Route::get('allnews',[BasicPagesController::class, 'allnews'])->name('allnews');
Route::get('allevents',[BasicPagesController::class, 'allevents'])->name('allevents');
Route::get('/event-details/{slug}',[BasicPagesController::class, 'eventDetails'])->name('event-details');

Route::get('/scholarship-details/{slug}',[BasicPagesController::class, 'scholarshipDetails'])->name('scholarship-details');

Route::get('/english-test',[BasicPagesController::class, 'english_test']);
Route::get('/language-test',[BasicPagesController::class, 'language_test']);
Route::get('/test/{title}',[BasicPagesController::class, 'test_detail']);
Route::get('/all-services',[BasicPagesController::class, 'allservices']);
Route::get('/services/{slug}',[BasicPagesController::class, 'service'])->name('service-details');
Route::get('/contacts',[BasicPagesController::class, 'contact'])->name('contact');

Route::post('/contacts-destination',[BasicPagesController::class, 'sendContact'])->name('destination-contact');

Route::get('/destination-details/{slug}',[BasicPagesController::class, 'destinationDetails'])->name('destination-details');

Route::post('/newsletter',[NewsletterController::class, 'subscribe'])->name('newsletter-subscription');
Route::get('/newsletters',[NewsletterController::class, 'index'])->name('newsletter.index');

Route::delete('/newsletters/{id}',[NewsletterController::class, 'destroy'])->name('newsletter.destroy');

Route::get('/blogs',[BasicPagesController::class, 'blogs_details'])->name('blog.details');
Route::get('/blogs-details/{slug}',[BasicPagesController::class, 'blogDetails'])->name('blog-details');
Route::get('/course-details/{slug}',[BasicPagesController::class, 'courseDetails'])->name('course-details');

Route::get('/search-blogs',[BasicPagesController::class, 'searchBlogs'])->name('search-blogs');

Route::post('/register-details',[BasicPagesController::class, 'registerContact'])->name('register-contact');
Route::post('/contact-details',[BasicPagesController::class, 'contactUs'])->name('contact-us');

Route::get('/courses/A-D',[BasicPagesController::class, 'coursesA']);
Route::get('/courses/E-L',[BasicPagesController::class, 'coursesB']);
Route::get('/courses/M-Z',[BasicPagesController::class, 'coursesC']);

Route::get('/contact-mail-send',[BasicPagesController::class, 'sendContactMail'])->name('contact.us');
Route::get('/faqs',[BasicPagesController::class, 'faq'])->name('faqs');
Route::get('/all-resources',[BasicPagesController::class, 'resource'])->name('resources');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


//Admin Resource Routes


    Route::resources([
        'menu' => MenuController::class,
        'page' => PageController::class,
        'blog' => BlogController::class,
        'service' => ServiceController::class,
        'achievement' => AchievementController::class,
        'album' => AlbumController::class,
        'media' => MediaController::class,
        'info' => InfoController::class,
        'contact' => ContactController::class,
        'testimonial' => TestimonialController::class,
        'englishtest' => EnglishTestController::class,
        'languagetest' => LanguageTestController::class,
        'destinations' => DestinationController::class,
        'courses' => CourseController::class,
        'universities' => UniversityController::class,
        'scholarships' => ScholarshipController::class,
        'destination-tests' => DestinationTestController::class,
        'destination-costs' => DestinationCostController::class,
        'destination-key-facts'=> DestinationKeyFactController::class,
        'destination-facts'=> DestinationFactController::class,
        'destination-reason'=> DestinationReasonController::class,
        'destination-scholarship'=> DestinationScholarshipController::class,
        'destination-visa'=> DestinationVisaController::class,
        'destination-health'=> DestinationHealthController::class,
        'destination-job'=> DestinationJobController::class,
        'destination-faqs'=> DestinationFaqController::class,
        'destination-courses'=> DestinationCourseController::class,
        'destination-universities'=> DestinationUniversityController::class,
        'universities'=> UniversityController::class,
        'courses'=> CourseController::class,
        'highlight' => HighlightController::class,
        'city' => CityController::class,
        'slider' => SliderController::class,
        'brand' => BrandController::class,
        'news' => NewsController::class,
        'event' => EventController::class,
        'questionaire' => QuestionaireController::class,
        'package' => PackageController::class,
        'comment' =>CommentController::class,
        'institute' =>InstituteController::class,
        'branch' =>BranchController::class,
        'students'=>StudentController::class,
        'bookings'=>BookingController::class,
        'documents'=>DocumentController::class,
        'previous-courses'=>PreviousCourseController::class,
        'category'=>CategoryController::class,
        'message'=>MessageController::class,
        'resource'=>ResourceController::class,
        'user'=>UserController::class,
        
        
    ]);

    Route::get('my-students', [StudentController::class, 'myStudents']);
    Route::get('multiple-documents/{student}', [DocumentController::class, 'multipleDocuments']);
    Route::get('student-previous-courses/{student}', [PreviousCourseController::class, 'previousCourses']);

    Route::post('register-course',[BasicPagesController::class,'registerCourse']);


    Route::get('/album/addphotos/{id}', [AlbumController::class, 'addPhotos']);
    Route::post('/album/storephotos/{id}', [AlbumController::class, 'storephotos']);
    
    



    Route::get('/pages', [PageController::class, 'index'])
    ->name('admin.page.index');
Route::get('/pages/create', [PageController::class, 'create'])
    ->name('admin.page.create');
Route::get('/pages/edit/{id}', [PageController::class, 'edit'])
    ->name('admin.page.edit');
Route::post('/pages/update', [PageController::class, 'update'])
    ->name('admin.page.update');
Route::post('/pages/store', [PageController::class, 'store'])
    ->name('admin.page.store');
Route::post('/pages/delete', [PageController::class, 'delete'])
    ->name('admin.page.delete');
Route::get('/pages/search', [PageController::class, 'search'])
    ->name('admin.page.search');


    
//     Route::get('/sliders', [SliderController::class, 'index'])
//     ->name('slider.index');
// Route::get('/sliders/create', [SliderController::class, 'create'])
//     ->name('slider.create');
// Route::get('/sliders/edit/{id}', [SliderController::class, 'edit'])
//     ->name('slider.edit');
// Route::get('/sliders/view/{id}', [SliderController::class, 'show'])
//     ->name('slider.show');
// Route::post('/sliders/update', [SliderController::class, 'update'])
//     ->name('slider.update');
// Route::post('/sliders/store', [SliderController::class, 'store'])
//     ->name('slider.store');
// Route::post('/sliders/delete', [SliderController::class, 'delete'])
//     ->name('slider.delete');
// Route::post('slider/set-order', [SliderController::class, 'set_order'])
// ->name('slider.order');  
