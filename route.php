<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "vendor/autoload.php";

use Framework\Route;

Route::get('/', 'HomeController@index');
Route::get('/post', 'PostController@viewPost');
Route::get('/search', 'PostController@search');
Route::get('/category', 'CategoryController@showPosts');

//admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/login', 'LoginController@loginForm');
Route::post('/admin/loginProcess', 'LoginController@loginProcess');
Route::get('/admin/logout', 'LoginController@logout');

Route::get('/admin/category', 'AdminController@listCategory');
Route::get('/admin/category/add', 'AdminController@addNewCategory');
Route::post('/admin/category/save', 'AdminController@saveCategory');
Route::get('/admin/category/update/{id}', 'AdminController@updateCategory');
Route::get('/admin/category/delete/{id}', 'AdminController@removeCategory');

Route::get('/admin/posts', 'AdminController@listPost');
Route::get('/admin/posts/add', 'AdminController@addNewPost');
Route::post('/admin/posts/save', 'AdminController@savePost');
Route::get('/admin/posts/update/{id}', 'AdminController@updatePost');
Route::get('/admin/posts/delete/{id}', 'AdminController@removePost');

Route::get('/admin/site/setting', 'AdminController@siteSetting');
Route::post('/admin/site/saveSetting', 'AdminController@saveSetting');

Route::get('/admin/profile/edit', 'AdminController@edit');
Route::post('/admin/profile/saveEdit', 'AdminController@saveEdit');
Route::get('/admin/profile/editemail', 'AdminController@changeEmail');
Route::post('/admin/profile/editemailProcess', 'AdminController@editemailProcess');
Route::get('/admin/profile/editpassword', 'AdminController@changePassword');
Route::post('/admin/profile/editpasswordProcess', 'AdminController@editpasswordProcess');


$router = new Route;

try {
    $route = $router->getRoute();
} catch (\Exception $exception) {
    echo $exception->getMessage();
    exit();
}

$route = $router->matchController();