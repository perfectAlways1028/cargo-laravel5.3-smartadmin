@extends("crudbooster::admin_template")
@section("content")
<style>
span.title{
	width:100px;
	display:inline-block;
	font-weight:bold;
}
</style>
 <link href="{{url('css/bootstrap-table.css')}}" rel="stylesheet" type="text/css">
 <link href="{{url('css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
  <div style="width:1000px;margin:0 auto ">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class='fa fa-barcode'></i> {{$page_title}}
        </div>
        <div class="panel-body">
            <form method='post' id="form" enctype="multipart/form-data" action='{{ route("admin-scan-packages")}}'>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
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
                
                <div class="col-xs-2">
                  <label for="shipping_type">Type</label>
                  <select name='shipping_type' id='shipping_type' class="form-control">
                  	<!--<option value='eco'>Eco</option> -->
                  	<option value='sea'>Sea</option>
                  	<option value='air' selected>Air</option>
                  </select>
                </div>
                <div class="col-xs-2">
                    <label for="id">Klant ID</label>
                    <input type="number" name="customer_id" id="customer_id" tabindex="1" class="form-control" value = "{{$package->customer_id}}" placeholder="klant ID" autofocus />
                </div>

                <div class="col-xs-3">
                  <label for="customer">Klantnaam</label>
                  <input type="text" name="customer" id="customer" class="form-control" tabindex="2" value = "{{$package->customer_name}}" placeholder="Klantnaam"/>
                </div> 
                <div class="col-xs-3">
                  <label for="tracking_number">Traceercode</label>
                  <input type="text" name="tracking_number" class="form-control" id="tracking_number" tabindex="3" value = "{{$package->tracking_number}}" placeholder="Traceercode"/>
                </div>

                <div class="col-xs-3">
                  <label for="weight">Gewicht</label>
                  <input type="number" name="weight" class="form-control" id="weight"  tabindex="4" value = "{{$package->weight}}" placeholder="Gewicht" step="0.01"/>

                </div>
                <div class="col-xs-3">
                  <label for="location">Plaats</label>
                  <input type="text" name="location" class="form-control" id="location" tabindex="5" value = "{{$package->location}}" placeholder="Plaats"/>
                </div>
                <div class="col-xs-3">
                  <label for="parts">Parts</label>
                  <input type="text" name="parts" class="form-control" id="parts" tabindex="6" value = "{{$package->parts or 1}}" placeholder="Parts"/>
                </div>
                  <input type="hidden" name="country" class="form-control" id="country" value = "" placeholder="Parts"/>
                <div class="col-xs-2">
                <br/>
                    <input type='submit' name='submit' value='Opslaan' class='btn btn-success'/>
                </div>
              </div><!-- /.box-body -->
              <div class="box-footer">
                <div class='pull-right'>

                </div>
              </div><!-- /.box-footer-->
            </form>
            <div style="text-align: center;">

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-th-list"></i> Pakketten
        </div>
        <div class="row">
           <div class="col-xs-1">
              <a class="btn" href="javascript:void(0);" id="previous_week"><i class="fa fa-angle-left"></i></a>
           </div>
           <div class="col-xs-3">
              <div style="font-size:20px;text-align:center;" ><span id="week_show"> Week {{$week}} </span></br><i style="color:#444; font-size:11px">Current week: {{date('W')}}</i></div>
           </div>
           <div class="col-xs-1">
              <a class="btn" href="javascript:void(0);" id="next_week"><i class="fa fa-angle-right"></i></a>
           </div>


 
           <div class="col-xs-5" style="margin-top: 10px">
             <!--<a href="{{route('admin-scan-repack')}}">
              <input type="button" name="pack" style="center=true; width: 120px;" value="Auto-Repack" class ='btn btn-success'/>
              </a>-->
              <form method='post' id="form" enctype="multipart/form-data" action='{{ route("admin-scan-repack")}}'>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="week" id="week" value="{{$week}}"/>
              <input type='submit' name="pack" style="center=true; width: 120px;" value="Auto-Repack" class ='btn btn-success'/>
              </form>
           </div>
        </div>
        <div class="panel-body">
          <table id="packages-table" data-search="true"></table>
        </div>
      </div>

  </div>
