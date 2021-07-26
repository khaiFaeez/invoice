

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{$client ?? ''}}
        </h2>

        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->
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
             
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
$(function() {

var table = $('#data-table').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    "pageLength": 10,
    "order": [[ 0, "desc" ]],
    //ajax: "{{ route('invoice.list') }}",
    "ajax": {
            "url": "{{ route('invoice.getlist') }}",
            "type": "POST",
            'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        },
        
    columns: [{
               visible:false,data: 'Id',name: 'invoice.Id',"searchable": false
        },
        {name:'invoice.Status_Inv', data: null, "render": 
					function(data, type, full, meta){
					    
					    if(data.Status_Inv == 'PENDING')
						{  
						        var status = '<button type="button" class="btn btn-danger btn-sm">PENDING</button>';
						   
						    
						}
						else if(data.Status_Inv == 'PAID')
						{       var status = '<button type="button" class="btn btn-success btn-sm">PAID</button>';
						    
						}
						
						return status;}
			},
            {
            data: 'Aging',name: 'invoice.Aging',"searchable": false
        },{
            data: 'Inv_No',name: 'invoice.Inv_No'
        },{
            data: 'Date',name: 'invoice.Date',"searchable": false
        },
        {
            data: 'MyKad_SSM',name: 'client.MyKad_SSM',"searchable": false
        },{
            data: 'Name',name: 'client.Name'
        },{
            data: 'Ship_Phone',name: 'invoice.Ship_Phone',"searchable": false
        },{
            data: 'Ship_Name',name: 'invoice.Ship_Name'
        },
        {
            data: 'Ship_Add1',name: 'invoice.Ship_Add1'
        }
        ,{
            data: 'Ship_Add2',name: 'invoice.Ship_Add2'
        },{
            data: 'Ship_poscode',name: 'invoice.Ship_poscode'
        },{
            data: 'Ship_City',name: 'invoice.Ship_City'
        },{
            data: 'Ship_State',name: 'invoice.Ship_State'
        },{
            data: 'Ship_Country',name: 'invoice.Ship_Country'
        },

        {
            data: 'P1',name: 'p1.Product_Name'
        },{
            data: 'Price',name: 'invoice.Price',"searchable": false
        },{
            data: 'Qty',name: 'invoice.Qty',"searchable": false
        },{
            data: 'Total_RM',name: 'invoice.Total_RM'
        },

        {
            data: 'P2',name: 'p2.Product_Name'
        },{
            data: 'Price_2',name: 'invoice.Price_2',"searchable": false
        },{
            data: 'Qty_2',name: 'invoice.Qty_2',"searchable": false
        },{
            data: 'Total_RM_2',name: 'invoice.Total_RM_2'
        },

        {
            data: 'Product_3',name: 'invoice.Product_3'
        },{
            data: 'Price_3',name: 'invoice.Price_3',"searchable": false
        },{
            data: 'Qty_3',name: 'invoice.Qty_3',"searchable": false
        },{
            data: 'Total_RM_3',name: 'invoice.Total_RM_3'
        },

        {
            data: 'Product_4',name: 'invoice.Product_4'
        },{
            data: 'Price_4',name: 'invoice.Price_4',"searchable": false
        },{
            data: 'Qty_4',name: 'invoice.Qty_4',"searchable": false
        },{
            data: 'Total_RM_4',name: 'invoice.Total_RM_4'
        },

        {
            data: 'Product_5',name: 'invoice.Product_5'
        },{
            data: 'Price_5',name: 'invoice.Price_5',"searchable": false
        },{
            data: 'Qty_5',name: 'invoice.Qty_5',"searchable": false
        },{
            data: 'Total_RM_5',name: 'invoice.Total_RM_5'
        },

        {
            data: 'Grand_Total',name: 'invoice.Grand_Total'
        },
        {
            data: 'Paid_Total',name: 'invoice.Paid_Total'
        },
        {
            data: 'Overdue_Amt',name: 'invoice.Overdue_Amt'
        },
        {
            data: 'Cname',name: 'c.Name'
        },
        // {
        //     data: 'Channel',name: 'invoice.Channel'
        // },
        {name:'invoice.Channel', data: null, "render": 
					function(data, type, full, meta){
					    
					    if(data.Channel == 1)
                            var channel = 'ONLINE';
                            else if(data.Channel == 2)
					        var channel = 'DISTRIBUTOR';
                            else if(data.Channel == 3)
					        var channel = 'SPECIAL ORDER';
                            else if(data.Channel == 4)
					        var channel = 'OFFLINE';
						return channel;}
			},

        {
            data: 'Promise_pay',name: 'invoice.Promise_pay',"searchable": false
        },
        {
            data: 'Promise_pay2',name: 'invoice.Promise_pay2',"searchable": false
        },
        {
            data: 'Promise_pay3',name: 'invoice.Promise_pay3',"searchable": false
        },
        {
            data: 'Promise_pay4',name: 'invoice.Promise_pay4',"searchable": false
        },


        {
            data: 'Created_By',name: 'invoice.Created_By'
        },

        {
            data: 'Created_Date',name: 'invoice.Created_Date'
        },


        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },
    ]
});



});

</script>