@extends('frontoffice.layout.master')
@section('content')
<div class="page">
  <div class="container"style="margin-bottom:50px;">
    <div class="text-center">
    <div class="col-xs-12 col-md-6">
      <h1>{{__('contact.contact')}}</h1>
      <p>{{__('contact.question_1')}}<br/>
      {{__('contact.answer_1')}}<br/>
    {{__('contact.answer_2')}}<br/><br/>
<b>{{__('contact.suriname')}}</b>:+597-431 114<br/>
<b>{{__('contact.netherland')}}</b>:+316-2006 5555<br/>
<b>{{__('contact.united_state')}}</b>:+1 754 213 3804<br/>
<b>{{__('contact.period')}}</b>*<br/>*-{{__('contact.period_2')}}</p>
    <h4>{{__('contact.visit_us')}}</h4>
    <div class="row" style="margin-bottom:10px;">
    <div class="col-xs-5">
      <img src="{{ url('images/sr.png') }}" class='img-thumbnail img-circle' width="100%"/>
    </div>
    <div class="col-xs-7" style="color:#aaa;">
      <b>{{__('contact.suriname')}}</b><br/>
      Kernkampweg 48<br/>
      Paramaribo, Suriname<br/>
      Ma t/m Vr - 09:00 t/m 17:00
    </div>
  </div>
  <div class="row" style="margin-bottom:10px;">
  <div class="col-xs-5">
      <img src="{{ url('images/nl.png') }}" class='img-thumbnail img-circle' width="100%"/>
  </div>
  <div class="col-xs-7" style="color:#aaa;">
    <b>{{__('contact.netherland')}}</b><br/>
    Korte Bajonetstraat 56<br/>
    3014ZS<br/>
     Rotterdam, Nederland<br/>
    Ma t/m Vr - 09:00 t/m 17:00
  </div>
</div>
  <div class="row" style="margin-bottom:10px;">
    <div class="col-xs-5">
      <img src="{{ url('images/us.png') }}" class='img-thumbnail img-circle' width="100%"/>
    </div>
    <div class="col-xs-7" style="color:#aaa;">
      <b>{{__('contact.united_state')}}</b><br/>
      23627 sw 133rd ave<br/>
      Unit 14<br/>
      Homestead Florida 33032, United States<br/>
      Ma t/m Vr - 09:00 t/m 17:00
    </div>
  </div>

    </div>
    <div class="col-xs-12 col-md-6" style="margin-top:70px;">
      <div class="well text-left">
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
           <form action="{{route('contact')}}" method="post">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="naam">{{__('register.name')}}</label>
                 <input class="form-control" id="naam" maxlength="100"
                 name="naam" placeholder="{{__('register.name')}} *" type="text" required />

              </div>

              <div class="form-group">
                <label for="email">{{__('register.email')}}</label>
                 <input class="form-control" id="email" name="email"
                 placeholder="{{__('register.email')}}" type="email" />

              </div>

              <div class="form-group">
                <label for="tel">{{__('register.tel_num')}}</label>
                 <input class="form-control" id="tel" name="tel"
                 placeholder="{{__('register.tel_num')}}" type="phonenumber" />

              </div>

              <div class="form-group">
                <label for="bericht">{{__('register.message')}}</label>
                 <textarea class="form-control" cols="40" id="bericht"
                 name="{{__('register.message')}}" placeholder="{{__('register.message_place')}}" required
                  rows="10"></textarea>

              </div>

              <button type="submit" class="btn btn-block btn-primary">{{__('register.shipping')}}</button>
           </form>

        </div>
     </div>
    </div>
  </div>
  </div>

@endsection
