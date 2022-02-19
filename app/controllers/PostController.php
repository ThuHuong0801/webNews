<?php 
namespace Framework\controllers;

use Framework\models\Post;
/**
* Controller cho bài viết cho webiste
*/
class PostController extends BaseController
{
	
	function viewPost()
	{	
		$id = isset($_GET['id'])==true?$_GET['id']:null;
		if ($id) {
			$post = Post::findOne($id);
			if (!$post) {
				
				return $this->view("404", [],  '405');
			}
			else{
				if (!isset($_SESSION['views'][$id])) {
					$_SESSION['views'][$id] = 'ok';
					$post->views = $post->views + 1;
					$post->update();
				}
				$sidebar = 'sidebar.php';
				$title = $post->title;
				return $this->view("post/post.php", compact("post", "sidebar", "title"), "layout/layout");
			}
		}else{
			return $this->view( '', [], "404");
		}
	}
	public function search()
	{
		$keyword = isset($_GET['keyword'])==true?$_GET['keyword']:null;
		if ($keyword) {
			$postSearch = Post::where(['title', 'like', '%'.$keyword.'%'])->get();
			$this->response($postSearch, 200);
		}
	}

}
