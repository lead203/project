<div id="app">
  <nav class="navbar navbar-light bg-white border-bottom sticky-top">
    <div class="container">
      <a class="navbar-brand mx-2" href="#">
        Vue Store
      </a>
      <div class="navbar-nav">
        <a class="nav-link p-0" href="#">

          <!-- CartButton component -->
          <curt-button :count="count"></curt-button>

        </a>
      </div>
    </div>
  </nav>

  <main>
  	<form method="POST">
		<input type="text" name="title" placeholder="Title">
		<input type="text" name="price" placeholder="Price">
		<input type="submit">
	</form>
    <product-list :products="products"></product-list>
  </main>

	<div class="pagination">
		<a href="?prev=<?=$_SESSION['position']-1?>"><</a>
		<?=$_SESSION['number_page']?>
		<a href="?next=<?=$_SESSION['position']+1?>">></a>
	</div>

  <!-- CartModal component -->
	<cart-modal></cart-modal>
</div>


<<!-- div class="product-list">
	<?php foreach ($vars as $key => $value) : ?>
		<div class="product-card">
			<p><?=$value['title']?></p>
			<p><?=$value['description']?></p>
			<p><?=$value['price']?></p>
		</div>
	<?php endforeach; ?>
</div> -->
















