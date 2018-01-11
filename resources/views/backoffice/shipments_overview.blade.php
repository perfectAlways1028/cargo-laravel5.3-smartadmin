@extends('crudbooster::admin_template')
@section('content')

<div class="box">
<div class="box-header">
<div class="col-xs-12 col-md-6" style="padding-top:5px">
	
        @if(CRUDBooster::isUpdate() && $button_edit)
		<div class="row">
			<a href="#" id="update-transit" class="btn btn-small btn-success">Bulk In transit</a>
			<a href="#" id="update-delivered" class="btn btn-small btn-warning">Bulk In Delivered</a>
		</div>
		@endif
</div>
<div class="col-xs-12 col-md-6" style="padding-top:5px">
    <div class="row">
        <div class="col-xs-12">
            <input type="search" id="search" value="" class="form-control" placeholder="Search...">
        </div>
    </div>
        </div>
        </div>
        <div class="box-body table-responsive no-padding">
<table id="table" class='table table-striped table-bordered table-condensed'>
  <thead>
      <tr>
      	<th><input type="checkbox" class="toggle-all"/></th>
        <th>Type</th>
        <th>Customer</th>
        <th>Tracking number</th>
        <th>Week</th>
        <th>Parts</th>
        <th># of packages</th>
        <th>Weight (lbs)</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
       </tr>
  </thead>
  <tbody>
  @if(count($shipments)>0)
    @foreach($shipments as $shipment)
      @if(CRUDBooster::isUpdate() && $button_edit)
      	<form id='form-{{$shipment->id}}' method='post' action="{{route('admin-update-repack', ['id' => $shipment->id])}}" class="form">
      	<input type="hidden" name="_token" value="{{ csrf_token() }}">
      @endif
      <tr>
      	<td><input class='ids' type="checkbox" name="ids[]" value="{{$shipment->id}}"/></td>
        <td>{{$shipment->shipment_type}}</td>
        <td class="{{$shipment->id}}-name">{{$shipment->customer->first_name}} {{$shipment->customer->last_name}}</td>
        <td>
            <span class="hidden {{$shipment->id}}-tracktrace"></span>
          @if(CRUDBooster::isRead())
           <a href='{{CRUDBooster::mainpath("detail/$shipment->id")}}'>
            {{$shipment->tracking_number}}
            </a>
          @else
            {{$shipment->tracking_number}}
          @endif
        </td>
        <td class="{{$shipment->id}}-week">{{$shipment->week}}</td>
        <td class="{{$shipment->id}}-parts">{{$shipment->parts}}</td>
        <td class="{{$shipment->id}}-packages">
            <a href="#" onclick="toggleLi({{$shipment->id}});">{{count($shipment->packages)}} Packages</a>
            <ul class="{{$shipment->id}}-li" style="display:none">
            	@if(count($shipment->packages)>0)
                @foreach($shipment->packages as $package)
                  <!--  <li>{{$package->barcode}}</li> -->
                    <li>{{$package->tracking_number}}</li>
                    <?php $barcodes[]=$package->barcode; ?>
                @endforeach
                @endif
            </ul>
            <input type="hidden" class="{{$shipment->id}}-barcodes" value="{{(count($barcodes)>0 ? implode(',',$barcodes) : '')}}" />
        </td>
        <td class="{{$shipment->id}}-lbs">{{$shipment->weight}}</td>
        <td class="{{$shipment->id}}-price">${{$shipment->price}}</td>
        
        <td>
        @if(CRUDBooster::isUpdate() && $button_edit)
            <select rel="{{$shipment->id}}" name="status" id="status">
                <option value='packed' {{ ($shipment->status=='packed' ? 'selected' : '')}}>Packed</option>
                <option value='transit' {{ ($shipment->status=='transit' ? 'selected' : '')}}>In Transit</option>
                <option value='delivered' {{ ($shipment->status=='delivered' ? 'selected' : '')}}>Delivered</option>
                <option value='completed' {{ ($shipment->status=='completed' ? 'selected' : '')}}>Completed</option>
            </select>
        @else
            {{ $shipment->status }}
        @endif
        </td>
        <td>

            @if($shipment->status==='packed')
        		@if(CRUDBooster::isUpdate() && $button_edit)
                	<a href="#" class="btn btn-sm btn-primary print-label" rel="{{$shipment->id}}">Print sticker</a>
                @endif
            @elseif($shipment->status==='transit')
       			 @if(CRUDBooster::isUpdate() && $button_edit)
                	<a href="#" class="btn btn-sm btn-primary print-label" rel="{{$shipment->id}}">Print sticker</a>
                @endif
            @elseif($shipment->status==='delivered')
                @if($shipment->transaction === null)
                <a href="{{route('admin-create-invoice',['id'=>$shipment->id])}}" class="btn btn-sm btn-default">Create Invoice</a>
                @else
                    <a href="{{route('admin-print-invoice',['id'=>$shipment->transaction->id])}}" class="btn btn-sm btn-success">Print Invoice</a>
                @endif
            @elseif($shipment->status==='completed')
                @if($shipment->transaction === null)
                    <b>No invoice generated!</b>
                @endif
                    <a href="{{route('admin-print-invoice',['id'=>$shipment->transaction->id])}}" target="_blank" class="btn btn-sm btn-success">Print Invoice</a>
            @endif
          <!-- To make sure we have read access, wee need to validate the privilege -->
          @if(CRUDBooster::isUpdate() && $button_edit && $shipment->status!=='completed' && $shipment->status!=='delivered')
          <a class='btn btn-warning btn-sm' href='{{CRUDBooster::mainpath("set-week/add/$shipment->id")}}'>
          <i class="fa fa-plus"></i> W</a>
          <a class='btn btn-warning btn-sm' href='{{CRUDBooster::mainpath("set-week/substract/$shipment->id")}}'>
          <i class="fa fa-minus"></i> W</a>
          <a class='btn btn-info btn-sm' href='{{CRUDBooster::mainpath("edit/$shipment->id")}}'><i class="fa fa-pencil"></i></a>
          @endif
          
          @if(CRUDBooster::isDelete() && $button_delete)
          <a class='btn btn-danger btn-sm' href='{{CRUDBooster::mainpath("delete/$shipment->id")}}'><i class="fa fa-trash"></i></a>
          @endif
        </td>
       </tr>
    	@if(CRUDBooster::isUpdate() && $button_edit)
       </form>
       @endif
    @endforeach
    @endif
  </tbody>
