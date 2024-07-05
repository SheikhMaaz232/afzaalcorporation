<?php

namespace App\Services;

/*
 * Class ContractService
 * @package App\Services
 * */

use App\Models\Buyer;
use App\Models\Contract;
use App\Models\City;
use App\Models\PaymentMethod;
use App\Models\Seller;

class ContractService
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
        $q = Contract::query();
        if (!empty($request['contract'])) {
            $q->where('id', $request['contract']);
        } elseif (!empty($request['buyer'])) {
            $q->where('buyer_id', $request['buyer']);
        } elseif (!empty($request['seller'])) {
            $q->where('seller_id', $request['seller']);
        }

        $contracts = $q->with(['buyer', 'seller'])->orderBy('updated_at', 'DESC')->paginate(config('constants.PER_PAGE'));
        return $contracts;

    }

    public function deleteResource($modelClass)
    {
        $deleted = $modelClass::destroy(request()->id);
        if ($deleted) {
            $message = config('constants.delete');
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.delete'));
            // return response()->json(['status' => 'success', 'message' => $message]);
        } else {
            $message = config('constants.wrong');
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.wrong'));
        }
    }

}
