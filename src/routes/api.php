<?php

use EniumCriacaoSites\Types\Http\TypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::group(['middleware' => ['api']], function () {
        Route::apiResource('types', TypeController::class);
    });
});