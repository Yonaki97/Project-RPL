    <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\GoogleController;
    use App\Http\Controllers\BerandaController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\CatatanController;

// Google Account
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/catatan/tambah', [CatatanController::class, 'create'])
        ->name('catatan.create');

    Route::post('/catatan', [CatatanController::class, 'store'])
        ->name('catatan.store');

    Route::get('/beranda', [BerandaController::class, 'index'])
        ->name('beranda');

    Route::get('/catatan/{catatan}', [CatatanController::class, 'show'])
        ->name('catatan.show');
        
    });

    Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
    // Home 
    Route::get('/', function () {
        return view('welcome');
    });

    // Halaman Utama
    Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    });
    // Halaman form
    Route::get('/signin', [AuthController::class, 'showSignin'])->name('signin');
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');

    // Proses form
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::post('/signup', [AuthController::class, 'signup']);

    Route::get('/signin', [AuthController::class, 'showSignin'])->name('signin');

    // // Preview Catatan
    // Route::get('/preview', function () {
    // return view('catatan.previewcatatan');
    // });

    // Route::get('signun', function(){
    //     $data = [
    //         'nama'=> 'AgungRe'
    //     ];
    //     return view('signup', $data);
    // });