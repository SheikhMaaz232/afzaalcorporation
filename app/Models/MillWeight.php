<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MillWeight extends Model
{
    protected $table = 'mill_weight';
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

}
