<?php 
namespace Framework\controllers;

use Framework\models\Post;
use Framework\models\Config;
/**
* Controller cho trang chủ cho webiste
*/
class HomeController extends BaseController
{
	function index()
	{	
		$postmodel = new Post();
		$total = count($postmodel->all());
		$config = Config::where(['config_name', 'numofpost'])->get();
		$numofpost = $config[0]->config_value;
		$allpages = ceil($total/$numofpost);
		$currentpage = isset($_GET['page'])==true?$_GET['page']:0;
		$post = $postmodel->where()->orderBy(['post_time', 'desc'])->limit([$currentpage*$numofpost, $numofpost])->get();
		$sidebar = 'sidebar.php';
		$hotnewsData = $this->hotNews();
		$toponepost = $hotnewsData['toponepost'];
		$top4post = $hotnewsData['top4post'];
		$hotnews = 'hotnews.php';
		$site = new Config();
		$toppost = $postmodel->where()->orderBy(['views', 'desc'])->limit([5])->get();
		$title = $site->where(['config_name', 'title'])->first()->config_value;
		$description = $site->where(['config_name', 'description'])->first()->config_value;
		$favicon = $site->where(['config_name', 'favicon'])->first()->config_value;
		return $this->view("homepage.php", compact("post", 'toponepost', 'top4post', "allpages", "currentpage", "sidebar", 'hotnews', 'title', 'description', 'favicon', 'toppost'), 'layout/layout');
	}

	public function hotNews()
	{
		$post = new Post();
		$toponepost = $post->where()->orderBy(['views', 'desc'])->first(); 
		$top4post = $post->where()->orderBy(['views', 'desc'])->limit([1, 3])->get();
		return [
			'toponepost' => $toponepost,
			'top4post' => $top4post
		];
	}

}