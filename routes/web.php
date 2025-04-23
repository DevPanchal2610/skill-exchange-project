<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Models\City;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;
use App\Models\State;
use App\Models\User;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SkillAssignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Models\Request;
use App\Models\SkillAssign;

// Email Verification Route
Route::get('/verify-email/{token}', [App\Http\Controllers\EmailVerificationController::class, 'verify'])->name('verification.verify');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/validate', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', function() {
    return view('admin.registration');
});
Route::post('/register', [RegisterController::class, 'register']);

// Forgot Password Routes
Route::get('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'showForgotForm'])->name('forgot.form');
Route::post('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitEmail'])->name('forgot.email');
Route::post('/forgot-password/verify', [App\Http\Controllers\ForgotPasswordController::class, 'verifyAnswer'])->name('forgot.verify');
Route::post('/forgot-password/reset', [App\Http\Controllers\ForgotPasswordController::class, 'resetPassword'])->name('forgot.reset');
Route::get('/contact', function() {
    return view('client.contact');
});
Route::post('/contact', [ContactController::class, 'submit']);

// Admin Routes
Route::get('/admin/users', function () {
    if (Auth::check() && Auth::user()->isadmin === 1) {
        return view('admin.users');
    }

    abort(403, 'Unauthorized');
})->name('admin.users')->middleware('auth');


// LOGIN    
Route::get('/', function () {
    return redirect('/login');
});
// Route::post('/validate',[UserController::class,'auth_user']);
Route::get('/logout',function()
{
    session()->flush();
    return redirect('/');
});


// REGISTRATION
// Route::get('/register',function()
// {
//     return view('admin.registration');
// });

// Skill form routes
Route::middleware(['auth'])->group(function () {
    Route::get('/skills/add', [App\Http\Controllers\SkillController::class, 'showSkillForm'])->name('skills.form1');
    Route::post('/skills/store', [App\Http\Controllers\SkillController::class, 'store'])->name('skills.store');
});

// Demo user page
Route::get('/user/demo', function () {
    return view('client.demo_user');
})->name('user.demo');

Route::get('/home', function () {
    if (Auth::check() && Auth::user()->isadmin === 1) {
        return view('admin.home');
    }
    abort(403, 'Unauthorized');
}); 
Route::get('/city', function () {
    if (Auth::check() && Auth::user()->isadmin === 1) {
        $data1=State::all()->toArray();
        $data=City::with('state')->get();
        return view('admin.city', compact('data1','data'));
    }
    abort(403, 'Unauthorized');
}); 
Route::get('/edit_city/{id}', [CityController::class, 'edit']);
Route::post('/update_city', [CityController::class, 'update']);
Route::post('/city-add',[CityController::class, 'add_city']);
Route::get('/delete_city/{id}',[CityController::class, 'delete_city']); 



Route::get('/state', function () {
    if (Auth::check() && Auth::user()->isadmin === 1) {
        $states = State::all();
        // print_r($states); 
        return view('admin.addstate', compact('states'));
    }
    abort(403, 'Unauthorized');
}); 
Route::get('/delete_state/{id}',[StateController::class, 'delete_state']); 
Route::post('/add_state',[StateController::class, 'add_states']);
Route::get('/edit_state/{id}', [StateController::class, 'edit'])->name('state.edit');
Route::post('/update_state', [StateController::class, 'update'])->name('state.update');






Route::get('/users', function () {
    if (Auth::check() && Auth::user()->isadmin === 1) {
        $users = User::with('city')->where('isadmin', 0)->get();
        return view('admin.ViewUsers', compact('users'));
    }
    abort(403, 'Unauthorized');
}); 
Route::get('/feedbacks', [FeedbackController::class, 'index']);
Route::get('/requests', [RequestController::class, 'index']);
Route::get('/skill', function () {
    if (Auth::check() && Auth::user()->isadmin === 1) {
        $skills = Skill::with('user')->get();
        return view('admin.skill', compact('skills'));
    }
    abort(403, 'Unauthorized');
}); 

Route::get('/skill-assign',[SkillAssignController::class, 'index']);

// Route::get('/app', function () {
//     return view('Layouts.app');
// });

Route::get('/user', function () {
    $id=session('id');
    // echo $id;
    $data = Skill::with('user')->where('user_id','<>',$id)->get();
    // dd($data);
    return view('client.index', compact('data'));
})->name('user.index');


Route::get('/see_user/{id}', function ($id) {
    $user = User::with('skills')->find($id);
$id=$id;
    // $data=$user->skills->toArray();
    // dd($data);
    return view('client.see_user', compact('user','id'));
});

Route::post('/skill_request', [RequestController::class, 'store']);
Route::delete('/request/{id}', [RequestController::class, 'destroy']);
Route::post('/assign_skill', [App\Http\Controllers\SkillAssignController::class, 'assignForRequest']);
Route::get('/user/{id}/skills', [App\Http\Controllers\SkillAssignController::class, 'getUserSkills']);
Route::get('/request', function () {
    $userId = session('id'); // Retrieve user ID from session

    $requests = Request::with(['user', 'assigner', 'skill'])
        ->where('assgin_id', $userId)
        ->get();
        // echo $userId;
    return view('client.request', compact('requests'));
});

// Test mail route for debugging
use Illuminate\Support\Facades\Mail;
Route::get('/test-mail', function () {
    Mail::raw('This is a test email from Laravel.', function ($message) {
        $message->to('skillexchange98@gmail.com')
                ->subject('Laravel Test Email');
    });
    return 'Test email sent!';
});

Route::get('/profile', function () {
    $userId = session('id');
    if (!$userId) {
        return redirect()->route('login')->withErrors('Please log in to view your profile.');
    }
    $data = SkillAssign::with(['assignedUser', 'assigner', 'skill', 'userSkill'])
        ->where('user_id', $userId)
        ->orWhere('assgin_id', $userId)
        ->get();
    $user = \App\Models\User::with('city')->find($userId);
    return view('client.profile', compact('user', 'data'));
})->name('profile');
Route::get('/sk', function () {
    return view('client.sk');
})->name('skills.form');

// Profile routes
Route::get('/profile/edit', function () {
    $userId = session('id');
    if (!$userId) {
        return redirect()->route('login')->withErrors('Please log in to edit your profile.');
    }
    $user = \App\Models\User::with('city')->find($userId);
    if (!$user) {
        return redirect()->route('login')->withErrors('User not found.');
    }
    return view('client.edit_profile', compact('user'));
})->name('profile.edit');

Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
Route::get('/temp', function () {
    dd(url()->previous());
});