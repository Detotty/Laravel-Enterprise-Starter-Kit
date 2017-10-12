<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


///////
// Canned auth routes.
Auth::routes();

///////
// Registration terms
Route::get( 'faust',                    ['as' => 'faust',                   'uses' => 'FaustController@index']);

///////
// Home
Route::get('/', 		['as' => 'backslash', 'uses' => 'HomeController@index']);
Route::get('index',     ['as' => 'index',     'uses' => 'HomeController@index']);
Route::get('home',      ['as' => 'home',      'uses' => 'HomeController@index']);
Route::get('welcome',   ['as' => 'welcome',   'uses' => 'HomeController@welcome']);
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

///////
// Admin
Route::prefix('admin')->group(function () {
    // Permissions
    Route::post  ('permissions',                   ['as' => 'admin.permissions.store',   'uses' => 'PermissionsController@store'  ]);
    Route::get   ('permissions',                   ['as' => 'admin.permissions.index',   'uses' => 'PermissionsController@index'  ]);
    Route::get   ('permissions/create',            ['as' => 'admin.permissions.create',  'uses' => 'PermissionsController@create' ]);
    Route::patch ('permissions/{permission}',      ['as' => 'admin.permissions.update',  'uses' => 'PermissionsController@update' ]);
    Route::get   ('permissions/{permission}',      ['as' => 'admin.permissions.show',    'uses' => 'PermissionsController@show'   ]);
    Route::delete('permissions/{permission}',      ['as' => 'admin.permissions.destroy', 'uses' => 'PermissionsController@destroy']);
    Route::get   ('permissions/{permission}/edit', ['as' => 'admin.permissions.edit',    'uses' => 'PermissionsController@edit'   ]);
    // Roles
    Route::get(   'roles/search',      ['as' => 'admin.roles.search',   'uses' => 'RolesController@searchByName']);
    Route::post(  'roles/getInfo',     ['as' => 'admin.roles.get-info', 'uses' => 'RolesController@getInfo']);

    Route::post(  'roles/enableSelected',          ['as' => 'admin.roles.enable-selected',  'uses' => 'RolesController@enableSelected']);
    Route::post(  'roles/disableSelected',         ['as' => 'admin.roles.disable-selected', 'uses' => 'RolesController@disableSelected']);
    Route::get   ('roles/create',                  ['as' => 'admin.roles.create',           'uses' => 'RolesController@create' ]);
    Route::patch ('roles/{roleId}',                ['as' => 'admin.roles.update',           'uses' => 'RolesController@update' ]);
    Route::get   ('roles/{roleId}',                ['as' => 'admin.roles.show',             'uses' => 'RolesController@show'   ]);
    Route::delete('roles/{roleId}',                ['as' => 'admin.roles.destroy',          'uses' => 'RolesController@destroy']);
    Route::get   ('roles/{roleId}/edit',           ['as' => 'admin.roles.edit',             'uses' => 'RolesController@edit'   ]);
    Route::post  ('roles/{roleId}/edit',           ['as' => 'admin.roles.edit',             'uses' => 'RolesController@edit'   ]);
    Route::get   ('roles/{roleId}/confirm-delete', ['as' => 'admin.roles.confirm-delete',   'uses' => 'RolesController@getModalDelete']);
    Route::get   ('roles/{roleId}/delete',         ['as' => 'admin.roles.delete',           'uses' => 'RolesController@destroy']);
    Route::get   ('roles/{roleId}/enable',         ['as' => 'admin.roles.enable',           'uses' => 'RolesController@enable']);
    Route::get   ('roles/{roleId}/disable',        ['as' => 'admin.roles.disable',          'uses' => 'RolesController@disable']);
    Route::post  ('roles/store',                   ['as' => 'admin.roles.store',            'uses' => 'RolesController@store'  ]);
    Route::get   ('roles',                         ['as' => 'admin.roles.index',            'uses' => 'RolesController@index'  ]);
    Route::post  ('roles',                         ['as' => 'admin.roles.index',            'uses' => 'RolesController@index'  ]);

    // Routes
    Route::post  ('routes',              ['as' => 'admin.routes.store',   'uses' => 'RoutesController@store'  ]);
    Route::get   ('routes',              ['as' => 'admin.routes.index',   'uses' => 'RoutesController@index'  ]);
    Route::get   ('routes/create',       ['as' => 'admin.routes.create',  'uses' => 'RoutesController@create' ]);
    Route::patch ('routes/{route}',      ['as' => 'admin.routes.update',  'uses' => 'RoutesController@update' ]);
    Route::get   ('routes/{route}',      ['as' => 'admin.routes.show',    'uses' => 'RoutesController@show'   ]);
    Route::delete('routes/{route}',      ['as' => 'admin.routes.destroy', 'uses' => 'RoutesController@destroy']);
    Route::get   ('routes/{route}/edit', ['as' => 'admin.routes.edit',    'uses' => 'RoutesController@edit'   ]);
    // Users
    Route::post(  'users/enableSelected',          ['as' => 'admin.users.enable-selected',  'uses' => 'UsersController@enableSelected']);
    Route::post(  'users/disableSelected',         ['as' => 'admin.users.disable-selected', 'uses' => 'UsersController@disableSelected']);
    Route::get   ('users/create',                  ['as' => 'admin.users.create',           'uses' => 'UsersController@create' ]);
    Route::patch ('users/{userId}',                ['as' => 'admin.users.update',           'uses' => 'UsersController@update' ]);
    Route::get   ('users/{userId}',                ['as' => 'admin.users.show',             'uses' => 'UsersController@show'   ]);
    Route::delete('users/{userId}',                ['as' => 'admin.users.destroy',          'uses' => 'UsersController@destroy']);
    Route::get   ('users/{userId}/edit',           ['as' => 'admin.users.edit',             'uses' => 'UsersController@edit'   ]);
    Route::post  ('users/{userId}/edit',           ['as' => 'admin.users.edit',             'uses' => 'UsersController@edit'   ]);
    Route::get   ('users/{userId}/confirm-delete', ['as' => 'admin.users.confirm-delete',   'uses' => 'UsersController@getModalDelete']);
    Route::get   ('users/{userId}/delete',         ['as' => 'admin.users.delete',           'uses' => 'UsersController@destroy']);
    Route::get   ('users/{userId}/enable',         ['as' => 'admin.users.enable',           'uses' => 'UsersController@enable']);
    Route::get   ('users/{userId}/disable',        ['as' => 'admin.users.disable',          'uses' => 'UsersController@disable']);
    Route::post  ('users/store',                   ['as' => 'admin.users.store',            'uses' => 'UsersController@store'  ]);
    Route::get   ('users',                         ['as' => 'admin.users.index',            'uses' => 'UsersController@index'  ]);
    Route::post  ('users',                         ['as' => 'admin.users.index',            'uses' => 'UsersController@index'  ]);
});
