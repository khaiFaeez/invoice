<x-app-layout>
  <x-slot name="header" >
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }} 
    </h2>
  </x-slot>
  <!-- adding invoice -->
  @if(request()->route('id'))
   <form id="cart"  action="{{url('invoice')}}" method="POST" >
  @endif

  @if(request()->route('inv'))
   <form id="cart"  action="{{url('update.invoice')}}" method="POST" >
  @endif


  <div class="py-12" style="padding-bottom: 5px;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-gray-200" >

      
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($message = Session::get('warning'))
          <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($message = Session::get('info'))
          <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($errors->any())
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            Please check the form below for errors
          </div>
          @endif
          
          <h5 id="indicators">Client Details </h5>

        


      
          

          <!-- adding client -->
          @if(request()->route('id') == null)
          <form id="client_form" action="{{url('client')}}" method="POST" >
          @endif

            @csrf      
           
         
            <input class="form-control form-control-sm" type="hidden" name="Id" value="{{ old('Id') }} {{request()->route('id')}} {{request()->route('inv')}}" placeholder="" >   
            <div class="row">
              <div class="col-lg-5 ">
                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Name</label>
                  <input class="form-control form-control-sm" type="text" name="Name" value="{{ old('Name') }}  {{$client_Name ?? ''}}" placeholder="" required @if(request()->route('id') || request()->route('inv')) readonly @endif>
                </div>
                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">ID Card</label>
                  <input class="form-control form-control-sm" name="MyKad_SSM" value="{{ old('MyKad_SSM') }} {{$client_MyKad_SSM  ?? ''}}" type="text" placeholder="" required @if(request()->route('id') || request()->route('inv')) readonly @endif>
                </div>
