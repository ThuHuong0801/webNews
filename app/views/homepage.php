<section class="article container">
	<?php 
	include_once $hotnews;
	?>
	<section class="fashion_and_travel row">
		<section class="travel col-lg-8">
			<h2 class="article__title">
				<span><i>Recent</i> News</span>
			</h2>
			<?php
			foreach ($post as $value) :
			?>
				<section class="travel__news">
					<section class="col-xs-4">
						<img src="<?= '/images/uploaded/' . $value->thumbnail ?>" alt="">
					</section>
					<section class="col-xs-8">
						<h4>
							<a href="<?= 'post?id=' . $value->id ?>"><?= $value->title ?></a>
						</h4>
						<span class="catename">
							<?= $value->category() ?>
						</span>
						<span class="posttime">
							<i class="fa fa-clock-o"></i>
							<?php
							echo convertTime($value->post_time);
							?>
						</span>
						<p>
							<?php
							description($value->detail, 150);
							?>
						</p>
						<span class="readmore"><a href="#">READMORE</a></span>
					</section>
					<section class="clear"></section>
				</section>
			<?php endforeach; ?>
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
			</style>
			<div class="col-xs-6 col-xs-offset-3">
				<ul class="pagination pagination-lg">
					<?php for ($i = 0; $i < $allpages; $i++) {
					?>
						<li <?php if ($currentpage == $i) {
								echo 'class="active"';
							} ?>><a href="<?= '/' . $i ?>"><?= $i + 1 ?></a></li>
					<?php
					} ?>
				</ul>
			</div>
		</section>
		<?php include_once $sidebar; ?>
	</section>
</section>