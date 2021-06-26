<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <div class="py-12" style="padding-bottom: 5px;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

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
          
          <h5 id="indicators">Client Details</h5>

          @if(request()->route('id'))
          <form id="client_form" action="{{url('invoice')}}" method="POST" >
          @endif
          


          @if(request()->route('id') == null)
          <form id="client_form" action="{{url('client')}}" method="POST" >
          @endif
            @csrf      

            <input class="form-control form-control-sm" type="hidden" name="Id" value="{{ old('Id') }} {{request()->route('id')}}" placeholder="" required>   
            <div class="row">
              <div class="col-lg-5 ">
                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Name</label>
                  <input class="form-control form-control-sm" type="text" name="Name" value="{{ old('Name') }}" placeholder="" required>
                </div>
                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">ID Card</label>
                  <input class="form-control form-control-sm" name="MyKad_SSM" value="{{ old('MyKad_SSM') }}" type="text" placeholder="" required>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col form-group required">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Contact No. 1</label>
                      <input class="form-control form-control-sm" type="text" name="Phone_1" value="{{ old('Phone_1') }}" placeholder="" required>
                    </div>
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Contact No. 2</label>
                      <input class="form-control form-control-sm" type="text" name="Phone_2" value="{{ old('Phone_2') }}" placeholder="" >
                    </div>
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Contact No. 3</label>
                      <input class="form-control form-control-sm" type="text" name="Phone_3" value="{{ old('Phone_3') }}" placeholder="" >
                    </div>
                  </div>
                </div>
                </br>
                <div class="row">
                <div class="col">
                <label class="col-form-label col-form-label-sm" for="inputSmall">Client Occpation</label>
                          <select name="Occupation" class="form-control form-control-sm" >
                          <option  value=''>Please select</option>
                          <option  value='A'>Gaji Bulanan</option>
                          <option  value='B'>Bekerja Sendiri/berniaga</option>
                          <option  value='C'>Suri Rumah</option>
                          <option  value='D'>Goverment Staff</option>
                          
                </select>
                </div>
                <div class="col">
                <label class="col-form-label col-form-label-sm" for="inputSmall">Client Order Status</label>
                          <select name="Order_Status" class="form-control form-control-sm" >
                          <option  value=''>Please select</option>
                          <option  value='NEW'>New Order</option>
                          <option  value='REPEAT'>Repeat Order</option>
                          
                </select>
                </div>
                </div>


                </br>
                @if(request()->route('id') == null)
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-warning" onclick="window.location.reload();">
                Clear Form
                </button>
                @endif
              </div>
              <div class="col-lg-5 offset-lg-1">
                <div class="form-group required">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Address</label>
                  <input class="form-control form-control-sm" type="text" placeholder="" name="Address" value="{{ old('Address') }}" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label col-form-label-sm" for="inputSmall">Address 2</label>
                  <input class="form-control form-control-sm" type="text" placeholder=""  name="Address_2" value="{{ old('Address_2') }}">
                </div>
                <div class="form-group required">
                  <div class="row">
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Poscode</label>
                      <input class="form-control form-control-sm" type="text" placeholder="" name="Poscode" value="{{ old('Poscode') }}" required>
                    </div>
                    <div class="col">       
                      <label class="col-form-label col-form-label-sm" for="inputSmall">City</label>
                      <input class="form-control form-control-sm" type="text" placeholder="" name="City" value="{{ old('City') }}" required>
                    </div>
                  </div>
                </div>
                <div class="form-group required">
                  <div class="row">
                    <div class="col">
                      <label class="col-form-label col-form-label-sm" for="inputSmall">State</label>
                      <select name="State" class="form-control form-control-sm" required>
                        <option  value=''>Please select state</option>
                        @foreach($state as $key => $value)
									        <option value="{{$value->id}}" >{{$value->Negeri}}</option>
						            @endforeach	
                      </select>
                    </div>
                    <div class="col">       
                      <label class="col-form-label col-form-label-sm" for="inputSmall">Country</label>
                      <select name="Country" class="form-control form-control-sm" required>
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
      </div>
    </div>
  </div>
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
                      <input class="form-control form-control-sm" type="date" name="Date" value="{{ old('Date') }}<?php echo date("Y-m-d"); ?>" placeholder="" required>
                </div>
            </div>
                </div>
                <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success btn-sm">PAID</button>
                    
                    <button type="button" class="btn btn-secondary btn-sm">Invoice No:</button>
                   
                    <button type="button" class="btn btn-secondary btn-sm">Aging:</button>
                    </div>
                    </div>
                    

            

        </div>
        <!-- row -->

  <hr>
