<?php
$locale = request()->segment(1);
if (array_key_exists($locale, config('admin.languages'))) {
    config()->set('locale', $locale);
} else {
    config()->set('locale', 'pl');
    $locale = null;
}

Route::middleware('localisation.front')->prefix($locale)->group(function () {
    Route::get('/', 'PagesController@index')->name('home');
});
