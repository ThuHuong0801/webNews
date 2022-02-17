<?php 
namespace Framework\controllers;

use Framework\models\User;
use Framework\models\Post;
use Framework\models\Category;
use Framework\models\Comment;
use Framework\models\Config;
/**
* Class dùng để quản lý trang quản trị
*/
class AdminController extends BaseController
{
	
	public function index()
	{
		//echo "thuhuong";
		$totalpost = count(Post::all());
		$totaluser = count(User::all());
		$totalcate = count(Category::all());
		$totalcomment = count(Comment::all());
		return $this->view("admin/dashboard.php", compact('totalpost', 'totaluser', 'totalcomment', 'totalcate'), "admin/adminLayout");

	}

	//category
	public function listCategory()
	{	
		$category = Category::all();
		return $this->view("admin/category/category.php", compact("category"), "admin/adminLayout");
	}
	public function addNewCategory()
	{	
		$category = null;
		return $this->view("admin/category/add-cate.php", compact("category"), "admin/adminLayout");
	}
	public function saveCategory()
	{	
		if (isset($_POST['submit'])) {
			$id = isset($_POST['id']) ? $_POST['id']:null;
			$category_name = isset($_POST['category_name'])==true?$_POST['category_name']:null;
			if ($category_name == null) {
				header("location: /admin/category/add?msg=Tên danh mục không được trống!");
			}
			else{
				if ($id) {
					$category = Category::findOne($id);
				}
				else{
					$category = new Category();
				}
				$category->category_name = $category_name;
				if ($id) {
					$category->update();
				}
				else{
					$category->insert();					
				}
				
				header("location: /admin/category");
			}
		}
		
	}
	public function removeCategory($id)
	{	
		// $id = isset($_GET['id'])==true?$_GET['id']:null;
		// if ($id) {
			$category = Category::findOne($id);
			$category_name = $category->category_name;
			$category->delete();
			header("location: /admin/category?msg=Đã xóa danh mục ".$category_name);
		// }
	}
	public function updateCategory($id)
	{	
		//$id = isset($_GET['id'])==true?$_GET['id']:null;
		// if ($id) {
			$category = Category::findOne($id);
			return $this->view("/admin/category/update-cate.php", compact("category", "id"), "admin/adminLayout");
		//}
		
	}

	//post
	public function listPost()
	{
		$category_id = isset($_GET['category_id'])==true?$_GET['category_id']:null;
		if ($category_id) {
			$post = Category::findOne($category_id);
			$post = $post->getPostsOfCate();
		}
		else{
			$postmodel = new Post();
			$total = count($postmodel->all());
			$config = Config::where(['config_name', 'numofpost'])->get();
			$numofpost = $config[0]->config_value;
			$allpages = ceil($total/$numofpost);
			$currentpage = isset($_GET['page'])==true?$_GET['page']:0;
			$post = Post::where()->orderBy(['id', 'desc'])->limit([$currentpage*$numofpost, $numofpost])->get();

		}
		return $this->view("/admin/post/post.php", compact("post", "allpages", "currentpage","post"), "admin/adminLayout");
	}
	public function addNewPost()
	{
		$category = Category::all();
		return $this->view("/admin/post/add-post.php", compact("category"), "admin/adminLayout");
	}
	public function savePost(){
		
		if (isset($_POST['submit'])) {
			$id = isset($_GET['id'])==true?$_GET['id']:null;
			$title = isset($_POST['title'])==true?$_POST['title']:null;
			// $post_url = isset($_POST['url'])==true?$_POST['url']:null;
			$detail = isset($_POST['detail'])==true?$_POST['detail']:null;
			$category_id = isset($_POST['category_id'])==true?$_POST['category_id']:null;
			$thumbnail = isset($_FILES['thumbnail'])==true?$_FILES['thumbnail']:null;
			if ($title == null || $detail == null || $category_id == null) {
				//return $this->redirect('admin/posts/add?msg=Vui lòng nhập đầy đủ thông tin bài viết');
				header("location: /admin/posts/add?msg=Vui lòng nhập đầy đủ thông tin bài viết");
			}
			if ($id == null && $thumbnail['name'] == '' ) {
				//return $this->redirect('admin/posts/add?msg=Vui lòng nhập đầy đủ thông tin bài viết');
				header("location: /admin/posts/add?msg=Vui lòng nhập đầy đủ thông tin bài viết");
			}

			if ($id) {
				$post = Post::findOne($id);
			}
			else{
				$post = new Post();
			}
			$post->title = $title;
			$post->detail = $detail;
			// $post->post_url = $post_url;
			$post->user_id = json_decode($_SESSION['user'])->id;
			$post->category_id = $category_id;
			if ($id != null && $thumbnail['name']=="") {
			}
			else{
				$ext = strtolower(pathinfo($thumbnail['name'], PATHINFO_EXTENSION));
				$allowedExt = ['jpg', 'png', 'jpeg', 'gif'];
				if (!in_array($ext, $allowedExt)) {
					if ($id==null) {
						//return $this->redirect('admin/posts/add?msg=Vui lòng upload đúng định dạng ảnh');
						header("location: /admin/posts/add?msg=Vui lòng upload đúng định dạng ảnh");
					}
					else{
						//return $this->redirect('admin/posts/update?id='.$id.'&msg=Vui lòng upload đúng định dạng ảnh');
						header("location: /admin/posts/update?id='.$id.'&msg=Vui lòng upload đúng định dạng ảnh");
					}
				}
				$thumbnail['name'] = 'IMG_'.uniqid().md5(microtime()).'.'.$ext;
				move_uploaded_file($thumbnail['tmp_name'], 'public/images/uploaded/'.$thumbnail['name']);
				$post->thumbnail = $thumbnail['name'];
			}
			$post->post_time = \date("Y:m:d h:m:s");
			if ($id) {
				$post->update();
			}
			else{
				$post->insert();
			}
			//return $this->redirect('admin/posts');
			header("location: /admin/posts");
		}
	}
	public function updatePost()
	{	
		$id = isset($_GET['id'])==true?$_GET['id']:null;
		if ($id) {
			$category = Category::all();
			$post = Post::findOne($id);
			return $this->view("/admin/post/update-post.php", compact("category", 'post'), "admin/adminLayout");

		}
		
	}
	public function removePost()
	{	
		$id = isset($_GET['id'])==true?$_GET['id']:null;
		if ($id) {
			$post = Post::findOne($id);
			$title = $post->title;
			$post->delete();
			header("location: /admin/posts?msg=Đã xóa bài viết . $title");
		}
	}
	
