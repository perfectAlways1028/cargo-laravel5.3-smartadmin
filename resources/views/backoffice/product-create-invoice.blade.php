@extends("crudbooster::admin_template")
@section("content")
<style>
canvas#canvas{
	border:1px solid #aaa;
	border-bottom:1px dashed #444;
}
</style>
  <link href="{{url('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
  <div style="width:750px;margin:0 auto ">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class='fa fa-archive'></i> {{$page_title}}
        </div>
        <div class="panel-body">
                    <div class="col-xs-12">
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                    </div>
              <div class="box-body">
                <form id='form' method="post" enctype="multipart/form-data" action="{{route('admin-product-create-invoice', ['id' => $product->id])}}" class="form">
                
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class='row'>
                        <div class="col-xs-12">
                            <select id="currency" name="currency">
                                <option value="usd">US Dollar</option>
                                <option value="srd">Surinam Dollar</option>
                                <option value="eur">Euro</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <h2>Totaal bedrag : <br/><span class="text-info">${{$product->price}} USD</span></h2>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <h2>Resterend : <br/><span class="text-danger total-price">${{$product->price}}</span></h2>
                            </div>
                            
                            <div class="form-group">
                                <h2>Betaald : <br/><span class="text-danger total-price-paid">$0.00</span></h2>
                            </div>
                            <div class="form-group">
                                <h2>Retourneren : <br/><span class="total-price-change">$0.00</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <label for="id">Klant ID</label>
                            <input type="number" name="customer_id" id="customer_id" tabindex="1" class="form-control" value = "{{$product->customer_id}}" placeholder="klant ID" autofocus />
                        </div>

                        <div class="col-xs-12 col-md-4">
                          <label for="customer">Klantnaam</label>
                          <input type="text" name="customer" id="customer" class="form-control" tabindex="2" value = "{{$product->customer_name}}" placeholder="Klantnaam"/>
                        </div> 
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="additional_fee">Additional Fee(USD)</label>
                                <input class="form-control" type="currency" id="additional_fee" name="additional_fee"  value="{{$product->additional_fee}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                               <label for="parts">SRD <img src="{{ url('/images/flags/su.png') }}" height="30px"/></label>
                                <input class="form-control" type="text" id="srd" name="srd" value="{{ old('srd', 0) }}"/>
                                <i>1 SRD = {{ 1/$rates['srd']->content }} USD</i>
                        </div>
                        <div class="col-xs-12 col-md-4">
                                  <label for="parts">USD <img src="{{ url('/images/flags/us.png') }}" height="30px"/></label>
                                <input class="form-control" type="text" id="usd" name="usd" value="{{ old('usd', 0) }}"/>
                                <i>1 USD = {{ $rates['srd']->content }} SRD | {{ $rates['eur']->content }} EUR</i>
                        </div>
                        <div class="col-xs-12 col-md-4">
                                <label for="parts">EUR <img src="{{ url('/images/flags/eu.png') }}" height="30px"/></label>
                                <input class="form-control" type="text" id="eur" name="eur" value="{{ old('eur', 0) }}"/>
                                <i>1 EUR = {{ 1/$rates['eur']->content }} USD</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 ">
                                <label for="parts"/>Comment</label>
                                <input class="form-control" height="60px" type="textarea"  rows="10" cols="70" id="comment" name="comment" value="{{$product->comment}}"/>
                        </div>

                    </div>
                    <div class='row'>
                    	<div class='col-xs-6 col-xs-offset-3'>
                        	<h4>Handtekening</h4>
                    		<canvas id='canvas'></canvas>
                    		<input type="hidden" id="signature" name="signature"/>
                    	</div>
                    </div>

                    <div class='row'>
                        <div class="col-xs-4 col-xs-offset-2">
                            <input type='submit' name='repack-all' value='Betaling afronden' class='btn btn-block btn-success'/>

                        </div>
                    </div>
                    
                </form>

              </div><!-- /.box-body -->
              <div class="box-footer">
              </div>
        </div>
      </div>

  </div>
