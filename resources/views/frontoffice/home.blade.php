@extends('frontoffice.layout.master')
@section('content')
<div class="page">
  <div class="container"style="margin-bottom:50px;">
    <div class="text-center">
    <div class="col-xs-12 col-md-12">
      <h1>{{__('home.title')}}</h1>
      <p>{{__('home.comment')}}</p>
      <hr/>
    </div>
    <div class="col-xs-12">
    @if(count($products)>0)
    	@foreach($products as $product)
    	<div class="col-sm-3">
        	<article class="col-item">
        		<div class="options">
        		</div>
        		<div class="photo">
        			<a href="{{ route('view-product',['id'=>$product->id]) }}"> <img src="{{$product->image}}" class="img-responsive" alt="Product Image" /> </a>
        		</div>
        		<div class="info">
        			<div class="row">
        				<div class="price-details col-md-6">
        					<p class="details text-left">
        						{{substr(strip_tags($product->description),0,80).'...'}}
        					</p>
        					<h1><a href="{{ route('view-product',['id'=>$product->id]) }}">{{$product->title}}</a></h1>
        					<span class="price-new"><a href="{{ route('view-product',['id'=>$product->id]) }}">$ {{$product->price}}</a></span>
        				</div>
        			</div>
        		</div>
        	</article>
        </div>
    	@endforeach
    @else
    	<b>{{__('home.no_product')}}</b>
    @endif
    </div>
  </div>
  </div>
@endsection
@section('backup')
<section id="main-slider" class="no-margin">
      <div class="carousel slide">
          <div class="carousel-inner">
              <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                  <div class="container">
                      <div class="row slide-margin">
                          <div class="col-sm-6">
                              <div class="carousel-content">
                                  <h2 class="animation animated-item-1">ROOP<span>COM</span></h2>
                                  <p class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</p>
                                  <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                              </div>
                          </div>

                          <div class="col-sm-6 hidden-xs animation animated-item-4">
                              <div class="slider-img">
                                  <img src="images/slider/img3.png" class="img-responsive">
                              </div>
                          </div>

                      </div>
                  </div>
              </div><!--/.item-->
          </div><!--/.carousel-inner-->
      </div><!--/.carousel-->
  </section><!--/#main-slider-->

<div class="feature">
  <div class="container">
    <div class="text-center">
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
          <i class="fa fa-book"></i>
          <h2>Full Responsive</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
          <i class="fa fa-laptop"></i>
          <h2>Retina Ready</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
          <i class="fa fa-heart-o"></i>
          <h2>Full Responsive</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
          <i class="fa fa-cloud"></i>
          <h2>Friendly Code</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="about">
  <div class="container">
    <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
      <h2></h2>
      <img src="images/6.jpg" class="img-responsive"/>
    </div>

    <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
      <h2>Amerikaanse producten</h2>
      <h3>Binnen handbereik..</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.
      Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget.
      Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque </p>
    </div>
  </div>
</div>

<div class="lates">
  <div class="container">
    <div class="text-center">
      <h2>Hoe werkt het?</h2>
    </div>
    <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
      <img src="images/4.jpg" class="img-responsive"/>
      <h3>1. Plaats uw bestelling</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      </p>
    </div>

    <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
      <img src="images/4.jpg" class="img-responsive"/>
      <h3>2. Wij repacken uw bestelling</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      </p>
    </div>

    <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
      <img src="images/4.jpg" class="img-responsive"/>
      <h3>3. U ontvangt uw producten!</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
      </p>
    </div>
  </div>
</div>

<section id="partner">
      <div class="container">
          <div class="center wow fadeInDown">
              <h2>Bestel ook uit fysieke winkels!</h2>
              <p>U kunt ook producten kopen uit winkels <b>zonder</b> webshops!<br/>
              Denk maar aan winkels zoals:</p>
          </div>

          <div class="partners">
              <ul>
                  <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                  <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                  <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                  <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                  <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
              </ul>
          </div>
      </div><!--/.container-->
  </section><!--/#partner-->

<section id="conatcat-info">
      <div class="container">
          <div class="row">
              <div class="col-sm-8">
                  <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="pull-left">
                          <i class="fa fa-phone"></i>
                      </div>
                      <div class="media-body">
                          <h2>Benieuwd naar de mogelijkheden of heeft u vragen?</h2>
                          <p>Neem gerust contact met ons op! Bel +8771 771</p>
                      </div>
                  </div>
              </div>
          </div>
      </div><!--/.container-->
  </section><!--/#conatcat-info-->
@endsection
