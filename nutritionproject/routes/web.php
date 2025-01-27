
<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\DashboardController;

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login'); // Show login form
Route::post('login', [LoginController::class, 'login']); // Handle login
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Handle logout

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Show registration form
Route::post('register', [RegisterController::class, 'register']); // Handle registration

// Routes that require authentication (User must be logged in)
Route::middleware('auth')->group(function () {

    // User Profile Routes
    Route::get('profile', [UserProfileController::class, 'show'])->name('profile.show'); // View user profile
    Route::get('profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit'); // Edit user profile form
    Route::post('profile/edit', [UserProfileController::class, 'update'])->name('profile.update'); // Update user profile

    // Meal Tracking Routes
    Route::get('meal-log', [MealController::class, 'index'])->name('meal-log.index'); // View meal log
    Route::get('meal-log/create', [MealController::class, 'create'])->name('meal-log.create'); // Add a new meal
    Route::post('meal-log/create', [MealController::class, 'store'])->name('meal-log.store'); // Store a new meal
    Route::get('meal-log/{meal}/edit', [MealController::class, 'edit'])->name('meal-log.edit'); // Edit an existing meal
    Route::post('meal-log/{meal}/edit', [MealController::class, 'update'])->name('meal-log.update'); // Update an existing meal
    Route::delete('meal-log/{meal}', [MealController::class, 'destroy'])->name('meal-log.destroy'); // Delete a meal

    // Goal Setting Routes
    Route::get('goals', [GoalController::class, 'index'])->name('goals.index'); // View user goals
    Route::get('goals/create', [GoalController::class, 'create'])->name('goals.create'); // Add a new goal
    Route::post('goals/create', [GoalController::class, 'store'])->name('goals.store'); // Store a new goal
    Route::get('goals/{goal}/edit', [GoalController::class, 'edit'])->name('goals.edit'); // Edit an existing goal
    Route::post('goals/{goal}/edit', [GoalController::class, 'update'])->name('goals.update'); // Update an existing goal
    Route::delete('goals/{goal}', [GoalController::class, 'destroy'])->name('goals.destroy'); // Delete a goal

    // Food Search and Nutritional Information Routes
    Route::get('food/search', [FoodController::class, 'search'])->name('food.search'); // Search for food items
    Route::get('food/{food}', [FoodController::class, 'show'])->name('food.show'); // View nutritional info for a specific food item

    // Progress Tracking Routes
    Route::get('progress', [ProgressController::class, 'index'])->name('progress.index'); // View progress overview
    Route::get('progress/weight', [ProgressController::class, 'weightHistory'])->name('progress.weight'); // View weight history
    Route::get('progress/nutrients', [ProgressController::class, 'nutrientTrends'])->name('progress.nutrients'); // View nutrient trends

    // Barcode Scanner Routes
    Route::get('barcode-scanner', [BarcodeController::class, 'index'])->name('barcode-scanner.index'); // Show barcode scanner
    Route::post('barcode-scanner', [BarcodeController::class, 'scan'])->name('barcode-scanner.scan'); // Handle barcode scan

    // Dashboard Routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index'); // View user dashboard
});
