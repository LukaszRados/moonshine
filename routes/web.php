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
