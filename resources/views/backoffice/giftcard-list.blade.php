@extends("crudbooster::admin_template")
@section("content")
  <link href="{{url('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    <div style="width:1000px;margin:0 auto ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class='fa fa-archive'></i> {{$page_title}}
            </div>

               <div class="panel panel-default">
            <div class="panel-body">
                <form method='post' id="form" enctype="multipart/form-data" action='{{ route("admin-giftcard-list")}}'>
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
                      <label for="customer_id">CustomerId</label>
                       <input type="text" name="customer_id" id="customer_id" class="form-control" value = "{{$giftcard->customer_id}}" placeholder="Customer"/>
                    </div>
                     <div class="col-xs-6">
                      <label for="customer">Customer Name</label>
                      <input type="text" name="customer_name" id="customer_name" class="form-control" value = "{{$giftcard->customer_name}}" placeholder="Customer Name"/>
                    </div> 
                    <div class="col-xs-6">
                      <label for="value">Value</label>
                       <input type="number" name="value" id="value" class="form-control" value = "{{$giftcard->value}}" placeholder="Value" step="0.01"/>
                    </div>
                    <div class="col-xs-6">
                       <label for="provider">Provider</label>
                        <select id="provider" class="form-control providers" name="provider"   placeholder="Provider">
                            @foreach($providers as $provider)
                                <option value = '{"id":"{{$provider->id}}", "fee": "{{$provider->fee}}"}'>{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-6">
                      <label for="code">Code</label>
                      <input type="text" name="code" id="code" class="form-control" value = "{{$order->code}}" placeholder="Code"/>
                    </div> 
                          
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name='status' id='status' class="form-control">
                                <option value='pending'>Pending</option>
                                <option value='paid' >Paid</option>
                                <option value='delivered' selected>Delivered</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="cost" name="cost" value ="0"/>
                    <div class="col-xs-12">
                        <h2>Cost : <span class="text-success total-price">$0.00</span></h2>
                    </div>
                    <div class="col-xs-12">
                        <h2>Fee : <span class="text-success total-fee">$0.00</span></h2>
                    </div>
                    <input type='submit' name='set-price' value='Add Giftcard' class='btn btn-block btn-success'/>
                    </div>
                  </div><!-- /.box-body -->
               </form>
            </div>
          </div>

            <div class="panel panel-default">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <!--
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
                            <th>Value</th>
                            <th>Cost</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Provider</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($giftcards as $giftcard)
                            @if(CRUDBooster::isUpdate())
                                <form id='form-{{$giftcard->id}}' class="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @endif
                                    <tr>
                                        <td>{{$giftcard->value}}</td>
                                        <td>{{$giftcard->cost}}</td>
                                        <td>{{$giftcard->code}}</td>
                                        <td>{{$giftcard->status}}</td>
                                        <td class="{{$giftcard->id}}-name">{{$giftcard->customer->first_name}} {{$giftcard->customer->last_name}}</td>
                                         
                                        <td>
                                            @if(CRUDBooster::isUpdate() && ( $giftcard->status === 'pending' ))
                                                   <a href="{{route('admin-giftcard-set-paid',['id'=>$giftcard->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-success">Set Paid</a>
                                            @endif
                                            @if(CRUDBooster::isUpdate() && ( $giftcard->status === 'paid' ))
                                                   <a href="{{route('admin-giftcard-set-delivered',['id'=>$giftcard->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-success">Set Delivered</a>
                                            @endif
                                            @if(CRUDBooster::isDelete())
                                                <a class='btn btn-danger btn-sm' href='{{CRUDBooster::mainpath("delete/$giftcard->id")}}'> <i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @if(CRUDBooster::isUpdate())
                                </form>
                            @endif
                        @endforeach
                        </tbody>
                    </table> -->

                    <div class="panel-body">
                         <table id="giftcards-table" data-search="true"></table>
                    </div>  
                    <script src="{{url('js/bootstrap-table.js')}}"></script>
                    <script src="{{url('js/bootstrap-editable.js')}}"></script>
                    <script src="{{url('js/bootstrap-table-editable.js')}}"></script>
                    <script src="{{url('js/jquery.searchable.js')}}"></script>
                    <script src="{{url('js/jquery.json.min.js')}}"></script>
                    <script src="{{url('js/jquery-ui.min.js')}}"></script>
                    <script>

                        function toggleLi(id){
                            $('.'+id+'-li').slideToggle();
                        }
                        $(document).ready(function(){
                            //searchable
                            /*$( '#table' ).searchable({
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
                            });*/
                                        calcPrice();

                                        $('#form').on('keyup',function(){
                                            calcPrice();
                                        });

                                        $(".providers").on('change',function(){
                                            calcPrice();
                                        });
                                        //calc
                                        function calcPrice(){
                                            var providerData = $('#provider').val();
                                            var value = $('#value').val();
                                            var provider = JSON.parse(providerData);
                                            var fee = provider.fee;
                                            var amount = parseFloat(value.replace(",","."));
                                            var total = amount + fee/100 * amount;    
                                            $('#cost').val(parseFloat(total).toFixed(2));

                                            $('.total-price').html('$'+parseFloat(total).toFixed(2));
                                            $('.total-fee').html('$'+parseFloat(total-amount).toFixed(2));

                                        }

                                        $('#giftcards-table').bootstrapTable({
                                        idField:'id',
                                        url:'{{route('json-giftcards')}}',
                                        columns: [
                                            {
                                                field:'id',
                                                title:'ID',
                                                editable:false
                                            },
                                            {
                                                field:'customer_id',
                                                title:'Customer ID',
                                                editable:false
                                            },
                                            {
                                            field:'customer_name',
                                                title:'Customer Name',
                                                editable:false
                                            },
                                            
                                            {
                                                field:'value',
                                                title:'Value',
                                                editable:false
                                            },{
                                                field:'cost',
                                                title:'Cost',
                                                editable: false
                                            },
                                             @if(CRUDBooster::isUpdate())
                                                   {
                                                field: 'code',
                                                title: 'Code',
                                                editable: {
                                                    type:'text'
                                                }
                                                },
                                            @endif 
                                            
                                            {
                                                field: 'status',
                                                title: 'Status',
                                                editable: {type:'select', 
                                                    source:[{ 
                                                        value:'pending', 
                                                        text:'Pending'
                                                    },{ 
                                                        value:'paid', 
                                                        text:'Paid'
                                                    },{ 
                                                        value:'delivered', 
                                                        text:'Delivered'
                                                    }
                                                ]}
                                            },{
                                                field: 'paid_date',
                                                title: 'Paid Date',
                                                editable: false
                                            },
                                             @if(CRUDBooster::isUpdate())
                                             {
                                                field: 'action',
                                                title: 'Actions',
                                                formatter: actionFormatter,
                                                events:'actionEvents'
                                            }
                                            @endif 
                                        ]
                                    });
                                    
                                    $('#customer_name').autocomplete({
                                      source : '{!!URL::route('customerAutoComplete')!!}',
                                      dataType: 'json',
                                      type: 'GET',
                                      onSelect: function (suggestion) {
                                      }
                                    });

                                    $('#giftcards-table').on('editable-save.bs.table',function(e, field, row, $el){
                                        $.post('{{route('json-update-giftcard')}}', {
                                            id:row.id, 
                                            status:row.status,
                                            code:row.code
                                        });
                                    });

                                   function actionFormatter(value, row, index){
                                        return [
                                    /*'<a class="edit ml10" href="javascript:void(0)" title="Edit">',
                                    '<i class="glyphicon glyphicon-edit"></i>',
                                    '</a> ',*/ 
                                        '<a class="btn btn-danger btn-sm" id="remove" href="javascript:void(0)" title="Remove"><i class="fa fa-trash"></i></a>',
                                       ].join('');
                                    }
                                    window.actionEvents = {
                               /* 'click .edit': function (e, value, row, index) {
                                    window.location.href = '{{ url('admin/packages/edit/') }}/'+row.id+'&returnUrl={{ url('') }}';
                                },*/
                                        'click #remove': function (e, value, row, index) {
                                            //alert('You click remove icon, row: ' + JSON.stringify(row));
                                            if(confirm("Are you sure to remove?"))
                                            {
                                                window.location.href = '{{ url('admin/giftcards/delete') }}?id='+row.id;
                                            }
                                       }
                                   }
                        });

                    </script>
                </div><!-- /.box-footer-->
            </div>
        </div>

    </div>

@endsection
