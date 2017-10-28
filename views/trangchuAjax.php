<?php
$today      = $data['today'];
$phan_trang = $data['phan_trang'];
?>
  <div class="page-container">
    <div class="top-header top-bg-parallax">
      <div data-parallax="scroll" data-image-src="public/assets/images/slider/slider2-bg1.jpg" class="slides parallax-window">
        <div class="slide-content slide-layout-02">
          <div class="container">
            <div class="slide-content-inner">
              <img src="public/assets/images/slider/slider2-icon.png" data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="500"
                alt="fooday" class="slide-icon img img-responsive animated">
              <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="slide-title animated">FOODAY RESTAURANT</h3>
              <p data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1500" class="slide-sub-title animated">
                <span class="line-before"></span>
                <span class="line-after"></span>
                <span class="text">
                  <span>Tasty</span>
                  <span>Delicious</span>
                  <span>Savoury</span>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <section class="about-us-session padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6 colsm-12">
              <img src="public/assets/images/pages/home1-about.jpg" alt="" class="img img-responsive wow zoomIn">
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="swin-sc swin-sc-title style-4 margin-bottom-20 margin-top-50">
                <p class="top-title">
                  <span>Giới thiệu</span>
                </p>
                <h3 class="title">Our Story</h3>
              </div>
              <p class="des font-bold text-center">WE HAVE THE GLORY BEGINING IN RESTAURANT BUSINESS</p>
              <p class="des margin-bottom-20 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis ullam laboris nisi ut aliquip ex ea commodo consequat.</p>
              <div class="swin-btn-wrap center">
                <a href="#" class="swin-btn center form-submit btn-transparent">
                  <span> About Us</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="product-sesction-03-1 padding-top-100 padding-bottom-100" id="jumpSec">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1">
              <div class="swin-sc swin-sc-title text-left light">
                <h3 class="title">Món ăn trong ngày</h3>
              </div>
              <div class="swin-sc swin-sc-product products-01 style-04 light swin-vetical-slider">
                <div class="row">
                  <div class="col-md-12">
                    <div data-height="200" class="products nav-slider">
                      <?php 
                              foreach ($today as $today => $foods) {
                                
                          ?>
                      <div class="item product-01">
                        <div class="item-left">
                          <img src="public/assets/images/hinh_mon_an/<?=$foods->image?>" alt="" class="img img-responsive">
                          <div class="content-wrapper">
                            <a href="chi-tiet-mon-an.html" class="title">
                              <?=$foods->name ?>
                            </a>
                            <div class="dot">...................</div>
                            <div class="des">
                              <?=$foods->summary ?>
                            </div>
                          </div>
                        </div>
                        <div class="item-right">
                          <span class="price woocommerce-Price-amount amount">
                            <span class="price-symbol">VNĐ</span>
                            <?=empty($foods->promotion_price)?number_format($foods->price):$foods->promotion_price ?>
                          </span>
                        </div>
                      </div>
                      <?php
                              }
                          ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="product-sesction-02 padding-top-100 padding-bottom-100">
        <div class="container" id='jump'>
          <div class="swin-sc swin-sc-title style-3">
            <p class="title">
              <span>Danh sách món ăn</span>
            </p>
          </div>
          <div class="swin-sc swin-sc-product products-02 carousel-02" id="pagination">
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
          </div>

        </div>

    </div>

  </div>
  </section>

  </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    
	  $.post( "listFoodAjax.php",function(data){
      let page = 0;
      $("#pagination" ).html(data);
      $(".loading-overlay").hide();
    }); //load initial records
    
    $("#pagination" ).on( "click", ".pagination a", function (e){      
        e.preventDefault();        
        page = $(this).attr('data-Page');
        if (page >= 1) {
        let heightJump = $("#jump").offset().top;
        //Vì Section trên padding bottom 100 và section dưới padding 100 
        //+ Chiều cao Menu head và Title Danh sách món ăn => đủ 300px            
        let otherDiv = $("#jumpSec").height() ;
          // alert(heightJump);

        let a = heightJump - otherDiv +500;
        $('html, body').animate({
          scrollTop: a
        }, 2000);}
        
        $('.loading-overlay').show();
        setTimeout(function(){
        $.post("listFoodAjax.php",{"page":page}, function(data){ //get content from PHP page
          $("#pagination").html(data);
          $(".loading-overlay").hide(); //once done, hide loading element          
        });
        },3000);
      });
    });
  // $(document).ready(function(){
  //               // var page = "<?php //echo isset($_GET['page']) ? abs($_GET['page']) : 0?>";
  //               // if(page>0){
  //               //    window.location.hash = "#jump";
  //               //   $("body,html").animate({scrollTop : $("#jump").offset().top},0);
  //               // }
  //               $(document).on("click",".pagination a",function(e){
  //                 e.preventDefault();
  //                 $("#pagination" ).load("listFoodAjax.php",{
  //                   page:$(this).attr("data-Page")
  //                 }, function(data){
                    
  //                   $("#pagination").html(data);
  //                 });
  //               });
  //             });
    // });
    // });
    //   $(document).ready(function(){
    //     // $(document).on("click", "span", function () {

    //       const linkCurrent  = $(location).attr('href');         
    //       let trang = linkCurrent.substr(linkCurrent.indexOf('=')+1,1); // '?page=4'      
    //       $.get("http://localhost/php/restaurant/views/dsMonAnAjax.php", {
    //         page: trang
    //       }, function (data) {
    //         $("div.products-02").html(data);
    //       // });
    //     });
    // })

    // Show loading overlay when ajax request starts




    // $(document).ready(function () {
    //   // $("#results" ).load( "fetch_pages.php"); //load initial records

    //   //executes code below when user click on pagination links
    //   $("#results").on("click", ".pagination a", function (e) {
    //     e.preventDefault();
    //     $(".loading-div").show(); //show loading element
    //     var page = $(this).attr("data-page"); //get page number from link
    //     $("#results").load("fetch_pages.php", {
    //       "page": page
    //     }, function () { //get content from PHP page
    //       $(".loading-div").hide(); //once done, hide loading element
    //     });

    //   });
    // });
  </script>
  <script>
    // $(document).ready(function () {
    //   let page = "<?=isset($_GET['page']) ? abs($_GET['page']) : 0?>"
    //   if (page > 1) {
    //     let heightJump = $("#jump").offset().top;
    //     //Vì Section trên padding bottom 100 và section dưới padding 100 
    //     //+ Chiều cao Menu head và Title Danh sách món ăn => đủ 300px            
    //     let otherDiv = $("#jumpSec").height() + 300;


    //     let a = heightJump - otherDiv;
    //     $('html, body').animate({
    //       scrollTop: otherDiv
    //     }, 2000);

        // alert(($('#jump').offset().top));
        // $('html, body').animate({scrollTop:(($('#jump').offset().top)-height)},'slow');
        // window.location.hash = '#jump';
    //   }
    // })
  </script>