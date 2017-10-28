<?php
$listFoods      = $data['listFoods'];
$phan_trang = $data['phan_trang'];
?>
  <div class="products nav-slider">
    <div class="row slick-padding">
      <?php 
                      foreach ($listFoods as $ds => $dsFoods) {
                    ?>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="blog-item item swin-transition">
          <div class="block-img">
            <img src="public/assets/images/hinh_mon_an/<?= $dsFoods->image?>" alt="" class="img img-responsive">
            <div class="block-circle price-wrapper">
              <span class="price woocommerce-Price-amount amount">
                <?=empty($dsFoods->promotion_price)?number_format($dsFoods->price):$dsFoods->promotion_price ?>
              </span>
              <span class="price-symbol">VNĐ</span>
            </div>
            <div class="group-btn">
              <a href="chi-tiet-mon-an.html" class="swin-btn btn-link">
                <i class="icons fa fa-link"></i>
              </a>
              <a href="javascript:void(0)" class="swin-btn btn-add-to-card">
                <i class="fa fa-shopping-basket"></i>
              </a>
            </div>
          </div>
          <div class="block-content">
            <h5 class="title">
              <a href="chi-tiet-mon-an.html">
                <?=$dsFoods->name ?>
              </a>
            </h5>
            <div class="product-info">
              <?=$dsFoods->detail ?>
            </div>
          </div>
        </div>
      </div>
      <?php
                      }
                    ?>
    </div>
  </div>
  <div class="loading-overlay">
    <div class="wrapper">
      <div class="inner">
        <span>L</span>
        <span>o</span>
        <span>a</span>
        <span>d</span>
        <span>i</span>
        <span>n</span>
        <span>g</span>
      </div>
    </div>
  </div>
  <nav aria-label="Page pagination">
    <ul class="pagination pagination-lg justify-content-center">
      <?=$phan_trang?>
    </ul>
  </nav>