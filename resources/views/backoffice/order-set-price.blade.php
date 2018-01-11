@extends("crudbooster::admin_template")
@section("content")
  <div style="width:750px;margin:0 auto ">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class='fa fa-archive'></i> {{$page_title}}
        </div>
        <div class="panel-body">
        @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="box-body">
                <p>Re-pack voor: <b>{{$customer->first_name}} {{$customer->last_name}}</b></p>
                <form id='form' method="post" enctype="multipart/form-data" action="{{route('admin-order-set-price', ['id' => $order->id])}}" class="form">
                    
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="tracking_number">Tracking Number</label>
                            <input class="form-control" type="text" id="tracking_number" name="tracking_number" value="{{$order->tracking_number}}"/>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="freight_price">Approximately Freight(USD)</label>
                            <input class="form-control" type="currency" id="freight_price" name="freight_price"  value="{{$order->freight_price}}"/>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="real_price">Store Price(USD)</label>
                            <input class="form-control" type="currency" id="real_price" name="real_price"  value="{{$order->real_price}}" />
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="fixed_fee">Fixed Fee(USD)</label>
                            <input class="form-control" type="currency" id="fixed_fee" name="fixed_fee" value="{{$order->fixed_fee}}"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="percentage_fee">Percentage for fee(%)</label>
                            <input class="form-control" type="currency" id="percentage_fee" name="percentage_fee" value="{{$order->percentage_fee}}" disabled/>
                        </div>
                    </div>
                    <input type="hidden" id="price" name="price" value ="0"/>
                    <input type="hidden" id="fee" name="fee" value ="0"/>

                    <div class="col-xs-12">
                        <h2>Total : <span class="text-success total-price">$0.00</span></h2>
                    </div>
                    <div class="col-xs-12">
                        <h2>Fee : <span class="text-success total-fee">$0.00</span></h2>
                    </div>
                    <input type='submit' name='set-price' value='Set Price' class='btn btn-block btn-success'/>
                    
                </form>
                <h3>Order</h3>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Link</th>
                    <th>Note</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>{{$order->link}}</td>
                        <td>{{$order->notes}}</td>

                    </tr>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
              <div class="box-footer">
              <!--   <div class="pull-left">
                   <input type='submit' name='repack' value='Repack Selected' class='btn btn-primary'/>
                </div>
                <div class='pull-right'>
                </div>-->
              </div><!-- /.box-footer-->
        </div>
      </div>

  </div>
<script>
    $(document).ready(function(){
         calcPrice();

        $('#form').on('keyup',function(){
            calcPrice();
        });
        

        //calc
        function calcPrice(){
            var total=0;
            var fee = 0;
            //Add additional fee
            var real_price= parseFloat($('#real_price').val().replace(",","."));
            var fixed_fee = parseFloat($('#fixed_fee').val().replace(",","."));
            var percentage =  parseFloat($('#percentage_fee').val().replace(",","."));

            var percentage_fee = real_price* percentage / 100;

            total += real_price + fixed_fee + percentage_fee;
            fee = fixed_fee + percentage_fee;

            $('.total-price').html('$'+parseFloat(total).toFixed(2));
            $('.total-fee').html('$'+parseFloat(fee).toFixed(2));
            $('#price').val(parseFloat(total).toFixed(2));
            $('#fee').val(parseFloat(fee).toFixed(2));
        }
    });
</script>
@endsection