<script src="{{url('js/bootstrap-table.js')}}"></script>
<script src="{{url('js/bootstrap-editable.js')}}"></script>
<script src="{{url('js/bootstrap-table-editable.js')}}"></script>
<script src="{{url('js/jquery.searchable.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<script src="{{url('js/jquery.json.min.js')}}"></script>
<script src="{{url('js/jsBarcode.min.js')}}"></script>
<script src="{{url('js/DYMO.Label.Framework_2.0Beta.js')}}"></script>
<script>
	$(function(){

    var jsonPackage =  <?php if($json_package) echo "'".$json_package."'"; else echo "''"; ?>;

    
    //var contents = ;
    //var inhoud = JSON.parse(contents);
    //alert(inhoud);
    $("#previous_week").on('click', function(){
      var week = $("#week").val();
      week = week - 1;
      $("#week").val(week);
      $("#week_show").html("Week "+week);
      reloadTable();
    });

    $("#next_week").on('click', function(){
      var week = $("#week").val();
      week = Number(week) + 1;
      $("#week").val(week);
      $("#week_show").html("Week "+week);
      reloadTable();
    });

    $("#customer_id").on('change',function(){
        updateLocation();
    }); 

    $("#customer").on('change',function(){
        updateLocation();
    });

    function updateLocation(){
      var customer_id_val = $('#customer_id').val();
      var customer_name_val = $('#customer').val();
      if(customer_id_val != ""){
        $.ajax(
          {
            url:'{!!URL::route('customerLocationComplete')!!}',
            type: 'GET',
            data: {
              customer_id: customer_id_val
            },
            success: function (response){
              var data = response;
              if(data.valid === "1"){
                $('#location').val(data.location);
              }else{
                $('#location').val("");
              }
            }
          }
          
          );
      }else if(customer_name_val != ""){
        $.ajax(
          {
            url:'{!!URL::route('customerLocationComplete')!!}',
            type: 'GET',
            data: {
              customer_name: customer_name_val
            },
            success: function (response){
              var data = response;
              if(data.valid === "1"){
                $('#location').val(data.location);
              }else{
                $('#location').val("");
              }
            }
          }
          
          );
      }
    }

    $('#customer').autocomplete({
      source : '{!!URL::route('customerAutoComplete')!!}',
      dataType: 'json',
      type: 'GET',
      onSelect: function (suggestion) {
      }
    });

    function reloadTable(){
      $('#packages-table').bootstrapTable('refresh');
    }


    function updateTable(){

          var myweek = $('#week').val();
           $('#packages-table').bootstrapTable({
          idField:'id',
          url:'{{route('json-packages')}}',
          method:'get',
          queryParams: function(){
             var myweek = $('#week').val();
            return {week : myweek};
          },
          columns: [
            {
              field:'customer_id',
              title:'Klant ID',
              editable:false
            },{
              field:'fullname',
              title:'Naam',
              editable: false
            },{
              field:'country',
              title:'Country',
              editable: false,
            }
            ,{
              field: 'tracking_number',
              title: 'Tracking Number',
              editable: {
                type:'text'
              }
            },{
              field: 'location',
              title: 'location',
              editable: {
                type:'text'
              }
            },{
              field: 'parts',
              title: 'Parts',
              editable: {
                type:'text'
              }
            },{
              field: 'weight',
              title: 'Weight',
              editable: {
                type:'text'
              }
            },{
              field: 'week',
              title: 'week',
              editable: false
            },{
              field: 'content',
              title: 'inhoud',
              editable: {
                type:'select',
                source:<?php echo $inhund_contents; ?>
              }
            },{
              field: 'created_at',
              title: 'Scanned',
              editable: false
            },{
              field: 'shipment_type',
              title: 'Type',
              editable: {type:'select', 
                source:[{ 
                  value:'air', 
                  text:'Air'
                },{ 
                  value:'sea', 
                  text:'Sea'
                }
              ]}
            },{
              field: 'action',
              title: 'Actions',
              formatter: actionFormatter,
              events:'actionEvents'
            }
          ]
        });
        
   
    }

	 $('#packages-table').on('editable-save.bs.table',function(e, field, row, $el){
          $.post('{{route('json-update-packages')}}', {
            id:row.id, 
            content:row.content,
            type:row.shipment_type,
            barcode: row.barcode,
            parts: row.parts,
            weight: row.weight,
            location: row.location,
            tracking_number: row.tracking_number
          });
        });
        var label='';
     $.ajax("{{url('package.label')}}").done(function(data){
            label=data;
            dymo.label.framework.trace = 0; //true
            dymo.label.framework.init(console.log('DYMO Framework Loaded'));
            setTimeout(function(){
              if(jsonPackage !== ''){
                var packageForPrint = JSON.parse(jsonPackage);
                //console.log('printing jsonpackage '+jsonPackage);
                dymo_print(packageForPrint);
              }
            },500);
        });  
// customer name auto complete 


		function actionFormatter(value, row, index){
			return [
        /*'<a class="edit ml10" href="javascript:void(0)" title="Edit">',
        '<i class="glyphicon glyphicon-edit"></i>',
        '</a> ',*/ 
        '<a href="#" class="btn btn-sm btn-primary print-label" id="print" title= "Print" rel="{{$shipment->id}}"><i class="fa fa-print"></i></a> ',
        '<a class="btn btn-danger btn-sm" id="remove" href="javascript:void(0)" title="Remove"><i class="fa fa-trash"></i></a>',
    ].join('');
		}

    updateTable();

    function order(){
      var shipping_type = $('#shipping_type').val();
      var customer_id = $('#customer_id').val();
      var customer_name = $('#customer').val();
      var tracking_number = $('#tracking_number').val();
      var weight = $('#weight').val();
      var location = $('#location').val();
      var parts = $('#parts').val();
      $ajax("{{url('')}}")
    }

    function textToBase64Barcode(text){
        var canvas = document.createElement("canvas");
        JsBarcode(canvas, text, {format: "CODE128",margin: 0,fontSize: 40});
        return canvas.toDataURL("image/png");
    }

    function dymo_print(row) {
            try{
              var DymoLabel = dymo.label.framework.openLabelXml(label);
              var barcode = textToBase64Barcode(row.barcode);

              var printers = dymo.label.framework.getPrinters();
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
              //Set vars
             DymoLabel.setObjectText("Address", row.fullname);
             DymoLabel.setObjectText("TEKST_2","   "+ row.week+"        "+row.weight +"           " +row.parts);
             DymoLabel.setObjectText("BCODE", barcode.substring(22)); //Remove data:img/base64, etc..

             var printStatus = DymoLabel.print(printerName);
          } catch (e){
             alert(e.message || e);
          }
    }
  
		window.actionEvents = {
   /* 'click .edit': function (e, value, row, index) {
        window.location.href = '{{ url('admin/packages/edit/') }}/'+row.id+'&returnUrl={{ url('') }}';
    },*/
    'click #remove': function (e, value, row, index) {
        //alert('You click remove icon, row: ' + JSON.stringify(row));
        if(confirm("Pakket verwijderen?"))
        {
        	window.location.href = '{{ url('admin/packages/delete') }}?id='+row.id;
        }
    },

    'click #print': function (e, value, row, index) {
        //alert('You click remove icon, row: ' + JSON.stringify(row));
        if(confirm("Do you want print?"))
        {
          dymo_print(row);
        }
    }
};

    
	});
</script>
@endsection