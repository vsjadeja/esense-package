<?php

Route::group(['namespace' => 'Esense\Package\Http\Controllers','middleware' => ['web']], function() {
    Route::resource('package', 'PackageController');
});