</br>   
@if(request()->route('id') == null && request()->route('inv') == null)
                <div class="form-group">
                  <div class="row">
                    <div class="col form-group required">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Contact No. 1</label>
                      <input class="form-control form-control-sm" type="text" name="Phone_1" value="{{ old('Phone_1') }} {{$client->Mobile_No  ?? ''}}" placeholder="" required>
                    </div>
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Contact No. 2</label>
                      <input class="form-control form-control-sm" type="text" name="Phone_2" value="{{ old('Phone_2') }} {{$client->Phone ?? ''}}" placeholder="" >
                    </div>
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Contact No. 3</label>
                      <input class="form-control form-control-sm" type="text" name="Phone_3" value="{{ old('Phone_3') }} {{$client->Off_Phone ?? ''}}" placeholder="" >
                    </div>
                  </div>
                </div>
                </br>
                @endif               

                
                @if(request()->route('id') || request()->route('inv')) <!-- add invoice -->



                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Ship Name</label>
                  <input class="form-control form-control-sm" type="text" id="Ship_Name" name="Ship_Name" value="{{ old('Ship_Name') }}  {{$client_Name ?? ''}}" placeholder="" required>
                </div>

                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Ship Phone No.</label>
                  <input class="form-control form-control-sm" type="text" id="Ship_Phone" name="Ship_Phone" value="{{ old('Ship_Phone') }}  {{$client->Mobile_No ?? ''}} / {{$client->Phone ?? ''}} / {{$client->Off_Phone ?? ''}}" placeholder="" required>
                </div>


                <div class="row">
                <div class="col">
                <label class="col-form-label col-form-label-sm" for="inputSmall">Client Occpation {{$invoice->occupation_code ?? ''}}</label>
                          <select id="Occupation" name="Occupation" class="form-control form-control-sm" >
                          <option  value=''>Please select</option>
                          <option  value='A'>Gaji Bulanan</option>
                          <option  value='B'>Bekerja Sendiri/berniaga</option>
                          <option  value='C'>Suri Rumah</option>
                          <option  value='D'>Goverment Staff</option>
                          
                </select>
                </div>
                <div class="col">
                <label class="col-form-label col-form-label-sm" for="inputSmall">Client Order Status {{$invoice->Orderstatus ?? ''}}</label>
                          <select id="Order_Status" name="Order_Status" class="form-control form-control-sm" >
                          <option  value=''>Please select</option>
                          <option  value='NEW'>New Order</option>
                          <option  value='REPEAT'>Repeat Order</option>
                          
                </select>
                </div>
                </div>
                @endif

                </br>

                @if(request()->route('id') == null)
                <button type="submit" class="btn btn-primary">Save Client</button>
                <button type="reset" class="btn btn-warning" onclick="window.location.reload();">
                Clear Form
                </button>
                @endif
              </div>

              
              
              <div class="col-lg-5 offset-lg-1">

              @if(request()->route('id') || request()->route('inv'))
                
                
                <div class="row">
                <div class="col">

                <h5 id="indicators">Postage Details</h5> 
                 
                    <button onclick="copy_address({{request()->route('id')}});" type="button" class="btn btn-info btn-sm">Copy Client Address</button>
                    
                    <button onclick="clear_address()" type="button" class="btn btn-danger btn-sm">Clear Address</button>

                    </div>
                    </div>
               

              
                @endif
                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Address</label>
                  <input class="form-control form-control-sm" type="text" placeholder="" id="Address" name="Address" value="{{ old('Address') }} {{$client->Address ?? ''}}" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Address 2</label>
                  <input class="form-control form-control-sm" type="text" placeholder=""  id="Address_2" name="Address_2" value="{{ old('Address_2') }} {{$client->Address_2 ?? ''}}">
                </div>
                <div class="form-group required">
                  <div class="row">
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Poscode</label>
                      <input class="form-control form-control-sm" type="text" placeholder="" id="Poscode" name="Poscode" value="{{ old('Poscode') }} {{$client->Poscode ?? ''}}" required>
                    </div>
                    <div class="col">       
                      <label class="col-form-label col-form-label-sm" for="inputSmall">City</label>
                      <input class="form-control form-control-sm" type="text" placeholder="" id="City" name="City" value="{{ old('City') }} {{$client->City ?? ''}}" required>
                    </div>
                  </div>
                </div>
             
              
                
                <div class="form-group required">
                  <div class="row">
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">State</label>
                      <select id="State" name="State" class="form-control form-control-sm" required>
                        <option  value=''>Please select state</option>
                        @foreach($state as $key => $value)
									        <option value="{{$value->id}}" >{{$value->Negeri}}</option>
						            @endforeach	
                      </select>
                    </div>
                    <div class="col">       
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Country</label>
                      <select id="Country" name="Country" class="form-control form-control-sm" required>
                        <option value='MALAYSIA'>MALAYSIA</option>
                        @foreach($country as $value)
									<option value="{{$value}}" >{{$value}}</option>
						@endforeach	
                      </select>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @if(request()->route('id') == null)
          </form>
          @endif

          
          
          </div>
          

          @if(request()->route('id') || request()->route('inv'))
          <div class="row">
          <div class="col-lg-5">
          <p style="color: grey;font-style: italic;margin-bottom:1;padding-left:20px;">Created By: {{$created_by ?? '-'}} on {{$created_date ?? '-'}}</p>
          </div>
          <div class="col-lg-5 offset-lg-1">
          <p style="color: grey;font-style: italic;margin-bottom:1;padding-left:20px;">Last Edited By: {{$edited_by ?? '-'}} on {{$edited_date ?? '-'}}</p>
          </div>
          </div>
          @endif

          </div></div></div>  
    
   
         

 @if(request()->route('id') || request()->route('inv'))
 <!-- adding invoice -->
  <div class="py-12" style="padding-top: 5px;padding-bottom: 5px;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

        

        <div class="row">
                <div class="row">
                    <div class="col-lg-4 ">
                            <h5 id="indicators">Invoice Details</h5>

                            
                    </div>

                    <div class="col-lg-4 offset-lg-4">
            <div class="col form-group required">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Invoice Date</label>
                      <input class="form-control form-control-sm" type="date" id="Date" name="Date" value="{{ old('Date') }}<?php if( request()->route('inv') == null)echo date("Y-m-d"); ?>" placeholder="" required>
                </div>
            </div>

           


                </div>
                <div class="row">
                <div class="col">
      @if(request()->route('inv'))
                @if($invoice->Status_Inv == 'PAID')
                    <button type="button" class="btn btn-success btn-sm">PAID</button>
                @endif
                @if($invoice->Status_Inv == 'PENDING')
                    <button type="button" class="btn btn-warning btn-sm">PENDING</button>
                    @endif
       
                  
                  
                    <button type="button" class="btn btn-info btn-sm">Invoice No: {{$invoice->Inv_No ?? ''}}</button>
                   
                    <button type="button" class="btn btn-secondary btn-sm">Aging: {{$invoice->Aging ?? ''}}</button>
                    @endif
                    </div>
                    </div>
                   
                    

            

        </div>
        <!-- row -->

  <hr>

  <div class="row">
                <div class="col">
                <p style="margin-top: -12px;margin-bottom: 2px;">Quick Template:</p>
                <button onclick="clear_products();" type="button" class="btn btn-outline-danger btn-sm" style="margin-left: 10px;">Reset</button><?php echo $product_template ?>
        </div></div>


       
           

             
       
     