</table>

<p>{!! urldecode(str_replace("/?","?",$shipments->appends(Request::all())->render())) !!}</p>
<script src="{{url('js/jquery.searchable.js')}}"></script>
<script src="{{url('js/DYMO.Label.Framework_2.0Beta.js')}}"></script>
<script src="{{url('js/jquery.json.min.js')}}"></script>
<script>
    
    	function toggleLi(id){
    		$('.'+id+'-li').slideToggle();
    	}
    $(document).ready(function(){
    
    $('.toggle-all').click(function(e){
    	console.log(this.checked);
    	$('input[type=checkbox]').attr('checked', this.checked);
    });
    
    @if(CRUDBooster::isUpdate() && $button_edit)
    
    $('#update-transit').click(function(e){
    	var form = $('<form></form>');
    	form.attr('action','{{ url('admin/shipments/bulk-update') }}');
    	form.attr('method','post');
    	form.append("<input type='hidden' name='_token' value='{{ csrf_token() }}' />");
    	form.append("<input type='hidden' name='_bulkaction' value='transit'/> ");
    	form.append($('.ids'));
        $(document.body).append(form);
    	form.submit();
    });
    
    $('#update-delivered').click(function(e){
    	var form = $('<form></form>');
    	form.attr('action','{{ url('admin/shipments/bulk-update') }}');
    	form.attr('method','post');
    	form.append("<input type='hidden' name='_token' value='{{ csrf_token() }}' />");
    	form.append("<input type='hidden' name='_bulkaction' value='delivered'/> ");
    	form.append($('.ids'));
        $(document.body).append(form);
    	form.submit();
    });
    
    @endif
    
    //searchable
    $( '#table' ).searchable({
        striped: true,
        oddRow: { 'background-color': '#f5f5f5' },
        evenRow: { 'background-color': '#fff' },
        searchType: 'default',
        show: function( elem ) {
            elem.slideDown(300);
        },
        hide: function( elem ) {
            elem.slideUp( 300 );
        }
    });
    
    
    
    //Dymo
        var label='';
        $('select').on('change',function(e){
            $('#form-'+$(this).attr('rel')).submit();
        });

        $.ajax("{{url('default.label')}}").done(function(data){
            label=data;
            dymo.label.framework.trace = 1; //true
            dymo.label.framework.init(console.log('DYMO Framework Loaded'));
        });

        $('body').on('click','.print-label', function(e){
    		e.preventDefault();
    		try{
    			var DymoLabel = dymo.label.framework.openLabelXml(label);
    			//Set vars
    			var id = $(this).attr('rel');
    			var barcodes = $('.'+id+'-barcodes').val();
    			var orders = barcodes.split(",");
    			var tracktrace = $('.'+id+'-tracktrace').html();
    			var name = $('.'+id+'-name').html();
    			var parts = $('.'+id+'-parts').html();
    			var lbs = $('.'+id+'-lbs').html();
    			var price = $('.'+id+'-price').html();
                var week = {{ date('W')}};
    			var json = {id:tracktrace, price:price, name:name ,orders:orders};
    			json = $.toJSON(json);
    			//Change label
    			DymoLabel.setAddressText(0,name.toUpperCase());
    			DymoLabel.setObjectText("TEKST_2", week+"         "+lbs+" LBS         "+orders.length);
    			DymoLabel.setObjectText("TEKST", "1 VAN "+parts);
    			DymoLabel.setObjectText("TEKST_3", tracktrace);
                DymoLabel.setObjectText("Barcode", barcodes);
    			var printers = dymo.label.framework.getPrinters();
    			console.log(printers);
    			if(printers.length==0){
    				throw "No compatible DYMO Label Writer Printer found! Is it plugged in? Have you installed the software? (0x01)";
    			}

    			var printerName = "";
    			for(var i=0; i < printers.length; i++){
    				var printer = printers[i];
    				if(printer.printerType == "LabelWriterPrinter"){
    					printerName = printer.name;
    					break;
    				}
    			}

    			if(printerName==""){
    				throw "No compatible DYMO Label Writer Printer found! Is it plugged in? Have you installed the software? (0x02)";
    			}
    			if(parts>1){
    					for(i=1; i<=parts; i++){
    						DymoLabel.setObjectText("TEKST", i+" VAN "+parts);
    						DymoLabel.print(printerName);
    					}
    				} else {
    					DymoLabel.print(printerName);
    				}
    			/*
    			$.get("http://www.laxanicargo.com/generate-qr", {qr:json},function(qr){
    				DymoLabel.setObjectText("AFBEELDING", qr);

    				if(parts>1){
    					for(i=1; i<=parts; i++){
    						DymoLabel.setObjectText("TEKST", i+" VAN "+parts);
    						DymoLabel.print(printerName);
    					}
    				} else {
    					DymoLabel.print(printerName);
    				}
    			}, "text");*/
    		} catch (e){
    			alert(e.message || e);
    		}
    	});

    });

	
</script>
<embed type="application/x-npapi-dymolabel" id="_DymoLabelFrameworkJslPlugin" width="1" height="1">
</div>
</div>
@endsection