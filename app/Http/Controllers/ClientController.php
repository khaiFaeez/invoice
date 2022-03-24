<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class ClientController extends Controller
{
    
    public function __construct()
    {
        
    }
    public function index()
    {
        $client = Client::paginate(100);

        $last_purchase = Invoice::where('Name',$client->id)->first();
        
        return view('client_list',compact('client'));
    }
}
