<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JerseyManagementController;
use App\Http\Controllers\Admin\OrderManagementController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group.
|
*/

// Admin Dashboard
Route::get('/dashboard', function() {
    $stats = [
        'total_users' => \App\Models\User::count(),
        'total_orders' => \App\Models\Order::count(),
        'total_jerseys' => \App\Models\Jersey::count(),
        'total_revenue' => \App\Models\Order::where('payment_status', 'paid')->sum('total'),
    ];
    return view('admin.dashboard', compact('stats'));
})->name('dashboard');

// User Management
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', function() {
        $users = \App\Models\User::paginate(20);
        return view('admin.users.index', compact('users'));
    })->name('index');
    
    Route::get('/{user}/edit', function($user) {
        $user = \App\Models\User::findOrFail($user);
        return view('admin.users.edit', compact('user'));
    })->name('edit');
    
    Route::put('/{user}', function($user, \Illuminate\Http\Request $request) {
        $user = \App\Models\User::findOrFail($user);
        $user->update($request->validated());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    })->name('update');
    
    Route::delete('/{user}', function($user) {
        $user = \App\Models\User::findOrFail($user);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    })->name('destroy');
});

// Jersey Management
Route::prefix('jerseys')->name('jerseys.')->group(function () {
    Route::get('/', function() {
        $jerseys = \App\Models\Jersey::with('category')->paginate(20);
        return view('admin.jerseys.index', compact('jerseys'));
    })->name('index');
    
    Route::get('/create', function() {
        $categories = \App\Models\Category::all();
        return view('admin.jerseys.create', compact('categories'));
    })->name('create');
    
    Route::post('/', function(\Illuminate\Http\Request $request) {
        \App\Models\Jersey::create($request->all());
        return redirect()->route('admin.jerseys.index')->with('success', 'Jersey created successfully');
    })->name('store');
    
    Route::get('/{jersey}/edit', function($jersey) {
        $jersey = \App\Models\Jersey::findOrFail($jersey);
        $categories = \App\Models\Category::all();
        return view('admin.jerseys.edit', compact('jersey', 'categories'));
    })->name('edit');
    
    Route::put('/{jersey}', function($jersey, \Illuminate\Http\Request $request) {
        $jersey = \App\Models\Jersey::findOrFail($jersey);
        $jersey->update($request->all());
        return redirect()->route('admin.jerseys.index')->with('success', 'Jersey updated successfully');
    })->name('update');
    
    Route::delete('/{jersey}', function($jersey) {
        $jersey = \App\Models\Jersey::findOrFail($jersey);
        $jersey->delete();
        return redirect()->route('admin.jerseys.index')->with('success', 'Jersey deleted successfully');
    })->name('destroy');
});

// Order Management
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', function() {
        $orders = \App\Models\Order::with('user')->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    })->name('index');
    
    Route::get('/{order}', function($order) {
        $order = \App\Models\Order::with(['user', 'items.jersey'])->findOrFail($order);
        return view('admin.orders.show', compact('order'));
    })->name('show');
    
    Route::put('/{order}/status', function($order, \Illuminate\Http\Request $request) {
        $order = \App\Models\Order::findOrFail($order);
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Order status updated successfully');
    })->name('update-status');
});

// Category Management
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', function() {
        $categories = \App\Models\Category::paginate(20);
        return view('admin.categories.index', compact('categories'));
    })->name('index');
    
    Route::get('/create', function() {
        return view('admin.categories.create');
    })->name('create');
    
    Route::post('/', function(\Illuminate\Http\Request $request) {
        \App\Models\Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    })->name('store');
});