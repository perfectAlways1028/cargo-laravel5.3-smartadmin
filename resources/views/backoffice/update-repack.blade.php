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
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="box-body">
                <p>Re-pack voor: <b>{{$customer->first_name}} {{$customer->last_name}}</b></p>
                <form id='form' method="post" enctype="multipart/form-data" action="{{route('admin-create-repack', ['id' => $customer->id])}}" class="form">
                    
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" class="form-control" name="type">
                                <option value="sea" selected>Sea</option>
                                <option value="air">Air</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="parts">Parts</label>
                            <input class="form-control" type="number" id="parts" name="parts" value="{{ old('parts', 1) }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 air">
                        <div class="form-group">
                            <label for="weight">Weight (lbs.)</label>
                            <input class="form-control" type="number" id="weight" name="weight" value="{{ old('weight') }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 air">
                        <div class="form-group">
                            <label for="price_per_lbs">Price per pound (USD)</label>
                            <input class="form-control" type="currency" id="price_per_lbs" name="price_per_lbs" value="{{ old('price_per_lbs', '2.99') }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="height">Height (inch)</label>
                            <input class="form-control" type="number" id="height" name="height" value="{{ old('height') }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="width">Width (inch)</label>
                            <input class="form-control" type="number" id="width" name="width" value="{{ old('width') }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="depth">Depth (inch)</label>
                            <input class="form-control" type="number" id="depth" name="depth" value="{{ old('depth') }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="price_per_inch">Price per cubic inch (USD)</label>
                            <input class="form-control" type="currency" id="price_per_inch" name="price_per_inch" value="{{ old('price_per_inch', '2.99') }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="extrafee">Additional fee (USD)</label>
                            <input class="form-control" type="currency" id="extrafee" name="extrafee"  value="{{ old('extrafee') }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <h2>Total : <span class="text-success total-price">$0.00</span></h2>
                    </div>
                    <input type='submit' name='repack-all' value='Repack All' class='btn btn-block btn-success'/>
                    
                </form>
                <h3>Orders in package</h3>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Tracking #</th>
                    <th>Barcode</th>
                    <th>Week</th>
                    <th>Created</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($customer->packages as $package)
                    <tr>
                        <td>{{$package->tracking_number}}</td>
                        <td>{{$package->barcode}}</td>
                        <td>{{ date('W') }}</td>
                        <td>{{$package->created_at}}</td>
                    </tr>
                  @endforeach
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
        $('.air').hide();
        calcPrice();

        $("#type").on('change',function(){
            $('.sea').toggle();
            $('.air').toggle();
            calcPrice();
        });

        $('#form').on('keyup',function(){
            calcPrice();
        });

        //calc
        function calcPrice(){
            var total=0;
            var type = $('#type').val();
            //Add additional fee
            if(!isNaN($('#extrafee').val()) && $('#extrafee').val().length > 0)
                total+= parseFloat($('#extrafee').val().replace(",","."));
            if(type==='sea'){
            if((!isNaN($('#height').val()) && $('#height').val().length > 0) 
                && (!isNaN($('#depth').val()) && $('#depth').val().length > 0)
                && (!isNaN($('#width').val()) && $('#width').val().length > 0)){
                    var cubics = parseFloat($('#height').val().replace(",",".") ) 
                    * parseFloat($('#width').val().replace(',','.'))
                    * parseFloat($('#depth').val().replace(',','.'));
                    total+= cubics * parseFloat($('#price_per_inch').val().replace(',','.'));
                }
            } else if (type==='air'){
            if((!isNaN($('#weight').val()) && $('#weight').val().length > 0) 
                && (!isNaN($('#price_per_lbs').val()) && $('#price_per_lbs').val().length > 0))
                total+= parseFloat($('#weight').val().replace(",",".") ) * parseFloat($('#price_per_lbs').val().replace(',','.'));
            }

            $('.total-price').html('$'+parseFloat(total).toFixed(2));
        }
    });
</script>
@endsection
