<section class='products'>
  <?php foreach ($product as $item):?>
  <article class='product products_product'>
    <h3 class='product__title'>
      <?=$item->name?>
    </h3>
    <div class="product__img">
      <img src="<?=$item->img?>" alt="<?=$item->name?>">
    </div>
    <div class="product__price">
      <?=$item->price;?>
      <span>&#8381</span>
    </div>
    <button class="button button_bold js-button_open-module" data-product='<?=$item->name?>'>Купить</button>
  </article>
  <?php endforeach; ?>
</section>
<div class='modal'>
  <div class='modal__payload'>
    <form class='form' action="order" method='POST'>
      <label class='form__label' for="name">Имя:</label>
      <input class='form__control' type="text" id='name' name='name' required><br>
      <label class='form__label' for="tel">Телефон:</label>
      <input class='form__control' type="tel" id='tel' name='tel' required><br>
      <label class='form__label' for="email">Email:</label>
      <input class='form__control' type="email" id='email' name='email' required><br>
      <label class='form__label' for="product-name">Название товара:</label>
      <input class='form__control' type="text" id='product-name' name='product' required><br>
      <button class='button button_simple form__button' type="submit">Отправить</button>
    </form>
    <button class='modal__button'>&#10060;</button>
  </div>
</div>