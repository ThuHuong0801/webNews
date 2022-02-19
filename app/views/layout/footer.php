<section class="clear"></section>
<footer>
	<section class="container">
		<section class="row">
			<section class="col-lg-4">
				<h2>
					About Thư Hường
				</h2>
				<section class="footer__box">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					Contact me: <br>
					<a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</section>
			</section>
			<section class="col-lg-4">
				<h2>
					Lastest Posts
				</h2>
				<section class="footer__box">
					<?php
					$lastest = Framework\models\Post::where()->orderBy(['post_time', 'desc'])->limit(4)->get();
					foreach ($lastest as $value) : ?>
						<section class="footer__box__lastest">
							<a href="<?= 'post?id=' . $value->id ?>"><?= $value->title ?></a>
							<span class="posttime"><br>
								<i class="fa fa-clock-o"></i> <?php echo convertTime($value->post_time); ?>
							</span>
						</section>
					<?php endforeach ?>
				</section>
			</section>
			<section class="col-lg-4">
				<h2>
					Categories
				</h2>
				<?php
				$categories = Framework\models\Category::all();
				?>
				<section class="footer__box__categories">
					<?php foreach ($categories as $value) : ?>
						<section class="footer__category">
							<section class="footer__category--left">
								<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
								<a href="#"><?php echo $value->category_name ?></a>
							</section>
							<span>
								<?php echo $value->countPost() ?>
							</span>
						</section>
					<?php endforeach ?>
				</section>
			</section>
		</section>
	</section>
	<section class="footer__bottom">
		<section class="container">
			<section class="row">
				<section class="footer__bottom__left col-lg-6">
					<a href="#">Homepage</a>
					<a href="#">About</a>
					<a href="#">Contact</a>
				</section>
				<section class="footer__bottom__right col-lg-6">
					© Cover by ThuHuong
				</section>
			</section>
		</section>
	</section>
</footer>
<script>
	$(document).ready(() => {
		let navElem = $('#nav')

		fetch('/api/v1/category')
			.then(response => response.json())
			.then(categories => {
				let navChildElem = `<li>
									<a href="/">Homepage</a>
								</li>`
				categories.forEach(category => {
					navChildElem += `<li>
									<a>${category.category_name}</a>
								</li>`
				})

				navChildElem += `<li class="search" id="search" style="font-size: 25px">
								<a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
							</li>`
				navElem.append(navChildElem)
			})

		let wrapElem = $('#newsWrapper')
		fetch('/api/v1/post/1')
			.then(res => res.json())
			.then(res => {
				homeRender(1, res)
			})

		function homeRender(page, res) {
			let data = res.post
			wrapElem.children().remove()
			let itemEl = `<h2 class="article__title">
				<span>News</span>
			</h2>`
			data.forEach(c => {
				let elem = document.createElement('div')
				elem.innerHTML = c.detail

				itemEl += `<section style="margin-bottom: 2em">
						<section class="col-xs-4">
							<img src="/images/uploaded/${c.thumbnail}" alt="">
						</section>
						<section class="col-xs-8">
							<h4>
								<a class="readmore-btn" data-id=${c.id}>${c.title}</a>
							</h4>
							<span class="posttime">
								<i class="fa fa-clock-o"></i>
								${c.post_time}
							</span>
							<p>${elem.innerText.substring(0, 100) + ' ...'}</p>
							<span class="readmore"><a class="readmore-btn" data-id=${c.id}>READMORE</a></span>
						</section>
						<section class="clear"></section>
					</section>`
			})
			itemEl += `<div class="col-xs-6 col-xs-offset-3">
				<ul class="pagination pagination-lg" id="pagination">`

			let totalPage = Math.ceil(res.total / 6)
			for (let i = 1; i <= totalPage; i++) {
				itemEl += `<li class=${page == i ? 'active' : ''}><a class="pagination-item" data-page=${i}>${i}</a></li>`
			}
			itemEl += `</ul></div>`
			wrapElem.append(itemEl)
		}

		$(document).on('click', '.pagination-item', (e) => {
			e.preventDefault()
			let page = $(e.target).data('page')
			fetch('/api/v1/post/' + page)
				.then(res => res.json())
				.then(res => {
					console.log(page)

					homeRender(page, res)
				})
		})

		$(document).on('click', '.readmore-btn', (e) => {
			e.preventDefault()
			let id = $(e.target).data('id')
			fetch('/api/v1/post/detail/' + id)
				.then(res => res.json())
				.then(data => {
					let contentElem = `<section class="detail__post">
									<h1>${data.post.title}</h1>
									<section class="detail__desc">
										<span class="catename">${data.category}</span>
										- By ${data.user} -
										<span class="posttime">
											<i class="fa fa-clock-o"></i>
											${data.post.post_time}
										</span>
										<i class="fa fa-eye" aria-hidden="true"></i> ${data.post.views}
										<i class="fa fa-comments" aria-hidden="true"></i> 0
									</section>
									<p class="paragraph__content">
										${data.post.detail}
									</p>
								</section>`
					wrapElem.children().remove()
					wrapElem.append(contentElem)
				})
		})
	})
</script>
</body>

</html>