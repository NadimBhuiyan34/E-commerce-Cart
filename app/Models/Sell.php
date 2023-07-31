<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_id', 'book-id', 'customer_name', 'mobile', 'quantity', 'total_price', 'status'
  ];


  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function book()
  {
    return $this->belongsTo(Book::class);
  }
}
