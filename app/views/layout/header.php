<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>News</title>
	<link rel="icon" href="<?= 'images/' . $favicon ?>" type="image/x-icon">
	<link rel="stylesheet" href="<?= '/css/bootstrap/css/bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?= '/css/css.css' ?>">
	<link rel="stylesheet" href="<?= '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' ?>">
	<script src="<?= '/js/jquery.js' ?>"></script>
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
	<script src="<?= '/css/bootstrap/js/bootstrap.min.js' ?>"></script>
	<script src="<?= '/js/menu.js' ?>"></script>
	<meta name="description" content="<?php echo $description ?>">
	<script>
		$(function() {

			$('#search').click(function(e) {
				e.preventDefault();
				$('#searchbox').slideToggle();
			});
			$('#searchinput').keyup(function() {
				$('#loadimg').show();


				setTimeout(function() {
					$('#loadimg').hide();
				}, 2000);
				var url = window.location.href;
				console.log(url);
				$.get('search', {
						keyword: $(this).val()
					},
					function(data) {
						setTimeout(function() {
							let resultElement = $('#resultSearch')
							resultElement.children().remove()
							let childrenElement = '';
							data.forEach(record => {
								childrenElement += `<div class="searchbox__result"><a href="post?id= ${record.id} ">${record.title}</a></div>`
							})
							resultElement.append(childrenElement)
						}, 1000);

					});
			});
		});
	</script>
	<style>
		ul.pagination li.active a {
			background-color: #d13030;
			border-color: #d13030;
			color: #FFF;
		}

		ul.pagination li a {

			border-color: #d13030;
			color: #d13030;
		}

		ul.pagination li a:hover {
			color: #d13030;
		}

		.searchbox {
			position: absolute;
			right: 120px;
			width: 400px;
			display: none;
			background: #FFF;
			box-shadow: 0 0 5px #b3b3b3;
			z-index: 999;
			padding: 20px;

		}

		.searchbox input {
			width: 100%;
			height: 40px;
		}

		.searchbox .searchbox__result {
			padding: 10px 10px;
			line-height: 20px;
			border-bottom: 1px solid #eee;
			max-width: 100%;
			overflow: hidden;

		}

		.result {
			max-height: 250px;
			overflow-y: scroll;
		}

		.loading {
			text-align: center !important;
		}

		#loadimg {
			display: none;
		}
	</style>
</head>

<body>
	<header>
		<section class="top-header hidden-xs">
			<section class="container">
				<section class="row">
					<section class="col-lg-9">
						<ul class="top-menu">
							<li>
								<a href="/">Homepage</a>
							</li>
						</ul>
					</section>
					<section class="col-lg-3">
						<a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						<a href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
						<a href=""><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
						<a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</section>
				</section>
			</section>
		</section>
		<section class="header">
			<section class="container">
				<section class="row">
					<section class="col-lg-3">
						<a href="/"><img src="<?= '/images/logo.jpg' ?>" alt="Logo"></a>
					</section>
					<section class="col-lg-9">
						<ul class="menu" id="nav">

						</ul>
					</section>
				</section>
			</section>

			<section class="searchbox" id="searchbox">
				<form>
					<input type="text" placeholder="Search..." id="searchinput" class="form-control">
				</form>
				<div id="resultSearch">
					<div class="loading">
						<img src="'/images/load.gif" alt="" id="loadimg">
					</div>
				</div>
			</section>
		</section>
		<section class="clear"></section>
	</header>