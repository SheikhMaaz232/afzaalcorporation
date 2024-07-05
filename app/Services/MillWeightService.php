<?php
namespace App\Services;

/*
 * Class MillWeightService
 * @package App\Services
 * */

use App\Models\Buyer;
use App\Models\City;
use App\Models\Contract;
use App\Models\DispatchEntry;
use App\Models\MillWeight;
use App\Models\PaymentMethod;
use App\Models\Seller;

class MillWeightService
{

    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }

    public function findUpdateOrCreate($model, array $where, array $data)
    {
        $object = $model::firstOrNew($where);
        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();
        return $object;
    }

    public function DropDownData()
    {
        $result = [
            'cities' => City::pluck('name', 'id'),
            'buyers' => Buyer::pluck('name', 'id'),
            'sellers' => Seller::pluck('name', 'id'),
            'modeOfPayments' => PaymentMethod::pluck('name', 'id'),
        ];

        return $result;
    }

    public function search($request)
    {
        $q = DispatchEntry::query();
        $q->where('contract_id', $request['contract']);
        $q->orWhere('buyer_id', $request['buyer']);
        $q->orWhere('seller_id', $request['seller']);

        $contracts = $q->with(['buyer', 'seller'])->orderBy('updated_at', 'DESC')->paginate(config('constants.PER_PAGE'));

        return $contracts;
    }


}
