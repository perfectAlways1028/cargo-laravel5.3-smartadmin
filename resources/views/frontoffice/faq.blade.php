@extends('frontoffice.layout.master')
@section('content')
<div class="page">
  <div class="container"style="margin-bottom:50px;">
    <div class="text-center">
    <h1>{{__('faq.title')}}</h1>
    <div class="col-xs-12 col-md-6 text-left">
    	<h5>{{__('faq.question_1')}}</h5>
    	<p>{{__('faq.answer_1')}}</p>
    
    	<h5>{{__('faq.question_2')}}</h5>
    	<p>{{__('faq.answer_2')}}</p>
    	
    	<h5>{{__('faq.question_3')}}</h5>
    	<p>{{__('faq.answer_3')}}</p>

    	<h5>{{__('faq.question_4')}}</h5>
    	<p>{{__('faq.answer_4')}}</p>    
    </div>
    <div class="col-xs-12 col-md-6 text-left">
    	<h5>{{__('faq.question_5')}}</h5>
    	<p>{{__('faq.answer_5')}}</p>
    	<h5>{{__('faq.question_6')}}</h5>
    	<p>{{__('faq.answer_6')}}</p>
    	<h5>{{__('faq.question_7')}}</h5>
    	<p>{{__('faq.answer_7_1')}} <a href="{{route('contact')}}">{{__('faq.answer_7_2')}}</a>.</p>
    </div>
  </div>
  </div>

@endsection
