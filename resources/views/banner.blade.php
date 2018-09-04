 <div class="w3l_banner_nav_right">
            <section class="slider">
                
                <?php 
                $all_slider=DB::table('tbl_slider')->where('status',1)->limit(3)->get();
                $i=0;

                 ?>

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                   @foreach($all_slider as $slider)
                    <div class="carousel-item <?php if($i==1){echo 'active';} ?>">
                      <img class="d-block w-100" src="{{URL($slider->slider_image)}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Make your <span>food</span> with Spicy.</h3>
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                   
                  </div>
                </div>

                
            </section>
            <!-- flexSlider -->
                <link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}" type="text/css" media="screen" property="" />
                <script defer src="{{asset('front/js/jquery.flexslider.js')}}"></script>
                <script type="text/javascript">
                $(window).load(function(){
                  $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                      $('body').removeClass('loading');
                    }
                  });
                });
              </script>
            <!-- //flexSlider -->
        </div>
        <div class="clearfix"></div>