</br>
        <div class="row">
              <div class="col-lg-12 ">
              
<div >
   <table class="table">
        <thead>
            <tr>
  
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">U/Price</th>
            <th scope="col">Qty</th>
            <th scope="col">Disc %</th>
            <th scope="col">Disc RM</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

        @for ($i = 1; $i <= 5; $i++)
       
        <tr class="line_items">      
            <td style="padding-bottom: 0px;padding-top: 0px;">{{$i}}</td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><select style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" id="Product_{{$i}}" name="Product_{{$i}}" class="form-control form-control-sm">
                                <option  value=''></option>
                                @foreach($product as $key => $value)
                                            <option value="{{$value->id}}" >{{$value->Product_Name}}</option>
                                @endforeach	
                            </select>
            </td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" id="U_price_{{$i}}" name="U_price_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" id="Qty_{{$i}}" name="Qty_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" id="Disc_{{$i}}" name="Disc_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" id="DiscRM_{{$i}}" name="DiscRM_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" id="Total_{{$i}}" name="Total_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><button type="button" onclick="remove_inv({{$i}});"><span style="font-size: 1em; color: Tomato;"><i class="fas fa-times"></span></button></td>
            </tr>
        @endfor
        </tbody>
        <tfoot>
        <th colspan=5></th>
        <th >Grand Total</th>
        <th ><input  style="border: 0;" class="form-control form-control-sm" type="text" id="Grand_Total" name="Grand_Total" value="" placeholder="" ></th>
        <th ></th>
        </tfoot>
  </table>
  </div>
  


              </div>
           

        </div><!-- row -->


        


        </div>
      </div>
    </div>
  </div>


  <div class="py-12" style="padding-top: 5px;padding-bottom: 5px;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

              <h5 id="indicators">Sales Details</h5>


              <div class="form-group required">
                  <div class="row">
                        <div class="col-lg-5 ">
                        <label class="col-form-label col-form-label-sm" for="inputSmall">Sales Person</label>
                          <select id="Sales_Person" name="Sales_Person" class="form-control form-control-sm" required>
                            <option  value=''>Please select consultant</option>
                            @foreach($consultant as $key => $value)
                              <option value="{{$value->id}}" @if($value->Status != 'Active')style="color:red;" @endif >{{$value->Name}} - {{$value->Employee_Code}}</option>
                            @endforeach	
                          </select>
                        </div>


                        <div class="col-lg-3">
                          <label class="col-form-label col-form-label-sm" for="inputSmall">Sales Channel</label>
                          <select id="Channel" name="Channel" class="form-control form-control-sm" required>
                          <option  value=''>Please select</option>
                          <option  value='1'>ONLINE</option>
                          <option  value='2'>DISTRIBUTOR</option>
                          <option  value='4'>OFFLINE</option>
                          <option  value='3'>SPECIAL ORDER</option>
                           
                          </select>
                          </div><div class="col-lg-3">  
                          <label class="col-form-label col-form-label-sm" for="inputSmall">Closing Source</label>
                          <select id="Closing" name="Closing" class="form-control form-control-sm">
                            <option  value=''>Please select</option>
                            <option  value='A'>A - CALL</option>
                            <option  value='B'>B - WHATSAPP</option>
                            <option  value='C'>C - WALKIN</option>
                            <option  value='D'>D - ROADSHOW</option>
                          </select>
                        </div>



                </div>
            </div>


        </div>
      </div>
    </div>
  </div>

  <div class="py-12" style="padding-top: 5px;padding-bottom: 5px;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

   <div class="row">
    <div class="col-lg-5 ">
        <h5 id="indicators">Payment Details</h5>
       
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Promise To Pay (PTP)</th>
                    <th scope="col">Settlement (RM)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for ($p = 1; $p <= 4; $p++)
                <tr class="line_items">
                    <td style="padding-bottom: 0px;padding-top: 0px;">{{$p}}</td>
                    <td style="padding-bottom: 0px;padding-top: 0px;"><input id="Ptp_{{$p}}" style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="date" name="Ptp_{{$p}}" value="{{ old('Ptp_$p') }}" placeholder="" ></td>
                    <td style="padding-bottom: 0px;padding-top: 0px;"><input id="Settlement_{{$p}}" style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="settlement form-control form-control-sm" type="text" name="Settlement_{{$p}}" value="{{ old('Settlement_$p') }}" placeholder="" ></td>
                    <td style="padding-bottom: 0px;padding-top: 0px;"><button type="button" onclick="remove({{$p}});"><span style="font-size: 1em; color: Tomato;"><i class="fas fa-times"></span></button></td>
                </tr>
                @endfor
            </tbody>
            <tfoot>
                <th ></th>
                <th >Total Settlement (RM)</th>
                <th ><input id="total_settlement" style="border: 0;" class="form-control form-control-sm" type="text" name="total_settlement" value="" placeholder=""  ></th>
            </tfoot>
        </table>
        
    </div>

        
  <!-- section -->

  <div class="col-lg-5 offset-lg-1">
   <h5 id="indicators">Account </h5>
   <div class="col form-group required">
      <label class="col-form-label col-form-label-sm" for="inputSmall">Full Settlement Date</label>
      <input class="form-control form-control-sm" type="Date" id="Date_Settlement" name="Date_Settlement" value="{{ old('Date_Settlement') }}" placeholder="" >
   </div>
   <label class="col-form-label col-form-label-sm" for="inputSmall">Collector</label>
   <select id="Collector" name="Collector" class="form-control form-control-sm">
      <option  value=''>Please select collector</option>
      @foreach($cmd as $key => $value)
      <option value="{{$value->id}}" @if($value->Status != 'Active')style="color:red;" @endif >{{$value->Name}} - {{$value->Employee_Code}}</option>
      @endforeach	
   </select>
