

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{$client ?? ''}}
        </h2>

        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
        
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
        <style>
.ClassCentre {
    text-align: center;
}
.ClassLeft {
    text-align: left;
}
.ClassRight {
    text-align: right;
}
th { font-size: 12px; }
td { font-size: 12px; }
</style>
   
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                <table class="table table-bordered table-striped" id="data-table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Status</th>
                <th>Aging</th>
                    <th>Inv No</th>
                    <th>Date</th>
                    <th>ID Card</th>
                    <th>Name</th>
                    <th>Ship Phone</th>
                   <th>Ship Name</th>
                    <th>Ship Address 1</th>
                    <th>Ship Address 2</th>
                    <th>Ship Poscode</th>
                    <th>Ship City</th>
                    <th>Ship State</th>
                    <th>Ship Country</th>

                    <th>Product</th>
                    <th>U/Price</th>
                    <th>Qty</th>
                    <th>Total</th>

                    <th>Product</th>
                    <th>U/Price</th>
                    <th>Qty</th>
                    <th>Total</th>

                    <th>Product</th>
                    <th>U/Price</th>
                    <th>Qty</th>
                    <th>Total</th>

                    <th>Product</th>
                    <th>U/Price</th>
                    <th>Qty</th>
                    <th>Total</th>

                    <th>Product</th>
                    <th>U/Price</th>
                    <th>Qty</th>
                    <th>Total</th>

                    <th>Grand Total</th>
                    <th>Paid Total</th>
                    <th>Overdue Amount</th>
                    <th>Consultant</th>
                    <th>Channel</th>

                    <th>PTP 1</th>
                    <th>PTP 2</th>
                    <th>PTP 3</th>
                    <th>PTP 4</th>
                    
                    <th>Created By</th>
                    <th>Created Date</th> 



                    <th width="100px">Action</th>
</tr>

<tbody>
    @foreach ($client as $key =>$value)
    <tr>
        <td>{{$value->Name}}</td>
        <td>{{$value->MyKad_SSM}}</td>
        <td>{{isset($value->state->Negeri)  ?  $value->state->Negeri : ''}}</td>
        <td>{{$value->Mobile_No}}</td>
        <td>{{$value->invoice}}</td>
    </tr>
    @endforeach
</tbody>
</table>

{!! $client->links() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

