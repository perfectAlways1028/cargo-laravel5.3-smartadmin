@extends("crudbooster::admin_template")
@section("content")
    <div style="width:750px;margin:0 auto ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class='fa fa-archive'></i> {{$page_title}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-1">
                        <a class="btn" href="{{Request::url()}}?week={{$week-1}}"><i class="fa fa-angle-left"></i></a>
                    </div>
                    <div class="col-xs-3">
                        <p style="font-size:20px;text-align:center;">Week {{$week}}</br><i style="color:#444; font-size:11px">Current week: {{date('W')}}</i></p>
                    </div>
                    <div class="col-xs-1">
                        <a class="btn" href="{{Request::url()}}?week={{$week+1}}"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="col-xs-6 col-md-3 pull-right">
                    	@if(CRUDBOOSTER::myPrivilegeId() != 3)
                    		{{ count($shipments) }} Shipments</br>
                        	{{ $lbs }} lbs
                        @endif
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="col-xs-12" style="padding-top:5px">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="search2" id="search2" value="" class="form-control" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                    <table id="repack-table" class="table">
                        <thead>
                        <tr>
                            <th>Klant</th>
                            <th>Paketten</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($packages as $package)
                            <tr>
                                <td>{{ $package->first_name }} {{$package->last_name}} ({{$package->customer_id}})</td>
                                <td>{{$package->packages}}</td>
                                <td>{{$package->shipment_type}}</td>
                                <td><a href="{{route('admin-create-repack', ['id' => $package->customer_id,'shiptype'=>$package->shipment_type,'week'=>$week]) }}" class="btn btn-default">Pack</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-xs-12" style="padding-top:5px">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="search" id="search" value="" class="form-control" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                    <table id="table" class='table table-striped table-bordered table-condensed'>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Customer</th>
                            <th>Tracking number</th>
                            <th>Week</th>
                            <th>Parts</th>
                            <th># of packages</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shipments as $shipment)
                            @if(CRUDBooster::isUpdate())
                                <form id='form-{{$shipment->id}}' method='post' action="{{route('admin-update-repack', ['id' => $shipment->id])}}" class="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @endif
                                    <tr>
                                        <td>{{$shipment->id}}</td>
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
                                                @foreach($shipment->packages as $package)
                                                    <li>{{$package->tracking_number}}</li>
                                                    <?php $barcodes[]=$package->tracking_number; ?>
                                                @endforeach
                                            </ul>
                                            @if(sizeof($barcodes)>0)
                                                <input type="hidden" class="{{$shipment->id}}-barcodes" value="{{implode(',',$barcodes)}}" />
                                            @endif
                                        </td>
                                        <td class="{{$shipment->id}}-price">${{$shipment->price}}</td>

                                        <td>
                                            {{ $shipment->status }}
                                        </td>
                                        <td>

                                            @if($shipment->status==='packed')
                                                @if(CRUDBooster::isUpdate())
                                                    <a href="#" class="btn btn-sm btn-primary print-label" rel="{{$shipment->id}}"><i class="fa fa-print"></i></a>
                                                @endif
                                            @elseif($shipment->status==='transit')
                                                @if(CRUDBooster::isUpdate())
                                                    <a href="#" class="btn btn-sm btn-primary print-label" rel="{{$shipment->id}}"><i class="fa fa-print"></i></a>
                                                @endif
                                            @elseif($shipment->status==='delivered')
                                                @if($shipment->transaction === null)
                                                    <a href="{{route('admin-create-invoice',['id'=>$shipment->id])}}" class="btn btn-sm btn-default"><i class="fa fa-file-o"></i></a>
                                                @else
                                                    <a href="{{route('admin-print-invoice',['id'=>$shipment->transaction->id])}}" class="btn btn-sm btn-success"><i class="fa fa-file-text-o"></i></a>
                                                @endif
                                            @elseif($shipment->status==='completed')
                                                @if($shipment->transaction === null)
                                                    <b>No invoice!</b>
                                                @endif
                                                <a href="{{route('admin-print-invoice',['id'=>$shipment->transaction->id])}}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-text-o"></i></a>
                                            @endif
                                        <!-- To make sure we have read access, wee need to validate the privilege -->
                                            @if(CRUDBooster::isUpdate() && $shipment->status!=='completed' && $shipment->status!=='delivered')

                                                <a class='btn btn-info btn-sm' href='{{CRUDBooster::mainpath("edit/$shipment->id")}}'><i class="fa fa-pencil"></i></a>
                                            @endif

                                            @if(CRUDBooster::isDelete())
                                                <a class='btn btn-danger btn-sm' href='{{CRUDBooster::mainpath("delete/$shipment->id")}}'><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @if(CRUDBooster::isUpdate())
                                </form>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                    <script src="{{url('js/jquery.searchable.js')}}"></script>
                    <script src="{{url('js/DYMO.Label.Framework_2.0Beta.js')}}"></script>
                    <script src="{{url('js/jquery.json.min.js')}}"></script>
                    <script>

                        function toggleLi(id){
                            $('.'+id+'-li').slideToggle();
                        }
                        $(document).ready(function(){
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

                            $( '#repack-table' ).searchable({
                                striped: true,
                                searchField: '#search2',
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
                            $('#status').on('change',function(e){
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
                                    //DymoLabel.setAddressText(0,name.toUpperCase());
                                    DymoLabel.setObjectText("TEKST_2", week+"         "+lbs+" LBS         "+orders.length);
                                    DymoLabel.setObjectText("TEKST", "1 VAN "+parts);
                                    DymoLabel.setObjectText("TEKST_3", tracktrace);

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
                                } catch (e){
                                    alert(e.message || e);
                                }
                            });

                        });


                    </script>
                    <embed type="application/x-npapi-dymolabel" id="_DymoLabelFrameworkJslPlugin" width="1" height="1">
                </div><!-- /.box-footer-->
            </div>
        </div>

    </div>

@endsection
