<?php 
namespace Framework\controllers;

use Framework\models\Post;
use Framework\models\Comment;
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
			// print_r($post);
			if (!$post) {
				
				return $this->view("404", [],  '405');
			}
			else{
				if (!isset($_SESSION['views'][$id])) {
					$_SESSION['views'][$id] = 'ok';
					$post->views = $post->views + 1;
					$post->update();
				}
				$commentModel = $post->comment();
				$comment = $this->view("post/comment.php", compact('commentModel', 'id'));
				$sidebar = 'sidebar.php';
				$title = $post->title;
				return $this->view("post/post.php", compact("post", "sidebar", "comment", "commentModel", "title"), "layout/layout");
			}
		}else{
			return $this->view( '', [], "404");
		}
	}
	public function comment()
	{
		$id = isset($_GET['id'])==true?$_GET['id']:null;
		if (!$id) {
			//return $this->redirect('post?id='.$id);
			header('location:post?id='.$id);
		}
		$message = isset($_POST['message'])==true?$_POST['message']:null;
		$name = isset($_POST['name'])==true?$_POST['name']:null;
		$email = isset($_POST['email'])==true?$_POST['email']:null;
		if ($message == null || $name == null || $email == null) {
			//return $this->redirect('post?id='.$id.'&msg=Vui lòng nhập đủ thông tin.');
			header('location:post?id='.$id.'&msg=Vui lòng nhập đủ thông tin.');
		}
		$quest = ['name' => $name, 'email' => $email];
		if (!isset($_SESSION['comment'])) {
			$_SESSION['comment'] = json_encode($quest);
		}
		$comment = new Comment();
		$comment->quest = json_encode($quest);
		$comment->message = $message;
		$comment->post_id = $id;
		$comment->comment_time = date('Y:m:d H:i:s');
		$comment->insert();
		//return $this->redirect('post?id='.$id);
		header('location:post?id='.$id);
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
