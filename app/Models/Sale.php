<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function product(){
        $this->belongsTo(Product::class);
    }

}

