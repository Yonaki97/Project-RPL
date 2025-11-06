    <?php
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/signup', function() {
        return view('pages.signup',);
    });
    Route::get('/signin', function(){
        return view('pages.signin');
    });
    Route::get('/beranda', function(){
        return view('pages.beranda');
    });
    Route::get('/profil', function(){
        return view('pages.profil');
    });
    // Route::get('signun', function(){
    //     $data = [
    //         'nama'=> 'AgungRe'
    //     ];
    //     return view('signup', $data);
    // });