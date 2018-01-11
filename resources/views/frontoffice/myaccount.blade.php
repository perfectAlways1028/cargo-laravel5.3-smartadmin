@extends('frontoffice.layout.master')
@section('content')
<div class="page">
  <div class="container"style="margin-bottom:50px;">
    <div class="text-center">
    <div class="col-xs-12 text-left">
    	<h1>{{__('myaccount.welcome')}} {{$user->getFullname()}}</h1>
    </div>

	<!-- bar -->
	<div class="col-xs-12 col-sm-4">
		<div id="order-form" class="col-xs-12 text-center well">
    		<h2>{{__('myaccount.order_from')}}</h2>
    		<div class="col-xs-6">
    				<label>{{__('myaccount.order_url')}}</label>
    				<div class="helper">{{__('myaccount.order_url_desc')}}</div></div>
    		<div class="col-xs-6">
    				<label>{{__('myaccount.note_comment')}}</label>
    				<div class="helper">{{__('myaccount.note_comment_desc')}}</div></div>
    		<form method="post" action="{{route('my-account')}}" class="form" >
    			
              {{ csrf_field() }}
    			<div class="col-xs-6">
    			<div id="links" class="form-group">
    				<input id="link-1" rel="1" tabindex="1" class="form-control links" type="text" name="link[]" style="margin:10px;" placeholder="bv: http://www.amazon.com/products/21"/>
    			</div>
    			</div>
    			<div id="notes" class="col-xs-6">
    				<input id="note-1" rel="2" tabindex="2" class="form-control notes" type="text" name="note[]" style="margin:10px;" placeholder="bv: XS, Blauw"/>
    			</div>   
    			<div class="col-xs-12 text-center">
    				<a id="add-more" class="btn btn-small" href="#add-more"><i class="fa fa-plus"></i> {{__('myaccount.add_article_desc')}}</a>
    			</div>
    			<div class="col-xs-12 text-right">
    				<input type="submit" class="btn btn-primary" value="Bestellen!">
    			</div>	
    		</form>
    	</div>
    	<div id="gift-form" class="col-xs-12 text-center well">
    		<h2>{{__('myaccount.gift_form')}}</h2>
    		<div class="col-xs-6">
    				<label>{{__('myaccount.amount')}}</label>
    				<div class="helper">{{__('myaccount.amount_desc')}}</div></div>
    		<div class="col-xs-6">
    				<label>{{__('myaccount.provider')}}</label>
    				<div class="helper">{{__('myaccount.provider_desc')}}</div></div>
    		<form method="post" action="{{route('my-account')}}" class="form" >
    				
              {{ csrf_field() }}
    			<div class="col-xs-6">
	    			<div id="amounts" class="form-group">
	    				<input id="amount-101" rel="100" tabindex="100" class="form-control amounts" type="number" step="0.01" name="amount[]" style="margin:10px;" placeholder=""/>
	    			</div>
    			</div>
    			<div id="providers" class="col-xs-6">
    				<select id="provider-101" rel="101" tabindex="101" class="form-control providers" name="provider[]"  style="margin:10px;" placeholder="bv: XS, Blauw">
      				    @foreach($providers as $provider)
    				        <option value = '{"id":"{{$provider->id}}", "fee": "{{$provider->fee}}"}'>{{$provider->name}}</option>
    				    @endforeach

    				</select>
    			</div>   
    			<div class="col-xs-12 text-center">
    				<a id="add-more-giftcard" class="btn btn-small" href="#add-more-giftcard"><i class="fa fa-plus"></i> {{__('myaccount.add_giftcard_desc')}}</a>
    			</div>
                <div class="col-xs-12">
                    <h2>Total : <span class="text-success total-price">$0.00</span></h2>
                </div>
    			<div class="col-xs-12 text-right">
    				<input type="submit" class="btn btn-primary" value="{{__('myaccount.giftcard_order')}}">
    			</div>	
    		</form>
    	</div>
	</div>

	<!-- Tabs -->
	<div class="col-xs-12 col-sm-8">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">{{__('myaccount.question_1')}}</a></li>
		<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">{{__('myaccount.delivery_address')}}</a></li>
		<li role="presentation"><a href="#3" aria-controls="3" role="tab" data-toggle="tab">{{__('myaccount.your_package')}}</a></li>
		<li role="presentation"><a href="#4" aria-controls="4" role="tab" data-toggle="tab">{{__('myaccount.your_giftcard')}}</a></li>
		<li role="presentation"><a href="#5" aria-controls="5" role="tab" data-toggle="tab">{{__('myaccount.your_order')}}</a></li>
		<li role="presentation"><a href="#6" aria-controls="6" role="tab" data-toggle="tab">{{__('myaccount.your_invoice')}}</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="1">
			<h3>{{__('myaccount.question_1')}}</h3>
			{{__('myaccount.answer_1')}}
			<br/>
			<div class='col-xs-12 col-sm-6 text-left'>
			<h5>{{__('myaccount.shipping_address')}}</h5>
			<table class="table">
				<tr><td>{{__('myaccount.name')}}</td><td>Roopcom/{{$user->id}} {{$user->getFullname()}} </td></tr>
				<tr><td>{{__('myaccount.address')}}</td><td>23627 sw 133rd ave<br/>
				unit 14<br/>
				Homestead Florida 33032<br/>
				United states of america
				</td></tr>
				<tr><td>{{__('myaccount.tel')}}</td><td>+1 754 213 3804</td></tr>
			</table>
			</div>
			<div class="clearfix"></div>
		</div>
		<div role="tabpanel" class="tab-pane" id="2">
			<h5 class="text-left">{{__('myaccount.delivery_address')}}</h5>
			<div class='col-xs-12 col-sm-6 text-left'>
				<table class="table text-left">
					<tr><td>{{__('myaccount.name')}}</td><td>Roopcom/{{$user->id}} {{$user->getFullname()}} </td></tr>
					<tr><td>{{__('myaccount.address')}}</td><td>Korte Bajonetstraat 56<br/>
					3014 ZS Rotterdam<br/>
					Nederland
					</td></tr>
					<tr><td>{{__('myaccount.tel')}}</td><td>+31620065555</td></tr>
				</table>
			</div>
			<div class="clearfix"></div>
		</div>
		<div role="tabpanel" class="tab-pane" id="3">
			<h5 class="text-left">{{__('myaccount.your_package')}}</h5>
			<table id="packages-table" data-search="true" class="table table-condensed table-hover text-left"></table>
			<div class="clearfix"></div>
		</div>
		<div role="tabpanel" class="tab-pane" id="4">
			<h5 class="text-left">{{__('myaccount.your_giftcard')}}</h5>
			<table id="giftcards-table" data-search="true" class="table table-condensed table-hover text-left"></table>
			<div class="clearfix"></div>		
		</div>
		<div role="tabpanel" class="tab-pane" id="5">
			<h5 class="text-left">{{__('myaccount.your_order')}}</h5>
    		<table style="table-layout: fixed;  word-wrap: break-word;"  id="orders-table" data-search="true" class="table table-condensed table-hover text-left">
    			
	     		 <thead>
			        <tr>
			        <th style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" data-sortable="true" data-field="link"> {{__('myaccount.link')}} </th>
			        <th data-sortable="true" data-field="notes"> {{__('myaccount.notes')}} </th>
			        <th data-sortable="true" data-field="tracking_number"> {{__('myaccount.tracking_number')}} </th>
			        <th data-sortable="true" data-field="price"> {{__('myaccount.price')}} </th>
			        <th data-sortable="true" data-field="freight_price"> {{__('myaccount.freight_price')}} </th>
			  
			        <th data-sortable="true" data-field="status"> {{__('myaccount.status')}} </th>
			  		<th data-sortable="true" data-formatter="actionFormatter" data-events="actionEvents" > {{__('myaccount.action')}} </th>
			          </tr>
			     </thead>
    		</table>
			<div class="clearfix"></div>
		</div>
		<div role="tabpanel" class="tab-pane" id="6">
			<h5 class="text-left">{{__('myaccount.your_invoice')}}</h5>
    		<table id="invoice-table" data-search="true" class="table table-condensed table-hover text-left"></table>
			<div class="clearfix"></div>
		</div>
	</div>


    	
    	</div>
    	
    	
        <!--<a href="{{route('logout')}}">{{__('myaccount.logout_desc')}}</a>-->
    </div>
    </div>
   
  </div>
  </div>
