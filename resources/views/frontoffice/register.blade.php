@extends('frontoffice.layout.master')
@section('content')
<div class="page">
  <div class="container"style="margin-bottom:50px;">
    <div class="text-center">
    
     <div class="col-xs-12 col-md-6">
     	<h1>{{__('register.login')}}</h1>
     	<p>
     		{{__('register.login_desc')}}
     		
     	</p>
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
           <form action="{{route('login')}}" method="post">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="email">{{__('register.email')}}</label>
                 <input class="form-control" id="email" name="email"
                 placeholder="{{__('register.email')}}" type="email" />

              </div>

              <div class="form-group">
                <label for="tel">{{__('register.password')}}</label>
                 <input class="form-control" id="pass" name="pass"
                 placeholder="{{__('register.password')}}" type="password" />

              </div>
              <div class="form-group">
              <label>
              	<input type='checkbox' value='1' name='remember_me'/> {{__('register.stay_login')}}
              	</label>
              </div>

              <button type="submit" class="btn btn-block btn-primary">{{__('register.login')}}</button>
           </form>

        </div>
     </div>
     
     </div>
     
     
    <div class="col-xs-12 col-md-6" >
     	<h1>{{__('register.register')}}</h1>
     	<p>
     		{{__('register.register_desc')}}
     		
     	</p>
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
           <form action="{{route('register')}}" method="post">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="first_name">{{__('register.first_name')}}</label>
                <input class="form-control" id="first_name" maxlength="100"
                 name="first_name" placeholder="{{__('register.first_name')}} *" type="text" required />
              </div>

              <div class="form-group">
                <label for="last_name">{{__('register.last_name')}}</label>
                <input class="form-control" id="last_name" maxlength="100"
                 name="last_name" placeholder="{{__('register.last_name')}} *" type="text" required />
              </div>
              <div class="col-xs-15">
                <label for="last_name">{{__('register.country')}}</label>
                <select id="country" name="country"  class="form-control providers"  required >
                    @foreach ($countries as $country)
                        <option value="{{ $country->iso_3166_2 }}">{{ $country->name }}</option>
                    @endforeach             
                </select>
              </div>
              <div class="form-group">
                <label for="email">{{__('register.phone')}}</label>
                 <input class="form-control" id="phone" name="phone"
                 placeholder="{{__('register.phone')}}" type="tel" />
              </div>
              <div class="form-group">
                <label for="email">{{__('register.email')}}</label>
                 <input class="form-control" id="email" name="email"
                 placeholder="{{__('register.email')}}" type="email" />
              </div>

              <div class="form-group">
                <label for="password">{{__('register.password')}}</label>
                 <input class="form-control" id="password" name="password"
                 placeholder="{{__('register.password')}}" type="password" />
              </div>

              <button type="submit" class="btn btn-block btn-primary">{{__('register.account_create')}}</button>
           </form>

        </div>
     </div>
     
     
    </div>
  </div>
  </div>

@endsection
