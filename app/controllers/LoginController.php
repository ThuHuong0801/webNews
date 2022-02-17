<?php 
namespace Framework\controllers;

use Framework\controllers\BaseController;
use Framework\models\User;
/**
* Class dùng để quản lý trang quản trị
*/
class LoginController extends BaseController
{

	public function loginForm()
	{
		//return $this->view("admin/login");
		//echo 'thuhuong';
		return $this->view('', [], "/admin/login");
	}
	public function loginProcess()
	{
		if (isset($_POST['login-submit'])) {
			$usermodel = new User();
			$username = isset($_POST['username'])==true?$_POST['username']:null;
			$password = isset($_POST['password'])==true?$_POST['password']:null;
			if ($username == null || $password == null) {
				//return $this->redirect('admin/login?msg=Hãy điền đầy đủ thông tin nhé!');
				header('location: /admin/login?msg=Hãy điền đầy đủ thông tin nhé!');
				die;
			}
			$user = $usermodel->where(['username', $username])->first();
			if (!$user) {
				//return $this->redirect('admin/login?msg=Thông tin của bạn không chính xác.');
				header('location: /admin/login?msg=Thông tin của bạn không chính xác.');
				die;
			}
			if (hash_equals(md5($password), $user->password)) {
				$_SESSION['user'] = json_encode($user);
				if (isset($_POST['remember'])) {
					$remember_token = "_token_".uniqid(rand(1,1000)).md5(microtime().rand(1,1000));
					$expired_time = date("Y:m:d H:m:s", time() + 3600*24*10);
					setcookie('remember_token', $remember_token, time() + 3600*24*10, '/');
					$user->remember_token = $remember_token;
					$user->expired_time = $expired_time;
					$user->update();
				}
				//return $this->redirect('admin');
				header('location: /admin');

			}else{
				//return $this->redirect('admin/login?msg=Thông tin của bạn không chính xác.');
				header('location: /admin/login?msg=Thông tin của bạn không chính xác.');
				die;
			}
		}
	}
	public function logout()
	{
		$_SESSION['user'] = null;
		setcookie("remember_token", "", time() - 3600*24*10, "/");
		$_COOKIE['remember_token'] = null;
		//return $this->redirect('admin/login?msg=Bạn đã đăng xuất thành công!');
		header('location: /admin/login?msg=Bạn đã đăng xuất thành công!');
	}
}
