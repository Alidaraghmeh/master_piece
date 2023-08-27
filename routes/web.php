<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventsubController;
use App\Http\Controllers\OrphanagesController ;
use App\Http\Controllers\OrphansController ;
use App\Http\Controllers\RequestorphController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\admin\UserssController;
use App\Http\Controllers\admin\DonatesController;
use App\Http\Controllers\admin\EventsController;
use App\Http\Controllers\admin\OrphanangesController;
use App\Http\Controllers\admin\OrphanssController;
use App\Http\Controllers\admin\ProductssController;
use App\Http\Controllers\admin\SalessController;
use App\Http\Controllers\admin\requestorphsController;
use App\Http\Controllers\admin\requestvolsController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RequestvolController;

Route::post('/', [RequestvolController::class, 'store'])->name('requestvol.store');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/admin/contacts', [ContactsController::class, 'index'])->name('admin.contacts.index');
Route::get('/admin/requestvol', [requestvolsController::class, 'index'])->name('admin.volunteer.index');
Route::get('/admin/requestorph', [requestorphsController::class, 'index'])->name('admin.requestorph.index');
Route::get('/admin/sales', [SalessController::class, 'index'])->name('admin.sales.index');


Route::get('/admin/products', [ProductssController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductssController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [ProductssController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [ProductssController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [ProductssController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [ProductssController::class, 'destroy'])->name('admin.products.destroy');

// Index - List all orphans
Route::get('/admin/orphans', [OrphanssController::class, 'index'])->name('admin.orphans.index');

// Create - Show the form to create a new orphan
Route::get('/admin/orphans/create', [OrphanssController::class, 'create'])->name('admin.orphans.create');

// Store - Store the newly created orphan in the database
Route::post('/admin/orphans', [OrphanssController::class, 'store'])->name('admin.orphans.store');

// Edit - Show the form to edit the specified orphan
Route::get('/admin/orphans/{orphan}', [OrphanssController::class, 'edit'])->name('admin.orphans.edit');

// Update - Update the specified orphan in the database
Route::put('/admin/orphans/{orphan}', [OrphanssController::class, 'update'])->name('admin.orphans.update');

// Destroy - Delete the specified orphan from the database
Route::delete('/admin/orphans/{orphan}', [OrphanssController::class, 'destroy'])->name('admin.orphans.destroy');






Route::get('/admin/orphanages', [OrphanangesController::class, 'index'])->name('admin.orphanages.index');
Route::get('/admin/orphanages/create', [OrphanangesController::class, 'create'])->name('admin.orphanages.create');
Route::post('/admin/orphanages', [OrphanangesController::class, 'store'])->name('admin.orphanages.store');
Route::get('/admin/orphanages/{orphanage}/edit', [OrphanangesController::class, 'edit'])->name('admin.orphanages.edit');
Route::put('/admin/orphanages/{orphanage}', [OrphanangesController::class, 'update'])->name('admin.orphanages.update');
Route::delete('/admin/orphanages/{orphanage}', [OrphanangesController::class, 'destroy'])->name('admin.orphanages.destroy');


Route::get('/admin/events', [EventsController::class, 'index'])->name('admin.events.index');
Route::get('/admin/events/create', [EventsController::class, 'create'])->name('admin.events.create');
Route::post('/admin/events', [EventsController::class, 'store'])->name('admin.events.store');
Route::get('/admin/events/{event}', [EventsController::class, 'show'])->name('admin.events.show');
Route::get('/admin/events/{event}/edit', [EventsController::class, 'edit'])->name('admin.events.edit');
Route::put('/admin/events/{event}', [EventsController::class, 'update'])->name('admin.events.update');
Route::delete('/admin/events/{event}', [EventsController::class, 'destroy'])->name('admin.events.destroy');


Route::get('/admin/donates', [DonatesController::class, 'index'])->name('admin.donates.index');

// Index - List all users
Route::get('/admin/users', [UserssController::class, 'index'])->name('admin.users.index');
// Create - Show the form to create a new user
Route::get('/admin/users/create', [UserssController::class, 'create'])->name('admin.users.create');
// Store - Store the newly created user in the database
Route::post('/admin/users', [UserssController::class, 'store'])->name('admin.users.store');
// Show - Display the specified user
Route::get('/admin/users/{user}', [UserssController::class, 'show'])->name('admin.users.show');
// Edit - Show the form to edit the specified user
Route::get('/admin/users/{user}/edit', [UserssController::class, 'edit'])->name('admin.users.edit');
// Update - Update the specified user in the database
Route::put('/admin/users/{user}', [UserssController::class, 'update'])->name('admin.users.update');

// Destroy - Delete the specified user from the database
Route::delete('/admin/users/{user}', [UserssController::class, 'destroy'])->name('admin.users.destroy');






Route::post('/checkout', [SalesController::class, 'store'])->name('checkout.store'); // Update the controller usage
// routes/web.php

Route::get('/products', [ProductsController::class, 'showProducts'])->name('products');

Route::get('/checkout', [ProductsController::class, 'checkout'])->name('checkout');


Route::get('/orphans//requestorph/{orphan}/{orphanageId}', [RequestorphController::class, 'show'])->name('request-orph');
Route::post('/requestorph/{orphan}/{orphanageId}', [RequestorphController::class, 'store'])->name('requestorph.store');

// Route for displaying orphanages
Route::get('/orphanages', [OrphanagesController ::class, 'showOrphanages'])->name('orphanages');
Route::get('/orphans/{orphanage}', [OrphansController::class, 'showOrphans'])->name('orphans');

// Other routes...

// Route for joining an event
Route::get('/events/{event}/join', [EventsubController::class, 'join'])->name('join-event');

// Route to show the events page with paginated events
Route::get('/events', [EventController::class, 'showEvents'])->name('events');

// Route for showing the login form

// Route for handling the login form submission


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
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store'); // Update the controller usage
Route::post('/donate', [DonateController::class, 'store'])->name('donate.store');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () { return view('index');}) -> name("ali");
// Route::get('/about', function () {return view('about');})->name("about");
Route::get('/contact', function () {  return view('contact');})->name("contact");
Route::get('/donate', function () {  return view('donate');})->name("donate");
Route::get('/signup', function () { return view('signup');})->name("signup");
Route::get('/login', function () {  return view('login');})->name("login");
// Route::get('/forgot', function () { return view('forgot');})->name("forgot");
Route::get('/admin', function () {  return view('admin.dashboard');})->name("admin");
// Route::get('/checkout', function () {
// })->name("checkout");


