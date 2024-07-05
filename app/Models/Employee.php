<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;
    protected $fillable =[
        'name','city_id','designation','date_of_birth','cnic_number','date_of_joining','address','salary','phone','cell','remarks',
        'created_by','updated_by'
    ];
    public function cities()
    {
        return $this->hasOne(City::class, 'id','city_id');
    }
}
