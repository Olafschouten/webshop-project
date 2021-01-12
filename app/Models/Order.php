<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'firstName',
    'lastName',
    'street',
    'houseNumber',
    'zip',
    'email',
    'id',
    'user_id',
    'created_at',
    'updated_at',
    'cart',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