</div>
<!-- section -->



  

  </div>
  <!-- row -->





              </div>
      </div>
    </div>
  </div>


  <div class="py-12" style="padding-top: 5px;padding-bottom: 5px;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

        @if(request()->route('id') || request()->route('inv'))
          <div class="row">
          <div class="col-lg-5">
          <p style="color: grey;font-style: italic;margin-bottom:1;">Created By: {{$invoice->Created_By ?? '-'}} on {{$invoice->Created_Date ?? '-'}}</p>
          </div>
          <div class="col-lg-5 offset-lg-1">
          <p style="color: grey;font-style: italic;margin-bottom:1;padding-left:20px;">Last Edited By: {{$invoice->Last_Edited_By ?? '-'}} on {{$invoice->Last_Edited_Date ?? '-'}}</p>
          </div>
          </div>
          @endif

        

        @if(request()->route('id')  || request()->route('inv'))
                <button type="submit" class="btn btn-primary">Save Invoice</button>
                <button type="reset" class="btn btn-warning" onclick="window.location.reload();">
                Clear Form
                </button>
            </form>
        @endif



</div>
      </div>
    </div>
  </div>


 <!-- adding invoice -->
 @endif

</x-app-layout>
<script>
$( document ).ready(function() {

  $('#State').val( {{$client->State ?? ''}} );
  $('#Country').val( "{{$client->Country ?? ''}}" );

  @if(request()->route('inv'))
  $('#Order_Status').val("{{$invoice->Orderstatus ?? ''}}" );
  $('#Occupation').val( "{{$invoice->occupation_code ?? ''}}" );

  $('#Product_1').val( {{$invoice->Product ?? ''}} );
  $('#Product_2').val( {{ $invoice->Product_2 ?? ''}} );
  $('#Product_3').val( {{$invoice->Product_3 ?? ''}} );
  $('#Product_4').val( {{$invoice->Product_4 ?? ''}} );
  $('#Product_5').val( {{$invoice->Product_5 ?? ''}} );
  $('#Product_6').val( {{$invoice->Product_6 ?? ''}} );
  $('#Product_7').val( {{$invoice->Product_7 ?? ''}} );
  $('#Product_8').val( {{$invoice->Product_8 ?? ''}} );

  $('#U_price_1').val( {{ returnNull($invoice->Price) ?? ''}} );
  $('#U_price_2').val( {{ returnNull($invoice->Price_2) ?? ''}} );
  $('#U_price_3').val( {{ returnNull($invoice->Price_3) ?? ''}} );
  $('#U_price_4').val( {{ returnNull($invoice->Price_4) ?? ''}} );
  $('#U_price_5').val( {{ returnNull($invoice->Price_5) ?? ''}} );
  $('#U_price_6').val( {{ returnNull($invoice->Price_6) ?? ''}} );
  $('#U_price_7').val( {{ returnNull($invoice->Price_7) ?? ''}} );
  $('#U_price_8').val( {{ returnNull($invoice->Price_8) ?? ''}} );

  $('#Qty_1').val( {{ returnNull($invoice->Qty) ?? ''}} );
  $('#Qty_2').val( {{ returnNull($invoice->Qty_2) ?? ''}} );
  $('#Qty_3').val( {{ returnNull($invoice->Qty_3) ?? ''}} );
  $('#Qty_4').val( {{ returnNull($invoice->Qty_4) ?? ''}} );
  $('#Qty_5').val( {{ returnNull($invoice->Qty_5) ?? ''}} );
  $('#Qty_6').val( {{ returnNull($invoice->Qty_6) ?? ''}} );
  $('#Qty_7').val( {{ returnNull($invoice->Qty_7) ?? ''}} );
  $('#Qty_8').val( {{ returnNull($invoice->Qty_8) ?? ''}} );

  $('#Disc_1').val( {{ returnNull($invoice->Discount) ?? ''}} );
  $('#Disc_3').val( {{ returnNull($invoice->Discount_3) ?? ''}} );
  $('#Disc_4').val( {{ returnNull($invoice->Discount_4) ?? ''}} );
  $('#Disc_5').val( {{ returnNull($invoice->Discount_5) ?? ''}} );
  $('#Disc_6').val( {{ returnNull($invoice->Discount_6) ?? ''}} );
  $('#Disc_7').val( {{ returnNull($invoice->Discount_7) ?? ''}} );
  $('#Disc_8').val( {{ returnNull($invoice->Discount_8) ?? ''}} );
  
  $('#Total_1').val( {{ returnNull($invoice->Total_RM) ?? ''}} );
  $('#Total_2').val( {{ returnNull($invoice->Total_RM_2) ?? ''}} );
  $('#Total_3').val( {{ returnNull($invoice->Total_RM_3) ?? ''}} );
  $('#Total_4').val( {{ returnNull($invoice->Total_RM_4) ?? ''}} );
  $('#Total_5').val( {{ returnNull($invoice->Total_RM_5) ?? ''}} );
  $('#Total_6').val( {{ returnNull($invoice->Total_RM_6 )?? ''}} );
  $('#Total_7').val( {{ returnNull($invoice->Total_RM_7) ?? ''}} );
  $('#Total_8').val( {{ returnNull($invoice->Total_RM_8) ?? ''}} );

  $('#Grand_Total').val( {{$invoice->Grand_Total ?? ''}} );

  $('#Date').val( "{{$invoice->Date ?? ''}}" );

  $('#Sales_Person').val( {{$invoice->Consultant ?? ''}} );
  $('#Channel').val( {{$invoice->Channel ?? ''}} );
  $('#Closing').val( "{{$invoice->closing_code ?? ''}}" );

  $('#Ptp_1').val( "{{$invoice->Promise_pay ?? ''}}" );
  $('#Ptp_2').val( "{{$invoice->Promise_pay2 ?? ''}}" );
  $('#Ptp_3').val( "{{$invoice->Promise_pay3 ?? ''}}" );
  $('#Ptp_4').val( "{{$invoice->Promise_pay4 ?? ''}}" );

  $('#Settlement_1').val( {{$invoice->Payment1 ?? ''}} );
  $('#Settlement_2').val( {{$invoice->Payment2 ?? ''}} );
  $('#Settlement_3').val( {{$invoice->Payment3 ?? ''}} );
  $('#Settlement_4').val( {{$invoice->Payment4 ?? ''}} );
  $('#total_settlement').val( {{$invoice->Payment1 ?? '0'}} + {{$invoice->Payment2 ?? '0'}} + {{$invoice->Payment3 ?? '0'}} + {{$invoice->Payment4 ?? '0'}} );


  $('#Date_Settlement').val( "{{$invoice->Paid_Date ?? ''}}" );
  $('#Collector').val( {{$invoice->Cmd ?? ''}} );
 

  @endif

  
  
});

    $('.settlement').keyup(function(){
      var set_1 = document.getElementById('Settlement_1').value;
      var set_2 = document.getElementById('Settlement_2').value;
      var set_3 = document.getElementById('Settlement_3').value;
      var set_4 = document.getElementById('Settlement_4').value;
      var total = parseFloat(Number(set_1)) + parseFloat(Number(set_2)) + parseFloat(Number(set_3)) + parseFloat(Number(set_4));

      document.getElementById('total_settlement').value = total.toFixed(2);
    });
    function remove(id)
    {
      document.getElementById('Settlement_'+id).value = '';
      document.getElementById('Ptp_'+id).value = '';

      var set_1 = document.getElementById('Settlement_1').value;
      var set_2 = document.getElementById('Settlement_2').value;
      var set_3 = document.getElementById('Settlement_3').value;
      var set_4 = document.getElementById('Settlement_4').value;
      var total = parseFloat(Number(set_1)) + parseFloat(Number(set_2)) + parseFloat(Number(set_3)) + parseFloat(Number(set_4));

      document.getElementById('total_settlement').value = total.toFixed(2);
    }
    function remove_inv(id)
    {
      document.getElementById('Product_'+id).value = '';
      document.getElementById('U_price_'+id).value = '';
      document.getElementById('Qty_'+id).value = '';
      document.getElementById('Disc_'+id).value = '';
      document.getElementById('DiscRM_'+id).value = '';
      document.getElementById('Total_'+id).value = '';
      
    }
    function product(produk,harga,quantity, dicsount, total, produk2,harga2,quantity2, dicsount2, total2 , produk3,harga3,quantity3, dicsount3, total3)
    {
      clear_products();


if(produk != null)
{      

var dd = document.getElementById('Product_1');
for (var i = 0; i < dd.options.length; i++) {
    if (dd.options[i].text === produk) {
        dd.selectedIndex = i;
        break;
    }
}  
    
    
    document.getElementById("U_price_1").value = harga;
    document.getElementById("Qty_1").value = quantity;
    document.getElementById("DiscRM_1").value = dicsount;
    document.getElementById("Total_1").value = total;

}

if(produk2 != null)
{ 

    var dd = document.getElementById('Product_2');
for (var i = 0; i < dd.options.length; i++) {
    if (dd.options[i].text === produk2) {
        dd.selectedIndex = i;
        break;
    }
}  
    
    document.getElementById("U_price_2").value = harga2;
    document.getElementById("Qty_2").value = quantity2;
    document.getElementById("DiscRM_2").value = dicsount2;
    document.getElementById("Total_2").value = total2;

  }

if(produk3 != null)
{ 

    var dd = document.getElementById('Product_3');
for (var i = 0; i < dd.options.length; i++) {
    if (dd.options[i].text === produk3) {
        dd.selectedIndex = i;
        break;
    }
}  
    document.getElementById("U_price_3").value = harga3;
    document.getElementById("Qty_3").value = quantity3;
    document.getElementById("DiscRM_3").value = dicsount3;
    document.getElementById("Total_3").value = total3;

}   
       
   }
   function copy_address(id_client)
   {
    
    $.ajax({
    type:'get',
    url:'/getShipAddress',
    data:{
        id:id_client
    },
    success:function(res){
      //console.log(res);
      document.getElementById("Ship_Name").value = res['Name'];
      document.getElementById("Address").value = res['Address'];
      document.getElementById("Address_2").value = res['Address_2'];
      document.getElementById("Poscode").value = res['Poscode'];
      document.getElementById("City").value = res['City'];
      document.getElementById("State").value = res['State'];
      document.getElementById("Country").value = res['Country'];
      document.getElementById("Ship_Phone").value = res['Mobile_No']+' / '+res['Phone']+' / '+res['Off_Phone'];

      

    }

});

   }
   function clear_address()
   {
      document.getElementById("Ship_Name").value = '';
      document.getElementById("Address").value = '';
      document.getElementById("Address_2").value = '';
      document.getElementById("Poscode").value = '';
      document.getElementById("City").value = '';
      document.getElementById("State").value = '';
      document.getElementById("Ship_Phone").value = '';
      

   }
   function clear_products()
   {

    for(var i =1;i < 6;i++) 
    { 

    document.getElementById("Product_"+i).value = '';
    document.getElementById("U_price_"+i).value = '';
    document.getElementById("Qty_"+i).value = '';
    document.getElementById("DiscRM_"+i).value = '';
    document.getElementById("Total_"+i).value = '';

    }

   }
</script>