	//profile
	public function changeEmail()
	{ 
		$decode = json_decode($_SESSION['user']);
		$user = User::findOne($decode->id);
		$information = 'information.php';
		return $this->view("/admin/changeemail.php", compact('user', 'information'), 'admin/adminLayout');
	}
	public function changePassword()
	{ 
		$decode = json_decode($_SESSION['user']);
		$user = User::findOne($decode->id);
		$information = 'information.php';
		return $this->view("/admin/changepassword.php", compact('user', 'information'), 'admin/adminLayout');
	}
	public function editpasswordProcess()
	{
		if (isset($_POST['submit'])) {
			$changeuser = json_decode($_SESSION['user']);
			$c_password = isset($_POST['c_password'])==true?$_POST['c_password']:null;
			$password = isset($_POST['password'])==true?$_POST['password']:null;
			$cf_password = isset($_POST['cf_password'])==true?$_POST['cf_password']:null;
			if ($password == null || $c_password == null || $cf_password == null) {
				//return $this->redirect('admin/profile/editpassword?msg=Hãy điền tất cả thông tin nhé!');
				header('location: /admin/profile/editpassword?msg=Hãy điền tất cả thông tin nhé!');
				die;
			}
			if ($password !== $cf_password) {
				//return $this->redirect('admin/profile/editpassword?msg=Mật khẩu mới không được trùng với mật khẩu cũ.');
				header('location: /admin/profile/editpassword?msg=Mật khẩu mới không được trùng với mật khẩu cũ.');
				die;
			}
			if ($changeuser->password != md5($c_password)) {
				//return $this->redirect('admin/profile/editpassword?msg=Mật khẩu hiện tại không chính xác.');
				header('location: /admin/profile/editpassword?msg=Mật khẩu hiện tại không chính xác.');
				die;
			}
			$changeuser = User::findOne($changeuser->id);
			$changeuser->password = md5($password);
			$changeuser->update();
			$newinfo = User::findOne($changeuser->id);
			$_SESSION['user'] = json_encode($newinfo);
			//return $this->redirect('admin/logout');
			header('location: /logout');
		}
	}
	public function editemailProcess()
	{
		if (isset($_POST['submit'])) {
			$changeemailuser = json_decode($_SESSION['user']);
			$email = isset($_POST['email'])==true?$_POST['email']:null;
			$password = isset($_POST['password'])==true?$_POST['password']:null;
			if ($email==null || $password == null) {
				//return $this->redirect('admin/profile/editemail?msg=Hãy điền tất cả thông tin nhé!');
				header('location:/ admin/profile/editemail?msg=Hãy điền tất cả thông tin nhé!');
				die;
			}
			if ($changeemailuser->password != md5($password)) {
				//return $this->redirect('admin/profile/editemail?msg=Mật khẩu không khớp, vui lòng nhập lại!');
				header('location: /admin/profile/editemail?msg=Mật khẩu không khớp, vui lòng nhập lại!');
				die;
			}
			$changeemailuser = User::findOne($changeemailuser->id);
			$changeemailuser->email = $email;
			$changeemailuser->update();
			$newinfo = User::findOne($changeemailuser->id);
			$_SESSION['user'] = json_encode($newinfo);
			//return $this->redirect('admin/profile/editemail?msg=Your email have been changed');
			header('location: /admin/profile/editemail?msg=Your email have been changed');
		}
	}


