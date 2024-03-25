<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['client_id' , 'product_id' , 'sub_total' , 'quantity'];

    public function client() {
       return $this->belongsTo(client::class,'client_id');
    }
}
