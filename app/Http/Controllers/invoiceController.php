<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DateTime;

use DB;
use Session;
use Auth;
Use Exception;
use DataTables;
use App\Models\Invoice;



class invoiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function invoicelist(Request $request)
    {
        if ($request->ajax()) {
            $data = Invoice::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

 
    return view('invoice_list');
        
        
    }
    public function invoice_list(Request $request)
    {
       
        
        return view('invoice_list');
    }
    // if ade ID client
    public function add_client_form()
    {
        $id='';
        $state = DB::table('negeri')->get();
        $product = DB::table('product')->get();
        $consultant = DB::table('consultant')->get();
        $cmd = DB::table('cmd')->get();
        $country = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
         
        //$client = DB::table('client')->where('id',1)->get();
        


        return view('invoice')->with( [ 
            'cmd' => $cmd,'consultant' => $consultant, 
            'state' => $state,'country' => $country,
            'product' => $product, 'id'=>$id 
            ] );

    }
    public function add_invoice_form($id_client)
    {
        $id='';
        $state = DB::table('negeri')->get();
        $product = DB::table('product')->get();
        $consultant = DB::table('consultant')->get();
        $cmd = DB::table('cmd')->get();
        $country = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
         
        $client = DB::table('client')->where('id',$id_client)->get();
        


        return view('invoice')->with( [ 
            'cmd' => $cmd,'consultant' => $consultant, 
            'state' => $state,'country' => $country,
            'product' => $product, 'id'=>$id, 'client' => $client 
            ] );

    }
    // insert client to DB
    public function add_client(Request $request)
    {
        $state = DB::table('negeri')->get();
        $product = DB::table('product')->get();
        

        $country = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");


        try
        {
            $id = DB::table('client')->insertGetId(
                ['Name' => $request->Name, 'MyKad_SSM' => $request->MyKad_SSM]
            );

            //return redirect()->route( 'invoice' )->with( ['id' => $id ] );
            return redirect("/invoice/$id");
           
        }
        catch(Exception $e)
        {
        //dd($e->getMessage());
        return redirect()->back()->withInput($request->input())->with('error', $e->getMessage());
        }

    }
    // insert invoice to DB
    public function add_invoice(Request $request)
    { 
      
        try
        {
            $id = DB::table('invoice')->insertGetId(

                [
            //invoice detail
            'Date'=>$request->Date,'Status_Inv'=>'PENDING', 
            'Aging'=>getAging($request->Date) ,   
                
            
             //customer detail       
            'MyKad_SSM'=>$request->Id, 'Name'=>$request->Id, 'Phone'=>$request->Id, 'Off_Phone'=>$request->Id, 
            'Address'=>$request->Id, 'Address_2'=>$request->Id, 'Poscode'=>$request->Id, 'City'=>$request->Id,
            'State'=>$request->Id,'Country'=>$request->Id,  

            // shipping address & detail
            'Ship_Phone'=>$request->Phone_1 , 'Ship_Name'=>$request->Name ,
            'Ship_Add1'=>$request->Address , 'Ship_Add2'=>$request->Address_2 , 'Ship_poscode'=>$request->Poscode , 'Ship_City'=>$request->City ,
            'Ship_State'=>$request->State , 'Ship_Country'=>$request->Country , 
            
           //'Inv_No'=>$request-> ,             
                
               
             
             'Product'  =>$request->Product_1 , 'Price'=>  $request->U_price_1 , 'Qty'=>  $request->Qty_1 , 'Discount'=>  $request->Disc_1 , 'Total_RM'=>  $request->Total_1 , 
             'Product_2'=>$request->Product_2 , 'Price_2'=>$request->U_price_2 , 'Qty_2'=>$request->Qty_2 , 'Discount_2'=>$request->Disc_2 , 'Total_RM_2'=>$request->Total_2 ,
             'Product_3'=>$request->Product_3 , 'Price_3'=>$request->U_price_3 , 'Qty_3'=>$request->Qty_3 , 'Discount_3'=>$request->Disc_3 , 'Total_RM_3'=>$request->Total_3 , 
             'Product_4'=>$request->Product_4 , 'Price_4'=>$request->U_price_4 , 'Qty_4'=>$request->Qty_4 , 'Discount_4'=>$request->Disc_4 , 'Total_RM_4'=>$request->Total_4 , 
             'Product_5'=>$request->Product_5 , 'Price_5'=>$request->U_price_5 , 'Qty_5'=>$request->Qty_5 , 'Discount_5'=>$request->Disc_5 , 'Total_RM_5'=>$request->Total_5 , 
             //'Product_6'=>$request-> , 'Price_6'=>$request-> , 'Qty_6'=>$request-> , 'Discount_6'=>$request-> , 'Total_RM_6'=>$request-> , 
             //'Product_7'=>$request-> , 'Price_7'=>$request-> , 'Qty_7'=>$request-> , 'Discount_7'=>$request-> , 'Total_RM_7'=>$request-> , 
            // 'Product_8'=>$request-> , 'Price_8'=>$request-> , 'Qty_8'=>$request-> , 'Discount_8'=>$request-> , 'Total_RM_8'=>$request-> , 
             'Grand_Total'=>$request->Grand_Total , 'Paid_Total'=>0.0 , 'Overdue_Amt'=>$request->Grand_Total , 
             'Consultant'=>$request->Sales_Person ,'Consultant2'=>$request->Sales_Person ,
             'Channel'=>$request->Channel , 'Cmd'=>$request->Collector , 
             //'Paid_Date'=>$request-> , 
             //'Flush_Campaign'=>$request-> , 
             //'Created_By'=>$request-> , 'Created_Date'=>$request-> , 'Last_Edited_By'=>$request-> , 'Last_Edited_Date'=>$request-> , 
             'Invoice_Status'=>0 , 'Delivery_Status'=>0 ,  'Docket_Status'=>0 , 
             //'Tracking_status'=> ,
             'occupation_code'=>$request->Occupation , 'closing_code'=>$request->Closing ,
             'Promise_pay'=>$request->Ptp_1 , 'Promise_pay2'=>$request->Ptp_2 , 'Promise_pay3'=>$request->Ptp_3 , 'Promise_pay4'=>$request->Ptp_4 ,   
             'Payment1'=>$request->Settlement_1 , 'Payment2'=>$request->Settlement_2 , 'Payment3'=>$request->Settlement_3 , 'Payment4'=>$request->Settlement_4 , 
             'Orderstatus' =>$request->Order_Status
              
                ]
            );
            // update invoice number
            $Inv_No = setInvNo($id);
            DB::table('invoice')->where('Id',$id)->update(array('Inv_No'=>$Inv_No));

            

            //return redirect()->route( 'invoice' )->with( ['id' => $id ] );
            return redirect("/invoice/$id");
           
        }
        catch(Exception $e)
        {
        //dd($e->getMessage());
        return redirect()->back()->withInput($request->input())->with('error', $e->getMessage());
        }

    }
}
