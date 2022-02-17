<section class="article container detail">
	<section class="row">
		<section class="col-lg-8">
			<section class="detail__post">
				<h1>
					<?= $post->title ?>
				</h1>
				<section class="detail__desc">
					<span class="catename">
						<?= $post->category() ?>
					</span>
					- By <?= $post->author() ?> -
					<span class="posttime">
						<i class="fa fa-clock-o"></i>
						<?php
						echo convertTime($post->post_time);
						?>
					</span>

					<i class="fa fa-eye" aria-hidden="true"></i> <?= $post->views ?>
					<i class="fa fa-comments" aria-hidden="true"></i> 0
				</section>
				<p class="paragraph__content">
					<?= $post->detail ?>
				</p>
				<?php echo $comment ?>
			</section>
		</section>
		<?php $_Path = explode('views', __DIR__)[0] . 'views/layout/' . $sidebar;
				include_once $_Path;
		?>
	</section>
</section>
<section class="clear"></section>