<script src="{{url('js/signature_pad.min.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<script src="{{url('js/jquery.json.min.js')}}"></script>
<script>
    $(document).ready(function(){
       
        var canvas = document.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas,{
        	onEnd: function(){
        		calcPrice();
        		$('#signature').val(signaturePad.toDataURL());
        	}
        });
         calcPrice();

        $('#form').on('keyup',function(){
            calcPrice();
        });

        $('#currency').on('change',function(e){
            calcPrice();
        });
        

        $('form').on('submit',function(e){
            if(paid<total)
            {
                e.preventDefault;
                alert('Niet voldoende betaald!');
                return false;
            }
            if(signaturePad.isEmpty() && !confirm('Geen handtekening! Weet u zeker dat u wilt afronden?')){
            	e.preventDefault;
            	return false;
            }
        });
        $('#customer').autocomplete({
          source : '{!!URL::route('customerAutoComplete')!!}',
          dataType: 'json',
          type: 'GET',
          onSelect: function (suggestion) {
          }
        });
        //calc
        function calcPrice(){
            var total={{$product->price}};
            var additional_fee = parseFloat($('#additional_fee').val());
            if(!isNaN(additional_fee))
                total += additional_fee;
            var paid = 0.00; var change = 0.00;
            var usd=parseFloat($('#usd').val()) * 1;
            var eur=parseFloat($('#eur').val()) * {{ 1/$rates['eur']->content }};
            var srd=parseFloat($('#srd').val()) * {{ 1/$rates['srd']->content }};
 
            if(!isNaN(usd))
                paid += usd;
            if(!isNaN(srd))
                paid += srd;
            if(!isNaN(eur))
                paid += eur;
    
            total-=paid;
            if(total<0){
                change=total*-1;
                total=0;
                
            } else {
                change=0;
            }
            checkCurrency(total,paid,change);
        }

        function checkCurrency(total,paid,change){
            var currency=$('#currency').val();
            if(currency=='usd'){
                $('.total-price').html('$'+parseFloat(total).toFixed(2));
                $('.total-price-paid').html('$'+parseFloat(paid).toFixed(2));
                $('.total-price-change').html('$'+parseFloat(change).toFixed(2));
            }  
            if(currency=='eur'){
                $('.total-price').html('&euro;'+parseFloat(total*{{ $rates['eur']->content }}).toFixed(2));
                $('.total-price-paid').html('&euro;'+parseFloat(paid*{{ $rates['eur']->content }}).toFixed(2));
                $('.total-price-change').html('&euro;'+parseFloat(change*{{ $rates['eur']->content }}).toFixed(2));
            }  
            if(currency=='srd'){
                $('.total-price').html('SRD '+parseFloat(total*{{ $rates['srd']->content }}).toFixed(2));
                $('.total-price-paid').html('SRD '+parseFloat(paid*{{ $rates['srd']->content }}).toFixed(2));
                $('.total-price-change').html('SRD '+parseFloat(change*{{ $rates['srd']->content }}).toFixed(2));
            }  

            if(total==0 && !signaturePad.isEmpty()){
                $('input[type=submit]').removeAttr('disabled');
                $('.total-price').removeClass('text-danger').addClass('text-success');
                $('.total-price-paid').removeClass('text-danger').addClass('text-success');
            } else {
                $('input[type=submit]').attr('disabled','disabled');
                $('.total-price').removeClass('text-success').addClass('text-danger');
                $('.total-price-paid').removeClass('text-success').addClass('text-danger');
            }
            if(change>0){
                $('.total-price-change').removeClass('text-success').addClass('text-danger');
            } else {
                $('.total-price-change').removeClass('text-danger').addClass('text-success');
            }
        }
        
    });
</script>
@endsection
