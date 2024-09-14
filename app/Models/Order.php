<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['first_name' , 'last_name' , 'email' , 'phone' , 'address' , 'note' , 'payment_method' , 'state' , 'client_id' , 'governorate_id'
                             , 'total', 'total_products'];

    public function governorate (){
        return $this->belongsTo(Governorate::class,'governorate_id');
    }
    public function client (){
        return $this->belongsTo(client::class,'client_id');
    }
}
