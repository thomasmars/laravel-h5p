<?php

Route::group(['middleware' => ['web']], function () {

    if (config('laravel-h5p.use_router') == 'EDITOR' || config('laravel-h5p.use_router') == 'ALL') {
        Route::group(['middleware' => ['auth']], function () {
            Route::resource('h5p', "thomasmars\LaravelH5p\Http\Controllers\H5pController");
//            Route::get('h5p/export', 'thomasmars\LaravelH5p\Http\Controllers\H5pController@export')->name("h5p.export");

            Route::get('library', "thomasmars\LaravelH5p\Http\Controllers\LibraryController@index")->name("h5p.library.index");
            Route::get('library/show/{id}', "thomasmars\LaravelH5p\Http\Controllers\LibraryController@show")->name("h5p.library.show");
            Route::post('library/store', "thomasmars\LaravelH5p\Http\Controllers\LibraryController@store")->name("h5p.library.store");
            Route::delete('library/destory', "thomasmars\LaravelH5p\Http\Controllers\LibraryController@destory")->name("h5p.library.destory");
            Route::get('library/restrict', "thomasmars\LaravelH5p\Http\Controllers\LibraryController@restrict")->name("h5p.library.restrict");
            Route::post('library/clear', "thomasmars\LaravelH5p\Http\Controllers\LibraryController@clear")->name("h5p.library.clear");
        });


        // ajax
        Route::match(['GET', 'POST'], 'ajax/libraries', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@libraries')->name("h5p.ajax.libraries");
        Route::get('ajax', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController')->name("h5p.ajax");
        Route::get('ajax/libraries', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@libraries')->name("h5p.ajax.libraries");
        Route::get('ajax/single-libraries', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@singleLibrary')->name("h5p.ajax.single-libraries");
        Route::post('ajax/content-type-cache', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@contentTypeCache')->name("h5p.ajax.content-type-cache");
        Route::post('ajax/library-install', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@libraryInstall')->name("h5p.ajax.library-install");
        Route::post('ajax/library-upload', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@libraryUpload')->name("h5p.ajax.library-upload");
        Route::post('ajax/rebuild-cache', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@rebuildCache')->name("h5p.ajax.rebuild-cache");
        Route::post('ajax/files', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@files')->name("h5p.ajax.files");
        Route::get('ajax/finish', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@finish')->name("h5p.ajax.finish");
        Route::post('ajax/content-user-data', 'thomasmars\LaravelH5p\Http\Controllers\AjaxController@contentUserData')->name("h5p.ajax.content-user-data");
    }

    // export
//    if (config('laravel-h5p.use_router') == 'EXPORT' || config('laravel-h5p.use_router') == 'ALL') {
        Route::get('h5p/embed/{id}', 'thomasmars\LaravelH5p\Http\Controllers\EmbedController')->name("h5p.embed");
        Route::get('h5p/export/{id}', 'thomasmars\LaravelH5p\Http\Controllers\DownloadController')->name("h5p.export");
//    }
});
