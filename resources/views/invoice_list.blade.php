

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
    "pageLength": 100,
    ajax: "{{ route('invoice.list') }}",
    columns: [{
            data: 'Aging',name: 'Aging'
        },{
            data: 'Inv_No',name: 'Inv_No'
        },{
            data: 'Date',name: 'Date'
        },{
            data: 'MyKad_SSM',name: 'MyKad_SSM'
        },{
            data: 'Name',name: 'Name'
        },{
            data: 'Ship_Phone',name: 'Ship_Phone'
        },{
            data: 'Ship_Name',name: 'Ship_Name'
        },{
            data: 'Ship_Add1',name: 'Ship_Add1'
        },{
            data: 'Ship_Add2',name: 'Ship_Add2'
        },{
            data: 'Ship_poscode',name: 'Ship_poscode'
        },{
            data: 'Ship_City',name: 'Ship_City'
        },{
            data: 'Ship_State',name: 'Ship_State'
        },{
            data: 'Ship_Country',name: 'Ship_Country'
        },

        {
            data: 'Product',name: 'Product'
        },{
            data: 'Price',name: 'Price'
        },{
            data: 'Qty',name: 'Qty'
        },{
            data: 'Total_RM',name: 'Total_RM'
        },

        {
            data: 'Product_2',name: 'Product_2'
        },{
            data: 'Price_2',name: 'Price_2'
        },{
            data: 'Qty_2',name: 'Qty_2'
        },{
            data: 'Total_RM_2',name: 'Total_RM_2'
        },

        {
            data: 'Product_3',name: 'Product_3'
        },{
            data: 'Price_3',name: 'Price_3'
        },{
            data: 'Qty_3',name: 'Qty_3'
        },{
            data: 'Total_RM_3',name: 'Total_RM_3'
        },

        {
            data: 'Product_4',name: 'Product_4'
        },{
            data: 'Price_4',name: 'Price_4'
        },{
            data: 'Qty_4',name: 'Qty_4'
        },{
            data: 'Total_RM_4',name: 'Total_RM_4'
        },

        {
            data: 'Product_5',name: 'Product_5'
        },{
            data: 'Price_5',name: 'Price_5'
        },{
            data: 'Qty_5',name: 'Qty_5'
        },{
            data: 'Total_RM_5',name: 'Total_RM_5'
        },

        {
            data: 'Grand_Total',name: 'Grand_Total'
        },
        {
            data: 'Paid_Total',name: 'Paid_Total'
        },
        {
            data: 'Overdue_Amt',name: 'Overdue_Amt'
        },
        {
            data: 'Consultant',name: 'Consultant'
        },
        {
            data: 'Channel',name: 'Channel'
        },

        {
            data: 'Promise_pay',name: 'Promise_pay'
        },
        {
            data: 'Promise_pay2',name: 'Promise_pay2'
        },
        {
            data: 'Promise_pay3',name: 'Promise_pay3'
        },
        {
            data: 'Promise_pay4',name: 'Promise_pay4'
        },


        {
            data: 'Created_By',name: 'Created_By'
        },

        {
            data: 'Created_Date',name: 'Created_Date'
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