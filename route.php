<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "vendor/autoload.php";

use Framework\Route;

Route::get('/', 'HomeController@index');
Route::get('/post', 'PostController@viewPost');
Route::get('/search', 'PostController@search');

Route::get('/post/comment', 'PostController@comment');
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

Route::get('/admin/profile/edit', 'AdminController@edit');
Route::get('/admin/profile/editemail', 'AdminController@changeEmail');
Route::get('/admin/profile/editpassword', 'AdminController@changePassword');


$router = new Route;

try {
    $route = $router->getRoute();
} catch (\Exception $exception) {
    echo $exception->getMessage();
    exit();
}

$route = $router->matchController();



// $url = isset($_GET['url']) == true ? $_GET['url'] : "/";
// switch ($url) {
// 	case "/":
// 		$ctl = new HomeController();
// 		echo $ctl->index();
// 		break;
// 	case "post":
// 		$ctl = new PostController();
// 		echo $ctl->viewPost();
// 		break;
// 	case "search":
// 		$ctl = new PostController();
// 		echo $ctl->search();
// 		break;
// 	case "post/comment":
// 		$ctl = new PostController();
// 		echo $ctl->comment();
// 		break;
// 	case "category":
// 		$ctl = new CategoryController();
// 		echo $ctl->showPosts();
// 		break;

// 		//admin
// 		//admin.login/logout
// 	case "admin":
// 		$ctl = new AdminController();
// 		echo $ctl->index();
// 		break;
// 	case "admin/login":
// 		$ctl = new LoginController();
// 		echo $ctl->loginForm();
// 		break;
// 	case "admin/loginProcess":
// 		$ctl = new LoginController();
// 		echo $ctl->loginProcess();
// 		break;
// 	case "admin/logout":
// 		$ctl = new LoginController();
// 		echo $ctl->logout();
// 		break;
// 		//admin.category
// 	case "admin/category":
// 		$ctl = new AdminController();
// 		echo $ctl->listCategory();
// 		break;
// 	case "admin/category/add":
// 		$ctl = new AdminController();
// 		echo $ctl->addNewCategory();
// 		break;
// 	case "admin/category/save":
// 		$ctl = new AdminController();
// 		echo $ctl->saveCategory();
// 		break;
// 	case "admin/category/update":
// 		$ctl = new AdminController();
// 		echo $ctl->updateCategory();
// 		break;
// 	case "admin/category/delete":
// 		$ctl = new AdminController();
// 		echo $ctl->removeCategory();
// 		break;
// 		//admin.post
// 	case "admin/posts":
// 		$ctl = new AdminController();
// 		echo $ctl->listPost();
// 		break;
// 	case "admin/posts/add":
// 		$ctl = new AdminController();
// 		echo $ctl->addNewPost();
// 		break;
// 	case "admin/posts/save":
// 		$ctl = new AdminController();
// 		echo $ctl->savePost();
// 		break;
// 	case "admin/posts/update":
// 		$ctl = new AdminController();
// 		echo $ctl->updatePost();
// 		break;
// 	case "admin/posts/delete":
// 		$ctl = new AdminController();
// 		echo $ctl->removePost();
// 		break;
// 		//admin.setting
// 	case "admin/site/setting":
// 		$ctl = new AdminController();
// 		echo $ctl->siteSetting();
// 		break;
// 	case "admin/site/saveSetting":
// 		$ctl = new AdminController();
// 		echo $ctl->saveSetting();
// 		break;
// 		//admin.profile
// 	case "admin/profile/edit":
// 		$ctl = new AdminController();
// 		echo $ctl->edit();
// 		break;
// 	case "admin/profile/saveEdit":
// 		$ctl = new AdminController();
// 		echo $ctl->saveEdit();
// 		break;
// 	case "admin/profile/editemail":
// 		$ctl = new AdminController();
// 		echo $ctl->changeEmail();
// 		break;
// 	case "admin/profile/editemailProcess":
// 		$ctl = new AdminController();
// 		echo $ctl->editemailProcess();
// 		break;
// 	case "admin/profile/editpassword":
// 		$ctl = new AdminController();
// 		echo $ctl->changePassword();
// 		break;
// 	case "admin/profile/editpasswordProcess":
// 		$ctl = new AdminController();
// 		echo $ctl->editpasswordProcess();
// 		break;
// 	default:
// 		$msg = "Trang bạn tìm kiếm không có thật. Vui lòng liên hệ với ban quản trị.";
// 		require_once 'views/404.php';
// 		break;
// }
