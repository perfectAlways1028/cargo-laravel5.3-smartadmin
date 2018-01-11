@extends("crudbooster::admin_template")
@section("content")
    <div style="width:1400px;margin:0 auto ">
      <link href="{{url('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class='fa fa-archive'></i> {{$page_title}}
            </div>
          <div class="panel panel-default">
            <div class="panel-body">
                <form method='post' id="form" enctype="multipart/form-data" action='{{ route("admin-order-list")}}'>
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
                      <label for="link">Link</label>
                       <input type="text" name="link" id="link" class="form-control" value = "{{$order->link}}" placeholder="Link"/>

                    </div>
                    <div class="col-xs-6">
                        <label for="id">Notes</label>
                        <input type="text" name="notes" id="notes" class="form-control" value = "{{$order->notes}}" placeholder="Notes" autofocus />
                    </div>

                    <div class="col-xs-6">
                      <label for="customer_id">CustomerID</label>
                      <input type="text" name="customer_id" id="customer_id" class="form-control" value = "{{$order->customer_id}}" placeholder="Customer ID"/>
                    </div> 
                    <div class="col-xs-6">
                      <label for="customer">Customer Name</label>
                      <input type="text" name="customer_name" id="customer_name" class="form-control" value = "{{$order->customer_name}}" placeholder="Customer Name"/>
                    </div> 
                          
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


                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name='status' id='status' class="form-control">
                                <option value='Priced'>Priced</option>
                                <option value='Paid' selected>Paid</option>
                            </select>
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
                    <input type='submit' name='set-price' value='Add Order' class='btn btn-block btn-success'/>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class='pull-right'>

                    </div>
                  </div><!-- /.box-footer-->
                </form>
            </div>
          </div>

            <div class="panel panel-default">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="col-xs-12"  style=" padding-top:5px">
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
                            <th>Link</th>
                            <th>Notes</th>
                            <th>CustomerID</th>
                            <th>Customer</th>
                            <th>Tracking number</th>
                             
                            <th>Package</th>
 
                            <th>Status</th>
                          
                            <th>Price</th>
                            @if(CRUDBooster::isUpdate())
                            <th>Fee</th>
                            @endif
                            <th>Approximately Freight</th>
                     
                            <th>Paid Date</th>
                            <th>Action</th>
                         

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @if(CRUDBooster::isUpdate())
                                <form id='form-{{$order->id}}' method='post' action="{{route('admin-update-order', ['id' => $order->id])}}" class="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @endif
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td width="20%"> <a href="<?php
                                             $String = $order->link;
                                             if(preg_match("@^http://@i",$String))
                                                $String = preg_replace("@(http://)+@i",'http://',$String);
                                             else if(preg_match("@^https://@i",$String))
                                                $String = preg_replace("@(https://)+@i",'http://',$String);
                                             else
                                                $String = 'http://'.$String; 
                                            echo $String?>"  target=_blank><?php $linkurl = $order->link;
                                            if(strlen($linkurl) > 25){
                                                $linkurl = substr($linkurl,0, 25);
                                                $linkurl .= "...";
                                                }
                                                echo $linkurl;
                                             ?></a></td>
                                        <td>{{$order->notes}}</td>
                                        <td>{{$order->customer_id}}</td>
                                        <td class="{{$order->id}}-name">{{$order->customer_name}}</td>
                                        <td>
                                         @if(CRUDBooster::isUpdate())
                                            <span class="hidden {{$order->id}}-tracktrace"></span>
                                            <input type="text" id="tracking_number"  name="tracking_number" value="{{$order->tracking_number}}">  
                                            @endif

                                            @if(!CRUDBooster::isUpdate())
                                            {{$order->tracking_number}}
                                            @endif
                                        </td>
                                        <td class="{{$order->id}}-package">{{$order->package->barcode}}</td>

                                        <td>
                                            {{ $order->status }}
                                        </td>
                                        <td>
                                           @if($order->status !== 'Pending') 
                                               {{ $order->price }}
                                           @endif
                                        </td>
                                        @if(CRUDBooster::isUpdate() ) 
                                        <td>
                                              @if( $order->status !== 'fee')
                                              {{ $order->fee }}
                                              @endif
                                    
                                        </td>
                                        @endif
                                        <td>
                                           @if($order->freight_price !== null) 
                                                {{$order->freight_price}}
                                            @endif 
                                        </td>
                  
                                         <td>
                                               @if($order->paid_date !== null)        
                                                {{$order->paid_date}}
                                                @endif
                                          
                                        </td>
                                        <td>
                                       
                                            @if($order->status === 'Paid')
                                                   <a href="{{route('admin-order-set-ordered',['id'=>$order->id])}}" class="btn btn-sm btn-success">Set Ordered</a>
                                            @endif

                                            @if($order->status === 'Pending' || $order->status === 'Priced' || $order->status === 'Price Declined')
                                                   <a href="{{route('admin-order-set-price',['id'=>$order->id])}}" class="btn btn-sm btn-primary">Set Price</a>
                                            @endif

                                            @if( $order->status === 'Awaiting Payment' )
                                                   <a href="{{route('admin-order-set-paid',['id'=>$order->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-success">Set Paid</a>
                                            @endif
                                            @if(CRUDBooster::isDelete() && ( $order->status !== 'Accepted' && $order->status !== 'Declined' && $order->status !== 'Ordered'))
                                                 <a href="{{route('admin-order-set-decline',['id'=>$order->id])}}" class="btn btn-sm btn-warning">Decline</a>
                                            @endif
                                            @if(CRUDBooster::isDelete())
                                                <a class='btn btn-danger btn-sm' href='{{CRUDBooster::mainpath("delete/$order->id")}}'> <i class="fa fa-trash"></i></a>
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
                    <script src="{{url('js/jquery.json.min.js')}}"></script>
                    <script src="{{url('js/jquery-ui.min.js')}}"></script>
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

                            calcPrice();

                            $('#form').on('keyup',function(){
                                calcPrice();
                            });
                            
                            $('#customer_name').autocomplete({
                              source : '{!!URL::route('customerAutoComplete')!!}',
                              dataType: 'json',
                              type: 'GET',
                              onSelect: function (suggestion) {
                              }
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
                </div><!-- /.box-footer-->
            </div>
        </div>

    </div>

@endsection
