<?php
$locale = request()->segment(1);
if (array_key_exists($locale, config('admin.languages'))) {
    config()->set('locale', $locale);
    App::setLocale($locale);
} else {
    config()->set('locale', 'pl');
    App::setLocale('pl');
    $locale = null;
}

Route::middleware('localisation.front')->prefix($locale)->group(function () {
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/boat', 'PagesController@boat')->name('boat');
    Route::get('/crew', 'PagesController@crew')->name('crew');
    Route::get('/contact', 'PagesController@contact')->name('contact');
});

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
});
