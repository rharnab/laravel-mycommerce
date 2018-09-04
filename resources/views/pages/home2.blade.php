@extends('welcome')
@section('content')
<!-- slider-------->
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
<!-- end slider-------->
<!-- banner-bottom -->
<div class="banner_bottom">
            <div class="wthree_banner_bottom_left_grid_sub">
            </div>
            <div class="wthree_banner_bottom_left_grid_sub1">
                <?php $all_product= DB::table('tbl_product')->where('status',1)->limit(3)->get() ?>
                @foreach($all_product as $product)
                <div class="col-md-4 wthree_banner_bottom_left">
                    <div class="wthree_banner_bottom_left_grid">
                        <img src="{{URL($product->image)}}" alt=" " class="img-responsive" />
                        <div class="wthree_banner_bottom_left_grid_pos">
                            <h4>Discount Offer <span>25%</span></h4>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
    </div>

<!-- banner-bottom -->


<!-- top-brands -->

<div class="top-brands">
        <div class="container">
            <h3>Hot Offers</h3>
            <div class="agile_top_brands_grids">
            <?php $all_product= DB::table('tbl_product')->where('status',1)->where('tags','hot offers')->limit(4)->get() ?>
                @foreach($all_product as $product)
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="tag"><img src="{{('front/images/tag.png')}}" alt=" " class="img-responsive" /></div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block" >
                                        <div class="snipcart-thumb">
                                            <a href="{{url('single/'.$product->id)}}"><img title=" " alt=" " src="{{URL($product->image)}}" /></a>      
                                            <p>{{$product->title}}</p>
                                            <h4>{{$product->price}}<span>$10.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            {{-- <form action="{{url('checkout')}}" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                                                    <input type="hidden" name="amount" value="7.99" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart" class="button" />
                                                </fieldset>
                                                    
                                            </form> --}}
                                        <a  href="{{url('single/'.$product->id)}}"   class="btn btn-danger">Add to cart</a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>


<!-- top-brands -->



<!-- fresh vegitable -->

<div class="fresh-vegetables">
        <div class="container">
            <h3>Top Products</h3>
            <div class="w3l_fresh_vegetables_grids">
                <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
                    <div class="w3l_fresh_vegetables_grid2">
                        <?php $all_brands=DB::table('tbl_brands')->where('status',1)->get() ?>
                        <ul>
                            @foreach($all_brands as $brand)
                            <li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">{{$brand->brand_name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 w3l_fresh_vegetables_grid_right">

                 <?php $all_product= DB::table('tbl_product')->where('status',1)->where('tags','special offer')->limit(3)->get() ?>

                    @foreach($all_product as $product)
                  {{--   <div class="col-md-4 w3l_fresh_vegetables_grid">
                        <div class="w3l_fresh_vegetables_grid1">
                            <img src="{{url($product->image)}}" alt=" " class="img-responsive" />
                        </div>
                    </div> --}}
                    <div class="col-md-4 w3l_fresh_vegetables_grid">
                        <div class="w3l_fresh_vegetables_grid1">
                            <div class="w3l_fresh_vegetables_grid1_rel">
                                <img src="{{url($product->image)}}" alt=" " class="img-responsive" />
                                <div class="w3l_fresh_vegetables_grid1_rel_pos">
                                    <div class="more m1">
                                        <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                     @endforeach

                     

               
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>



<!-- fresh vegitable -->

@endsection