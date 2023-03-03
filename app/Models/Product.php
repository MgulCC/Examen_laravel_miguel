<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'name',
        'description',
        'quantity',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
