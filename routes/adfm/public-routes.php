<?php

Route::group(['namespace' => 'App\Http\Controllers\Site', 'middleware' => ['web']], function () {
    Route::get('/catalog', 'CatalogController@showCatalog')->name('adfm.show.catalog');

    Route::get('/', 'PageController@showMainPage')->name('adfm.show.main-page');
    Route::get('/{slug}', 'PageController@showPage')->name('adfm.show.page');
});

Route::post('message', 'App\Http\Controllers\Admin\FeedbackController@store')->name('adfm.feedbacks.store')->middleware('web');
