<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buyer extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;
    protected $fillable =[
        'name','city_id','address_office','address_mills','phone_mills','fax','phone_office','email','website','sale_tax_no','national_tax_no',
        'remarks','created_by','updated_by'
    ];
    public function cities()
    {
        return $this->hasOne(City::class, 'id','city_id');
    }
}
