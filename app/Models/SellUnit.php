<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellUnit extends Model
{
    use HasFactory;

    public function purchase_unit(){
        return $this->belongsTo(PurchaseUnit::class, 'pu_id', 'pu_id');
    }
}