	public function edit()
	{
		$stt = isset($_GET['status'])==true?$_GET['status']:null;
		$decode = json_decode($_SESSION['user']);
		if ($stt == "ok") {
			$user = User::findOne($decode->id);
			$_SESSION['user'] = json_encode($user);
		}
		$decode = json_decode($_SESSION['user']);
		$information = 'information.php';
		$user = User::findOne($decode->id);
		return $this->view('/admin/edit-profile.php', compact('information', 'user'), 'admin/adminLayout');

	}
	public function saveEdit()
	{
		if (isset($_POST['submit'])) {
			$fullname = isset($_POST['fullname'])==true?$_POST['fullname']:null;
			$about = isset($_POST['about'])==true?$_POST['about']:null;
			$avatar =isset($_FILES['avatar'])==true?$_FILES['avatar']:null;
			if ($fullname == null) {
				//return $this->redirect('admin/profile/edit?msg=Please enter all of information');
				header('location: /admin/profile/edit?msg=Please enter all of information');
				die;
			}
			$decode = json_decode($_SESSION['user']);
			$user = User::findOne($decode->id);
			$user->fullname = $fullname;
			$user->about = $about;
			if ($avatar['name'] != "" && $avatar != false) {
				$ext = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
				$allowedExt = ['jpg', 'png', 'jpeg', 'gif'];
				if (!in_array($ext, $allowedExt)) {
					//return $this->redirect('admin/profile/edit?msg=Invaild images format&action=1');
					header('location: /admin/profile/edit?msg=Invaild images format&action=1');
					die;
				}
				$avatar['name'] = 'IMG_'.md5(uniqid().$avatar['name'].rand(1,1000)).'.'.$ext;
				move_uploaded_file($avatar['tmp_name'], 'public/images/uploaded/'.$avatar['name']);
				$user->avatar = $avatar['name'];
			}
			$user->update();

			//return $this->redirect('admin/profile/edit?status=ok&msg=Đã thay đổi thông tin thành công.');
			header('location: /admin/profile/edit?status=ok&msg=Đã thay đổi thông tin thành công.');
		}
	}

	//setting
	public function siteSetting()
	{

		$site = new Config();
		$title = $site->where(['config_name', 'title'])->first()->config_value;
		$description = $site->where(['config_name', 'description'])->first()->config_value;
		$favicon = $site->where(['config_name', 'favicon'])->first()->config_value;
		return $this->view('/admin/site/setting.php', compact('title', 'description', 'favicon'), 'admin/adminLayout');
	}
	public function saveSetting()
	{
		if (isset($_POST['submit'])) {
			$site = new Config();
			$title = isset($_POST['title'])==true?$_POST['title']:null;
			$description = isset($_POST['description'])==true?$_POST['description']:null;
			$favicon = isset($_FILES['favicon'])==true?$_FILES['favicon']:null;
			if ($favicon != null && $favicon['name'] !="") {
				$ext = strtolower(pathinfo($favicon['name'], PATHINFO_EXTENSION));
				$allowedExt = ['jpg', 'png', 'jpeg', 'gif', 'ico'];
				if (!in_array($ext, $allowedExt)) {
					//return $this->redirect('admin/site/setting?msg=File favicon không hợp lệ.');
					header('location: /admin/site/setting?msg=File favicon không hợp lệ.');
					die;
				}
				$favicon['name'] = "favicon.".$ext;
				move_uploaded_file($favicon['tmp_name'], 'images/'.$favicon['name']);
				$faviconModel = $site->where(['config_name', 'favicon'])->first();
				$faviconModel->config_value = $favicon['name'];
				$faviconModel->update();

			}
			

			$titleModel = $site->where(['config_name', 'title'])->first();
			$titleModel->config_value = $title;
			$titleModel->update();


			$titleModel = $site->where(['config_name', 'title'])->first();
			$titleModel->config_value = $title;
			$titleModel->update();

			$descriptionModel = $site->where(['config_name', 'description'])->first();
			$descriptionModel->config_value = $description;
			$descriptionModel->update();
			//return $this->redirect('admin/site/setting?msg=Đã thay đổi thông tin website');
			header('location: /admin/site/setting?msg=Đã thay đổi thông tin website');
		}
	}
}
