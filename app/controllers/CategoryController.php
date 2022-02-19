<?php 
namespace Framework\controllers;

use Framework\models\Category;
use Framework\models\Post;
use Framework\models\Config;
/**
* Controller cho trang chủ cho webiste
*/
class CategoryController extends BaseController
{
	
	public function showPosts()
	{
		$id = isset($_GET['id'])==true?$_GET['id']:null;
		$category = Category::findOne($id);
		$title = $category->category_name;
		$post = new Post();
		$total = count($post->where(['category_id', $id])->get());
		$config = Config::where(['config_name', 'numofpost'])->get();
		$numofpost = $config[0]->config_value;
		$allpages = ceil($total/$numofpost);
		$currentpage = isset($_GET['page'])==true?$_GET['page']:0;
		$post = $post->where(['category_id', $id])->limit([$currentpage*$numofpost, $numofpost])->get();
		$sidebar = 'sidebar.php';
		return $this->view('category/showposts.php', compact('id', 'post', "allpages", "currentpage", 'category', 'sidebar', 'title'), "admin/adminLayout");
	}

}
