<!-- First, extends to the CRUDBooster Layout -->
@extends("crudbooster::admin_template")
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Shipment details</div>
    <div class='panel-body'>      
    <div class='row'>
        <div class='form-group col-xs-6 col-sm-2'>
          <label>Name</label>
          <p>{{$shipment->tracking_number}}</p>
        </div>

        <div class='form-group col-xs-6 col-sm-2'>
          <label>Type</label>
          <p>{{$shipment->shipment_type}}</p>
        </div>
        @if($shipment->shipment_type=='sea')
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Height</label>
                <p>{{$shipment->height}}</p>
            </div>
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Width</label>
                <p>{{$shipment->width}}</p>
            </div>
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Depth</label>
                <p>{{$shipment->depth}}</p>
            </div>
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Price per inch</label>
                <p>{{$shipment->price_per_inch}}</p>
            </div>
        @elseif($shipment->shipment_type=='air')

            <div class='form-group col-xs-6 col-sm-2'>
                <label>Weight</label>
                <p>{{$shipment->weight}}</p>
            </div>
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Price per lbs</label>
                <p>{{$shipment->price_per_lbs}}</p>
            </div>
        @endif
         </div>
         <div class='row'>
         
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Parts</label>
                <p>{{$shipment->parts}}</p>
            </div>
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Status</label>
                <p>{{$shipment->status}}</p>
            </div>
            <div class='form-group col-xs-6 col-sm-2'>
                <label>Total Price</label>
                <p>${{$shipment->price}}</p>
            </div>
         </div>
        <hr/>
        <h5>Contains {{sizeof($packages)}} Packages</h5>
                <table class="table table-hover table-condensed">
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
                        <td>{{ date('W') }}</td>
                        <td>{{$package->created_at}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
      </form>
    </div>
  </div>
@endsection