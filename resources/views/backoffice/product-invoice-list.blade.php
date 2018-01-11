@extends("crudbooster::admin_template")
@section("content")
    <div style="width:1400px;margin:0 auto ">
      <link href="{{url('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class='fa fa-archive'></i> {{$page_title}}
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
                    <table id="table" class='table table-striped table-btransactioned table-condensed'>
                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Buy Price</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            @if(CRUDBooster::isUpdate())
                                <form id='form-{{$transaction->id}}' method='post' class="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @endif
                                    <tr>
                                        <td>{{$transaction->product_id}}</td>
                                        <td>{{$transaction->product->title}}</td>
                                        <td>{{$transaction->customer->id}}</td>
                                        <td>{{$transaction->customer->first_name}} {{$transaction->customer->last_name}}</td>
                                        <td>{{$transaction->product->buy_price}}</td>
                                        <td>{{$transaction->product->price}}</td>
                                        <td><a href="{{route('admin-product-print-invoice',['id'=>$transaction->id])}}" target="_blank" class="btn btn-sm btn-success">Print Invoice</a></td>
                                        
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

                          
                        });

                    </script>
                </div><!-- /.box-footer-->
            </div>
        </div>

    </div>

@endsection
