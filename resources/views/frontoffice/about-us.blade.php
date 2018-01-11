@extends('frontoffice.layout.master')
@section('content')
<div class="page">
  <div class="container"style="margin-bottom:50px;">
    <div class="text-center">
    <div class="col-xs-12 col-md-12">
      <h1>{{__('about_us.title')}}</h1>
      <p>
      	{{__('about_us.content')}}
      </p>
      <div class="text-left">
      <b>{{__('about_us.offer_title')}}</b>
      <ul >
      	<li>{{__('about_us.offer_1')}}</li>
      	<li>{{__('about_us.offer_2')}}</li>
      	<li>{{__('about_us.offer_3')}}</li>
      	<li>{{__('about_us.offer_4')}}</li>
      	<li>{{__('about_us.offer_5')}}</li>
      </ul>

    	</div>
    </div>
  </div>
  </div>

@endsection