<script src="{{url('js/bootstrap-table.js')}}"></script>
<script src="{{url('js/bootstrap-editable.js')}}"></script>
<script src="{{url('js/bootstrap-table-editable.js')}}"></script>
<script src="{{url('js/jquery.searchable.js')}}"></script>
<script src="{{url('js/jquery.json.min.js')}}"></script>
<script>
	$(function(){
	//my-giftcards
	    calcPrice();

		$(document.body).on('change','#multiid',function(){
 
		   var id = $(this).attr('rowId');
		   var shipment_type = $(this).val();
			$.post('{{route('update-my-package')}}', {
				type:shipment_type,
				id: id
			});
		});

        $('.form').on('keyup',function(){
            calcPrice();
        });

        $(".providers").on('change',function(){
            calcPrice();
        });
        //calc
        function calcPrice(){
        	var providers = $('.providers');
        	var amounts = $('.amounts');
        	var inc =0;
        	var total =0;
        	for(var i=0; i<providers.length; i++){
        		var providerComp = providers[i];
        		var providerData = providerComp.value;
        		var provider = JSON.parse(providerData);

        		var fee = provider.fee;
        		var amountComp = amounts[i];
        		var amount = parseFloat(amountComp.value.replace(",","."));
        		var partPrice = amount + fee/100 * amount;
        		total += partPrice;
			}
			if(isNaN(total)){
				total = 0.00;
			}
            $('.total-price').html('$'+parseFloat(total).toFixed(2));
        }
		$('#giftcards-table').bootstrapTable({
			idField:'id',
			url:'{{route('my-giftcards')}}',
			columns:[{
				field:'id',
				title:'ID',
				editable:false
			},{
				field:'value',
				title:"{{__('myaccount.where')}}",
				editable:false
			},{
				field:'cost',
				title:"{{__('myaccount.cost')}}",
				editable:false
			},{
				field:'code',
				title:"{{__('myaccount.code')}}",
				editable:false
			},{
				field:'status',
				title:"{{__('myaccount.status')}}",
				editable:false
			}]
		});


		$('#packages-table').bootstrapTable({
			idField:'id',
			url:'{{route('my-packages')}}',
			columns: [
				{
					field:'tracking_number',
					title:"{{__('myaccount.tracking_number')}}",
					editable: false
				},{
					field: 'content',
					title:"{{__('myaccount.content')}}",
					editable: {
						type:'select',
       				     source:<?php echo $inhund_contents; ?>
					}
				},{
					field: 'weight',
					title:"{{__('myaccount.weight')}}",
					editable: false
				},{
					field: 'status',
					title:"{{__('myaccount.status')}}",
					editable: false
				},{
					field: 'shipment_type',
					title:"{{__('myaccount.type')}}",
					formatter: shipmentFormatter
				}
			]
		});

		$('#orders-table').bootstrapTable({
			idField:'id',
			url:'{{route('my-orders')}}'
		});		

		$('#invoice-table').bootstrapTable({
			idField:'id',
			url:'{{route('my-invoices')}}',
			columns: [
				{
					field:'shipment_type',
					title:"{{__('myaccount.type')}}",
					editable: false
				},{
					field: 'fullname',
					title:"{{__('myaccount.customer')}}",
					editable: false
				},{
					field: 'tracking_number',
					title:"{{__('myaccount.tracking_number')}}",
					editable: false
				},{
					field: 'week',
					title:"{{__('myaccount.week')}}",
					editable: false
				},{
					field: 'parts',
					title:"{{__('myaccount.parts')}}",
					editable: false			
				},{
					field: 'package_count',
					title:"{{__('myaccount.packages')}}",
					editable: false			
				},
				{
					field: 'weight',
					title:"{{__('myaccount.weight')}}",
					editable: false			
				},
				{
					field: 'price',
					title:"{{__('myaccount.price')}}",
					editable: false			
				},
				{
					field: 'action',
					title: 'Actions',
					formatter: actionInvoiceFormatter,
					events:'actionEvents'
				}
			]
		});		

		function priceInfo(value, row, index) {
			if(row.status === "priced"){
				return [
				].join('');
			}
			else {
					return '';
			}
		}
		$('#packages-table').on('editable-save.bs.table',function(e, field, row, $el){
			$.post('{{route('update-my-package')}}', {
				type:row.shipment_type,
				id: row.id,
				content: row.content
			});
		});
		
		$('#add-more').click(function(e){
			e.preventDefault();
			var note = $('.notes').last().clone();
			var link = $('.links').last().clone();
			var order = parseInt(note.attr('rel'));
			note.attr('rel',order+1);
			link.attr('rel',order+1);
			note.attr('id','note-'+order);
			link.attr('id','link-'+order);
			link.val('');
			link.attr('tabindex',order+2);
			note.attr('tabindex',order+2);
			note.val('');
			$('#notes').append(note);
			$('#links').append(link);
		});

		$('#add-more-giftcard').click(function(e){
			e.preventDefault();
			var provider = $('.providers').last().clone();
			var amount = $('.amounts').last().clone();
			var order = parseInt(provider.attr('rel'));
			provider.attr('rel',order+1);
			amount.attr('rel',order+1);
			provider.attr('id','provider-'+order);
			amount.attr('id','amount-'+order);
			amount.val('');
			amount.attr('tabindex',order+2);
			provider.attr('tabindex',order+2);
			provider.val('');
			$('#providers').append(provider);
			$('#amounts').append(amount);
			$(".providers").on('change',function(){
            	calcPrice();
       		 });
		});

		function packagesFormatter(value, row, index) {

		}
		function shipmentFormatter(value, row, index) {
				if(row.status === "accepted"){
					var types = ["air", "sea"];
					var values = ["air", "sea"];
				    var result = "<select  data-tags=\"true\" id=\"multiid\" rowId=\""+row.id+"\" data-placeholder=\"Select an option\" class=\"selectpicker show-tick form-control\" data-live-search=\"false\">"
				    for(var i=0;i<types.length;i++){
				    	if(value === values[i])
				       		result += " <option value=\""+types[i]+"\"  selected >"+values[i]+"</option>";
				    	else
				    		result += " <option value=\""+types[i]+"\">"+values[i]+" </option>";
				    }
				    result += "</select>";
				    return result;
				}else {
					return value;
				}
		}
		function actionFormatter(value, row, index){
				if(row.status === "Priced"){
					return [ 
		        	'<a class="btn btn-sm btn-success" id="accept" title= "Accept Price"><i class="glyphicon glyphicon-ok"></i></a>',
		        	' <a class="btn btn-sm btn-danger" id="decline" title= "Decline Price"><i class="glyphicon glyphicon-remove"></i></a> '

				    ].join('');
				}else {
					return [].join('');
				}
	
		}
		function actionInvoiceFormatter(value, row, index){

				if(row.status === "completed" && row.transaction !== null){
					var url = "{{route('front-print-invoice', ':id')}}";
					url = url.replace(':id', row.transaction.id);
					return [ 
		        	"<a href=\""+url+"\"  target=\"_blank\" class=\"btn btn-sm btn-success\" style=\"color: #FFFFFF;text-decoration: none;\">Print Invoice</a>",

				    ].join('');
				}else {
					return [].join('');
				}
	
		}
		$('#accountTabs a:first').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});

		window.actionEvents = {

			 'click #print_invoice': function (e, value, row, index) {
		    	$.ajax({
		    		url: '{{route('confirm-order')}}',
		    		type: 'get',
		    		data: {
		    			order_id: row.id
		    		},
		    		success: function(data) {
		    			$('#orders-table').bootstrapTable('refresh');
		    		},
		    		error: function(data) {

		    		}

		    	});
    		},	
		    'click #accept': function (e, value, row, index) {
		    	$.ajax({
		    		url: '{{route('confirm-order')}}',
		    		type: 'get',
		    		data: {
		    			order_id: row.id
		    		},
		    		success: function(data) {
		    			$('#orders-table').bootstrapTable('refresh');
		    		},
		    		error: function(data) {

		    		}

		    	});
    		},		
    	    'click #decline': function (e, value, row, index) {
		    	$.ajax({
		    		url: '{{route('decline-order')}}',
		    		type: 'get',
		    		data: {
		    			order_id: row.id
		    		},
		    		success: function(data) {
		    			$('#orders-table').bootstrapTable('refresh');
		    		},
		    		error: function(data) {

		    		}

		    	});
    		},
    	}
		 });
</script>

@endsection
