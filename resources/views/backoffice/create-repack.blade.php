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
                            <label for="type">Type (Voorkeur: {{ucfirst($shiptype)}})</label>
                            <select id="type" class="form-control" name="type">
                               <option value="air" <?=($shiptype=='air' ? selected : '');?>>Air</option>
                               <option value="sea" <?=(($shiptype=='sea') ? selected : '');?>>Sea</option>
                                <!--<option value="eco" <?=(($shiptype=='eco') ? selected : '');?>>Eco</option>-->
                           
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 air">
                        <div class="form-group">
                            <label for="price_per_lbs">Price per pound (USD)</label>
                            <input class="form-control" type="currency" id="price_per_lbs" name="price_per_lbs" disabled="disabled" value="{{$rates['air']->content}}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 air eco">
                        <div class="form-group">
                            <label for="weight">Weight (lbs.)</label>
                            <input class="form-control" type="number" id="weight" name="weight" value="{{ old('weight',0) }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="parts">Parts</label>
                            <input class="form-control" type="number" id="parts" name="parts" value="{{ old('parts', 1) }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="height">Height (inch)</label>
                            <input class="form-control" type="number" id="height" name="height" value="{{ old('height',0) }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="width">Width (inch)</label>
                            <input class="form-control" type="number" id="width" name="width" value="{{ old('width',0) }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="depth">Depth (inch)</label>
                            <input class="form-control" type="number" id="depth" name="depth" value="{{ old('depth',0) }}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 sea">
                        <div class="form-group">
                            <label for="price_per_inch">Price per cubic inch (USD) - Standard</label>
                            <input class="form-control" type="currency" id="price_per_inch" name="price_per_inch" disabled="disabled" value="{{$rates['sea']->content}}"/>
                        </div>
                    </div>
                    <div class="col-xs-6 eco">
                        <div class="form-group">
                            <label for="price_per_inch">Price per pound (USD) - ECO</label>
                            <input class="form-control" type="currency" id="price_per_lbs_eco" name="price_per_inch_eco" disabled="disabled" value="{{$rates['eco']->content}}"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="extrafee">Additional fee (USD)</label>
                            <input class="form-control" type="currency" id="extrafee" name="extrafee"  value="{{ old('extrafee',0) }}"/>
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
                  @foreach($packages as $package)
                    <tr>
                        <td>{{$package->tracking_number}}</td>
                        <td>{{$package->barcode}}</td>
                        <td>{{$package->week}}</td>
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
        @if($shiptype=='eco')
        	$('.air').hide();
        	$('.sea').hide();
        	$('.eco').show();
        @elseif($shiptype=='air')
        	$('.eco').hide();
        	$('.sea').hide();
        	$('.air').show();
        @else
        	$('.air').hide();
        	$('.eco').hide();
        	$('.sea').show();
        @endif
        
        calcPrice();

        $("#type").on('change',function(){
            $('.sea').hide();
            $('.air').hide();
            $('.eco').hide();
            $('.'+this.value).show();
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
            } else if (type==='air' || type=='eco'){
            	if((!isNaN($('#weight').val()) && $('#weight').val().length > 0) 
                	&& (!isNaN($('#price_per_lbs').val()) && $('#price_per_lbs').val().length > 0))
                	
                	if(type=='eco'){
                		total+= parseFloat($('#weight').val().replace(",",".") ) * parseFloat($('#price_per_lbs_eco').val().replace(',','.'));
                	} else {
                		total+= parseFloat($('#weight').val().replace(",",".") ) * parseFloat($('#price_per_lbs').val().replace(',','.'));
                	}
            }
            $('.total-price').html('$'+parseFloat(total).toFixed(2));
        }
    });
</script>
@endsection
