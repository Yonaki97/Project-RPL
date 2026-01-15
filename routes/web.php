    <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\GoogleController;
    use App\Http\Controllers\BerandaController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\CatatanController;
    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\AdminController;

// Google Account
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::middleware(['auth', 'check.banned'])->group(function () {
    Route::get('/catatan/tambah', [CatatanController::class, 'create'])
        ->name('catatan.create');

    Route::post('/catatan', [CatatanController::class, 'store'])
        ->name('catatan.store');

    Route::get('/catatan/{id}/edit', [CatatanController::class, 'edit'])
        ->name('catatan.edit');
    
    Route::put('/catatan/{id}', [CatatanController::class, 'update'])
        ->name('catatan.update');

    Route::delete('/catatan/{id}', [CatatanController::class, 'destroy'])
        ->name('catatan.destroy');

    Route::get('/catatan', [CatatanController::class, 'index'])
        ->name('catatan.index');

    Route::post('/catatan/{catatan_id}/komentar', [CommentController::class, 'store'])
    ->name('komentar.store');


    // Route untuk toggle bookmark
    Route::post('/catatan/{id}/bookmark', [CatatanController::class, 'toggleBookmark'])
    ->name('catatan.bookmark')
    ->middleware('auth');

    // Route untuk halaman bookmark
    Route::get('/bookmark', [App\Http\Controllers\CatatanController::class, 'bookmarkPage'])
    ->name('bookmark.page')
    ->middleware('auth');

    // Route untuk toggle like
    Route::post('/catatan/{id}/like', [App\Http\Controllers\CatatanController::class, 'toggleLike'])
    ->name('catatan.like')
    ->middleware('auth');


    // Route::post('/beranda')

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

    //admin
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/users/{id}/toggle-ban', [AdminController::class, 'toggleBan'])->name('users.toggle-ban');
    Route::get('/catatans', [AdminController::class, 'catatans'])->name('catatans');
    Route::delete('/catatans/{id}', [AdminController::class, 'destroyCatatan'])->name('catatans.destroy');
});

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