<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Client extends Authenticatable
{
    use Billable , HasFactory ;
    protected $fillable = ['name' , 'email' , 'password'];

    public function orders() {
        $this->hasMany(Order::class);
    }
}
