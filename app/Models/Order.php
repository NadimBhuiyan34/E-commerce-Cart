<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','address','city','state','zip_code','mobile_number','delivery_type','status'
    ];



    public function orderdetails()
    {
          return $this->hasMany(OrderDetail::class);
    }
    public function user()
    {
          return $this->belongsTo(User::class);
    }
     

}
