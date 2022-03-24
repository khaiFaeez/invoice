<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client';


    public function invoice()
    {
        return $this->hasOne(Invoice::class,'Name','id');
    }
    public function state()
    {
        return $this->hasOne(State::class,'id','State');
    }
    
   
}
