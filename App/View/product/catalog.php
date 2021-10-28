<p>All product...</p>

<?php foreach ($catalog as $value) : ?>
	<div class="product">
		<p><?=$value['title']?></p>
		<p><?=$value['cost']?></p>
	</div>
<?php endforeach; ?>