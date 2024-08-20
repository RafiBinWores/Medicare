<?php

use App\Http\Controllers\admin\AdminAmbulanceController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminBlogController;
use App\Http\Controllers\admin\AdminDoctorController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SpecializationController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinMedicareController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSpecializationController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

// Specialization page routes
Route::get('/specializations', [UserSpecializationController::class, 'index'])->name('frontend.specializations');
Route::get('/specializations/{slug}', [UserSpecializationController::class, 'specializedDoctor'])->name('specializations.specializedDoctor');

// Join medicare routes
Route::get('/join-medicare', [JoinMedicareController::class, 'joinMedicare'])->name('frontend.joinMedicare');

// Ambulance routes
Route::get('/ambulances', [AmbulanceController::class, 'ambulances'])->name('ambulances.view');

//Doctor routes
Route::get('/doctors', [DoctorController::class, 'doctors'])->name('doctors.view');
Route::get('/doctors/{slug}', [DoctorController::class, 'doctorDetails'])->name('doctors.doctorDetails');

// Blood Donor routes
Route::get('/blood-donors', [BloodDonorController::class, 'bloodDonors'])->name('bloodDonors.view');

// Blog routes
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs.view');
Route::get('/blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blogs.blogDetails');

// Account group
Route::group(['prefix' => 'account'], function () {
    // Guest Routes
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [AuthController::class, 'registration'])->name('account.registration');
        Route::post('/process-registration', [AuthController::class, 'processRegistration'])->name('account.processRegistration');
        Route::get('/login', [AuthController::class, 'login'])->name('account.login');
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('account.authenticate');
    });
});

// Auth Routes
Route::group(['middleware' => 'auth'], function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'profile'])->name('account.profile');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('account.editProfile');
    Route::put('/profile-setting', [ProfileController::class, 'updateProfile'])->name('account.updateProfile');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('account.changePassword');
    Route::post('/updatePassword', [ProfileController::class, 'updatePassword'])->name('account.updatePassword');

    Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');

    // Ambulance register routes
    Route::get('/ambulance-form/submit', [AmbulanceController::class, 'ambulanceForm'])
        ->middleware('checkUserRole:user')
        ->name('frontend.ambulanceForm');
    Route::post('/ambulance-form', [AmbulanceController::class, 'ambulanceFormStore'])
        ->middleware('checkUserRole:user')
        ->name('ambulanceForm.store');

    // Doctor register routes
    Route::get('/doctor-form/submit', [DoctorController::class, 'doctorForm'])
        ->middleware('checkUserRole:user')
        ->name('frontend.doctorForm');
    Route::post('/doctor-form', [DoctorController::class, 'doctorFormStore'])
        ->middleware('checkUserRole:user')
        ->name('doctorForm.store');

    Route::get('/appointment', [AppointmentController::class, 'userAppointments'])->name('appointment.userAppointments');
    Route::get('/doctor-appointment', [AppointmentController::class, 'doctorAppointments'])->name('appointment.doctorAppointments');

    Route::delete('/appointment/{appointment}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');

    Route::post('/booking/{id}', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::post('/process-appointment', [AppointmentController::class, 'processAppointment'])->name('appointment.processAppointment');
});



// Admin Routes
Route::group(['prefix' => 'admin'], function () {

    // Guest Middleware
    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/login', [AdminAuthController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
    });

    // Authenticate Middleware
    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Specializations Routes
        Route::get('/specializations', [SpecializationController::class, 'index'])->name('specializations.index');
        Route::get('/specializations/create', [SpecializationController::class, 'create'])->name('specializations.create');
        Route::post('/specializations', [SpecializationController::class, 'store'])->name('specializations.store');
        Route::get('/specializations/{specialization}/edit', [SpecializationController::class, 'edit'])->name('specializations.edit');
        Route::put('/specializations/{specialization}', [SpecializationController::class, 'update'])->name('specializations.update');
        Route::delete('/specializations/{specialization}', [SpecializationController::class, 'destroy'])->name('specializations.destroy');

        // City Routes
        Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
        Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
        Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
        Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
        Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
        Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');

        // Services Routes
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

        // Education Routes
        Route::get('/educations', [EducationController::class, 'index'])->name('educations.index');
        Route::get('/educations/create', [EducationController::class, 'create'])->name('educations.create');
        Route::post('/educations', [EducationController::class, 'store'])->name('educations.store');
        Route::get('/educations/{education}/edit', [EducationController::class, 'edit'])->name('educations.edit');
        Route::put('/educations/{education}', [EducationController::class, 'update'])->name('educations.update');
        Route::delete('/educations/{education}', [EducationController::class, 'destroy'])->name('educations.destroy');

        // Blogs Routes
        Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blogs.index');
        Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blogs.create');
        Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blogs.store');
        Route::get('/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/blogs/{blog}', [AdminBlogController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('blogs.destroy');

        // Ambulance Routes
        Route::get('/ambulances', [AdminAmbulanceController::class, 'index'])->name('ambulances.index');
        Route::get('/ambulances/pending', [AdminAmbulanceController::class, 'pending'])->name('ambulances.pending');
        Route::put('/ambulances/approve/{id}', [AdminAmbulanceController::class, 'approve'])->name('ambulances.approve');
        Route::delete('/ambulances/{ambulance}', [AdminAmbulanceController::class, 'destroy'])->name('ambulances.destroy');

        // Doctor Routes
        Route::get('/doctors', [AdminDoctorController::class, 'index'])->name('doctors.index');
        Route::get('/doctors/pending', [AdminDoctorController::class, 'pending'])->name('doctors.pending');
        Route::put('/doctors/approve/{id}', [AdminDoctorController::class, 'approve'])->name('doctors.approve');
        Route::delete('/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])->name('doctors.destroy');
    });
});
