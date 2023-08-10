<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/connexion', function () {
    return view('connexion');
});

Route::get('/inscription', function () {

    $ville = DB::table('ville')->get();
    return view('inscription',compact('ville'));
});

Route::get('/marketplace', function () {
    return view('marketplace.marketplace');
});

// Route::get('/mesanimeaux', function () {
//     return view('animeaux.mesanimeaux');
// });

Route::get('/mesanimeaux',[AnimalController::class, 'mesanimeaux'])->name('mesanimeaux');

// page accoupelemnt
Route::get('/accouplement',[AnimalController::class, 'accouplement'])->name('accouplement');

// get race by type
Route::get('/get-races', [AnimalController::class, 'getRaces'])->name('get.races');
// get race by type 2
Route::get('/get-races2', [AnimalController::class, 'getRaces'])->name('get.races2');

Route::get('/createanimal', function () {
    return view('animeaux.createanimal');
});

Route::post('/animal/add',[AnimalController::class, 'addanimal'])->name('store.animal');

// test search chien
Route::get('/search', [AnimalController::class,'searchchien'])->name('animals.search');



//edit match
Route::get('/match/edit/{id}', [AnimalController::class, 'editmatch'])->name('editmatch');

//demande match
Route::post('/demandematch', [AnimalController::class, 'demandematch'])->name('demandematch');

// match en attente 
Route::get('/demande', [AnimalController::class, 'demande'])->name('demande');


// send mail contact
Route::post('/send-contact-email', [ContactController::class, 'sendEmail'])->name('sendContactEmail');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        $demandes = DB::table('match')->where('user2',Auth::user()->id)->count();


        return view('dashboard',compact('demandes'));
    })->name('dashboard');
});
