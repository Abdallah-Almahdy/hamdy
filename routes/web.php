    <?php
    // laravel imports

    use App\Http\Controllers\Auth\RegisteredUserController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    // models imports
    use App\Models\subSection;
    // frontend  controllers imports
    use App\Http\Controllers\front\homeScreenController;
    // backend controllers imports
    use App\Http\Controllers\Back\companisController;
    use App\Http\Controllers\Back\ordersController;
    use App\Http\Controllers\Back\permissionsController;
    use App\Http\Controllers\Back\productsController;
    use App\Http\Controllers\Back\UserController;
    use App\Http\Controllers\Back\ProfileController;
    use App\Http\Controllers\Back\sectionsController;
    use App\Http\Controllers\Back\staticesController;
    use App\Http\Controllers\banaresController;
    use App\Http\Controllers\cusomerUserController;
    use App\Http\Controllers\notificationsController;
    use App\Http\Controllers\PaymentController;
    use App\Livewire\Delivery\Index as DeliveryIndex;
    use App\Livewire\Orders\Index;
    use App\Livewire\Orders\OrderDetails;
    use App\Livewire\Statices\StaticesController as StaticesStaticesController;
    use App\Livewire\StaticesController as LivewireStaticesController;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Back\PromocodesController;
    use App\Http\Controllers\ConfigController;

        /*      Routes start    */

    Route::get('/users/change-password', [UserController::class, 'index'])->name('users.change-password.form');
    Route::post('/users/change-password', [UserController::class, 'changePassword'])->name('users.change-password');

    Route::get('/', [homeScreenController::class, 'index'])->name('home');
    Route::get('/CProduct/{productID}', [homeScreenController::class, 'clientShowProductPage'])->name('clientShowProductPage');
    Route::get('/sectionProducts/{sectionID}', [homeScreenController::class, 'clientSectionProducts'])->name('sectionProducts');
    Route::get('/userCart', [homeScreenController::class, 'cart'])->name('cart');


    Route::get('/customerRegisterPage', [cusomerUserController::class, 'showRegistrationForm']);
    Route::post('/customerRegister', [cusomerUserController::class, 'register'])->name('customerRegister');

    Route::get('/customerLoginPage', [cusomerUserController::class, 'showLoginForm']);
    Route::post('/customerLogin', [cusomerUserController::class, 'login'])->name('customerLogin');

    Route::get('/searchResult', function () {
        return view('livewire.search.searchResult');
    })->name('searchResult');

    Route::middleware('auth')->prefix('dashboard')->group(function () {

        Route::get('home', function () {
            $data = subSection::first();
            return view('/admin/dashboardHome', ['data' => $data]);
        })->name('dashboard');
        Route::resource('sections', sectionsController::class);
        // Route::resource('delivery', sectionsController::class);
        Route::resource('companies', companisController::class);
        Route::resource('products', productsController::class);
        Route::put('configs', [ConfigController::class, 'update'])->name('configs.update');
        Route::get('configs/edit', [ConfigController::class, 'edit'])->name('configs.edit');


        // Route::resource('orders', ordersController::class);
        Route::get('orders', Index::class)->name('orders.index');
        Route::get('orderDetails/{id}', OrderDetails::class)->name('orders.details');
        Route::get('orderDetailsPrint/{id}', [ordersController::class, 'print'])->name('orders.print');
        Route::get('/orderDetails',[ordersController::class, 'orderDetails'])->name('orders.orderDetails');
        Route::resource('Permissions', permissionsController::class);
        Route::resource('banares', banaresController::class);
        Route::resource('notifications', notificationsController::class);
        Route::get('statices', StaticesStaticesController::class)->name('statices.index');
        Route::get('delivery', DeliveryIndex::class)->name('delivery.index');
        Route::resource('promocodes', PromocodesController::class);
    });
    Route::get('/delteAccount', [RegisteredUserController::class, 'showDeactivateForm'])->name('user.deactivate.form');
    Route::get('/support', [homeScreenController::class, 'support']);
    Route::post('/deactivate', [RegisteredUserController::class, 'deactivateAccount'])->name('user.deactivate');

    //Route::get('/dashboard', function () {
    //    return view('dashboard');
    //})->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/profile', function () {
            Auth::logout();
            return redirect('/login');
        })->name('logoutCustome');
    });



    // paymob
    Route::get('/payments/pay', [PaymentController::class, 'payWithPaymob']);
    Route::get('/payments/verify/{payment?}', [PaymentController::class, 'verifyWithPaymob'])->name('payment-verify');

    // Route::get('/payment', [PaymentController::class, 'showPaymentForm']);
    // Route::post('/payment', [PaymentController::class, 'processPayment']);


    // Route::post('/checkout/response', function (Request $request) {
    //     return $request->all();
    // });
    require __DIR__ . '/auth.php';
