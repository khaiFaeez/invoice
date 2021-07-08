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
     
                           $btn = "<a href='list/".$row->Id."' class='edit btn btn-primary btn-sm'>View</a>";
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

 
    //return view('invoice_list');
        
        
    }
    public function invoice_list(Request $request)
    {
       
        
        return view('invoice_list');
    }
    // initial form to create client
    public function add_client_form()
    {
        $id='';
        $state = DB::table('negeri')->get();
        $product = DB::table('product')->get();
        $consultant = DB::table('consultant')->get();
        $cmd = DB::table('cmd')->get();
        $country = getCountry();
        
        

        return view('invoice')->with( [ 
            'cmd' => $cmd,'consultant' => $consultant, 
            'state' => $state,'country' => $country,
            'product' => $product, 'id'=>$id, 'client' => '',
            'client_Name' =>  '', 'client_MyKad_SSM' => '',
            'client_Mobile_No' => '', 'client_Phone' => '', 'client_Off_Phone' => ''
            ] );

    }
    // initial form to create invoice
    public function add_invoice_form($id_client)
    {
        $id='';
        $state = DB::table('negeri')->get();
        $product = DB::table('product')->get();
        $consultant = DB::table('consultant')->orderBy('Status', 'ASC')->orderBy('Name', 'ASC')->get();
        $cmd = DB::table('cmd')->orderBy('Status', 'ASC')->orderBy('Name', 'ASC')->get();
        $country = getCountry(); 
        $client = DB::table('client')->where('id',$id_client)->first();
        

        return view('invoice')->with( [ 
            'cmd' => $cmd,'consultant' => $consultant, 
            'state' => $state,'country' => $country,
            'product' => $product, 'id'=>$id, 'client' => $client,
            'client_Name' =>  $client->Name, 'client_MyKad_SSM' => $client->MyKad_SSM,
            'client_Mobile_No' => $client->Mobile_No, 'client_Phone' => $client->Phone, 'client_Off_Phone' => $client->Off_Phone,
            'created_by' => $client->Created_By,'created_date' => $client->Created_Date,
            'edited_by' => $client->Edited_By,'edited_date' => $client->Last_Edited_On,
            ] );

    }
    // insert client to DB
    public function add_client(Request $request)
    {
        
        try
        {
            $id = DB::table('client')->insertGetId(
                [   
                    'Member_Since' => date('Y-m-d H:i:s'), 
                    'Name' => $request->Name, 'MyKad_SSM' => $request->MyKad_SSM,
                    'Mobile_No' => $request->Phone_1, 'Phone'=>$request->Phone_2, 'Off_Phone'=>$request->Phone_3,
                    'Address' => $request->Address, 'Address_2' => $request->Address_2, 'Poscode' => $request->Poscode, 'City' => $request->City,
                     'State' => $request->State, 'Country'=> $request->Country,
                     'Created_By' => Auth::user()->memberID, 'Created_Date' => date('Y-m-d H:i:s')
                ]
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
