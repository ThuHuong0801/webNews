<?php
namespace Framework\controllers;

use Framework\models\User;
use Framework\models\Post;
use Framework\models\Category;
use Framework\models\Config;
class ApiController extends BaseController
{
    public function getAllCategory(){
        $category = Category::all();
        rsort($category);
        $this->response($category,true);
    }
    public function getAllPost($page){
        $limit = 6;
        $from = $page * $limit - $limit;
        $post = new Post();
        $post->limit([$from, $limit]);
        $post = $post->get();
        rsort($post);
        $postTotal = new Post();

        $total = $postTotal->total();
        $this->response([
            'post' => $post,
            'total' => $total,
        ],true);
    }

    public function getPost($id)
    {
        $post = new Post();
        $post = $post->findOne($id);
        $category = new Category();
        $category = $category->findOne($post->category_id);
        $user = new User();
        $user = $user->findOne($post->user_id);
        $this->response([
            'post' => $post,
            'category' => $category->category_name,
            'user' => $user->fullname
        ], true);
    }
}