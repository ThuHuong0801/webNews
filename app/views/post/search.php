<?php foreach ($postSearch as $key => $value) : ?>
	<div class="searchbox__result"><a href="<?= 'post?id=' . $value->id ?>"><?= $value->title ?></a></div>
<?php endforeach ?>