<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;
    protected $fillable =[
        'name','city_id','address','fax','email','phone','bank_branch','website','sale_tax_no','national_tax_no',
        'remarks','created_by','updated_by'
    ];
    public function cities()
    {
        return $this->hasOne(City::class, 'id','city_id');
    }
}
