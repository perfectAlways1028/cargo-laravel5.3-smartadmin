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
  <div style="width:750px;margin:0 auto ">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class='fa fa-barcode'></i> {{$page_title}}
        </div>
        <div class="panel-body">
            <form method='post' id="form" enctype="multipart/form-data" action='{{ route("admin-scan-shipments")}}'>
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
                
                <div class="col-xs-6">
                  <label for="barcode">Tracking Number</label>
                    <input type="text" name="tracking_number" id="tracking_number" class="form-control" value = "{{$shipment->tracking_number}}" placeholder="Tracking Number" autofocus />
                </div>
         
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
          <i class="fa fa-th-list"></i> Shipment
        </div>
  
        <div class="panel-body">
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
                                                    <li>{{$package->barcode}}</li>
                                                    <?php $barcodes[]=$package->barcode; ?>
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
        </div>
      </div>

  </div>
<script src="{{url('js/bootstrap-table.js')}}"></script>
<script src="{{url('js/bootstrap-editable.js')}}"></script>
<script src="{{url('js/bootstrap-table-editable.js')}}"></script>
<script src="{{url('js/jquery.searchable.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<script src="{{url('js/jquery.json.min.js')}}"></script>
<script src="{{url('js/DYMO.Label.Framework_2.0Beta.js')}}"></script>
<script>
  $(function(){

    var jsonPackage =  <?php if($json_package) echo "'".$json_package."'"; else echo "''"; ?>;
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

 

    
  });
</script>
@endsection