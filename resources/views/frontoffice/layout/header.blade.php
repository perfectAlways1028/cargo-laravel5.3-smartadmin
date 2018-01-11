<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand">
            <a href="{{route('home')}}">
            	<img src="{{url('images/logo_header.png')}}" />
            </a>

          </div>
        </div>

        <div class="navbar-collapse collapse">
          <div class="menu">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"><a href="{{route('home')}}"
                  {{{ (Route::is('home') ? 'class=active' : '') }}}
                >{{__('menu.home')}}</a></li>
              <li role="presentation"><a href="{{route('about')}}"
                    {{{ (Route::is('about') ? 'class=active' : '') }}}
                  >{{__('menu.about_us')}}</a></li>
              <li role="presentation"><a href="{{route('faq')}}"
                    {{{ (Route::is('faq') ? 'class=active' : '') }}}
                  >{{__('menu.frequently_asked_questions')}}</a></li>
              <li role="presentation"><a href="{{route('tracktrace')}}"
                {{{ (Route::is('tracktrace') ? 'class=active' : '') }}}
                >{{__('menu.track_and_trace')}}</a></li>
              <li role="presentation"><a href="{{route('my-account')}}"
                {{{ (Route::is('my-account') ? 'class=active' : '') }}}
                >{{__('menu.my_account')}}</a></li>
              <li role="presentation"><a href="{{route('contact')}}"
                {{{ (Route::is('contact') ? 'class=active' : '') }}}
                >{{__('menu.contact')}}</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{__('menu.language')}}
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('/en') }}"><img src="/images/flags/uk.png" alt=""> {{ trans('locale.en') }}</a></li>
                  <li><a href="{{ url('/nl') }}"><img src="/images/flags/nl.png" alt=""> {{ trans('locale.nl') }}</a></li>
                  <li><a href="{{ url('/zh') }}"><img src="/images/flags/zh.png" alt=""> {{ trans('locale.zh') }}</a></li>
                </ul>
              </li>
              @if (Auth::check())
                  <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out"></span> {{__('menu.logout')}}</a></li>
              @endif


             </ul>

          </div>
        </div>



      </div>
    </div>
  </nav>
</header>
