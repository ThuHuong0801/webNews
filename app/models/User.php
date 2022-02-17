<?php 
namespace Framework\models;
/**
* 
*/
class User extends BaseModel
{
	public $tableName = 'users';
	public $columns = ['id', 'email', 'username', 'about', 'avatar', 'fullname', 'password', 'expired_time', 'remember_token'];
	public function getMyPosts()
	{
		$post = new Post();
		$mypost = $post->where(['user_id', $this->id])->get();
		return $mypost;
	}
}
?>