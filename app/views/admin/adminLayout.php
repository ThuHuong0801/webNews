<?php
if (!isset($_SESSION['user']) && !isset($_COOKIE['remember_token'])) {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="<?= '/css/bootstrap/css/bootstrap.min.css' ?>">
		<title>Bạn không có quyền truy cập.</title>
	</head>

	<body>
		<div class="alert alert-danger">Bạn không có quyền truy cập. Hãy <a href="<?= 'admin/login' ?>">LOGIN</a> nhé!</div>
		<?php

		?>
	</body>

	</html>
<?php
} else {

	if (!isset($_SESSION['user'])) {
		$usermodel = new Framework\models\User();
		$user = $usermodel->where(['remember_token', $_COOKIE['remember_token']])->first();
		$_SESSION['user'] = json_encode($user);
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Favicon icon -->
		<title>Dashboard</title>
		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="<?= '/css/bootstrap/css/bootstrap.min.css' ?>">
		<link rel="stylesheet" href="<?= '/fonts/font-awesome-4.7.0/css/font-awesome.css' ?>">
		<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
		<link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">

		<script src="<?= '/js/jquery.js' ?>"></script>
		<script src="<?= '/css/bootstrap/js/bootstrap.min.js' ?>"></script>
		<script src="/sweetalert2/sweetalert2.min.js"></script>
	</head>
	<style>
		* {
			transition: all .2s;
		}

		a:hover {
			text-decoration: none;
		}

		body {
			font-size: 16px;
			font-family: 'Cabin', sans-serif;
			max-width: 100%;
			overflow-x: hidden;
		}

		.avatar {
			border-radius: 50%;
			width: 50px;
			height: 50px;
			margin-right: 15px;
		}

		header {
			background: #1e88e5;
			box-shadow: 5px 0px 10px rgba(0, 0, 0, 0.5);
			height: 70px;
			line-height: 70px;
			color: #FFF;
			font-weight: bold;
			padding-right: 30px;
			position: fixed;
			z-index: 99;
			width: 100%;
		}

		header a {
			color: #333
		}

		.header__logo {
			background: #1c81d9;
			text-align: center;
		}

		.header__logo a {
			color: #FFF;
		}

		.float-right {
			float: right;
		}

		.sidebar {
			height: 100%;
			box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
			padding: 0;
			position: fixed;
			z-index: 999;
			background: #FFF;
			margin-top: 70px
		}

		.breadcumb {
			height: 85px;
			box-shadow: 5px 0px 5px rgba(187, 180, 180, 0.5);
			background: #FFF;
			margin-bottom: 30px;
			margin-top: 70px;
		}

		.breadcumb h3 {
			color: #009efb;
			margin-bottom: 0
		}

		.content {
			padding: 0;
			background: #eef5f9;
			min-height: 500px;
		}

		.content .box {
			border: 1px solid rgba(0, 0, 0, .125);
			border-radius: .25rem;
			background: #FFF;
			padding: 30px 0;
		}

		ul.control {
			list-style-type: none;
			padding: 15px 15px 0 30px;
		}

		ul.control li a {

			margin: 5px 0;
			padding: 15px 0 15px 50px;
		}

		ul.control>li a:hover,
		li.active a,
		.hover {
			background: #26c6da;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			border-radius: 5px;
			color: #FFF !important;
		}

		ul.control>li a {
			display: block;
			color: #607d8b;
		}

		.profile__avatar {
			border-radius: 50%;
			max-width: 150px;
			max-height: 150px;
		}

		.profile__info {
			text-align: center;
		}

		.profile__form {
			padding: 30px !important
		}

		.profile__form input[type="text"],
		.profile__form input[type="text"]:focus,
		.profile__form input[type="email"],
		.profile__form input[type="email"]:focus {
			border-top: none;
			border-right: none;
			border-left: none;
			border-radius: 0 !important;
			box-shadow: none;
			padding-left: 0px;
		}

		input {
			font-size: 16px !important;
		}

		.profile__form input:focus {
			border-bottom: 2px solid #1e88e5;
		}

		li ul.sub-menu {
			list-style-type: none;
			position: relative;
			width: 100%;
			display: none;

		}

		li ul.sub-menu>li a {
			padding: 10px 0 10px 5px;
			background: #058c9c;
			color: #FFF;

		}
	</style>
	<script>
		$(function() {
			var a = false;
			$(".control>li>a").click(function() {
				if (a == false) {
					a = true;
				} else {
					a = false
				}
				if (a == true) {
					$(this).addClass('hover');
				} else {
					$(this).removeClass('hover');
				}
			});
			$(".control>li").click(function() {
				$(this).children('ul').slideToggle();

			});


		});
	</script>

	<body>

		<header>
			<div class="row">
				<div class="col-sm-2 header__logo">
					<a href="<?= '' ?>">Web News</a>
				</div>
				<div class="col-sm-10">
					<div class="float-right">
						<?php
						$myuser = json_decode($_SESSION['user']);
						$path = 'http://' . $_SERVER['HTTP_HOST'];
						?>
						<img src="<?= $path . '/images/uploaded/' . $myuser->avatar  ?>" alt="" class="avatar">
						<?php
						echo $myuser->fullname;
						?>
						<a href="<?= '/admin/logout' ?>">LOGOUT</a>
					</div>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="col-sm-2 sidebar">
				<ul class="control col-xs-12">
					<li class="active"><a href="<?= '/admin' ?>">Dashboard</a></li>
					<li><a>Category</a>
						<ul class="sub-menu">
							<li><a href="<?= '/admin/category/add'; ?>">┗ Add new</a></li>
							<li><a href="<?= '/admin/category'; ?>">┗ List category</a></li>
						</ul>
					</li>
					<li><a href="#">Post</a>
						<ul class="sub-menu">
							<li><a href="<?= '/admin/posts/add' ?>">┗ Add new</a></li>
							<li><a href="<?= '/admin/posts' ?>">┗ List post</a></li>
						</ul>
					</li>
					<li><a href="#">Profile</a>
						<ul class="sub-menu">
							<li><a href="<?= '/admin/profile/edit' ?>">┗ Edit Information</a></li>
							<li><a href="<?= '/admin/profile/editemail' ?>">┗ Edit Email</a></li>
							<li><a href="<?= '/admin/profile/editpassword' ?>">┗ Edit Password</a></li>
						</ul>
					</li>
					<li><a href="#">Setting</a>
						<ul class="sub-menu">
							<li><a href="<?= '/admin/site/setting' ?>">┗ SEO Setting</a></li>
						</ul>
					</li>
				</ul>

			</div>
				<?php
				$path = explode('views', __DIR__)[0] . 'views/' . $viewPath;
				include_once $path;
				?>


		</div>
<!-- 
		<script>
			$(document).ready(function() {
				let root = $('#root')
				$(document).on('click', '#listCategory', function(e) {
					e.preventDefault()
					fetch('http://localhost:8000/admin/category')
						.then(response => response.json())
						.then(data => {
							window.location.href='/admin/category'
							let breadcumb = `<div class="breadcumb">
							<div class="col-sm-10 col-sm-offset-2">
								<div class="col-sm-12">
								<h3>Category</h3>
								<a href="#">Dashboard</a>
								>
								Category
								</div>
							</div>
							</div>`
							root.children().remove()
							root.append(breadcumb)

							let tableEl = `<div class="col-sm-2"></div>
								<div class="col-sm-10">
									<div class="col-sm-12">
										<div class="box profile__form">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Category</th>
													</tr>
												</thead>
												<tbody>`
							data.forEach(item => {
								tableEl += `<tr>
								<td>${item.id}</td>
								<td><a>${item.category_name}</a></td>
								<td>
									<a class="btn btn-primary btn-sm btl-cate-create"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
									<button type="button" class="btn btn-danger btn-sm btl-cate-delete" data-category-id=${item.id}><a>
										<i class="fa fa-times-circle" aria-hidden="true"></i></a>
									</button>
								</td>
								</tr>`
							})
							tableEl += `</tbody>
											</table>
										</div>
									</div>
								</div>`
							root.append(tableEl)

						})
				})

				$(document).on('click', '.btl-cate-delete', function(e) {
					e.preventDefault()
					let that = $(this)
					Swal.fire({
							title: 'Bạn có chắc chắn muốn xóa không?',
							text: 'Bạn sẽ không thể khôi phục dữ liệu!',
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Vâng, bạn xóa đi!'
						})
						.then(function() {
							fetch('http://localhost:8000/admin/category/delete/' + that.data('category-id'))
								.then(response => response.json())
								.then(data => {
									if(data.code == 200){
										Swal.fire(
										'Đã xóa!',
										'Category của bạn xóa thành công.',
										'success'
										)
										that.parents('tr').remove()	
									}
							})
						})
						
				})

				$(document).on('click', '.btl-cate-create', function(e) {
					root.children
				})
			})
		</script> -->

	</body>

	</html>
<?php } ?>