    <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\GoogleController;
    use App\Http\Controllers\BerandaController;
    use App\Http\Controllers\ProfileController;

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::get('/', function () {
        return view('welcome');
    });
    Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    });
    // Halaman tampilan
    Route::get('/signin', [AuthController::class, 'showSignin'])->name('signin');
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');

    // Proses form
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::post('/signup', [AuthController::class, 'signup']);

    Route::get('/login', [AuthController::class, 'showSignin'])->name('login');


    // Route::get('signun', function(){
    //     $data = [
    //         'nama'=> 'AgungRe'
    //     ];
    //     return view('signup', $data);
    // });