</br>
        <div class="row">
              <div class="col-lg-12 ">

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
            </tr>
        </thead>
        <tbody>

        @for ($i = 1; $i <= 5; $i++)
       
        <tr>      
            <td style="padding-bottom: 0px;padding-top: 0px;">{{$i}}</td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><select style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" name="Product_{{$i}}" class="form-control form-control-sm">
                                <option  value=''>Product</option>
                                @foreach($product as $key => $value)
                                            <option value="{{$value->id}}" >{{$value->Product_Name}}</option>
                                @endforeach	
                            </select>
            </td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" name="U_price_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" name="Qty_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" name="Disc_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" name="DiscRM_{{$i}}" value="" placeholder="" ></td>
            <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" name="Total_{{$i}}" value="" placeholder="" ></td>
            </tr>
        @endfor
        </tbody>
        <tfoot>
        <th colspan=5></th>
        <th >Grand Total</th>
        <th ><input style="border: 0;" class="form-control form-control-sm" type="text" name="Grand_Total" value="" placeholder="" ></th>
        </tfoot>
  </table>


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
                          <select name="Sales_Person" class="form-control form-control-sm" required>
                            <option  value=''>Please select consultant</option>
                            @foreach($consultant as $key => $value)
                              <option value="{{$value->id}}" >{{$value->Name}} - {{$value->Employee_Code}}</option>
                            @endforeach	
                          </select>
                        </div>


                        <div class="col-lg-3">
                          <label class="col-form-label col-form-label-sm" for="inputSmall">Sales Channel</label>
                          <select name="Channel" class="form-control form-control-sm" required>
                          <option  value=''>Please select</option>
                          <option  value='1'>ONLINE</option>
                          <option  value='2'>DISTRIBUTOR</option>
                          <option  value='4'>OFFLINE</option>
                          <option  value='3'>SPECIAL ORDER</option>
                           
                          </select>
                          </div><div class="col-lg-3">  
                          <label class="col-form-label col-form-label-sm" for="inputSmall">Closing Source</label>
                          <select name="Closing" class="form-control form-control-sm">
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
                </tr>
            </thead>
            <tbody>
                @for ($p = 1; $p <= 4; $p++)
                <tr>
                    <td style="padding-bottom: 0px;padding-top: 0px;">{{$p}}</td>
                    <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="date" name="Ptp_{{$p}}" value="{{ old('Ptp_$p') }}" placeholder="" ></td>
                    <td style="padding-bottom: 0px;padding-top: 0px;"><input style="border: 0;border: 0;padding-bottom: 0px;padding-top: 0px;" class="form-control form-control-sm" type="text" name="Settlement_{{$p}}" value="{{ old('Settlement_$p') }}" placeholder="" ></td>
                </tr>
                @endfor
            </tbody>
            <tfoot>
                <th ></th>
                <th >Total Settlement (RM)</th>
                <th ><input style="border: 0;" class="form-control form-control-sm" type="text" name="total_settlement" value="" placeholder="" ></th>
            </tfoot>
        </table>
    </div>

        
  <!-- section -->

  <div class="col-lg-5 offset-lg-1">
   <h5 id="indicators">Account</h5>
   <div class="col form-group required">
      <label class="col-form-label col-form-label-sm" for="inputSmall">Full Settlement Date</label>
      <input class="form-control form-control-sm" type="Date" name="Date_Settlement" value="{{ old('Date_Settlement') }}" placeholder="" >
   </div>
   <label class="col-form-label col-form-label-sm" for="inputSmall">Collector</label>
   <select name="Collector" class="form-control form-control-sm">
      <option  value=''>Please select collector</option>
      @foreach($cmd as $key => $value)
      <option value="{{$value->id}}" >{{$value->Name}} - {{$value->Employee_Code}}</option>
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

        @if(request()->route('id'))
                <button type="submit" class="btn btn-primary">Save Invoice</button>
                <button type="reset" class="btn btn-warning" onclick="window.location.reload();">
                Clear Form
                </button>
            </form>
        @endif

  Id
Name
MyKad_SSM
Phone_1
Phone_2
Phone_3
Occupation
Order_Status
Address
Address_2
Poscode
City
State
Country
Date
PAID  Invoice No:  Aging

Product_{{$i}}
U_price_{{$i}} Qty_{{$i}} Disc_{{$i}} DiscRM_{{$i}} Total_{{$i}}
Grand_Total

Sales_Person
Channel
Closing

Ptp_{{$p}}
Settlement_{{$p}}

Date_Settlement
Collector

</div>
      </div>
    </div>
  </div>




</x-app-layout>
