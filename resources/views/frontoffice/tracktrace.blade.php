@extends('frontoffice.layout.master')
@section('content')
<div class="page">
<div class="container">
<h1 class="text-center">{{__('track_trace.title')}}</h1>
  @if(Request::has('tt'))
    @if($package!==null)
    <div class="text-centered">
      <h3>{{__('track_trace.title')}} <b><?php
      if($package->status=='received') echo __('track_trace.received');
      if($package->status=='packed') echo __('track_trace.packed');
      if($package->status=='transit') echo __('track_trace.transit');
      if($package->status=='delivered') echo __('track_trace.delivered');
      if($package->status=='completed') echo __('track_trace.completed');
       ?></b></h3>
      <h5>{{Request::get('tt')}}</h5>
      <i>Besteld: {{date('d M Y', strtotime($package->created_at))}}</i><br/>
      <i>Laatst gewijzigd: {{date('d M Y', strtotime($package->updated_at))}}</i>
    </div>
    <div class="row shop-tracking-status">
    <div class="order-status">

                <div class="order-status-timeline">
                    <!-- class names: c0 c1 c2 c3 and c4 -->
                    <div class="order-status-timeline-completion
                    <?php
                      switch($package->status){
                        case 'received':
                        echo 'c0';break;
                        case 'packed':
                        echo 'c1';break;
                        case 'transit':
                        echo 'c2';break;
                        case 'delivered':
                        echo 'c3';break;
                        case 'completed':
                        echo 'c4';break;
                      }
                    ?>
                    "></div>
                </div>

                <div class="image-order-status image-order-status-new <?=($package->status=='received' ? 'active' : '') ?> img-circle">
                    <span class="status">{{__('track_trace.received_b')}}</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-active <?=($package->status=='progress' ? 'active' : '') ?> img-circle">
                    <span class="status">{{__('track_trace.packed_b')}}</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-intransit <?=($package->status=='shipped' ? 'active' : '') ?> img-circle">
                    <span class="status">{{__('track_trace.send_b')}}</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-delivered <?=($package->status=='delivered' ? 'active' : '') ?> img-circle">
                    <span class="status">{{__('track_trace.delivered_b')}}</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-completed <?=($package->status=='completed' ? 'active' : '') ?> img-circle">
                    <span class="status">{{__('track_trace.completed_b')}}</span>
                    <div class="icon"></div>
                </div>
              </div>
    </div>
    @else
    <div class="text-center">
      <h4>{{__('track_trace.message_1')}}</h4>
      <p>{{__('track_trace.message_2')}} <br/>
        "<b>{{Request::get('tt')}}</b>"
      <br/>{{__('track_trace.message_3')}}<br/>
       {{__('track_trace.message_4')}}
    <a href="{{route('contact')}}">{{__('track_trace.message_5')}}</a></p>
  </div>
    @endif
  @else
  <div class="text-center">
    <div class="col-xs-12">
      {{__('track_trace.message_6')}}<br/>
      {{__('track_trace.message_7')}} <br/>{{__('track_trace.message_8')}}<br/>
    </div>
  </div>
    
  @endif

  <div class="container" style="margin-bottom:70px; padding-top:20px;">
    <h3 class="text-center">{{__('track_trace.message_9')}}</h3>
    <form method="get" action="{{route('tracktrace')}}" class="form-horizontal">
      <div class="form-group col-sm-10 col-xs-12">
          <label for="tt" class="col-sm-2 control-label">#</label>
            <div class="col-sm-10">
              <input type="text" id="tt" name="tt"
                class="form-control" value="{{Request::get('tt')}}" placeholder="{{__('track_trace.track_number')}}">
            </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2 col-xs-12">
          <button type="submit" id="btn_tt" class="btn btn-success">
            {{__('track_trace.track')}}
          </button>
        </div>
      </div>
    </form>
  </div>
  
</div>

@endsection
