<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Groups\{
    IndexController as GroupsIndexController,
    ShowController as GroupsShowController,
    DeleteController as GroupsDeleteController,
    CreateController as GroupsCreateController,
    StoreController as GroupsStoreController,
};
use App\Http\Controllers\Albums\{
    IndexController as AlbumsIndexController,
    ShowController as AlbumsShowController,
    DeleteController as AlbumsDeleteController,
    CreateController as AlbumsCreateController,
    StoreController as AlbumsStoreController,
};
use App\Http\Controllers\Tracks\{
    IndexController as TracksIndexController,
    DeleteController as TracksDeleteController,
    CreateController as TracksCreateController,
    StoreController as TracksStoreController,
};
use App\Http\Controllers\Admin\{
    IndexController as AdminIndexController,
    AuthController as AdminAuthController,
    LogOutController as AdminLogOutController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view("/", "main");

Route::name("groups.")->group(function () {
    Route::get("groups", GroupsIndexController::class)->name("index");
    Route::get("groups/create", GroupsCreateController::class)->middleware("auth")->name("create");
    Route::post("groups/store", GroupsStoreController::class)->name("store");
    Route::delete("groups/{group}", GroupsDeleteController::class)->name("delete");
    Route::get("groups/{group}", GroupsShowController::class)->name("show");
});

Route::name("albums.")->group(function () {
    Route::get("albums", AlbumsIndexController::class)->name("index");
    Route::get("albums/create", AlbumsCreateController::class)->middleware("auth")->name("create");
    Route::post("albums/store", AlbumsStoreController::class)->name("store");
    Route::delete("albums/{album}", AlbumsDeleteController::class)->name("delete");
    Route::get("albums/{album}", AlbumsShowController::class)->name("show");
});

Route::name("tracks.")->group(function () {
    Route::get("tracks", TracksIndexController::class)->name("index");
    Route::get("tracks/create", TracksCreateController::class)->middleware("auth")->name("create");
    Route::post("tracks/store", TracksStoreController::class)->name("store");
    Route::delete("tracks/{track}", TracksDeleteController::class)->name("delete");
});

Route::get("console", AdminIndexController::class)->name("admin.index");
Route::name("admin.")->group(function () {
    Route::post("admin/auth", AdminAuthController::class)->name("auth");
    Route::get("admin/logout", AdminLogOutController::class)->name("logout");
});