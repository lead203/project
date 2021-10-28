<p>Main page</p>


<form method="POST">
	<input type="text" name="title" placeholder="Title">
	<input type="text" name="price" placeholder="Price">
	<input type="submit">
</form>

<div class="product-list">
	<?php foreach ($vars as $key => $value) : ?>
		<div class="product-card">
			<p><?=$value['title']?></p>
			<p><?=$value['description']?></p>
			<p><?=$value['price']?></p>
		</div>
	<?php endforeach; ?>
</div>

<div class="pagination">
	<a href="?prev=<?=$_SESSION['position']-1?>"><</a>
	<?=$_SESSION['number_page']?>
	<a href="?next=<?=$_SESSION['position']+1?>">></a>
</div>