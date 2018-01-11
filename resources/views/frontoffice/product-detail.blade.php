@extends('frontoffice.layout.master')
@section('content')
	<div class="page">
  <div class="container"style="margin-bottom:0px;padding-top:50px;">
	<div class="row">
   <div class="col-xs-12 col-md-4 item-photo">
                    <img style="max-width:100%;" src="{{url($product->image)}}" />
                </div>
                <div class="col-md-8 col-xs-12" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3>{{$product->title}}</h3>    
                    <!--<h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small style="color:#337ab7">(5054 ventas)</small></h5>
-->
                    <!-- Precios 
                    <h6 class="title-price"><small>PRECIO OFERTA</small></h6>-->
                    <h3 style="margin-top:0px;">${{$product->price}}</h3>
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button class="btn btn-success" disabled="disabled"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Buy</button>
                    	<br/><b>{{__('message.only_available')}}</b>
                    </div>    
       
                    <div class="section" style="padding-bottom:5px;">
                        <h5 class="title-attr">Omschrijving</h5>                    
                        <div class="text-black">
                        	{!! $product->description !!}
                        </div>
                    </div> 
                                    
                </div>       	
	</div>
  </div>
  </div>
@endsection